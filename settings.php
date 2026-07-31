<?php
defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $settings = new theme_boost_admin_settingspage_tabs('themesettinglozenge',
        get_string('configtitle', 'theme_lozenge'));
    $page = new admin_settingpage('theme_lozenge_axes',
        get_string('axessettings', 'theme_lozenge'));

    $setting = new admin_setting_configselect('theme_lozenge/scheme',
        get_string('scheme', 'theme_lozenge'),
        get_string('scheme_desc', 'theme_lozenge'),
        'auto',
        ['auto' => get_string('schemeauto', 'theme_lozenge'),
         'light' => get_string('schemelight', 'theme_lozenge'),
         'dark' => get_string('schemedark', 'theme_lozenge')]);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $setting = new admin_setting_configtext('theme_lozenge/contrast',
        get_string('contrast', 'theme_lozenge'),
        get_string('contrast_desc', 'theme_lozenge'),
        '0', PARAM_FLOAT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $setting = new admin_setting_configtext('theme_lozenge/accenthue',
        get_string('accenthue', 'theme_lozenge'),
        get_string('accenthue_desc', 'theme_lozenge'),
        '260.48', PARAM_FLOAT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $setting = new admin_setting_configtext('theme_lozenge/accentchroma',
        get_string('accentchroma', 'theme_lozenge'),
        get_string('accentchroma_desc', 'theme_lozenge'),
        '1', PARAM_FLOAT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $setting = new admin_setting_configcheckbox('theme_lozenge/glass',
        get_string('glass', 'theme_lozenge'),
        get_string('glass_desc', 'theme_lozenge'), 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}
