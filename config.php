<?php
defined('MOODLE_INTERNAL') || die();

$THEME->name = 'lozenge';
$THEME->parents = ['boost'];
$THEME->sheets = [];
$THEME->editor_scss = [];
$THEME->enable_dock = false;
$THEME->yuicssmodules = [];
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->requiredblocks = '';
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;
$THEME->haseditswitch = true;
$THEME->usescourseindex = true;
$THEME->usefallback = true;

$THEME->scss = function($theme) {
    return theme_lozenge_get_main_scss_content($theme);
};
$THEME->prescsscallback = 'theme_lozenge_get_pre_scss';
$THEME->extrascsscallback = 'theme_lozenge_get_extra_scss';
