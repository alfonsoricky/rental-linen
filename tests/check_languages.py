"""Check server-rendered language pages without browser or third-party packages.
Usage: python3 tests/check_languages.py /path/to/php
"""
import html
import json
from pathlib import Path
import re
import subprocess
import sys
import xml.etree.ElementTree as ET

ROOT = Path(__file__).resolve().parents[1]
PHP = sys.argv[1] if len(sys.argv) > 1 else 'php'
translations = json.loads((ROOT / 'includes/id.json').read_text())
source = (ROOT / 'index.php').read_text()
used = re.findall(r"\bt\('((?:\\.|[^'\\])*)'\)", source)
assert all(key.replace("\\'", "'") in translations for key in used), 'Missing translation'
prices = []
for lang in ('en', 'id'):
    for base in ('/', '/rental-linen/'):
        code = "$_SERVER['SCRIPT_NAME'] = '" + base + lang + "/index.php'; require '" + lang + "/index.php';"
        result = subprocess.run([PHP, '-r', code], cwd=ROOT, check=True, capture_output=True, text=True)
        assert not result.stderr, result.stderr
        page = result.stdout
        assert f'<html lang="{lang}">' in page
        url = f'https://asialinen.com/{lang}/'
        assert f'<link rel="canonical" href="{url}">' in page
        assert f'<meta property="og:url" content="{url}">' in page
        for alternate, path in [('en', 'en'), ('id', 'id'), ('x-default', 'en')]:
            assert f'hreflang="{alternate}" href="https://asialinen.com/{path}/"' in page
        assert f'href="{base}en/"' in page and f'href="{base}id/"' in page
        for asset in re.findall(r'(?:src|href)="([^"]+)"', page):
            if asset.startswith(base + 'assets/') or asset.startswith(base + 'favicon.ico'):
                assert (ROOT / asset[len(base):].split('?')[0]).is_file(), asset
        graph = json.loads(re.search(r'<script type="application/ld\+json">(.*?)</script>', page, re.S)[1])['@graph']
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
sitemap = ET.parse(ROOT / 'sitemap.xml')
assert {n.text for n in sitemap.findall('.//{*}loc')} == {'https://asialinen.com/en/', 'https://asialinen.com/id/'}
print('PASS: EN/ID metadata, hreflang, FAQ consistency, assets, subdirectory links, translations, 17 rates, sitemap')
