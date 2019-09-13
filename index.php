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

function _ilaw_sm_activate(){


	if(!class_exists( 'ACF' ) ){
		if(current_user_can( 'activate_plugins' )){
			wp_die('Advanced Custom Fields PRO is not installed. iLawyer needs this plugin to work <a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>');
		}
        deactivate_plugins( plugin_basename( __FILE__ ) );
	}


	//gOOOOOOD
}


register_activation_hook(__FILE__,'_ilaw_sm_activate');


	
// ACF NAV menu Field
if(!class_exists( 'ACF_Nav_Menu_Field_Plugin' ) ){
	
	require_once( plugin_dir_path( __FILE__ ) . '/ilaw-nav-field-bulk-edit-support/index.php');

}else{
	add_action('admin_notices',function(){
		_ilaw_bundle_create_admin_error('iLawyer bundle plugin is activated but ilaw-nav-field-bulk-edit-support is already installed','warning');
	});
}

//Bulk edit
if(!function_exists( 'ACFQuickEdit\__autoload' ) ){
	//Bulk edit
	require_once( plugin_dir_path( __FILE__ ) . '/acf-quick-edit-fields/index.php' );
	
}else{
	add_action('admin_notices',function(){
		_ilaw_bundle_create_admin_error('iLawyer bundle plugin is activated but acf-quick-edit-fields is already installed','warning');
	});
};


require_once( plugin_dir_path( __FILE__ ) . '/ilaw-nav-field-bulk-edit-support/index.php');