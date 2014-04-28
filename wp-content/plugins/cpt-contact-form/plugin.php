<?php
/*
Plugin Name: CPT Contact Form
Author: geomagas
Version: 0.1.0
Description: A contact form that utilizes a custom post type to host messages on-site instead of directly sending them by e-mail. Only a notification is sent instead.
Text Domain: cpt-contact-form
*/
if( !defined( __DIR__ ) )define( __DIR__, dirname(__FILE__) );
add_action('plugins_loaded','cpt');
	function cpt(){
		require_once(__DIR__."/cpt_contact_form.class.php");
		new cpt_contact_form(__FILE__);
		}


