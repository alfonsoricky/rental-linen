(() => {
    'use strict';

    const measurementId = document.currentScript.dataset.measurementId;
    const storageKey = 'asialinen-cookie-consent';
    const lifetime = 180 * 24 * 60 * 60 * 1000;
    const disableKey = 'ga-disable-' + measurementId;
    const banner = document.getElementById('cookie-banner');
    const dialog = document.getElementById('cookie-dialog');
    const analyticsInput = document.getElementById('cookie-analytics');
    const status = document.getElementById('cookie-status');
    let analyticsStarted = false;
    let opener;
    let statusTimer;
    let choice = readChoice();

    function readChoice() {
        try {
            const stored = JSON.parse(localStorage.getItem(storageKey));
            if (stored?.version === 1 && typeof stored.analytics === 'boolean'
                && Number.isFinite(stored.savedAt) && stored.savedAt > 0
                && stored.savedAt <= Date.now() && Date.now() - stored.savedAt < lifetime) return stored;
        } catch (_) { /* Storage can be unavailable; analytics stays off. */ }
        return null;
    }

    function clearAnalyticsCookies() {
        const domains = [''];
        const hostname = location.hostname.split('.');
        for (let i = 0; i < hostname.length - 1; i++) domains.push(hostname.slice(i).join('.'));
        const paths = new Set(['/']);
        let path = '';
        location.pathname.split('/').filter(Boolean).forEach(part => {
            path += '/' + part;
            paths.add(path);
            paths.add(path + '/');
        });
        document.cookie.split(';').map(cookie => cookie.trim().split('=')[0])
            .filter(name => /^(_ga(?:_|$)|_gid$|_gat(?:_|$))/.test(name))
            .forEach(name => domains.forEach(domain => paths.forEach(cookiePath => {
                document.cookie = name + '=; Max-Age=0; Path=' + cookiePath
                    + (domain ? '; Domain=' + domain : '') + '; SameSite=Lax';
            })));
    }

    function applyChoice() {
        const allowed = choice?.analytics === true;
        window[disableKey] = !allowed;
        banner.hidden = choice !== null;
        analyticsInput.checked = allowed;
        if (!allowed) {
            // The Google opt-out flag stops hits and cookie writes even after the tag has loaded.
            clearAnalyticsCookies();
            return;
        }
        if (analyticsStarted) return;
        analyticsStarted = true;
        window.dataLayer = window.dataLayer || [];
        window.gtag = function () { window.dataLayer.push(arguments); };
        // Basic consent mode: no Google tag or requests until explicit analytics consent.
        window.gtag('consent', 'default', {
            analytics_storage: 'denied', ad_storage: 'denied',
            ad_user_data: 'denied', ad_personalization: 'denied'
        });
        window.gtag('consent', 'update', { analytics_storage: 'granted' });
        window.gtag('js', new Date());
        window.gtag('config', measurementId, {
            allow_google_signals: false,
            allow_ad_personalization_signals: false
        });
        const script = document.createElement('script');
        script.async = true;
        script.src = 'https://www.googletagmanager.com/gtag/js?id=' + encodeURIComponent(measurementId);
        document.head.appendChild(script);
    }

    function saveChoice(analytics) {
        choice = { version: 1, analytics, savedAt: Date.now() };
        let saved = true;
        try { localStorage.setItem(storageKey, JSON.stringify(choice)); }
        catch (_) { saved = false; }
        const focusedInBanner = banner.contains(document.activeElement);
        applyChoice();
        if (dialog.open) dialog.close();
        else if (focusedInBanner) document.getElementById('cookie-footer-settings').focus({ preventScroll: true });
        status.textContent = saved ? status.dataset.saved : status.dataset.sessionOnly;
        status.hidden = false;
        clearTimeout(statusTimer);
        statusTimer = setTimeout(() => { status.hidden = true; }, 6000);
    }

    document.querySelectorAll('[data-cookie-choice]').forEach(button => {
        button.addEventListener('click', () => saveChoice(button.dataset.cookieChoice === 'accept'));
    });
    document.querySelectorAll('[data-cookie-settings]').forEach(button => {
        button.hidden = false;
        button.addEventListener('click', () => {
            opener = button;
            analyticsInput.checked = choice?.analytics === true;
            dialog.showModal();
        });
    });
    document.getElementById('cookie-close').addEventListener('click', () => dialog.close());
    document.getElementById('cookie-save').addEventListener('click', () => saveChoice(analyticsInput.checked));
    dialog.addEventListener('close', () => {
        const target = opener?.getClientRects().length ? opener : document.getElementById('cookie-footer-settings');
        target?.focus({ preventScroll: true });
    });
    window.addEventListener('storage', event => {
        if (event.key === storageKey || event.key === null) { choice = readChoice(); applyChoice(); }
    });
    window.addEventListener('pageshow', event => {
        if (event.persisted) { choice = readChoice(); applyChoice(); }
    });

    window.AsiaLinenConsent = {
        trackContact(source, callback) {
            if (!choice?.analytics || window[disableKey] || typeof window.gtag !== 'function') {
                callback?.();
                return;
            }
            // Never queue interactions made before consent, or send form fields / WhatsApp URLs.
            let completed = false;
            const finish = () => {
                if (!completed) { completed = true; callback?.(); }
            };
            if (callback) setTimeout(finish, 1000);
            window.gtag('event', 'whatsapp_click', {
                contact_source: source, transport_type: 'beacon',
                ...(callback ? { event_callback: finish, event_timeout: 1000 } : {})
            });
        }
    };
    applyChoice();
})();
