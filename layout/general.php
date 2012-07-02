<?php

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-pre', $OUTPUT));
$hassidepost = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-post', $OUTPUT));
// $hastopblocks = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('block-top-left', $OUTPUT) or $PAGE->blocks->region_has_content('block-top-mid', $OUTPUT) or  $PAGE->blocks->region_has_content('block-top-right', $OUTPUT));
// $hasbtmblocks = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('block-btm-left', $OUTPUT) or $PAGE->blocks->region_has_content('block-btm-mid', $OUTPUT) or  $PAGE->blocks->region_has_content('block-btm-right', $OUTPUT));

$showsidepre = ($hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT));
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));
$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($showsidepost && !$showsidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}


if (!empty($PAGE->theme->settings->logo)) {
    $logourl = $PAGE->theme->settings->logo;
} else {
    $logourl = $OUTPUT->pix_url('banner', 'theme');
}

if (!empty($PAGE->theme->settings->footnote)) {
    $footnote = $PAGE->theme->settings->footnote;
} else {
    $footnote = '<!-- There was no custom footnote set -->';
}

if (($PAGE->theme->settings->mbcredits)==1) {
    $mbcredits = 'You can make a theme like this one by taking the <a href="http://www.moodlebites.com" target="_blank">MoodleBites for Theme Designers</a> course!';
} else {
    $mbcredits = '<!-- Credits were disabled -->';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>
<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page">
	<div id="wrapper" class="clearfix">
<?php if ($hasheading || $hasnavbar) { ?>

    <div id="page-header" class="clearfix">
	<img class="sitelogo" src="<?php echo $logourl; ?>" alt="Custom logo here" />

	        <?php if ($hasheading) { ?>
		
		    	<h1 class="headermain"><?php echo $PAGE->heading ?></h1>
    		    <div class="headermenu">
        			<?php
            			echo $OUTPUT->login_info();
		           		if (!empty($PAGE->layout_options['langmenu'])) {
		        	       	echo $OUTPUT->lang_menu();
			    	    }
    			       	echo $PAGE->headingmenu
        			?>
	        	</div>
	        <?php } ?>

    </div>
    
	<?php if ($hascustommenu) { ?>
 	<div id="custommenu"><?php echo $custommenu; ?></div>
	<?php } ?>

    <?php if ($hasnavbar) { ?>
	    <div class="navbar clearfix">
    	    <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
            <div class="navbutton"> <?php echo $PAGE->button; ?></div>
      </div>
    <?php } ?>

    <!-- The three blocks added to the top of the page -->
    <?php // if ($hastopblocks) { ?>
    <!--
		    <div id="topblockwrap">
		    <div class="top-blocks">
		    <div id="blocktopleft" class="block-region">
		    <div class="region-content">
                        <?php // echo $OUTPUT->blocks_for_region('block-top-left') ?>
                    </div>
		    </div>
		    </div>
		    <div class="top-blocks">
		    <div id="blocktopmid" class="block-region">
		    <div class="region-content">
                        <?php // echo $OUTPUT->blocks_for_region('block-top-mid') ?>
                    </div>
		    </div>
		    </div>
		    <div class="top-blocks">
		    <div id="blocktopright" class="block-region">
		    <div class="region-content">
                        <?php // echo $OUTPUT->blocks_for_region('block-top-right') ?>
                    </div>
		    </div>
		    </div>
		    </div>
    -->
    <?php // } ?>
    <!-- End top of page blocks -->

<?php } ?>

<!-- END OF HEADER -->

<div id="page-content-wrapper">
    <div id="page-content">
        <div id="region-main-box">
            <div id="region-post-box">

                <div id="region-main-wrap">
                    <div id="region-main">
                        <div class="region-content">
                            <?php echo $OUTPUT->main_content() ?>
                        </div>
                    </div>
                </div>

                <?php if ($hassidepre) { ?>
                <div id="region-pre" class="block-region">
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                    </div>
                </div>
                <?php } ?>

                <?php if ($hassidepost) { ?>
                <div id="region-post" class="block-region">
                    <div class="region-content">
                        <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>

    <!-- The three blocks added to the bottom of the page -->
    <?php // if ($hasbtmblocks) { ?>
    <!--
		    <div id="btmblockwrap">
		    <div class="btm-blocks">
		    <div id="blockbtmleft" class="block-region">
		    <div class="region-content">
                        <?php // echo $OUTPUT->blocks_for_region('block-btm-left') ?>
                    </div>
		    </div>
		    </div>
		    <div class="btm-blocks">
		    <div id="blockbtmmid" class="block-region">
		    <div class="region-content">
                        <?php // echo $OUTPUT->blocks_for_region('block-btm-mid') ?>
                    </div>
		    </div>
		    </div>
		    <div class="btm-blocks">
		    <div id="blockbtmright" class="block-region">
		    <div class="region-content">
                        <?php // echo $OUTPUT->blocks_for_region('block-btm-right') ?>
                    </div>
		    </div>
		    </div>
		    </div>
    -->
    <?php // } ?>
    <!-- End bottom of page blocks -->

    </div>

<!-- START OF FOOTER -->
    <?php if ($hasfooter) { ?>
    <div id="page-footer" class="clearfix">
	<div class="footnote"><?php echo $footnote; ?></div>
	<div class="mbcredits"><?php echo $mbcredits; ?></div>
        <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>
        <?php
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
    </div>
    <?php } ?>
</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>
