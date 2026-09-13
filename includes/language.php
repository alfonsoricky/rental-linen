<?php
// The language is selected by the entry point, never by browser or cookie detection.
$lang = isset($lang) && $lang === 'id' ? 'id' : 'en';
$translations = $lang === 'id'
    ? json_decode(file_get_contents(__DIR__ . '/id.json'), true, 512, JSON_THROW_ON_ERROR)
    : [];
function t($text) {
    global $translations;
    return $translations[$text] ?? $text;
}
$siteUrl = 'https://asialinen.com/';
$pageUrl = $siteUrl . $lang . '/';
// Support production at / and local MAMP installations in a subdirectory.
$scriptDirectory = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/index.php'));
$basePath = preg_replace('~/(?:en|id)$~', '', rtrim($scriptDirectory, '/')) . '/';
