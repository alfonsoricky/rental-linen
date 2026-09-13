"""Check server-rendered language pages without browser or third-party packages.
Usage: python3 tests/check_languages.py /path/to/php
"""
import html
from html.parser import HTMLParser
import json
from pathlib import Path
import re
import subprocess
import sys
import xml.etree.ElementTree as ET
from urllib.parse import urlparse


class PageAssets(HTMLParser):
    def __init__(self, page):
        super().__init__()
        self.meta = {}
        self.images = []
        self.feed(page)

    def handle_starttag(self, tag, attrs):
        attrs = dict(attrs)
        if tag == 'meta':
            self.meta[attrs.get('property', attrs.get('name'))] = attrs.get('content', '')
        elif tag == 'img' and attrs.get('src'):
            self.images.append(attrs)


ROOT = Path(__file__).resolve().parents[1]
PHP = sys.argv[1] if len(sys.argv) > 1 else 'php'
preferred_image = 'assets/images/gallery/bedroom-teak.jpg'
preferred_url = 'https://asialinen.com/' + preferred_image
image_info = json.loads(subprocess.run(
    [PHP, '-r', 'echo json_encode(getimagesize($argv[1]));', str(ROOT / preferred_image)],
    check=True, capture_output=True, text=True,
).stdout)
translations = json.loads((ROOT / 'includes/id.json').read_text())
source = (ROOT / 'index.php').read_text()
used = re.findall(r"\bt\('((?:\\.|[^'\\])*)'\)", source)
assert all(key.replace("\\'", "'") in translations for key in used), 'Missing translation'
prices = []
visible_images = {}
image_alts = {}
for lang in ('en', 'id'):
    for base in ('/', '/rental-linen/'):
        code = "$_SERVER['SCRIPT_NAME'] = '" + base + lang + "/index.php'; require '" + lang + "/index.php';"
        result = subprocess.run([PHP, '-r', code], cwd=ROOT, check=True, capture_output=True, text=True)
        assert not result.stderr, result.stderr
        page = result.stdout
        assets = PageAssets(page)
        assert f'<html lang="{lang}">' in page
        url = f'https://asialinen.com/{lang}/'
        assert f'<link rel="canonical" href="{url}">' in page
        assert f'<meta property="og:url" content="{url}">' in page
        for alternate, path in [('en', 'en'), ('id', 'id'), ('x-default', 'en')]:
            assert f'hreflang="{alternate}" href="https://asialinen.com/{path}/"' in page
        assert f'href="{base}en/"' in page and f'href="{base}id/"' in page
        # One stable, shared ICO URL for both languages and local subdirectory installs.
        icons = re.findall(r'<link\b[^>]*\brel="icon"[^>]*>', page)
        assert len(icons) == 1, 'Competing favicon declarations'
        assert f'href="{base}favicon.ico"' in icons[0], 'Favicon URL must stay stable'
        assert 'type="image/x-icon"' in icons[0]
        for asset in re.findall(r'(?:src|href)="([^"]+)"', page):
            if asset.startswith(base + 'assets/') or asset.startswith(base + 'favicon.ico'):
                assert (ROOT / asset[len(base):].split('?')[0]).is_file(), asset
        graph = json.loads(re.search(r'<script type="application/ld\+json">(.*?)</script>', page, re.S)[1])['@graph']
        webpage = next(node for node in graph if 'WebPage' in node['@type'])
        primary = next(node for node in graph if node.get('@id') == webpage['primaryImageOfPage']['@id'])
        assert primary['@type'] == 'ImageObject' and primary['contentUrl'] == preferred_url
        assert assets.meta['og:image'] == assets.meta['twitter:image'] == preferred_url
        assert int(assets.meta['og:image:width']) == primary['width'] == image_info['0']
        assert int(assets.meta['og:image:height']) == primary['height'] == image_info['1']
        assert assets.meta['og:image:type'] == primary['encodingFormat'] == image_info['mime']
        photo = next(img for img in assets.images if img['src'] == base + preferred_image)
        alt = photo['alt']
        assert alt and assets.meta['og:image:alt'] == assets.meta['twitter:image:alt'] == primary['description'] == alt
        assert int(photo['width']) == image_info['0'] and int(photo['height']) == image_info['1']
        image_alts[lang] = alt
        robots = {directive.strip().lower() for directive in assets.meta['robots'].split(',')}
        assert 'max-image-preview:large' in robots and not robots.intersection({'noimageindex', 'noindex', 'none'})
        visible_images[lang] = {
            'https://asialinen.com/' + img['src'][len(base):]
            for img in assets.images if img['src'].startswith(base + 'assets/')
        }
        faq = [node for node in graph if 'FAQPage' in node['@type']]
        assert len(faq) == 1 and faq[0]['inLanguage'] == lang and faq[0]['url'] == url
        section = re.search(r'<section id="faq".*?</section>', page, re.S)[0]
        visible = re.findall(r'<summary[^>]*>(.*?)<span.*?</summary><p[^>]*>(.*?)</p>', section, re.S)
        assert len(visible) == len(faq[0]['mainEntity']) == 5
        for item, (question, answer) in zip(faq[0]['mainEntity'], visible):
            assert item['@type'] == 'Question' and item['acceptedAnswer']['@type'] == 'Answer'
            assert item['name'] == html.unescape(question)
            assert item['acceptedAnswer']['text'] == html.unescape(answer)
        if lang == 'id':
            assert 'Sewa Linen Bali untuk Hotel &amp; Vila' in page
            assert '>Request a Quote' not in page
        rates = re.findall(r'>Rp</span>([\d,.]+)', page)
        assert len(rates) == 17
        prices.append([int(re.sub(r'\D', '', rate)) for rate in rates])
assert all(rates == prices[0] for rates in prices), 'Language switch changed rates'
assert image_alts['en'] != image_alts['id'] and translations[image_alts['en']] == image_alts['id']
sitemap = ET.parse(ROOT / 'sitemap.xml')
ns = {'sm': 'http://www.sitemaps.org/schemas/sitemap/0.9', 'image': 'http://www.google.com/schemas/sitemap-image/1.1'}
pages = sitemap.findall('sm:url', ns)
assert {node.findtext('sm:loc', namespaces=ns) for node in pages} == {'https://asialinen.com/en/', 'https://asialinen.com/id/'}
image_sets = []
for node in pages:
    lang = urlparse(node.findtext('sm:loc', namespaces=ns)).path.strip('/')
    images = [image.text for image in node.findall('image:image/image:loc', ns)]
    assert preferred_url in images and len(images) == len(set(images)), 'Missing preferred image or duplicate sitemap images'
    assert set(images) <= visible_images[lang], 'Sitemap contains images absent from the page'
    for image in images:
        parsed = urlparse(image)
        assert parsed.scheme == 'https' and parsed.netloc == 'asialinen.com'
        assert (ROOT / parsed.path.lstrip('/')).is_file(), image
    image_sets.append(set(images))
assert image_sets[0] == image_sets[1], 'Language sitemaps list different images'
print('PASS: EN/ID metadata, image SEO and dimensions, hreflang, FAQ consistency, favicon, assets, subdirectory links, translations, 17 rates, image sitemap')
