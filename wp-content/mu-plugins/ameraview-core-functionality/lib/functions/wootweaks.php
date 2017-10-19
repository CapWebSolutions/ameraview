<?php
/**
 * WooCommerce Tweaks
 *
 * This file includes any custom WooCommerce tweaks
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/billerickson/Core-Functionality
 * @author       Bill Erickson <bill@billerickson.net>
 * @copyright    Copyright (c) 2011, Bill Erickson
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */


/*
 * wc_remove_related_products
 *
 * Clear the query arguments for related products so none show.
 * Add this code to your theme functions.php file.
 */
function wc_remove_related_products( $args ) {
	return array();
}
add_filter( 'woocommerce_related_products_args','wc_remove_related_products', 10 );

/**
 * woo_hide_page_title
 *
 * Removes the "shop" title on the main shop page
 *
 * @access      public
 * @since       1.0
 * @return      void
 */
function woo_hide_page_title() {
	return false;
}
add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );


// This new gallery is off by default for custom and 3rd party themes since it's common to disable the WooCommerce gallery 
// and replace with your own. To enable the gallery, you can declare support like this

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );

/**
* @snippet Remove the Category Counters | WooCommerce Shop / Loop
* @how-to Watch tutorial @ https://businessbloomer.com/?p=19055
* @sourcecode https://businessbloomer.com/?p=362
* @author Rodolfo Melogli
* @testedwith WooCommerce 3.1.0
*/

add_filter( 'woocommerce_subcategory_count_html', '__return_null' );

/**
 * Let's turn off that Ship to a different address box!
 */
add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false');