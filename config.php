<?php

// Name of the theme's folder

$THEME->name = 'scratch';

// Parent style sheets

$THEME->parents = array('base');

// Style sheets used

$THEME->sheets = array('overrideall','core','course','modules','blocks','navbar','custommenu','dock');

// Editor sheets

$THEME->editor_sheets = array('editor');

// Dock enabled

$THEME->enable_dock = true;

// CSS Post Process

$THEME->csspostprocess = 'scratch_process_css';

// Custom renderer factory

$THEME->rendererfactory = 'theme_overridden_renderer_factory';

// Layouts used

$THEME->layouts = array(
    // Most backwards compatible layout without the blocks - this is the layout used by default
    'base' => array(
        'file' => 'general.php',
        'regions' => array(),
    ),
    // Standard layout with blocks, this is recommended for most pages with general information
    'standard' => array(
        'file' => 'general.php',
        'regions' => array('side-pre','side-post'),
        'defaultregion' => 'side-post',
    ),
    // Main course page
    'course' => array(
        'file' => 'general.php',
        'regions' => array('side-pre','side-post'),
        'defaultregion' => 'side-post',
        'options' => array('langmenu'=>true),
    ),
    // Grades page
    'report' => array(
        'file' => 'general.php',
        'regions' => array('side-pre','side-post'),
        'defaultregion' => 'side-post',
        'options' => array('nocustommenu'=>true),
    ),
    'coursecategory' => array(
        'file' => 'general.php',
        'regions' => array('side-pre','side-post'),
        'defaultregion' => 'side-post',
    ),
    // part of course, typical for modules - default page layout if $cm specified in require_login()
    'incourse' => array(
        'file' => 'general.php',
        'regions' => array('side-pre','side-post'),
        'defaultregion' => 'side-post',
    ),
    // The site home page.
    'frontpage' => array(
        'file' => 'general.php',
        'regions' => array('side-pre','side-post'),
        'defaultregion' => 'side-post',
        'options' => array('nonavbar'=>true, 'langmenu'=>true),
    ),
    // Server administration scripts.
    'admin' => array(
        'file' => 'general.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    // My dashboard page
    'mydashboard' => array(
        'file' => 'general.php',
        'regions' => array('side-pre','side-post'),
        'defaultregion' => 'side-post',
        'options' => array('langmenu'=>true),
    ),
    // My public page
    'mypublic' => array(
        'file' => 'general.php',
        'regions' => array('side-pre','side-post'),
        'defaultregion' => 'side-post',
    ),
    'login' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('langmenu'=>true),
    ),
 
    // Pages that appear in pop-up windows - no navigation, no blocks, no header.
    'popup' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('nofooter'=>true, 'nonavbar'=>true, 'nocustommenu'=>true),
    ),
    // No blocks and minimal footer - used for legacy frame layouts only!
    'frametop' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('nofooter'=>true),
    ),
    // Embeded pages, like iframe/object embeded in moodleform - it needs as much space as possible
    'embedded' => array(
        'file' => 'embedded.php',
        'regions' => array(),
        'options' => array('nofooter'=>true, 'nonavbar'=>true, 'nocustommenu'=>true),
    ),
    // Used during upgrade and install, and for the 'This site is undergoing maintenance' message.
    // This must not have any blocks, and it is good idea if it does not have links to
    // other places - for example there should not be a home link in the footer...
    'maintenance' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('noblocks'=>true, 'nofooter'=>true, 'nonavbar'=>true, 'nocustommenu'=>true),
    ),
);