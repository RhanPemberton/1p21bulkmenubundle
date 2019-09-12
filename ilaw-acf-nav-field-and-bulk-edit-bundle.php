<?php
/*
Plugin Name: Nav Menu ACF +  Bulk Edit + Nav Menu Bulk Edit Support
Author: Sam Zabala
Plugin URI: https://www.ilawyermarketing.com/
Version: 2.0.0
Description: Requires ACF, to work. sets up ACF field type for nav fields. Adds bulk editing functionality for native acf and nav menu field. <b>PLEASE READ <i>README.TXT</i></b> SHOULD ONE OF THE PLUGINS REQUIRE AN UPDATE
Copyright: Yes
*/

function _ilaw_bundle_create_admin_error($message,$notice_type = 'error'){
		
	$class = 'notice notice-'.$notice_type;
	$parsed_message = __( $message );
	printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), strip_tags( $parsed_message,"<br><pre><code><br/><strong><b><i><em><p><strong>" ) ); 
}



if (!class_exists('ACF')){
	$message = 'Advanced Custom Fields PRO is not installed. 1Point21 Data Vizualizer needs this plugin to work';

	_ilaw_bundle_create_admin_error($message);
}else{

	if(!class_exists('ACF_Nav_Menu_Field_Plugin')){
	// ACF NAV menu Field
		require_once plugin_dir_path( __FILE__ ) . '/advanced-custom-fields-nav-menu-field/fz-acf-nav-menu.php';
	}else{
		_ilaw_bundle_create_admin_error('Acf nav field already installed','warning');
	}

	if(!class_exists('ACFQuickEdit')){

		//Bulk edit
		require_once plugin_dir_path( __FILE__ ) . '/acf-quick-edit-fields-master/index.php';
	}else{
		_ilaw_bundle_create_admin_error('Acf quick edit already installed','warning');
	}

	// nav acf bulk edit support
	require_once plugin_dir_path( __FILE__ ) . '/ilaw-nav-field-bulk-edit-support/index.php';
}