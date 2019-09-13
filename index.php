<?php
/*
Plugin Name: Nav Menu ACF +  Bulk Edit + Nav Menu Bulk Edit Support
Author: Sam Zabala
Plugin URI: https://www.ilawyermarketing.com/
Version: 2.0.0
Description: Requires ACF, to work. sets up ACF field type for nav fields. Adds bulk editing functionality for native acf and nav menu field. <b>PLEASE READ <i>fordev.txt</i></b> SHOULD ONE OF THE PLUGINS REQUIRE AN UPDATE
Copyright: Yes
*/

function _ilaw_bundle_create_admin_error($message,$notice_type = 'error'){
		
	$class = 'notice notice-'.$notice_type;
	$parsed_message = __( $message );
	printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), strip_tags( $parsed_message,"<br><pre><code><br/><strong><b><i><em><p><strong>" ) ); 
}

function _ilaw_sm_check_for_acf(){
	if (!class_exists('ACF')){
		$message = 'Advanced Custom Fields PRO is not installed. iLawyer needs this plugin to work';
	
		_ilaw_bundle_create_admin_error($message);
	}
}

add_action('admin_init','_ilaw_sm_check_for_acf');

function _ilaw_sm_activate(){
	if(!is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ){
		if(current_user_can( 'activate_plugins' )){
			wp_die('Advanced Custom Fields PRO is not installed. iLawyer needs this plugin to work <a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>');
			// _ilaw_bundle_create_admin_error($message);
		}
	}
}

register_activation_hook(__FILE__,'_ilaw_sm_activate');
	




if(!class_exists('ACF_Nav_Menu_Field_Plugin')){
	// ACF NAV menu Field
	require_once plugin_dir_path( __FILE__ ) . '/advanced-custom-fields-nav-menu-field/fz-acf-nav-menu.php';
}else{
	_ilaw_bundle_create_admin_error('nav menu acf is already installed','warning');
}

if(!class_exists('ACFQuickEdit')){

	//Bulk edit
	require_once plugin_dir_path( __FILE__ ) . '/acf-quick-edit-fields/index.php';
}else{
	_ilaw_bundle_create_admin_error('Acf quick edit already installed','warning');
}

// nav acf bulk edit support
require_once plugin_dir_path( __FILE__ ) . '/ilaw-nav-field-bulk-edit-support/index.php';