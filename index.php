<?php
if (!isset($lang)) {
    $rootPath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/index.php')), '/');
    header('Location: ' . $rootPath . '/en/', true, 301);
    exit;
}
require __DIR__ . '/includes/language.php';
header('Content-Language: ' . $lang);
$phone = '0822-3796-3375';
$telephone = '+6282237963375';
$addressLines = ['Jalan Gunung Patas 1 No. 81B', 'Padang Sambian Kelod, Denpasar Barat'];
$whatsappBase = 'https://wa.me/' . ltrim($telephone, '+');
$quoteUrl = $whatsappBase . '?text=' . rawurlencode(t('Hello Asia Linen, I would like to request a linen rental quotation.'));
// Customer relationships supplied by the site owner; unverified property logos remain text-only.
$customers = [
    ['name' => 'Aloft Bali Kuta at Beachwalk', 'logo' => 'aloft-bali-kuta.png'],
    ['name' => 'InterContinental Bali Sanur Resort', 'logo' => 'intercontinental-sanur.png'],
    ['name' => 'Aloft Petitenget', 'logo' => 'aloft-bali-seminyak.png'],
    ['name' => 'Crystal Hotel', 'logo' => 'crystal-kuta.png'],
    ['name' => 'LV8 Resort Hotel', 'logo' => 'lv8-resort-hotel.png'],
    ['name' => 'Seminyak Private Villas', 'logo' => null],
    ['name' => 'K-Club Ubud', 'logo' => 'k-club-ubud.webp'],
    ['name' => 'Mahagiri', 'logo' => null],
    ['name' => 'Swiss-Belhotel Jimbaran', 'logo' => null],
    ['name' => 'Mercure Resort Sanur', 'logo' => 'mercure.svg'],
    ['name' => 'Four Points by Sheraton Bali, Seminyak', 'logo' => null],
    ['name' => 'Fairfield by Marriott Bali South Kuta', 'logo' => null],
    ['name' => 'The Amala Seminyak', 'logo' => 'amala.png'],
    ['name' => 'Sovereign Bali Hotel', 'logo' => 'sovereign.png'],
];
$products = [
    ['name' => t('Towels & Bath Mats'), 'image' => 'towels.jpg', 'alt' => t('Illustration of white towels arranged in a villa bathroom'), 'tag' => t('BATH COLLECTION'), 'description' => t('A comfortable touch for your guest bathroom essentials.'), 'spec' => t('Bath Towel · Bath Mat · Hand Towel · Face Towel'), 'detail' => t('White · A choice of sizes for your needs'), 'items' => [t('Bath Towel — 68 × 140'), t('Bath Mat — 50 × 75'), t('Hand Towel — 40 × 70'), t('Face Towel — 30 × 30')]],
    ['name' => t('Pillowcases'), 'image' => 'pillows.jpg', 'alt' => t('Illustration of white pillows and folded sheets'), 'tag' => t('PILLOW COLLECTION'), 'description' => t('Plain white linen for a neatly finished bed.'), 'spec' => t('Available in 50 × 70 and 50 × 90'), 'detail' => t('CVC · TC 200 / TC 250 · Plain white'), 'items' => [t('50 × 70 — CVC TC 200 or TC 250'), t('50 × 90 — CVC TC 200 or TC 250')]],
    ['name' => t('Sheets & Duvets'), 'image' => 'hero.jpg', 'alt' => t('Illustration of a bed with white linen in a Bali villa'), 'tag' => t('BED COLLECTION'), 'description' => t('Complete your rooms with single and double bed linen.'), 'spec' => t('Single & Double'), 'detail' => t('CVC · TC 200 / TC 250 · Plain white'), 'items' => [t('Double Sheet — 300 × 300'), t('Single Sheet — 210 × 300'), t('Double Duvet — 270 × 235'), t('Single Duvet — 170 × 240')]],
    ['name' => t('Custom Selection'), 'image' => 'towels.jpg', 'alt' => t('Illustration of folded white towels and their texture'), 'tag' => t('YOUR LINEN SELECTION'), 'description' => t('Combine linen to suit the needs of your property.'), 'spec' => t('Mixed linen selections & pool towels'), 'detail' => t('Pool Towel · Dark green / dark blue'), 'items' => [t('Choose linen from across our collections'), t('Pool Towel — dark green or dark blue'), t('Pool towel specifications confirmed when booking')]],
];
$gallery = [
    ['file' => 'bedroom-classic.jpg', 'width' => 963, 'height' => 1280, 'category' => t('Bed Linen'), 'title' => t('Classic bedroom'), 'alt' => t('White bed linen with a patterned runner in a wooden bed frame')],
    ['file' => 'bedroom-towel-art.jpg', 'width' => 640, 'height' => 640, 'category' => t('Bed Linen'), 'title' => t('The finishing touch'), 'alt' => t('White bed linen with decorative folded towels')],
    ['file' => 'striped-towels.jpg', 'width' => 720, 'height' => 636, 'category' => t('Towels & Robes'), 'title' => t('Poolside colours'), 'alt' => t('Folded striped towels in blue, grey, brown and orange')],
    ['file' => 'bedroom-teak.jpg', 'width' => 1280, 'height' => 960, 'category' => t('Bed Linen'), 'title' => t('Warm wood, white linen'), 'alt' => t('Bedroom with white striped linen, patterned cushions and folded towels')],
    ['file' => 'outdoor-cushions.jpg', 'width' => 720, 'height' => 718, 'category' => t('Outdoor Living'), 'title' => t('Relaxed outdoor living'), 'alt' => t('Outdoor bench with grey cushions and blue patterned pillows')],
    ['file' => 'bedroom-white.jpg', 'width' => 720, 'height' => 1280, 'category' => t('Bed Linen'), 'title' => t('Simply comfortable'), 'alt' => t('White bed linen and rolled grey towels beneath a rattan pendant light')],
    ['file' => 'towel-shelves.jpg', 'width' => 1134, 'height' => 1280, 'category' => t('Towels & Robes'), 'title' => t('A colourful selection'), 'alt' => t('Shelves of neatly folded striped pool towels')],
    ['file' => 'waffle-robe.jpg', 'width' => 1079, 'height' => 1108, 'category' => t('Towels & Robes'), 'title' => t('Waffle texture'), 'alt' => t('White waffle kimono bathrobe')],
    ['file' => 'outdoor-lounge.jpg', 'width' => 720, 'height' => 704, 'category' => t('Outdoor Living'), 'title' => t('Space to unwind'), 'alt' => t('Grey upholstered outdoor sofa and ottomans with a wooden coffee table')],
    ['file' => 'towel-colours.jpg', 'width' => 1280, 'height' => 825, 'category' => t('Towels & Robes'), 'title' => t('Towel colour palette'), 'alt' => t('Towel colour samples labelled white, khaki, grey, turquoise, blue, green, red, brown and black')],
    ['file' => 'bedroom-runner.jpg', 'width' => 576, 'height' => 1280, 'category' => t('Bed Linen'), 'title' => t('Details that complete a room'), 'alt' => t('White striped bedding and a coordinated brown patterned runner')],
    ['file' => 'outdoor-daybed.jpg', 'width' => 720, 'height' => 713, 'category' => t('Outdoor Living'), 'title' => t('Ready for a slow afternoon'), 'alt' => t('Blue outdoor daybed with rolled towels and colourful cushions')],
    ['file' => 'white-bedding.jpg', 'width' => 800, 'height' => 800, 'category' => t('Bed Linen'), 'title' => t('White linen essentials'), 'alt' => t('White pillows and bolster arranged on a bed with white sheets')],
];
$rentalPrices = [
    ['id' => 'towel-prices', 'name' => t('Towels & Bath Mats'), 'note' => t('Everyday bathroom essentials'), 'rows' => [
        [t('Bath Towel'), '68 × 140', '30/2 · 550 g/m² · 524 g/pc', t('White'), 3000],
        [t('Bath Mat'), '50 × 75', '30/2 · 1,000 g/m² · 375 g/pc', t('White'), 2500],
        [t('Hand Towel'), '40 × 70', '30/2 · 550 g/m² · 154 g/pc', t('White'), 1500],
        [t('Face Towel'), '30 × 30', '30/2 · 550 g/m² · 50 g/pc', t('White'), 1200],
    ]],
    ['id' => 'tc200-prices', 'name' => t('Bed Linen · TC 200'), 'note' => t('CVC · Plain white'), 'rows' => [
        [t('Pillowcase'), '50 × 70', t('CVC TC 200 · Plain'), t('White'), 2500],
        [t('Pillowcase'), '50 × 90', t('CVC TC 200 · Plain'), t('White'), 2700],
        [t('Double Sheet'), '300 × 300', t('CVC TC 200 · Plain'), t('White'), 12000],
        [t('Single Sheet'), '210 × 300', t('CVC TC 200 · Plain'), t('White'), 6000],
        [t('Double Duvet'), '270 × 235', t('CVC TC 200 · Plain'), t('White'), 12000],
        [t('Single Duvet'), '170 × 240', t('CVC TC 200 · Plain'), t('White'), 9000],
    ]],
    ['id' => 'tc250-prices', 'name' => t('Bed Linen · TC 250'), 'note' => t('CVC · Plain white'), 'rows' => [
        [t('Pillowcase'), '50 × 70', t('CVC TC 250 · Plain'), t('White'), 2600],
        [t('Pillowcase'), '50 × 90', t('CVC TC 250 · Plain'), t('White'), 2800],
        [t('Double Sheet'), '300 × 300', t('CVC TC 250 · Plain'), t('White'), 13000],
        [t('Single Sheet'), '210 × 300', t('CVC TC 250 · Plain'), t('White'), 7000],
        [t('Double Duvet'), '270 × 235', t('CVC TC 250 · Plain'), t('White'), 18000],
        [t('Single Duvet'), '170 × 240', t('CVC TC 250 · Plain'), t('White'), 10000],
    ]],
    ['id' => 'pool-prices', 'name' => t('Pool Towels'), 'note' => t('For poolside use'), 'rows' => [
        [t('Pool Towel'), t('Confirm with our team'), t('Specifications confirmed when booking'), t('Dark green / dark blue'), 5000],
    ]],
];
$faqs = [
    [t('Is there a minimum rental period?'),t('There is no minimum rental period. Let us know your required dates when requesting a quote.')],
    [t('When is linen delivered and collected?'),t('Linen is delivered one day before use. The collection schedule is confirmed with our team when booking.')],
    [t('How do I request a quote?'),t('Click Request a Quote to chat with us on WhatsApp, or use the form below to include your linen selection, quantities and rental dates.')],
    [t('What happens if linen is damaged or lost?'),t('Damage, stains, burns or loss are subject to replacement charges under the rental terms. Full details are provided when booking.')],
    [t('Do you deliver to my property?'),t('Share your property location with our team to confirm service coverage and delivery arrangements.')],
];
// Keep structured data aligned with the visible page and gallery data.
$galleryImages = array_map(function ($photo) use ($siteUrl) {
    $url = $siteUrl . 'assets/images/gallery/' . $photo['file'];
    return [
        '@type' => 'ImageObject', '@id' => $url . '#image',
        'contentUrl' => $url, 'url' => $url, 'encodingFormat' => 'image/jpeg',
        'name' => $photo['title'], 'caption' => $photo['title'],
        'description' => $photo['alt'], 'width' => $photo['width'], 'height' => $photo['height'],
    ];
}, $gallery);
// Reuse a visible gallery photo and its translated description across all previews.
$preferredImageUrl = $siteUrl . 'assets/images/gallery/bedroom-teak.jpg';
$preferredImage = array_column($galleryImages, null, 'url')[$preferredImageUrl];
$structuredData = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'LocalBusiness', '@id' => $siteUrl . '#organization',
            'name' => 'Asia Linen', 'url' => $siteUrl, 'telephone' => $telephone,
            'description' => t('Rental of towels, bath mats, pillowcases, sheets and duvets for hotels and villas in Bali.'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => implode(', ', $addressLines),
                'addressLocality' => 'Denpasar', 'addressRegion' => 'Bali', 'addressCountry' => 'ID',
            ],
            'logo' => [
                '@type' => 'ImageObject', '@id' => $siteUrl . '#logo',
                'url' => $siteUrl . 'assets/images/logo.svg',
                'contentUrl' => $siteUrl . 'assets/images/logo.svg',
                'encodingFormat' => 'image/svg+xml', 'width' => 512, 'height' => 512,
                'name' => 'Asia Linen',
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint', 'contactType' => 'customer service',
                'telephone' => $telephone, 'url' => $whatsappBase,
            ],
        ],
        [
            '@type' => 'WebSite', '@id' => $siteUrl . '#website',
            'url' => $siteUrl, 'name' => 'Asia Linen', 'inLanguage' => ['en', 'id'],
            'publisher' => ['@id' => $siteUrl . '#organization'],
        ],
        [
            '@type' => ['WebPage', 'FAQPage'], '@id' => $pageUrl . '#webpage', 'url' => $pageUrl,
            'mainEntity' => array_map(function ($faq) {
                return [
                    '@type' => 'Question',
                    'name' => $faq[0],
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq[1]],
                ];
            }, $faqs),
            'name' => t('Rental Linen Bali for Hotels & Villas | Asia Linen'),
            'description' => t('Rent towels, sheets, pillowcases and duvets for hotels and villas in Bali. Flexible rental periods. Request a quotation from Asia Linen.'),
            'inLanguage' => $lang, 'isPartOf' => ['@id' => $siteUrl . '#website'],
            'about' => ['@id' => $pageUrl . '#linen-rental'],
            'primaryImageOfPage' => ['@id' => $preferredImage['@id']],
            'hasPart' => ['@id' => $pageUrl . '#gallery'],
        ],
        [
            '@type' => 'Service', '@id' => $pageUrl . '#linen-rental',
            'name' => t('Linen Rental in Bali for Hotels & Villas'),
            'serviceType' => t('Linen rental'), 'url' => $pageUrl . '#koleksi',
            'description' => t('Rental of towels, bath mats, pillowcases, sheets and duvets for hotels and villas in Bali.'),
            'provider' => ['@id' => $siteUrl . '#organization'],
            'areaServed' => ['@type' => 'Place', 'name' => 'Bali'],
        ],
        $preferredImage,
        [
            '@type' => 'ImageGallery', '@id' => $pageUrl . '#gallery',
            'url' => $pageUrl . '#gallery', 'name' => t('The Asia Linen Gallery'),
            'description' => t('Bedroom settings, towel textures and outdoor spaces in our photo collection.'),
            'isPartOf' => ['@id' => $pageUrl . '#webpage'], 'image' => $galleryImages,
        ],
    ],
];
function e($value) { return htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); }
function icon($name, $class = 'h-5 w-5') {
    $paths = ['arrow'=>'<path d="M5 12h14m-6-6 6 6-6 6"/>', 'phone'=>'<path d="M6 3h4l2 5-3 2a15 15 0 0 0 5 5l2-3 5 2v4a3 3 0 0 1-3 3C9 20 4 15 3 6a3 3 0 0 1 3-3Z"/>', 'truck'=>'<path d="M3 6h11v11H3zM14 10h4l3 4v3h-7"/><circle cx="7" cy="18" r="2"/><circle cx="18" cy="18" r="2"/>', 'layers'=>'<path d="m12 3 10 5-10 5L2 8Zm-10 9 10 5 10-5M2 16l10 5 10-5"/>', 'calendar'=>'<rect x="3" y="5" width="18" height="16" rx="2"/><path d="M7 3v4m10-4v4M3 11h18m-13 5h2m4 0h2"/>', 'pin'=>'<path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/>'];
    return '<svg aria-hidden="true" class="'.$class.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">'.($paths[$name] ?? $paths['arrow']).'</svg>';
}
?>
<!DOCTYPE html>
<html lang="<?= e($lang) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="max-image-preview:large">
    <meta name="description" content="<?= e(t('Rent towels, sheets, pillowcases and duvets for hotels and villas in Bali. Flexible rental periods. Request a quotation from Asia Linen.')) ?>">
    <meta name="theme-color" content="#092849">
    <title><?= e(t('Rental Linen Bali for Hotels & Villas | Asia Linen')) ?></title>
    <link rel="icon" href="<?= e($basePath) ?>favicon.ico" type="image/x-icon" sizes="16x16 32x32 48x48 64x64">
    <link rel="canonical" href="<?= e($pageUrl) ?>">
    <link rel="alternate" hreflang="en" href="https://asialinen.com/en/">
    <link rel="alternate" hreflang="id" href="https://asialinen.com/id/">
    <link rel="alternate" hreflang="x-default" href="https://asialinen.com/en/">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="<?= $lang === 'id' ? 'id_ID' : 'en_GB' ?>">
    <meta property="og:site_name" content="Asia Linen">
    <meta property="og:title" content="<?= e(t('Rental Linen Bali for Hotels & Villas | Asia Linen')) ?>">
    <meta property="og:description" content="<?= e(t('Rent towels, sheets, pillowcases and duvets for hotels and villas in Bali. Flexible rental periods. Request a quotation from Asia Linen.')) ?>">
    <meta property="og:url" content="<?= e($pageUrl) ?>">
    <meta property="og:locale:alternate" content="<?= $lang === 'id' ? 'en_GB' : 'id_ID' ?>">
    <meta property="og:image" content="<?= e($preferredImage['url']) ?>">
    <meta property="og:image:width" content="<?= $preferredImage['width'] ?>">
    <meta property="og:image:height" content="<?= $preferredImage['height'] ?>">
    <meta property="og:image:type" content="<?= e($preferredImage['encodingFormat']) ?>">
    <meta property="og:image:alt" content="<?= e($preferredImage['description']) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e(t('Rental Linen Bali for Hotels & Villas | Asia Linen')) ?>">
    <meta name="twitter:description" content="<?= e(t('Rent towels, sheets, pillowcases and duvets for hotels and villas in Bali. Flexible rental periods. Request a quotation from Asia Linen.')) ?>">
    <meta name="twitter:image" content="<?= e($preferredImage['url']) ?>">
    <meta name="twitter:image:alt" content="<?= e($preferredImage['description']) ?>">
    <link rel="stylesheet" href="<?= e($basePath) ?>assets/css/style.css?v=<?= filemtime(__DIR__ . '/assets/css/style.css') ?>">
    <link rel="preload" as="image" href="<?= e($basePath) ?>assets/images/hero.jpg">
    <script type="application/ld+json"><?= json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_THROW_ON_ERROR) ?></script>
</head>
<body class="bg-white font-sans antialiased">
<a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:top-2 focus:left-2 focus:z-50 focus:bg-white focus:p-4"><?= e(t('Skip to content')) ?></a>
<header class="sticky top-0 z-40 border-b border-slate-100 bg-white/95 backdrop-blur">
    <div class="wrap flex h-20 items-center justify-between gap-3">
        <a href="#beranda" aria-label="<?= e(t('Asia Linen — home')) ?>" class="site-brand flex items-center gap-3">
            <svg class="h-12 w-12 text-gold" viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M30 51C15 35 21 19 30 8c10 12 16 27 0 43ZM30 51C12 51 5 39 4 26c11 0 21 6 26 25Zm0 0c18 0 25-12 26-25-11 0-21 6-26 25ZM14 29l-1-13 12 4m21 9 1-13-12 4"/></svg>
            <span><span class="block font-display text-2xl tracking-wide">ASIA LINEN</span><span class="block text-center text-[9px] tracking-[.43em]"><?= e(t('LAUNDRY RENTALS')) ?></span></span>
        </a>
        <nav aria-label="<?= e(t('Main navigation')) ?>" class="hidden items-center gap-4 text-sm xl:flex">
            <a href="#beranda" class="border-b-2 border-gold py-2 font-semibold"><?= e(t('Home')) ?></a><a href="#koleksi" class="hover:text-gold"><?= e(t('Linen Collection')) ?></a><a href="#cara-sewa" class="hover:text-gold"><?= e(t('How to Rent')) ?></a><a href="#gallery" class="hover:text-gold"><?= e(t('Gallery')) ?></a><a href="#faq" class="hover:text-gold"><?= e(t('FAQ')) ?></a><a href="#kontak" class="hover:text-gold"><?= e(t('Contact')) ?></a>
        </nav>
        <a href="<?= e($quoteUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary hidden xl:inline-flex"><?= e(t('Request a Quote')) ?> <?= icon('arrow') ?></a>
        <nav class="language-switcher" aria-label="<?= e(t('Language')) ?>">
            <a href="<?= e($basePath) ?>en/" lang="en" hreflang="en" aria-label="English"<?= $lang === 'en' ? ' aria-current="page"' : '' ?>>EN</a>
            <span aria-hidden="true">|</span>
            <a href="<?= e($basePath) ?>id/" lang="id" hreflang="id" aria-label="Bahasa Indonesia"<?= $lang === 'id' ? ' aria-current="page"' : '' ?>>ID</a>
        </nav>
        <button id="menu-toggle" type="button" aria-controls="mobile-menu" aria-expanded="false" aria-label="<?= e(t('Open menu')) ?>" class="p-2 xl:hidden"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 6h18M3 12h18M3 18h18"/></svg></button>
    </div>
    <nav id="mobile-menu" aria-label="<?= e(t('Mobile navigation')) ?>" hidden class="border-t border-slate-100 bg-white px-6 py-4 xl:hidden"><div class="flex flex-col gap-4 text-sm"><a href="#beranda"><?= e(t('Home')) ?></a><a href="#koleksi"><?= e(t('Linen Collection')) ?></a><a href="#cara-sewa"><?= e(t('How to Rent')) ?></a><a href="#gallery"><?= e(t('Gallery')) ?></a><a href="#faq"><?= e(t('FAQ')) ?></a><a href="<?= e($quoteUrl) ?>" target="_blank" rel="noopener noreferrer"><?= e(t('Request a Quote')) ?></a><a href="#kontak"><?= e(t('Contact')) ?></a></div></nav>
</header>
<main id="main">
    <section id="beranda" class="relative isolate overflow-hidden bg-navy text-white">
        <img src="<?= e($basePath) ?>assets/images/hero.jpg" alt="<?= e(t('Illustration of a Bali villa bedroom with white bed linen')) ?>" width="1536" height="1024" fetchpriority="high" class="absolute inset-0 -z-20 h-full w-full object-cover object-[center_58%]">
        <div class="hero-shade absolute inset-0 -z-10"></div>
        <div class="wrap py-20 md:py-24 lg:py-28">
            <div class="max-w-2xl">
                <p class="eyebrow !text-[#e3b873]"><?= e(t('ASIA LINEN · LINEN RENTAL')) ?></p>
                <h1 class="mt-5 max-w-xl font-display text-[42px] leading-[1.08] tracking-tight sm:text-6xl lg:text-[66px]"><?= e(t('Linen Rental in Bali')) ?><br><?= e(t('for Hotels & Villas')) ?></h1>
                <p class="mt-6 max-w-lg text-base leading-7 text-slate-100 md:text-lg"><?= e(t('Towels and bed linen to support your hotel’s everyday needs. Explore our collections and let us prepare a quotation for your property.')) ?></p>
                <div class="mt-8 flex flex-wrap gap-3"><a href="#koleksi" class="btn border border-white/70 bg-white/5 hover:bg-white/15"><?= e(t('Explore the Collection')) ?> <?= icon('arrow') ?></a><a href="<?= e($quoteUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn bg-white text-navy hover:bg-cream"><?= e(t('Request a Quote')) ?> <?= icon('arrow') ?></a></div>
                <div class="mt-10 flex flex-wrap gap-x-7 gap-y-4 border-t border-white/25 pt-6 text-[10px] leading-5 tracking-[.12em] uppercase"><span class="flex items-center gap-3"><?= icon('layers', 'h-7 w-7 text-[#e3b873]') ?><?= e(t('Bed Linen')) ?><br><?= e(t('& Towels')) ?></span><span class="flex items-center gap-3"><?= icon('calendar', 'h-7 w-7 text-[#e3b873]') ?><?= e(t('No Minimum')) ?><br><?= e(t('Rental Period')) ?></span></div>
            </div>
        </div>
    </section>
    <section id="koleksi" class="py-16 md:py-20">
        <div class="wrap">
            <div class="mx-auto max-w-2xl text-center"><p class="eyebrow"><?= e(t('SELECTED FOR YOUR PROPERTY')) ?></p><h2 class="section-title mt-3"><?= e(t('Find the Linen You Need')) ?></h2><div class="mx-auto mt-5 h-px w-14 bg-gold"></div><p class="mt-5 leading-7 text-slate-600"><?= e(t('From towels to bed linen, explore our collections and put together a selection that suits your rooms.')) ?></p></div>
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($products as $index => $product): ?>
                <article class="flex flex-col overflow-hidden rounded-sm border border-slate-200 bg-white">
                    <img src="<?= e($basePath) ?>assets/images/<?= e($product['image']) ?>" alt="<?= e($product['alt']) ?>" width="768" height="512" loading="lazy" decoding="async" class="aspect-[1.5] w-full object-cover <?= $index === 2 ? 'object-right' : '' ?>">
                    <div class="flex flex-1 flex-col p-5"><p class="text-[9px] font-semibold tracking-[.16em] text-gold-text"><?= e($product['tag']) ?></p><h3 class="mt-2 font-display text-2xl"><?= e($product['name']) ?></h3><p class="mt-3 min-h-15 text-sm leading-6 text-slate-600"><?= e($product['description']) ?></p><p class="mt-4 text-xs font-semibold leading-5"><?= e($product['spec']) ?></p><p class="mt-1 text-xs leading-5 text-slate-500"><?= e($product['detail']) ?></p>
                    <details class="mt-4 border-t border-slate-100 py-3 text-xs"><summary class="flex items-center justify-between font-semibold"><?= e(t('View options')) ?> <span class="plus text-lg transition-transform">+</span></summary><ul class="mt-3 space-y-2 leading-5 text-slate-600"><?php foreach ($product['items'] as $item): ?><li><?= e($item) ?></li><?php endforeach; ?></ul></details>
                    <a href="<?= e($whatsappBase . '?text=' . rawurlencode(t('Hello Asia Linen, I would like to enquire about ') . $product['name'] . t('. Please share availability and a rental quotation.'))) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary mt-auto !px-3 !text-xs"><?= e(t('Enquire About This Collection')) ?> <?= icon('arrow', 'h-4 w-4') ?></a></div>
                </article>
            <?php endforeach; ?>
            </div>
            <p class="mt-5 text-center text-xs leading-5 text-slate-500"><?= e(t('Images are for illustration. Product details and availability are confirmed when booking.')) ?></p>
        </div>
    </section>
    <div class="border-y border-slate-100 bg-[#f3f6f8]"><div class="wrap grid gap-7 py-8 sm:grid-cols-2 lg:grid-cols-4"><?php foreach ([['truck',t('Delivery One Day Before Use')],['layers',t('CVC TC 200 & 250 Options')],['calendar',t('Flexible Rental Periods')],['pin',t('Based in Denpasar')]] as [$symbol,$label]): ?><div class="flex items-center gap-4 text-sm font-medium"><?= icon($symbol,'h-8 w-8 shrink-0 text-blue') ?><span><?= e($label) ?></span></div><?php endforeach; ?></div></div>
    <section id="rental-prices" aria-labelledby="prices-heading" class="bg-cream py-16 md:py-20">
        <div class="wrap">
            <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                <div class="max-w-2xl"><p class="eyebrow"><?= e(t('THE LINEN COLLECTION · 2026')) ?></p><h2 id="prices-heading" class="section-title mt-3"><?= e(t('Rental Price List')) ?></h2><p class="mt-4 text-sm leading-7 text-slate-600"><?= e(t('Find the right linen for your rooms, with daily rental rates at a glance.')) ?></p></div>
                <span class="w-fit rounded-sm border border-gold/30 bg-white px-4 py-3 text-xs font-semibold tracking-wide text-navy"><?= e(t('IDR / day')) ?></span>
            </div>
            <nav aria-label="<?= e(t('Price list categories')) ?>" class="price-categories mt-7 grid grid-cols-2 gap-2 sm:flex sm:flex-wrap">
                <?php foreach ($rentalPrices as $group): ?><a href="#<?= e($group['id']) ?>" class="flex min-h-12 items-center justify-center rounded-sm border border-slate-300 bg-white px-3 py-3 text-center text-xs font-semibold transition-colors hover:border-gold hover:text-blue"><?= e($group['name']) ?></a><?php endforeach; ?>
            </nav>
            <div class="mt-6 space-y-6">
                <?php foreach ($rentalPrices as $group): ?>
                <div id="<?= e($group['id']) ?>" class="overflow-hidden rounded-sm border border-slate-200 bg-white">
                    <div class="price-group-heading border-l-4 border-gold bg-navy text-white"><h3 id="<?= e($group['id']) ?>-heading" class="font-display text-xl"><?= e($group['name']) ?></h3><p class="text-xs text-slate-200"><?= e($group['note']) ?></p></div>
                    <div class="price-table-region overflow-x-auto" role="region" aria-labelledby="<?= e($group['id']) ?>-heading" tabindex="0">
                        <table class="price-table w-full min-w-[660px] table-fixed text-left text-sm">
                            <caption class="sr-only"><?= e($group['name']) ?> <?= e(t('daily rental rates in Indonesian rupiah')) ?></caption>
                            <thead class="border-b border-slate-200 bg-slate-50 text-[10px] uppercase tracking-wider text-slate-500"><tr><th scope="col" class="w-[22%] px-5 py-3 font-semibold"><?= e(t('Item')) ?></th><th scope="col" class="w-[17%] px-4 py-3 font-semibold"><?= e(t('Size')) ?></th><th scope="col" class="w-[28%] px-4 py-3 font-semibold"><?= e(t('Specification')) ?></th><th scope="col" class="w-[16%] px-4 py-3 font-semibold"><?= e(t('Color')) ?></th><th scope="col" class="w-[17%] px-5 py-3 text-right font-semibold"><?= e(t('Rental / day')) ?></th></tr></thead>
                            <tbody class="divide-y divide-slate-100">
                            <?php foreach ($group['rows'] as [$item, $size, $specification, $color, $rate]): ?>
                                <tr class="transition-colors hover:bg-cream"><th scope="row" class="px-5 py-4 font-semibold text-navy"><?= e($item) ?></th><td data-label="<?= e(t('Size')) ?>" class="px-4 py-4 text-xs leading-5 text-slate-600"><?= e($size) ?></td><td data-label="<?= e(t('Specification')) ?>" class="px-4 py-4 text-xs leading-5 text-slate-600"><?= e($specification) ?></td><td data-label="<?= e(t('Color')) ?>" class="px-4 py-4 text-xs leading-5 text-slate-600"><?= e($color) ?></td><td class="whitespace-nowrap px-5 py-4 text-right font-semibold tabular-nums text-blue"><span class="mr-1 text-xs font-normal text-slate-500">Rp</span><?= number_format($rate, 0, ',', $lang === 'id' ? '.' : ',') ?></td></tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="mt-7 flex flex-col justify-between gap-5 sm:flex-row sm:items-center"><p class="max-w-xl text-xs leading-6 text-slate-600"><?= e(t('Rates shown in Indonesian rupiah per day. Confirm sizes, availability and delivery arrangements with our team when booking.')) ?></p><a href="<?= e($quoteUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary shrink-0"><?= e(t('Get a WhatsApp Quote')) ?> <?= icon('arrow') ?></a></div>
        </div>
    </section>
    <section id="cara-sewa" class="bg-cream py-16 md:py-24"><div class="wrap grid items-center gap-12 lg:grid-cols-2">
        <div class="relative"><img src="<?= e($basePath) ?>assets/images/pillows.jpg" alt="<?= e(t('Illustration of white pillows stacked on folded bed sheets')) ?>" loading="lazy" decoding="async" width="768" height="512" class="aspect-[1.15] w-full object-cover"><div class="absolute -bottom-5 right-5 border border-gold/30 bg-white px-6 py-5 shadow-sm"><p class="font-display text-2xl"><?= e(t('Your needs,')) ?></p><p class="mt-1 text-sm text-slate-600"><?= e(t('the right linen selection.')) ?></p></div></div>
        <div class="pt-5 lg:pt-0"><p class="eyebrow"><?= e(t('HOW TO RENT')) ?></p><h2 class="section-title mt-3"><?= e(t('Start with what')) ?><br><?= e(t('your property needs.')) ?></h2><p class="mt-5 leading-7 text-slate-600"><?= e(t('Tell us your preferred linen, quantities and rental dates. Discuss the details with the Asia Linen team.')) ?></p><ol class="mt-8 space-y-6"><?php foreach ([[t('Choose your linen'),t('Select the towels, pillowcases, sheets or duvets you need.')],[t('Share your requirements'),t('Let us know the quantities and your rental start and end dates.')],[t('Confirm your quote & schedule'),t('Agree on the rental details and delivery schedule with our team.')]] as $i => [$title,$copy]): ?><li class="flex gap-5"><span class="pt-1 font-display text-2xl text-gold-text">0<?= $i+1 ?></span><div><h3 class="font-semibold"><?= e($title) ?></h3><p class="mt-1 text-sm leading-6 text-slate-600"><?= e($copy) ?></p></div></li><?php endforeach; ?></ol></div>
    </div></section>
    <section id="gallery" aria-labelledby="gallery-heading" class="py-16 md:py-20">
        <div class="wrap">
            <div class="flex flex-col justify-between gap-5 md:flex-row md:items-end">
                <div class="max-w-xl"><p class="eyebrow"><?= e(t('THE ASIA LINEN GALLERY')) ?></p><h2 id="gallery-heading" class="section-title mt-3"><?= e(t('Comfort, in the Details.')) ?></h2><p class="mt-4 text-sm leading-7 text-slate-600"><?= e(t('Explore bedroom settings, towel textures and outdoor spaces in our photo collection.')) ?></p></div>
                <p class="text-xs text-slate-500"><?= e(t('Select a photo for a closer look')) ?> <span aria-hidden="true">↗</span></p>
            </div>
            <div class="gallery-filters" role="group" aria-label="<?= e(t('Filter gallery')) ?>">
                <?php foreach ([t('All Photos'), t('Bed Linen'), t('Towels & Robes'), t('Outdoor Living')] as $filter): ?><button type="button" data-gallery-filter="<?= e($filter) ?>" aria-pressed="<?= $filter === t('All Photos') ? 'true' : 'false' ?>"><?= e($filter) ?></button><?php endforeach; ?>
            </div>
            <p id="gallery-count" class="sr-only" role="status"><?= e(t('13 photos')) ?></p>
            <div class="gallery-grid">
                <?php foreach ($gallery as $i => $photo): ?>
                    <figure class="gallery-item" data-category="<?= e($photo['category']) ?>">
                        <a class="gallery-photo" href="<?= e($basePath) ?>assets/images/gallery/<?= e($photo['file']) ?>" data-gallery-index="<?= $i ?>" aria-label="<?= e(t('View photo: ')) ?><?= e($photo['title']) ?>">
                            <img src="<?= e($basePath) ?>assets/images/gallery/<?= e($photo['file']) ?>" alt="<?= e($photo['alt']) ?>" loading="lazy" decoding="async" width="<?= $photo['width'] ?>" height="<?= $photo['height'] ?>">
                            <span class="gallery-expand" aria-hidden="true">↗</span>
                        </a>
                        <figcaption><span class="gallery-category"><?= e($photo['category']) ?></span><span class="gallery-title"><?= e($photo['title']) ?></span></figcaption>
                    </figure>
                <?php endforeach; ?>
            </div>
            <p class="mt-7 border-t border-slate-200 pt-5 text-xs leading-6 text-slate-500"><?= e(t('Looking for a particular style or colour? Please confirm product availability with our team.')) ?></p>
        </div>
    </section>
    <dialog id="gallery-dialog" aria-labelledby="gallery-dialog-title">
        <div class="gallery-dialog-toolbar"><p id="gallery-dialog-title"><?= e(t('Gallery photo')) ?></p><button type="button" id="gallery-close" aria-label="<?= e(t('Close photo')) ?>">✕</button></div>
        <img id="gallery-full-image" alt="">
        <div class="gallery-dialog-controls"><button type="button" id="gallery-prev" aria-label="<?= e(t('Previous photo')) ?>">← <span><?= e(t('Previous')) ?></span></button><p id="gallery-position" aria-live="polite"></p><button type="button" id="gallery-next" aria-label="<?= e(t('Next photo')) ?>"><span><?= e(t('Next')) ?></span> →</button></div>
    </dialog>
    <section id="faq" class="py-16 md:py-20"><div class="wrap grid gap-8 lg:grid-cols-[.8fr_1.2fr]"><div><p class="eyebrow"><?= e(t('RENTAL INFORMATION')) ?></p><h2 class="section-title mt-3"><?= e(t('Before')) ?><br><?= e(t('you rent.')) ?></h2><p class="mt-5 max-w-sm text-sm leading-7 text-slate-600"><?= e(t('A few things to know when planning your linen rental.')) ?></p></div><div>
    <?php foreach ($faqs as [$question,$answer]): ?><details class="border-b border-slate-200 py-5"><summary class="flex items-center justify-between gap-5 text-sm font-semibold"><?= e($question) ?><span class="plus text-2xl font-normal text-gold transition-transform">+</span></summary><p class="mt-4 pr-7 text-sm leading-7 text-slate-600"><?= e($answer) ?></p></details><?php endforeach; ?>
    </div></div></section>
    <section id="penawaran" class="bg-navy py-16 text-white md:py-20"><div class="wrap grid gap-12 lg:grid-cols-2"><div><p class="eyebrow !text-[#e3b873]"><?= e(t('LET’S DISCUSS YOUR REQUIREMENTS')) ?></p><h2 class="section-title mt-4"><?= e(t('Linen for your rooms.')) ?><br><?= e(t('A quote for your needs.')) ?></h2><p class="mt-6 max-w-md leading-7 text-slate-300"><?= e(t('Tell us what you need and continue to WhatsApp with your request ready to send to the Asia Linen team.')) ?></p><a href="tel:<?= e($telephone) ?>" class="mt-8 inline-flex items-center gap-4 text-xl"><?= icon('phone','h-7 w-7 text-[#e3b873]') ?><?= e($phone) ?></a><p class="mt-3 text-sm text-slate-300"><?= e(t('Contact our team for quotations and availability.')) ?></p></div>
    <form id="quote-form" class="rounded-sm bg-white p-6 text-navy md:p-8"><h3 class="font-display text-2xl"><?= e(t('Prepare Your Quote Request')) ?></h3><div class="mt-6 grid gap-4 sm:grid-cols-2"><label class="text-xs font-semibold"><?= e(t('Your name')) ?><input required name="name" autocomplete="name" maxlength="100" class="field" placeholder="<?= e(t('Full name')) ?>"></label><label class="text-xs font-semibold"><?= e(t('Property name')) ?><input required name="property" autocomplete="organization" maxlength="150" class="field" placeholder="<?= e(t('Hotel / property name')) ?>"></label><label class="text-xs font-semibold"><?= e(t('Collection')) ?><select name="product" id="product-select" class="field"><?php foreach ($products as $product): ?><option><?= e($product['name']) ?></option><?php endforeach; ?></select></label><label class="text-xs font-semibold"><?= e(t('Rental start date')) ?><input required type="date" name="date" class="field"></label><label class="text-xs font-semibold sm:col-span-2"><?= e(t('Your requirements')) ?><textarea required name="details" rows="3" maxlength="2000" class="field" placeholder="<?= e(t('Linen types and quantities, rental duration, and property location')) ?>"></textarea></label></div><button type="submit" class="btn btn-primary mt-5 w-full"><?= e(t('Continue to WhatsApp')) ?> <?= icon('arrow') ?></button><p class="mt-3 text-xs leading-5 text-slate-500"><?= e(t('Your request opens in WhatsApp. Review the message and tap Send to share it with our team.')) ?></p></form>
    </div></section>
    <section id="customers" aria-labelledby="customers-heading" class="border-b border-slate-100 bg-cream py-14 md:py-16">
        <div class="wrap">
            <div class="mx-auto max-w-2xl text-center">
                <p class="eyebrow"><?= e(t('OUR CUSTOMERS')) ?></p>
                <h2 id="customers-heading" class="section-title mt-3"><?= e(t('Hotels & Villas We Have Served')) ?></h2>
                <p class="mt-4 text-sm leading-7 text-slate-600"><?= e(t('A selection of hotels and villas that have used our linen services.')) ?></p>
            </div>
            <ul class="mt-9 grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-7">
                <?php foreach ($customers as $customer): ?>
                    <li class="flex min-h-36 flex-col items-center justify-center gap-3 rounded-sm border border-slate-200 bg-white px-4 py-5 text-center">
                        <?php if ($customer['logo']): ?>
                            <div class="flex h-16 w-full items-center justify-center <?= $customer['logo'] === 'amala.png' ? 'rounded-sm bg-navy' : '' ?>">
                                <img src="<?= e($basePath) ?>assets/images/customers/<?= e($customer['logo']) ?>" alt="" loading="lazy" width="160" height="64" class="max-h-14 w-auto max-w-full object-contain">
                            </div>
                            <p class="text-[11px] leading-5 text-slate-600"><?= e($customer['name']) ?></p>
                        <?php else: ?>
                            <p class="font-display text-lg leading-6 text-navy"><?= e($customer['name']) ?></p>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
</main>
<footer id="kontak" class="bg-cream py-12"><div class="wrap"><div class="grid gap-8 md:grid-cols-[1fr_1fr_auto]"><div><p class="font-display text-2xl">ASIA LINEN</p><p class="mt-2 text-[10px] tracking-[.3em]"><?= e(t('LAUNDRY RENTALS')) ?></p><p class="mt-4 max-w-xs text-sm leading-6 text-slate-600"><?= e(t('Linen and towels to support the everyday needs of your hotel.')) ?></p></div><div><h2 class="text-sm font-semibold"><?= e(t('Visit & Contact Us')) ?></h2><address class="mt-4 text-sm not-italic leading-7 text-slate-600"><?= e($addressLines[0]) ?><br><?= e($addressLines[1]) ?><br><a class="hover:text-blue" href="tel:<?= e($telephone) ?>"><?= e($phone) ?></a></address></div><div class="flex flex-col gap-3 text-sm"><a href="#koleksi"><?= e(t('Linen Collection')) ?></a><a href="#cara-sewa"><?= e(t('How to Rent')) ?></a><a href="#faq"><?= e(t('Rental Terms')) ?></a><a href="<?= e($quoteUrl) ?>" target="_blank" rel="noopener noreferrer"><?= e(t('Request a Quote ↗')) ?></a><button type="button" id="cookie-footer-settings" class="cookie-footer-settings" data-cookie-settings hidden><?= e(t('Cookie settings')) ?></button></div></div><div class="mt-9 flex flex-wrap justify-between gap-3 border-t border-slate-200 pt-6 text-xs text-slate-600"><p>© <?= date('Y') ?> Asia Linen.</p><p><?= e(t('Hero and collection images are illustrative. Explore more photos in our gallery.')) ?></p></div></div></footer>
<?php require __DIR__ . '/includes/cookie-consent.php'; ?>
<script src="<?= e($basePath) ?>assets/js/cookie-consent.js?v=<?= filemtime(__DIR__ . '/assets/js/cookie-consent.js') ?>" data-measurement-id="G-27RV0808TM"></script>
<script>

const ui = <?= json_encode([
    'allPhotos' => t('All Photos'), 'photos' => t('photos'),
    'openMenu' => t('Open menu'), 'closeMenu' => t('Close menu'),
    'quoteIntro' => t('Hello Asia Linen, I would like to request a linen rental quotation.'),
    'name' => t('Name'), 'property' => t('Property'), 'collection' => t('Collection'),
    'rentalStart' => t('Rental start date'), 'requirements' => t('Requirements'),
    'locale' => $lang === 'id' ? 'id-ID' : 'en-GB',
], JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_THROW_ON_ERROR) ?>;
// Preserve the current section when switching language; links also work without JavaScript.
document.querySelectorAll('.language-switcher a').forEach(link => {
    link.addEventListener('click', () => { link.hash = window.location.hash; });
});
const galleryItems = [...document.querySelectorAll('.gallery-item')];
const galleryLinks = galleryItems.map(item => item.querySelector('a'));
const galleryDialog = document.getElementById('gallery-dialog');
let galleryVisible = galleryLinks;
let galleryCurrent = 0;
let galleryOpener;
let galleryScrollStyle = '';
function showGalleryPhoto(position) {
    galleryCurrent = (position + galleryVisible.length) % galleryVisible.length;
    const link = galleryVisible[galleryCurrent];
    const image = document.getElementById('gallery-full-image');
    image.src = link.href;
    image.alt = link.querySelector('img').alt;
    document.getElementById('gallery-dialog-title').textContent = link.closest('figure').querySelector('.gallery-title').textContent;
    document.getElementById('gallery-position').textContent = `${galleryCurrent + 1} / ${galleryVisible.length}`;
}
document.querySelectorAll('[data-gallery-filter]').forEach(button => {
    button.addEventListener('click', () => {
        document.querySelectorAll('[data-gallery-filter]').forEach(other => other.setAttribute('aria-pressed', String(other === button)));
        galleryItems.forEach(item => { item.hidden = button.dataset.galleryFilter !== ui.allPhotos && item.dataset.category !== button.dataset.galleryFilter; });
        galleryVisible = galleryLinks.filter(link => !link.closest('figure').hidden);
        document.getElementById('gallery-count').textContent = `${galleryVisible.length} ${ui.photos}`;
    });
});
galleryLinks.forEach(link => link.addEventListener('click', event => {
    if (event.ctrlKey || event.metaKey || event.shiftKey || event.altKey || typeof galleryDialog.showModal !== 'function') return;
    event.preventDefault();
    galleryOpener = link;
    showGalleryPhoto(galleryVisible.indexOf(link));
    galleryScrollStyle = document.body.style.overflow;
    document.body.style.overflow = 'hidden';
    galleryDialog.showModal();
    document.getElementById('gallery-close').focus();
}));
document.getElementById('gallery-close').addEventListener('click', () => galleryDialog.close());
document.getElementById('gallery-prev').addEventListener('click', () => showGalleryPhoto(galleryCurrent - 1));
document.getElementById('gallery-next').addEventListener('click', () => showGalleryPhoto(galleryCurrent + 1));
galleryDialog.addEventListener('keydown', event => {
    if (event.key === 'ArrowLeft') { event.preventDefault(); showGalleryPhoto(galleryCurrent - 1); }
    if (event.key === 'ArrowRight') { event.preventDefault(); showGalleryPhoto(galleryCurrent + 1); }
});
galleryDialog.addEventListener('click', event => { if (event.target === galleryDialog) { const r = galleryDialog.getBoundingClientRect(); if (event.clientX < r.left || event.clientX > r.right || event.clientY < r.top || event.clientY > r.bottom) galleryDialog.close(); } });
galleryDialog.addEventListener('close', () => { document.body.style.overflow = galleryScrollStyle; galleryOpener?.focus({preventScroll:true}); });

const menuToggle = document.getElementById('menu-toggle');
const menu = document.getElementById('mobile-menu');
menuToggle.addEventListener('click', () => { const open = menuToggle.getAttribute('aria-expanded') !== 'true'; menuToggle.setAttribute('aria-expanded', String(open)); menuToggle.setAttribute('aria-label', open ? ui.closeMenu : ui.openMenu); menu.hidden = !open; });
menu.querySelectorAll('a').forEach(link => link.addEventListener('click', () => { menu.hidden = true; menuToggle.setAttribute('aria-expanded', 'false'); menuToggle.setAttribute('aria-label',ui.openMenu); }));
document.addEventListener('keydown', event => { if (event.key === 'Escape' && !menu.hidden) { menu.hidden = true; menuToggle.setAttribute('aria-expanded','false'); menuToggle.setAttribute('aria-label',ui.openMenu); menuToggle.focus(); } });
// Track only the interaction source, never WhatsApp URLs or form contents.
document.querySelectorAll('a[href^="https://wa.me/"]').forEach(link => {
    link.addEventListener('click', () => {
        window.AsiaLinenConsent?.trackContact(link.closest('section')?.id || (link.closest('header') ? 'header' : 'footer'));
    });
});
const form = document.getElementById('quote-form');
form.addEventListener('submit', event => { event.preventDefault(); const data = new FormData(form); const date = new Date(data.get('date') + 'T12:00:00').toLocaleDateString(ui.locale, {day:'numeric', month:'long', year:'numeric'}); const message = `${ui.quoteIntro}\n\n${ui.name}: ${data.get('name').trim()}\n${ui.property}: ${data.get('property').trim()}\n${ui.collection}: ${data.get('product')}\n${ui.rentalStart}: ${date}\n${ui.requirements}: ${data.get('details').trim()}`; const url = <?= json_encode($whatsappBase) ?> + '?text=' + encodeURIComponent(message);
    let opened = false;
    const openWhatsApp = () => { if (!opened) { opened = true; window.location.assign(url); } };
    if (window.AsiaLinenConsent) window.AsiaLinenConsent.trackContact('quote_form', openWhatsApp);
    else openWhatsApp(); });
</script>
</body>
</html>
