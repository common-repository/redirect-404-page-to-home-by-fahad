<?php
/*
Plugin Name: Redirect 404 Page to Home - by Fahad
Author:      Fahad Bin Zafar
Author URI:  https://fahadbinzafar.com
Version:     2.1.1
Description: Divert all of the 404 broken pages to your home page. Its Hassel Free, Just Simply Add, install and active. 
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/



/**
* @version 2.1.1
  Redirect Broken 404 Page to Home
*/

global $wpdb;

add_action('admin_menu', 'plugin_options_404');

// Plugin Page Option 
function plugin_options_404() {
    add_menu_page(
                      '404 to Home Options',
                      '404 to Home', 
                      'manage_options', 
                      '404-to-home', 
                      'setting_page_404',
                      'dashicons-editor-unlink',
                      '1'
                    );
}

// Main Page 
function setting_page_404()
{

include('plugin_gui.php');

}

add_action( 'admin_init', 'Setting_' );
function Setting_() {
     register_setting( '404_options', 'checked_status' );
     register_setting( '404_options', 'redirect_url' );
     
 }

if(get_option('checked_status')=='true'){
add_action('template_redirect','BrokenPagesToHomePage');
}
function BrokenPagesToHomePage(){
    
	if(is_404()){
	    $url = sanitize_text_field(get_option('redirect_url'));
	    if($url ==""){wp_redirect(home_url(),301);}
	    else{wp_redirect($url,301);}
		}
	
}