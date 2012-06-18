<?php
 
/**
 * Settings for the Scratch theme
 */

defined('MOODLE_INTERNAL') || die;

// Adds our page to the structure of the admin tree

if ($ADMIN->fulltree) { 

// Theme colour setting
$name = 'theme_scratch/themecolor';
$title = get_string('themecolor','theme_scratch');
$description = get_string('themecolordesc', 'theme_scratch');
$default = '#000099';
$choices = array('#000099'=>'blue', '#990000'=>'red', '#009933'=>'green', '#660099'=>'purple', '#990066'=>'pink', '#000000'=>'black');
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Logo file setting
$name = 'theme_scratch/logo';
$title = get_string('logo','theme_scratch');
$description = get_string('logodesc', 'theme_scratch');
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$settings->add($setting);

// Block region width
$name = 'theme_scratch/regionwidth';
$title = get_string('regionwidth','theme_scratch');
$description = get_string('regionwidthdesc', 'theme_scratch');
$default = 200;
$choices = array(150=>'150px', 170=>'170px', 200=>'200px', 240=>'240px', 290=>'290px', 350=>'350px', 420=>'420px');
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Foot note setting
$name = 'theme_scratch/footnote';
$title = get_string('footnote','theme_scratch');
$description = get_string('footnotedesc', 'theme_scratch');
$setting = new admin_setting_confightmleditor($name, $title, $description, '');
$settings->add($setting);

// Show the credits to MoodleBites for Theme Designers
$name = 'theme_scratch/mbcredits';
$title = get_string('mbcredits','theme_scratch');
$description = get_string('mbcreditsdesc', 'theme_scratch');
$default = 1;
$choices = array(0=>'No', 1=>'Yes');
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Custom CSS file
$name = 'theme_scratch/customcss';
$title = get_string('customcss','theme_scratch');
$description = get_string('customcssdesc', 'theme_aerie');
$setting = new admin_setting_configtextarea($name, $title, $description, '');
$settings->add($setting);

}