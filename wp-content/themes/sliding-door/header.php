<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Sliding_Door
 * @since Sliding Door 1.0
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Gateway</title>
    <link href="<?php echo get_template_directory_uri(); ?>/css/ui_base.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo get_template_directory_uri(); ?>/css/ui_layout.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo get_template_directory_uri(); ?>/css/ui_function.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo get_template_directory_uri(); ?>/css/jquery.ui.core.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo get_template_directory_uri(); ?>/css/jquery.ui.tabs.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo get_template_directory_uri(); ?>/css/jquery.ui.accordion.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo get_template_directory_uri(); ?>/css/custom.css" rel="stylesheet" type="text/css"/>
	<?php wp_head();?>
</head>
<body>
<div class="body_bg2"></div>
<div class="top_menu">
    <div class="ui_container w960">
        <div class="pull_left">
            <a href="javascript:void(0)" class="pre_icon">Online E-learning(Moodle)</a>
            <a href="javascript:void(0)" class="pre_icon">Online E-learning(Catapult)</a>
        </div>
        <div class="pull_right">
            <a href="javascript:void(0)">About Us</a>
            <a href="javascript:void(0)">Careers</a>
            <a href="javascript:void(0)">Contact Us</a>
        </div>
    </div>
</div>
<div class="ui_container w960">
    <!--顶部-->
    <div class="header row">
        <div class="grid_7 logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt=""></div>
        <div class="grid_17">
            <div class="contact">
                <div style="float:right;margin-top: 20px">
                    <span class="mr20"><i class="ico_tel"></i>1300 881 932</span>
                    <i class="ico_facebook mr20"></i>
                    <i class="ico_tiwwer mr20"></i>
                </div>
            </div>
            <div class="menu">
                <ul>
                    <li <?php echo is_home() ? 'class="active"' : "";?>><a href="<?php echo home_url('/');?>">Home</a></li>
                    <li <?php echo (is_page(10) OR is_single() OR is_category()) ? 'class="active"' : "";?>><a href="<?php echo home_url('/categories');?>">Courses</a></li>
                    <li <?php echo is_page('calendar') ? 'class="active"' : "";?>><a href="<?php echo home_url('/calendar');?>">Calendar</a></li>
                    <li><a href="javascript:void(0)">Traineeships</a></li>
                    <li><a href="javascript:void(0)">Certificate lll Guarantee</a></li>
                </ul>
            </div>
        </div>
    </div>

