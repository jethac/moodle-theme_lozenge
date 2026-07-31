<?php
// Lozenge theme for Moodle — the Lozenge design system as a Boost child.
defined('MOODLE_INTERNAL') || die();

$plugin->component = 'theme_lozenge';
$plugin->version   = 2026080100;
$plugin->requires  = 2024100700; // Moodle 4.5+
$plugin->release   = '0.1.0';
$plugin->maturity  = MATURITY_ALPHA;
$plugin->dependencies = ['theme_boost' => 2024100700];
