<?php
/*
Plugin Name: Simple Membership Form Shortcode
Description: Simple Membership Addon to generate form shortcode for specific membership level.
Plugin URI: https://simple-membership-plugin.com/
Author: wp.insider
Author URI: https://simple-membership-plugin.com/
Version: 1.0.0
*/

define('SWPM_FORM_SHORTCODE_VERSION', '1.0.0' );
define('SWPM_FORM_SHORTCODE_PATH', dirname(__FILE__) . '/');
define('SWPM_FORM_SHORTCODE_URL', plugins_url('',__FILE__));
add_action('plugins_loaded', 'swpm_load_form_shortcode');

function swpm_load_form_shortcode(){
    if (class_exists('SimpleWpMembership')) {
        add_action('admin_menu', 'swpm_form_shortcode_menu');
    }
}

function swpm_form_shortcode_menu(){
        add_submenu_page('simple_wp_membership',
                        BUtils::_('Form Shortcode'),
                        BUtils::_('Form Shortcode'),
                        'manage_options',
                        'swpm-form-shortcode', 'swpm_form_shortcode');    
}

function swpm_form_shortcode(){
    require_once(SWPM_FORM_SHORTCODE_PATH . 'views/shortcode_generator.php');
}