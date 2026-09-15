// Browser integration checks. Intercept Google requests so tests never send production analytics.
// Requires Playwright; optional PLAYWRIGHT_MODULE and CHROME_EXECUTABLE_PATH select local installs.
const assert = require('node:assert/strict');
const { chromium } = require(process.env.PLAYWRIGHT_MODULE || 'playwright');
const base = (process.argv[2] || 'http://127.0.0.1:8090').replace(/\/$/, '');
const key = 'asialinen-cookie-consent';
const tagId = 'G-27RV0808TM';
const google = /googletagmanager\.com|google-analytics\.com|doubleclick\.net/;
const storedChoice = (analytics, savedAt = Date.now()) => ({ version: 1, analytics, savedAt });

(async () => {
    const browser = await chromium.launch({
        headless: true,
        ...(process.env.CHROME_EXECUTABLE_PATH ? { executablePath: process.env.CHROME_EXECUTABLE_PATH } : {})
    });
    const errors = [];
    async function session(options = {}) {
        const context = await browser.newContext(options);
        const requests = [];
        await context.route(google, async route => {
            requests.push(route.request().url());
            await route.fulfill({ contentType: 'application/javascript', body: 'window.__analyticsTagFetched = true;' });
        });
        const page = await context.newPage();
        page.on('pageerror', error => errors.push(error.message));
        return { context, page, requests };
    }
    const events = page => page.evaluate(() => (window.dataLayer || []).filter(command => command[0] === 'event').map(command => Array.from(command)));
    async function seed(page, value) {
        await page.goto(base + '/en/');
        await page.evaluate(({ key, value }) => localStorage.setItem(key, value), { key, value: JSON.stringify(value) });
        await page.reload();
    }
    try {
        for (const lang of ['en', 'id']) {
            const { context, page, requests } = await session({ viewport: { width: 320, height: 640 } });
            await page.goto(base + '/' + lang + '/');
            assert.equal(await page.locator('#cookie-banner').isVisible(), true);
            assert.equal(requests.length, 0, 'No Google requests before consent');
            assert.equal(await page.evaluate(() => typeof window.gtag), 'undefined');
            assert.equal(await page.locator('#cookie-banner h2').textContent(), lang === 'en' ? 'Your cookie choices' : 'Pilihan cookie Anda');
            assert.equal(await page.evaluate(() => document.documentElement.scrollWidth <= innerWidth), true, 'No mobile overflow');
            await page.locator('#cookie-banner [data-cookie-settings]').click();
            assert.equal(await page.locator('#cookie-analytics').isChecked(), false);
            assert.equal(await page.evaluate(() => document.querySelector('#cookie-dialog').contains(document.activeElement)), true);
            await page.keyboard.press('Escape');
            assert.equal(await page.locator('#cookie-dialog').isVisible(), false);
            assert.equal(await page.locator('#cookie-banner').isVisible(), true, 'Closing settings is not consent');
            assert.equal(requests.length, 0);
            await page.locator('[data-cookie-choice="reject"]').click();
            assert.equal(await page.locator('#cookie-banner').isVisible(), false);
            assert.equal((await page.evaluate(key => JSON.parse(localStorage.getItem(key)), key)).analytics, false);
            // Exercising the actual quote form must still open WhatsApp without collecting analytics.
            await context.route('https://wa.me/**', route => route.fulfill({ body: 'WhatsApp preview' }));
            await page.locator('#quote-form [name="name"]').fill('Consent test');
            await page.locator('#quote-form [name="property"]').fill('Test villa');
            await page.locator('#quote-form [name="date"]').fill('2026-12-20');
            await page.locator('#quote-form [name="details"]').fill('10 towels');
            await page.locator('#quote-form button[type="submit"]').click();
            await page.waitForURL('https://wa.me/**');
            assert.match(new URL(page.url()).searchParams.get('text'), /10 towels/);
            assert.equal(requests.length, 0, 'Rejection must not break quoting or load Google');
            await page.goto(base + '/' + (lang === 'en' ? 'id' : 'en') + '/');
            assert.equal(await page.locator('#cookie-banner').isVisible(), false, 'Choice shared across languages');
            assert.equal(requests.length, 0);
            await context.close();
        }

        const { context, page, requests } = await session();
        await page.goto(base + '/en/');
        await page.evaluate(() => window.AsiaLinenConsent.trackContact('before-consent'));
        await page.locator('[data-cookie-choice="accept"]').click();
        await page.waitForFunction(() => window.__analyticsTagFetched === true);
        assert.equal(requests.length, 1);
        assert.deepEqual(await events(page), [], 'Pre-consent events must never be replayed');
        const commands = await page.evaluate(() => window.dataLayer.map(command => Array.from(command)));
        assert.equal(commands[0][0], 'consent');
        assert.equal(commands[0][2].analytics_storage, 'denied');
        assert.equal(commands[0][2].ad_storage, 'denied');
        assert.equal(commands[1][2].analytics_storage, 'granted');
        assert.equal(commands.find(command => command[0] === 'config')[2].allow_google_signals, false);
        await page.evaluate(() => window.AsiaLinenConsent.trackContact('quote_form'));
        assert.equal((await events(page)).length, 1);
        assert.deepEqual((await events(page))[0][2], { contact_source: 'quote_form', transport_type: 'beacon' });
        // A returning visitor gets analytics without another banner, including the other language.
        await page.goto(base + '/id/');
        await page.waitForFunction(() => window.__analyticsTagFetched === true);
        assert.equal(await page.locator('#cookie-banner').isVisible(), false);
        assert.equal(requests.length, 2);
        const otherTab = await context.newPage();
        await otherTab.goto(base + '/en/');
        await otherTab.waitForFunction(() => window.__analyticsTagFetched === true);
        await context.addCookies([
            { name: '_ga', value: 'old', url: base },
            { name: '_ga_TEST', value: 'old', url: base + '/id/' },
            { name: 'unrelated', value: 'keep', url: base }
        ]);
        await page.locator('#cookie-footer-settings').click();
        assert.equal(await page.locator('#cookie-analytics').isChecked(), true);
        await page.locator('#cookie-analytics').uncheck();
        await page.locator('#cookie-save').click();
        assert.equal(await page.evaluate(id => window['ga-disable-' + id], tagId), true);
        await otherTab.waitForFunction(id => window['ga-disable-' + id] === true, tagId);
        const cookies = await context.cookies(base + '/id/');
        assert.equal(cookies.some(cookie => cookie.name.startsWith('_ga')), false, 'Remove old analytics cookies');
        assert.equal(cookies.some(cookie => cookie.name === 'unrelated'), true);
        await page.evaluate(() => window.AsiaLinenConsent.trackContact('after-revocation'));
        assert.deepEqual(await events(page), []);
        const requestCount = requests.length;
        await page.reload();
        assert.equal(requests.length, requestCount, 'Revoked consent persists after reload');
        await page.locator('#cookie-footer-settings').click();
        await page.locator('#cookie-analytics').check();
        await page.locator('#cookie-save').click();
        await page.waitForFunction(() => window.__analyticsTagFetched === true);
        assert.equal(await page.evaluate(id => window['ga-disable-' + id], tagId), false);
        await context.close();

        for (const value of [storedChoice(true, Date.now() - 181 * 86400000), storedChoice(true, Date.now() + 86400000), { version: 1, analytics: 'true', savedAt: Date.now() }, 'broken']) {
            const { context, page, requests } = await session();
            await seed(page, value);
            assert.equal(await page.locator('#cookie-banner').isVisible(), true, 'Invalid or expired choice asks again');
            assert.equal(requests.length, 0);
            await context.close();
        }
        const blocked = await session();
        await blocked.context.addInitScript(() => {
            Storage.prototype.getItem = () => { throw new Error('Storage blocked'); };
            Storage.prototype.setItem = () => { throw new Error('Storage blocked'); };
        });
        await blocked.page.goto(base + '/en/');
        await blocked.page.locator('[data-cookie-choice="reject"]').click();
        assert.match(await blocked.page.locator('#cookie-status').textContent(), /could not save/);
        await blocked.page.reload();
        assert.equal(await blocked.page.locator('#cookie-banner').isVisible(), true);
        assert.equal(blocked.requests.length, 0);
        await blocked.context.close();

        const noJS = await session({ javaScriptEnabled: false });
        await noJS.page.goto(base + '/en/');
        assert.equal(await noJS.page.locator('#cookie-banner').isVisible(), false);
        assert.equal(await noJS.page.locator('#cookie-footer-settings').isVisible(), false);
        assert.equal(await noJS.page.locator('a[href^="https://wa.me/"]').count() > 0, true);
        assert.equal(noJS.requests.length, 0);
        await noJS.context.close();

        assert.deepEqual(errors, [], 'No browser JavaScript errors');
        console.log('PASS: EN/ID consent, mobile layout, keyboard dismissal, network blocking, WhatsApp without consent, persistence, grant/revoke, cross-tab sync, cookie cleanup, expiry, blocked storage and no-JS fallback');
    } finally {
        await browser.close();
    }
})().catch(error => { console.error(error); process.exitCode = 1; });
