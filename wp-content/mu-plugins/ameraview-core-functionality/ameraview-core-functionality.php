<?php
/**
 * Plugin Name: Ameraview Core Functionality
 * Plugin URI: https://github.com/CapWebSolutions/ameraview
 * Description: This contains all this site's core functionality so that it is theme independent. 
 * Version: 1.0.0
 * Author: Cap Web Solutions
 * Author URI: https://capwebsolutions.com
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

// Plugin Directory. Set constant so we know where we are installed
define( 'CWS_DIR', dirname( __FILE__ ) );

// General. This should always be used. 
include_once( CWS_DIR . '/lib/functions/general.php' );

// Custom logon logo Setup.This should always be used too. Just sayin 
include_once( CWS_DIR . '/lib/functions/custom-logon-logo.php' );

// Define needed Custom Post Types.
// include_once( CWS_DIR . '/lib/functions/post-types.php' );

// Define needed Custom Taxonomies.
// include_once( CWS_DIR . '/lib/functions/taxonomies.php' );

// Define Custom Meta boxes.
// include_once( CWS_DIR . '/lib/functions/metaboxes.php' );

// Footer Setup.This should always be used. 
include_once( CWS_DIR . '/lib/functions/core-footer.php' );

// Woo tweaks. Only if WooCommerce active.
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
// or if ( class_exists( 'WooCommerce' ) ) {
	include_once( CWS_DIR . '/lib/functions/wootweaks.php' );
}


// Gravity Forms tweaks. This should always be used if Gravity Forms active. Which one to use??
if ( in_array( 'gravityforms/gravityforms.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	include_once( CWS_DIR . '/lib/functions/gravitytweaks.php' );
}
// or 
if ( class_exists( 'GFForms' ) ) { 
	include_once( CWS_DIR . '/lib/functions/gravitytweaks.php' );
}