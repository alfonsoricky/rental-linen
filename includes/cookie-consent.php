<section id="cookie-banner" class="cookie-banner" aria-labelledby="cookie-banner-title" hidden>
    <div>
        <h2 id="cookie-banner-title"><?= e(t('Your cookie choices')) ?></h2>
        <p><?= e(t('With your permission, we use Google Analytics cookies to understand visits to our website. You can browse and request a quote without them.')) ?></p>
    </div>
    <div class="cookie-actions">
        <button type="button" class="cookie-button cookie-button-primary" data-cookie-choice="accept"><?= e(t('Accept all')) ?></button>
        <button type="button" class="cookie-button" data-cookie-choice="reject"><?= e(t('Reject optional')) ?></button>
        <button type="button" class="cookie-settings-link" data-cookie-settings><?= e(t('Set preferences')) ?></button>
    </div>
</section>
<dialog id="cookie-dialog" class="cookie-dialog" aria-labelledby="cookie-dialog-title" aria-describedby="cookie-dialog-description">
    <div class="cookie-dialog-heading">
        <h2 id="cookie-dialog-title"><?= e(t('Cookie settings')) ?></h2>
        <button type="button" id="cookie-close" class="cookie-close" aria-label="<?= e(t('Close cookie settings')) ?>">✕</button>
    </div>
    <p id="cookie-dialog-description"><?= e(t('Choose whether to allow analytics. You can change your choice at any time using Cookie settings at the bottom of the page.')) ?></p>
    <div class="cookie-category">
        <div class="cookie-category-heading"><h3><?= e(t('Remember your choice')) ?></h3><span><?= e(t('Always active')) ?></span></div>
        <p><?= e(t('Your preference is stored in this browser for 180 days and applies to both language versions. This storage is needed to remember your choice.')) ?></p>
    </div>
    <div class="cookie-category">
        <label class="cookie-category-heading" for="cookie-analytics"><span><?= e(t('Analytics cookies')) ?></span><input type="checkbox" id="cookie-analytics" aria-describedby="cookie-analytics-description"></label>
        <p id="cookie-analytics-description"><?= e(t('Google Analytics uses cookies such as _ga to measure page visits and interactions, including quote button clicks. It only loads when you allow analytics.')) ?></p>
        <a class="cookie-policy-link" href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer"><?= e(t('Google Privacy Policy (opens in a new tab)')) ?></a>
    </div>
    <button type="button" id="cookie-save" class="cookie-button cookie-button-primary"><?= e(t('Save preferences')) ?></button>
</dialog>
<p id="cookie-status" class="cookie-status" role="status" hidden data-saved="<?= e(t('Cookie preferences saved.')) ?>" data-session-only="<?= e(t('Your choice applies to this page. Your browser could not save it for future visits.')) ?>"></p>
