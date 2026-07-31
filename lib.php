<?php
defined('MOODLE_INTERNAL') || die();

/**
 * Main SCSS: Boost's default preset, then the Lozenge engine (generated
 * CSS custom properties from jethac/lozenge) and the override layer that
 * re-skins Moodle surfaces through Lozenge system tokens.
 */
function theme_lozenge_get_main_scss_content($theme) {
    global $CFG;
    $scss = file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    $scss .= "\n" . file_get_contents(__DIR__ . '/scss/engine.scss');
    $scss .= "\n" . file_get_contents(__DIR__ . '/scss/lozenge.scss');
    return $scss;
}

/**
 * Compile-time Bootstrap variable mapping: the static base is the Lozenge
 * palette (Jira blue accent); the runtime dials act on top via the
 * custom-property layer.
 */
function theme_lozenge_get_pre_scss($theme) {
    return '
$primary: #0052CC;
$success: #00875A;
$danger: #DE350B;
$warning: #FFAB00;
$info: #0052CC;
$body-color: #172B4D;
$font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
$border-radius: 3px;
$border-radius-lg: 3px;
$border-radius-sm: 2px;
$btn-font-weight: 500;
$enable-shadows: false;
';
}

/**
 * Theme-axis settings → root custom properties. This is what makes the
 * admin sliders drive the whole UI at runtime.
 */
function theme_lozenge_get_extra_scss($theme) {
    $contrast = (float)($theme->settings->contrast ?? 0);
    $hue = (float)($theme->settings->accenthue ?? 260.48);
    $chroma = (float)($theme->settings->accentchroma ?? 1);
    $glass = empty($theme->settings->glass) ? 0 : 1;
    $scheme = $theme->settings->scheme ?? 'auto';

    $scss = ":root {
  --lz-contrast: {$contrast};
  --lz-accent-hue: {$hue};
  --lz-accent-chroma: {$chroma};
  --lz-glass: {$glass};
}\n";

    if ($scheme === 'dark') {
        // Force the dark scheme regardless of OS preference by re-emitting
        // the engine's dark block against :root.
        $engine = file_get_contents(__DIR__ . '/scss/engine.scss');
        if (preg_match('/\[data-theme="dark"\]\s*\{(.*?)\n\}/s', $engine, $m)) {
            $scss .= ":root {\n" . $m[1] . "\n}\n";
        }
    }
    return $scss;
}
