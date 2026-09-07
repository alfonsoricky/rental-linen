<?php
$phone = '0822-3796-3375';
$whatsappBase = 'https://wa.me/6282237963375';
$quoteUrl = $whatsappBase . '?text=' . rawurlencode('Hello Asia Linen, I would like to request a linen rental quotation.');
// Customer relationships supplied by the site owner; unverified property logos remain text-only.
$customers = [
    ['name' => 'Aloft Bali Kuta at Beachwalk', 'logo' => null],
    ['name' => 'InterContinental Bali Sanur Resort', 'logo' => 'intercontinental-sanur.png'],
    ['name' => 'Aloft Petitenget', 'logo' => null],
    ['name' => 'Crystal Hotel', 'logo' => null],
    ['name' => 'LV8 Resort Hotel', 'logo' => null],
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
    ['name' => 'Towels & Bath Mats', 'image' => 'towels.jpg', 'alt' => 'Illustration of white towels arranged in a villa bathroom', 'tag' => 'BATH COLLECTION', 'description' => 'A comfortable touch for your guest bathroom essentials.', 'spec' => 'Bath Towel · Bath Mat · Hand Towel · Face Towel', 'detail' => 'White · A choice of sizes for your needs', 'items' => ['Bath Towel — 68 × 140', 'Bath Mat — 50 × 75', 'Hand Towel — 40 × 70', 'Face Towel — 30 × 30']],
    ['name' => 'Pillowcases', 'image' => 'pillows.jpg', 'alt' => 'Illustration of white pillows and folded sheets', 'tag' => 'PILLOW COLLECTION', 'description' => 'Plain white linen for a neatly finished bed.', 'spec' => 'Available in 50 × 70 and 50 × 90', 'detail' => 'CVC · TC 200 / TC 250 · Plain white', 'items' => ['50 × 70 — CVC TC 200 or TC 250', '50 × 90 — CVC TC 200 or TC 250']],
    ['name' => 'Sheets & Duvets', 'image' => 'hero.jpg', 'alt' => 'Illustration of a bed with white linen in a Bali villa', 'tag' => 'BED COLLECTION', 'description' => 'Complete your rooms with single and double bed linen.', 'spec' => 'Single & Double', 'detail' => 'CVC · TC 200 / TC 250 · Plain white', 'items' => ['Double Sheet — 300 × 300', 'Single Sheet — 210 × 300', 'Double Duvet — 270 × 235', 'Single Duvet — 170 × 240']],
    ['name' => 'Custom Selection', 'image' => 'towels.jpg', 'alt' => 'Illustration of folded white towels and their texture', 'tag' => 'YOUR LINEN SELECTION', 'description' => 'Combine linen to suit the needs of your property.', 'spec' => 'Mixed linen selections & pool towels', 'detail' => 'Pool Towel · Dark green / dark blue', 'items' => ['Choose linen from across our collections', 'Pool Towel — dark green or dark blue', 'Pool towel specifications confirmed when booking']],
];
$rentalPrices = [
    ['id' => 'towel-prices', 'name' => 'Towels & Bath Mats', 'note' => 'Everyday bathroom essentials', 'rows' => [
        ['Bath Towel', '68 × 140', '30/2 · 550 g/m² · 524 g/pc', 'White', 3000],
        ['Bath Mat', '50 × 75', '30/2 · 1,000 g/m² · 375 g/pc', 'White', 2500],
        ['Hand Towel', '40 × 70', '30/2 · 550 g/m² · 154 g/pc', 'White', 1500],
        ['Face Towel', '30 × 30', '30/2 · 550 g/m² · 50 g/pc', 'White', 1200],
    ]],
    ['id' => 'tc200-prices', 'name' => 'Bed Linen · TC 200', 'note' => 'CVC · Plain white', 'rows' => [
        ['Pillowcase', '50 × 70', 'CVC TC 200 · Plain', 'White', 2500],
        ['Pillowcase', '50 × 90', 'CVC TC 200 · Plain', 'White', 2700],
        ['Double Sheet', '300 × 300', 'CVC TC 200 · Plain', 'White', 12000],
        ['Single Sheet', '210 × 300', 'CVC TC 200 · Plain', 'White', 6000],
        ['Double Duvet', '270 × 235', 'CVC TC 200 · Plain', 'White', 12000],
        ['Single Duvet', '170 × 240', 'CVC TC 200 · Plain', 'White', 9000],
    ]],
    ['id' => 'tc250-prices', 'name' => 'Bed Linen · TC 250', 'note' => 'CVC · Plain white', 'rows' => [
        ['Pillowcase', '50 × 70', 'CVC TC 250 · Plain', 'White', 2600],
        ['Pillowcase', '50 × 90', 'CVC TC 250 · Plain', 'White', 2800],
        ['Double Sheet', '300 × 300', 'CVC TC 250 · Plain', 'White', 13000],
        ['Single Sheet', '210 × 300', 'CVC TC 250 · Plain', 'White', 7000],
        ['Double Duvet', '270 × 235', 'CVC TC 250 · Plain', 'White', 18000],
        ['Single Duvet', '170 × 240', 'CVC TC 250 · Plain', 'White', 10000],
    ]],
    ['id' => 'pool-prices', 'name' => 'Pool Towels', 'note' => 'For poolside use', 'rows' => [
        ['Pool Towel', 'Confirm with our team', 'Specifications confirmed when booking', 'Dark green / dark blue', 5000],
    ]],
];
function e($value) { return htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); }
function icon($name, $class = 'h-5 w-5') {
    $paths = ['arrow'=>'<path d="M5 12h14m-6-6 6 6-6 6"/>', 'phone'=>'<path d="M6 3h4l2 5-3 2a15 15 0 0 0 5 5l2-3 5 2v4a3 3 0 0 1-3 3C9 20 4 15 3 6a3 3 0 0 1 3-3Z"/>', 'truck'=>'<path d="M3 6h11v11H3zM14 10h4l3 4v3h-7"/><circle cx="7" cy="18" r="2"/><circle cx="18" cy="18" r="2"/>', 'layers'=>'<path d="m12 3 10 5-10 5L2 8Zm-10 9 10 5 10-5M2 16l10 5 10-5"/>', 'calendar'=>'<rect x="3" y="5" width="18" height="16" rx="2"/><path d="M7 3v4m10-4v4M3 11h18m-13 5h2m4 0h2"/>', 'pin'=>'<path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/>'];
    return '<svg aria-hidden="true" class="'.$class.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">'.($paths[$name] ?? $paths['arrow']).'</svg>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-27RV0808TM"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-27RV0808TM');
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Rent towels, sheets, pillowcases and duvets for hotels and villas in Bali. Flexible rental periods. Request a quotation from Asia Linen.">
    <meta name="theme-color" content="#092849">
    <title>Rental Linen Bali for Hotels &amp; Villas | Asia Linen</title>
    <link rel="canonical" href="https://asialinen.com/">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_GB">
    <meta property="og:site_name" content="Asia Linen">
    <meta property="og:title" content="Rental Linen Bali for Hotels &amp; Villas | Asia Linen">
    <meta property="og:description" content="Rent towels, sheets, pillowcases and duvets for hotels and villas in Bali. Flexible rental periods. Request a quotation from Asia Linen.">
    <meta property="og:url" content="https://asialinen.com/">
    <meta property="og:image" content="https://asialinen.com/assets/images/hero.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:alt" content="Illustration of a Bali villa bedroom with white bed linen">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Rental Linen Bali for Hotels &amp; Villas | Asia Linen">
    <meta name="twitter:description" content="Rent towels, sheets, pillowcases and duvets for hotels and villas in Bali. Flexible rental periods. Request a quotation from Asia Linen.">
    <meta name="twitter:image" content="https://asialinen.com/assets/images/hero.jpg">
    <meta name="twitter:image:alt" content="Illustration of a Bali villa bedroom with white bed linen">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preload" as="image" href="assets/images/hero.jpg">
</head>
<body class="bg-white font-sans antialiased">
<a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:top-2 focus:left-2 focus:z-50 focus:bg-white focus:p-4">Skip to content</a>
<header class="sticky top-0 z-40 border-b border-slate-100 bg-white/95 backdrop-blur">
    <div class="wrap flex h-20 items-center justify-between gap-6">
        <a href="#beranda" aria-label="Asia Linen — home" class="flex items-center gap-3">
            <svg class="h-12 w-12 text-gold" viewBox="0 0 60 60" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M30 51C15 35 21 19 30 8c10 12 16 27 0 43ZM30 51C12 51 5 39 4 26c11 0 21 6 26 25Zm0 0c18 0 25-12 26-25-11 0-21 6-26 25ZM14 29l-1-13 12 4m21 9 1-13-12 4"/></svg>
            <span><span class="block font-display text-2xl tracking-wide">ASIA LINEN</span><span class="block text-center text-[9px] tracking-[.43em]">LAUNDRY RENTALS</span></span>
        </a>
        <nav aria-label="Main navigation" class="hidden items-center gap-8 text-sm lg:flex">
            <a href="#beranda" class="border-b-2 border-gold py-2 font-semibold">Home</a><a href="#koleksi" class="hover:text-gold">Linen Collection</a><a href="#cara-sewa" class="hover:text-gold">How to Rent</a><a href="#faq" class="hover:text-gold">FAQ</a><a href="#kontak" class="hover:text-gold">Contact</a>
        </nav>
        <a href="<?= e($quoteUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary hidden sm:inline-flex">Request a Quote <?= icon('arrow') ?></a>
        <button id="menu-toggle" type="button" aria-controls="mobile-menu" aria-expanded="false" aria-label="Open menu" class="p-2 lg:hidden"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 6h18M3 12h18M3 18h18"/></svg></button>
    </div>
    <nav id="mobile-menu" aria-label="Mobile navigation" hidden class="border-t border-slate-100 bg-white px-6 py-4 lg:hidden"><div class="flex flex-col gap-4 text-sm"><a href="#beranda">Home</a><a href="#koleksi">Linen Collection</a><a href="#cara-sewa">How to Rent</a><a href="#faq">FAQ</a><a href="<?= e($quoteUrl) ?>" target="_blank" rel="noopener noreferrer">Request a Quote</a><a href="#kontak">Contact</a></div></nav>
</header>
<main id="main">
    <section id="beranda" class="relative isolate overflow-hidden bg-navy text-white">
        <img src="assets/images/hero.jpg" alt="Illustration of a Bali villa bedroom with white bed linen" width="1536" height="1024" fetchpriority="high" class="absolute inset-0 -z-20 h-full w-full object-cover object-[center_58%]">
        <div class="hero-shade absolute inset-0 -z-10"></div>
        <div class="wrap py-20 md:py-24 lg:py-28">
            <div class="max-w-2xl">
                <p class="eyebrow !text-[#e3b873]">ASIA LINEN · LINEN RENTAL</p>
                <h1 class="mt-5 max-w-xl font-display text-[42px] leading-[1.08] tracking-tight sm:text-6xl lg:text-[66px]">Linen Rental in Bali<br>for Hotels &amp; Villas</h1>
                <p class="mt-6 max-w-lg text-base leading-7 text-slate-100 md:text-lg">Towels and bed linen to support your hotel’s everyday needs. Explore our collections and let us prepare a quotation for your property.</p>
                <div class="mt-8 flex flex-wrap gap-3"><a href="#koleksi" class="btn border border-white/70 bg-white/5 hover:bg-white/15">Explore the Collection <?= icon('arrow') ?></a><a href="<?= e($quoteUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn bg-white text-navy hover:bg-cream">Request a Quote <?= icon('arrow') ?></a></div>
                <div class="mt-10 flex flex-wrap gap-x-7 gap-y-4 border-t border-white/25 pt-6 text-[10px] leading-5 tracking-[.12em] uppercase"><span class="flex items-center gap-3"><?= icon('layers', 'h-7 w-7 text-[#e3b873]') ?>Bed Linen<br>& Towels</span><span class="flex items-center gap-3"><?= icon('calendar', 'h-7 w-7 text-[#e3b873]') ?>No Minimum<br>Rental Period</span></div>
            </div>
        </div>
    </section>
    <section id="koleksi" class="py-16 md:py-20">
        <div class="wrap">
            <div class="mx-auto max-w-2xl text-center"><p class="eyebrow">SELECTED FOR YOUR PROPERTY</p><h2 class="section-title mt-3">Find the Linen You Need</h2><div class="mx-auto mt-5 h-px w-14 bg-gold"></div><p class="mt-5 leading-7 text-slate-600">From towels to bed linen, explore our collections and put together a selection that suits your rooms.</p></div>
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($products as $index => $product): ?>
                <article class="flex flex-col overflow-hidden rounded-sm border border-slate-200 bg-white">
                    <img src="assets/images/<?= e($product['image']) ?>" alt="<?= e($product['alt']) ?>" width="768" height="512" loading="lazy" class="aspect-[1.5] w-full object-cover <?= $index === 2 ? 'object-right' : '' ?>">
                    <div class="flex flex-1 flex-col p-5"><p class="text-[9px] font-semibold tracking-[.16em] text-gold"><?= e($product['tag']) ?></p><h3 class="mt-2 font-display text-2xl"><?= e($product['name']) ?></h3><p class="mt-3 min-h-15 text-sm leading-6 text-slate-600"><?= e($product['description']) ?></p><p class="mt-4 text-xs font-semibold leading-5"><?= e($product['spec']) ?></p><p class="mt-1 text-xs leading-5 text-slate-500"><?= e($product['detail']) ?></p>
                    <details class="mt-4 border-t border-slate-100 py-3 text-xs"><summary class="flex items-center justify-between font-semibold">View options <span class="plus text-lg transition-transform">+</span></summary><ul class="mt-3 space-y-2 leading-5 text-slate-600"><?php foreach ($product['items'] as $item): ?><li><?= e($item) ?></li><?php endforeach; ?></ul></details>
                    <a href="<?= e($whatsappBase . '?text=' . rawurlencode('Hello Asia Linen, I would like to enquire about ' . $product['name'] . '. Please share availability and a rental quotation.')) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary mt-auto !px-3 !text-xs">Enquire About This Collection <?= icon('arrow', 'h-4 w-4') ?></a></div>
                </article>
            <?php endforeach; ?>
            </div>
            <p class="mt-5 text-center text-xs leading-5 text-slate-500">Images are for illustration. Product details and availability are confirmed when booking.</p>
        </div>
    </section>
    <div class="border-y border-slate-100 bg-[#f3f6f8]"><div class="wrap grid gap-7 py-8 sm:grid-cols-2 lg:grid-cols-4"><?php foreach ([['truck','Delivery One Day Before Use'],['layers','CVC TC 200 & 250 Options'],['calendar','Flexible Rental Periods'],['pin','Based in Denpasar']] as [$symbol,$label]): ?><div class="flex items-center gap-4 text-sm font-medium"><?= icon($symbol,'h-8 w-8 shrink-0 text-blue') ?><span><?= e($label) ?></span></div><?php endforeach; ?></div></div>
    <section id="rental-prices" aria-labelledby="prices-heading" class="bg-cream py-16 md:py-20">
        <div class="wrap">
            <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                <div class="max-w-2xl"><p class="eyebrow">THE LINEN COLLECTION · 2026</p><h2 id="prices-heading" class="section-title mt-3">Rental Price List</h2><p class="mt-4 text-sm leading-7 text-slate-600">Find the right linen for your rooms, with daily rental rates at a glance.</p></div>
                <span class="w-fit rounded-sm border border-gold/30 bg-white px-4 py-3 text-xs font-semibold tracking-wide text-navy">IDR / day</span>
            </div>
            <nav aria-label="Price list categories" class="mt-7 flex flex-wrap gap-2">
                <?php foreach ($rentalPrices as $group): ?><a href="#<?= e($group['id']) ?>" class="rounded-sm border border-slate-300 bg-white px-4 py-3 text-xs font-semibold transition-colors hover:border-gold hover:text-blue"><?= e($group['name']) ?></a><?php endforeach; ?>
            </nav>
            <p class="mt-5 text-xs leading-5 text-slate-500 sm:hidden">Swipe each table sideways to see all product details and rates.</p>
            <div class="mt-6 space-y-6">
                <?php foreach ($rentalPrices as $group): ?>
                <div id="<?= e($group['id']) ?>" class="overflow-hidden rounded-sm border border-slate-200 bg-white">
                    <div class="flex flex-wrap items-center justify-between gap-2 border-l-4 border-gold bg-navy px-5 py-4 text-white"><h3 id="<?= e($group['id']) ?>-heading" class="font-display text-xl"><?= e($group['name']) ?></h3><p class="text-xs text-slate-200"><?= e($group['note']) ?></p></div>
                    <div class="overflow-x-auto" role="region" aria-labelledby="<?= e($group['id']) ?>-heading" tabindex="0">
                        <table class="w-full min-w-[660px] table-fixed text-left text-sm">
                            <caption class="sr-only"><?= e($group['name']) ?> daily rental rates in Indonesian rupiah</caption>
                            <thead class="border-b border-slate-200 bg-slate-50 text-[10px] uppercase tracking-wider text-slate-500"><tr><th scope="col" class="w-[22%] px-5 py-3 font-semibold">Item</th><th scope="col" class="w-[17%] px-4 py-3 font-semibold">Size</th><th scope="col" class="w-[28%] px-4 py-3 font-semibold">Specification</th><th scope="col" class="w-[16%] px-4 py-3 font-semibold">Color</th><th scope="col" class="w-[17%] px-5 py-3 text-right font-semibold">Rental / day</th></tr></thead>
                            <tbody class="divide-y divide-slate-100">
                            <?php foreach ($group['rows'] as [$item, $size, $specification, $color, $rate]): ?>
                                <tr class="transition-colors hover:bg-cream"><th scope="row" class="px-5 py-4 font-semibold text-navy"><?= e($item) ?></th><td class="px-4 py-4 text-xs leading-5 text-slate-600"><?= e($size) ?></td><td class="px-4 py-4 text-xs leading-5 text-slate-600"><?= e($specification) ?></td><td class="px-4 py-4 text-xs leading-5 text-slate-600"><?= e($color) ?></td><td class="whitespace-nowrap px-5 py-4 text-right font-semibold tabular-nums text-blue"><span class="mr-1 text-xs font-normal text-slate-500">Rp</span><?= number_format($rate, 0, '.', ',') ?></td></tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="mt-7 flex flex-col justify-between gap-5 sm:flex-row sm:items-center"><p class="max-w-xl text-xs leading-6 text-slate-600">Rates shown in Indonesian rupiah per day. Confirm sizes, availability and delivery arrangements with our team when booking.</p><a href="<?= e($quoteUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary shrink-0">Request a Quote on WhatsApp <?= icon('arrow') ?></a></div>
        </div>
    </section>
    <section id="cara-sewa" class="bg-cream py-16 md:py-24"><div class="wrap grid items-center gap-12 lg:grid-cols-2">
        <div class="relative"><img src="assets/images/pillows.jpg" alt="Illustration of neatly folded white linen" loading="lazy" width="768" height="512" class="aspect-[1.15] w-full object-cover"><div class="absolute -bottom-5 right-5 border border-gold/30 bg-white px-6 py-5 shadow-sm"><p class="font-display text-2xl">Your needs,</p><p class="mt-1 text-sm text-slate-600">the right linen selection.</p></div></div>
        <div class="pt-5 lg:pt-0"><p class="eyebrow">HOW TO RENT</p><h2 class="section-title mt-3">Start with what<br>your property needs.</h2><p class="mt-5 leading-7 text-slate-600">Tell us your preferred linen, quantities and rental dates. Discuss the details with the Asia Linen team.</p><ol class="mt-8 space-y-6"><?php foreach ([['Choose your linen','Select the towels, pillowcases, sheets or duvets you need.'],['Share your requirements','Let us know the quantities and your rental start and end dates.'],['Confirm your quote & schedule','Agree on the rental details and delivery schedule with our team.']] as $i => [$title,$copy]): ?><li class="flex gap-5"><span class="pt-1 font-display text-2xl text-gold">0<?= $i+1 ?></span><div><h3 class="font-semibold"><?= e($title) ?></h3><p class="mt-1 text-sm leading-6 text-slate-600"><?= e($copy) ?></p></div></li><?php endforeach; ?></ol></div>
    </div></section>
    <section id="faq" class="py-16 md:py-20"><div class="wrap grid gap-8 lg:grid-cols-[.8fr_1.2fr]"><div><p class="eyebrow">RENTAL INFORMATION</p><h2 class="section-title mt-3">Before<br>you rent.</h2><p class="mt-5 max-w-sm text-sm leading-7 text-slate-600">A few things to know when planning your linen rental.</p></div><div>
    <?php foreach ([['Is there a minimum rental period?','There is no minimum rental period. Let us know your required dates when requesting a quote.'],['When is linen delivered and collected?','Linen is delivered one day before use. The collection schedule is confirmed with our team when booking.'],['How do I request a quote?','Click Request a Quote to chat with us on WhatsApp, or use the form below to include your linen selection, quantities and rental dates.'],['What happens if linen is damaged or lost?','Damage, stains, burns or loss are subject to replacement charges under the rental terms. Full details are provided when booking.'],['Do you deliver to my property?','Share your property location with our team to confirm service coverage and delivery arrangements.']] as [$question,$answer]): ?><details class="border-b border-slate-200 py-5"><summary class="flex items-center justify-between gap-5 text-sm font-semibold"><?= e($question) ?><span class="plus text-2xl font-normal text-gold transition-transform">+</span></summary><p class="mt-4 pr-7 text-sm leading-7 text-slate-600"><?= e($answer) ?></p></details><?php endforeach; ?>
    </div></div></section>
    <section id="penawaran" class="bg-navy py-16 text-white md:py-20"><div class="wrap grid gap-12 lg:grid-cols-2"><div><p class="eyebrow !text-[#e3b873]">LET’S DISCUSS YOUR REQUIREMENTS</p><h2 class="section-title mt-4">Linen for your rooms.<br>A quote for your needs.</h2><p class="mt-6 max-w-md leading-7 text-slate-300">Tell us what you need and continue to WhatsApp with your request ready to send to the Asia Linen team.</p><a href="tel:+6282237963375" class="mt-8 inline-flex items-center gap-4 text-xl"><?= icon('phone','h-7 w-7 text-[#e3b873]') ?><?= e($phone) ?></a><p class="mt-3 text-sm text-slate-300">Contact our team for quotations and availability.</p></div>
    <form id="quote-form" class="rounded-sm bg-white p-6 text-navy md:p-8"><h3 class="font-display text-2xl">Prepare Your Quote Request</h3><div class="mt-6 grid gap-4 sm:grid-cols-2"><label class="text-xs font-semibold">Your name<input required name="name" autocomplete="name" maxlength="100" class="field" placeholder="Full name"></label><label class="text-xs font-semibold">Property name<input required name="property" autocomplete="organization" maxlength="150" class="field" placeholder="Hotel / property name"></label><label class="text-xs font-semibold">Collection<select name="product" id="product-select" class="field"><?php foreach ($products as $product): ?><option><?= e($product['name']) ?></option><?php endforeach; ?></select></label><label class="text-xs font-semibold">Rental start date<input required type="date" name="date" class="field"></label><label class="text-xs font-semibold sm:col-span-2">Your requirements<textarea required name="details" rows="3" maxlength="2000" class="field" placeholder="Linen types and quantities, rental duration, and property location"></textarea></label></div><button type="submit" class="btn btn-primary mt-5 w-full">Continue to WhatsApp <?= icon('arrow') ?></button><p class="mt-3 text-xs leading-5 text-slate-500">Your request opens in WhatsApp. Review the message and tap Send to share it with our team.</p></form>
    </div></section>
    <section id="customers" aria-labelledby="customers-heading" class="border-b border-slate-100 bg-cream py-14 md:py-16">
        <div class="wrap">
            <div class="mx-auto max-w-2xl text-center">
                <p class="eyebrow">OUR CUSTOMERS</p>
                <h2 id="customers-heading" class="section-title mt-3">Hotels &amp; Villas We Have Served</h2>
                <p class="mt-4 text-sm leading-7 text-slate-600">A selection of hotels and villas that have used our linen services.</p>
            </div>
            <ul class="mt-9 grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-7">
                <?php foreach ($customers as $customer): ?>
                    <li class="flex min-h-36 flex-col items-center justify-center gap-3 rounded-sm border border-slate-200 bg-white px-4 py-5 text-center">
                        <?php if ($customer['logo']): ?>
                            <div class="flex h-16 w-full items-center justify-center <?= $customer['logo'] === 'amala.png' ? 'rounded-sm bg-navy' : '' ?>">
                                <img src="assets/images/customers/<?= e($customer['logo']) ?>" alt="" loading="lazy" width="160" height="64" class="max-h-14 w-auto max-w-full object-contain">
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
<footer id="kontak" class="bg-cream py-12"><div class="wrap"><div class="grid gap-8 md:grid-cols-[1fr_1fr_auto]"><div><p class="font-display text-2xl">ASIA LINEN</p><p class="mt-2 text-[10px] tracking-[.3em]">LAUNDRY RENTALS</p><p class="mt-4 max-w-xs text-sm leading-6 text-slate-600">Linen and towels to support the everyday needs of your hotel.</p></div><div><h2 class="text-sm font-semibold">Visit & Contact Us</h2><address class="mt-4 text-sm not-italic leading-7 text-slate-600">Jalan Gunung Patas 1 No. 81B<br>Padang Sambian Kelod, Denpasar Barat<br><a class="hover:text-blue" href="tel:+6282237963375"><?= e($phone) ?></a></address></div><div class="flex flex-col gap-3 text-sm"><a href="#koleksi">Linen Collection</a><a href="#cara-sewa">How to Rent</a><a href="#faq">Rental Terms</a><a href="<?= e($quoteUrl) ?>" target="_blank" rel="noopener noreferrer">Request a Quote ↗</a></div></div><div class="mt-9 flex flex-wrap justify-between gap-3 border-t border-slate-200 pt-6 text-xs text-slate-500"><p>© <?= date('Y') ?> Asia Linen.</p><p>Illustrative images, not photographs of actual products.</p></div></div></footer>
<script>
const menuToggle = document.getElementById('menu-toggle');
const menu = document.getElementById('mobile-menu');
menuToggle.addEventListener('click', () => { const open = menuToggle.getAttribute('aria-expanded') !== 'true'; menuToggle.setAttribute('aria-expanded', String(open)); menuToggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu'); menu.hidden = !open; });
menu.querySelectorAll('a').forEach(link => link.addEventListener('click', () => { menu.hidden = true; menuToggle.setAttribute('aria-expanded', 'false'); menuToggle.setAttribute('aria-label','Open menu'); }));
document.addEventListener('keydown', event => { if (event.key === 'Escape' && !menu.hidden) { menu.hidden = true; menuToggle.setAttribute('aria-expanded','false'); menuToggle.setAttribute('aria-label','Open menu'); menuToggle.focus(); } });
// Track only the interaction source, never WhatsApp URLs or form contents.
document.querySelectorAll('a[href^="https://wa.me/"]').forEach(link => {
    link.addEventListener('click', () => {
        gtag('event', 'whatsapp_click', {
            contact_source: link.closest('section')?.id || (link.closest('header') ? 'header' : 'footer'),
            transport_type: 'beacon'
        });
    });
});
const form = document.getElementById('quote-form');
form.addEventListener('submit', event => { event.preventDefault(); const data = new FormData(form); const date = new Date(data.get('date') + 'T12:00:00').toLocaleDateString('en-GB', {day:'numeric', month:'long', year:'numeric'}); const message = `Hello Asia Linen, I would like to request a linen rental quotation.\n\nName: ${data.get('name').trim()}\nProperty: ${data.get('property').trim()}\nCollection: ${data.get('product')}\nRental start date: ${date}\nRequirements: ${data.get('details').trim()}`; const url = <?= json_encode($whatsappBase) ?> + '?text=' + encodeURIComponent(message);
    let opened = false;
    const openWhatsApp = () => { if (!opened) { opened = true; window.location.assign(url); } };
    setTimeout(openWhatsApp, 1000);
    gtag('event', 'whatsapp_click', { contact_source: 'quote_form', transport_type: 'beacon', event_callback: openWhatsApp, event_timeout: 1000 }); });
</script>
</body>
</html>
