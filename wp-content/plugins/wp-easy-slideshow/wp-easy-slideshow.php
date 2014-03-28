<?php
/*
	Plugin Name: WP Easy SlideShow
	Plugin URI: http://freebloggingtricks.com/wp-easy-slideshow/ 
	Description: Use WP Easy Slideshow plugin to add image slider in WordPress.
	Version: 1.0.3
	Author: PrOmAg
	Author URI: http://freebloggingtricks.com/
	License: GPL2
*/

/////////////////////////////////////// /////////////////////////////////////////
///////////////////////////////// Static ///////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
if ( !defined( 'WSS_PLUGIN_BASENAME' ) ) define( 'WSS_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
if ( !defined( 'WSS_PLUGIN_NAME' ) ) define( 'WSS_PLUGIN_NAME', trim( dirname( WSS_PLUGIN_BASENAME ), '/' ) );
if ( !defined( 'WSS_PLUGIN_URL' ) )	define( 'WSS_PLUGIN_URL', WP_PLUGIN_URL . '/' . WSS_PLUGIN_NAME ); 
if ( !defined( 'WSS_UPLOADS_DIR' ) )	define( 'WSS_UPLOADS_DIR', WP_CONTENT_DIR . '/uploads/' . WSS_PLUGIN_NAME ); 

include_once('includes/class.php'); 
if (class_exists('wpslideshow')) { global $obj; $obj = new wpslideshow();	}

////////////////////////////////////////////////////////////////////////////////
/////////////////////////////// Add Menus //////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
add_action('admin_menu', 'create_wss_menu');
function create_wss_menu(){
	add_menu_page('Easy Slideshow','Easy Slideshow','administrator','wss-images','wss_images');
	add_submenu_page('wss-images','Add Image','Add Image','administrator','wss-add-image','wss_add_image');
	add_submenu_page('','Edit Image','Edit Image','administrator','wss-edit-image','wss_edit_image');
	/*add_submenu_page('wss-images','WP Logos','WP Logos','administrator','wss-logos','wss_logo');
	add_submenu_page('wss-images','Add Logo','Add Logo','administrator','wss-add-logo','wss_add_logo');
	add_submenu_page('','Edit Logo','Edit Logo','administrator','wss-edit-logo','wss_edit_logo');*/
}

function wss_images(){
	include_once('includes/wss_images.php');
}

function wss_logo(){
	include_once('includes/wss_logos.php');
}

function wss_add_image(){
	include_once('includes/add_image.php');
}

function wss_add_logo(){
	include_once('includes/add_logo.php');
}

function wss_edit_image(){
	include_once('includes/edit_image.php');
}

function wss_edit_logo(){
	include_once('includes/edit_logo.php');
}

////////////////////////////////////////////////////////////////////////////////
//////////////////////////// Header Includes ///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

function add_wss_head(){
	$wss_header .=  '<link rel="stylesheet" href="'.WSS_PLUGIN_URL.'/css/style.css" media="screen" />';
	echo $wss_header;	
}
add_action('admin_head', 'add_wss_head');

////////////////////////////////////////////////////////////////////////////////
////////////////////////////// Add Editor //////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

add_filter('admin_head','wss_add_tinymce');
function wss_add_tinymce() {

	wp_enqueue_script('jquery');
	wp_enqueue_script('common');
	wp_enqueue_script('jquery-color');
	
	wp_admin_css('thickbox');
	wp_print_scripts('post');
	
	wp_print_scripts('media-upload');
	wp_print_scripts('jquery');
	wp_print_scripts('jquery-ui-core');
	wp_print_scripts('jquery-ui-tabs');
	
	wp_print_scripts('tiny_mce');
	wp_print_scripts('editor');
	wp_print_scripts('editor-functions');

	wp_print_scripts('wplink');
	wp_print_styles('wplink');
	add_action('tiny_mce_preload_dialogs', 'wp_link_dialog');

	add_thickbox();
	wp_tiny_mce();
	wp_admin_css();
	
	wp_enqueue_script('utipageinv');
	do_action("admin_print_styles-post-php");
	do_action('admin_print_styles');
}

function show_slider(){
	global $obj;
	$items = $obj->show_slider();
	if( !$items ) return '';
	
	$output = '<ul class="banner_wrap" id="banner_index">';
	
	foreach($items AS $item){
		$output .= '<li><a href="'.$item->link.'" target="_blank"><img src="'.home_url("wp-content/uploads/wp-easy-slideshow/".$item->guid).'" alt=""></a></li>';
	}
	$output .= "</ul>";
	return $output;
}
////////////////////////////////////////////////////////////////////////////////
///////////////////////////// Create Tables ////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

function create_wss_tables(){
	global $wpdb;
	$prefix = $wpdb->prefix;
	
	$wpdb->query("CREATE TABLE IF NOT EXISTS `".$prefix."wss_images` (
					`id` double NOT NULL AUTO_INCREMENT,
					`content` text NOT NULL,
					`link` varchar(255) NOT NULL,
					`guid` varchar(255) NOT NULL,
					PRIMARY KEY (`id`)
				);");
				
	/*$wpdb->query("CREATE TABLE IF NOT EXISTS `".$prefix."wss_logos` (
					`id` double NOT NULL AUTO_INCREMENT,
					`content` text NOT NULL,
					`link` varchar(255) NOT NULL,
					`guid` varchar(255) NOT NULL,
					`type` varchar(255) NOT NULL,
					PRIMARY KEY (`id`)
				);");*/
				
	wp_mkdir_p(trailingslashit(WSS_UPLOADS_DIR));
	@chmod(WSS_UPLOADS_DIR, 0777);
	
	/*wp_mkdir_p(trailingslashit(WSS_UPLOADS_DIR.'/logos'));
	@chmod(WSS_UPLOADS_DIR.'/logos', 0777);*/
}
register_activation_hook( __FILE__, 'create_wss_tables' );
?>