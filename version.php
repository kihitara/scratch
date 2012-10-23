<?php

/**
 * Theme version info
 *
 * @copyright  2012 Miriam Laidlaw  {@link http://www.hrdnz.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

$plugin->version   = 2012082800; // The current module version (Date: YYYYMMDDXX)
$plugin->requires  = 2010112400; // Requires this Moodle version
//Note that this plugin may work on earlier versions of Moodle 2 but has only been tested in 2.2
//To change the version requirement to 2.0, use 2010112400
//To change the version requirement to 2.1, use 2011070100
//To change the version requirement to 2.2, use 2011120100
//Note that if you change the version requirement to lower than 2.2, it is at your own risk!
$plugin->maturity = MATURITY_RC;
$plugin->release = '1.1 (Build: 2012082800 - RELEASE CANDIDATE)';
$plugin->component = 'theme_scratch'; // Full name of the plugin (used for diagnostics)