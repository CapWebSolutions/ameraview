<?php
/**
 * General
 *
 * This file contains custom login page logo functions
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/capwebsolutions/starter-core-functionality
 * @author       Matt Ryan <matt@capwebsolutions.com>
 * @copyright    Copyright (c) 2017, Matt Ryan
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

// Replace the WordPress Logo With a Custom Logo
// Optimal size is 320px x 180px
// File name is logon-logo.pgn placed in the /images folder of the active theme.

add_action('login_enqueue_scripts', 'cws_custom_login_logo');
function cws_custom_login_logo() { ?>
	<style type="text/css">
	.login h1 a { 
		background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logon-logo.png) !important;
		background-size: 320px 180px !important; 
		width:320px !important; 
		height:180px !important; 
		}
	</style>
<?php
}

add_action('login_enqueue_scripts', 'cws_custom_login_bg');
function cws_custom_login_bg() { ?>
	<style type="text/css">
	body.login { 
		background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logon-bg.png) !important;
		-webkit-background-size: cover; 
		-moz-background-size: cover; 
		-o-background-size: cover; 
		background-size: cover;
		}
	</style>
<?php
}

// Now let's pull in some custom styles for the page
add_action('login_enqueue_scripts', 'cws_get_custom_login_styles');
function cws_get_custom_login_styles() { ?>
	<link rel="stylesheet" type="text/css" href="' . plugins_url('/assets/css', __FILE__) . '/custom-login-styles.css" />'
<?php
}

/*
Change the Login Logo URL << this is the URL that the login logo points to....
We want it to go to the front of our website. Tweak the title too. */
add_filter( 'login_headerurl', 'cws_login_logo_url' );
function cws_login_logo_url() {
	return get_bloginfo( 'url' );
}

add_filter( 'login_headertitle', 'cws_login_logo_url_title' );
function cws_login_logo_url_title() {
	return get_bloginfo( 'url' );
}

/*
 Hide the Login Error Message

 When you enter an incorrect username or password, the login page returns 
 an error message telling you which details you got wrong. If your username i
 s correct but password is wrong, it will say your password was wrong. 
 If you typed the wrong username, it says “Invalid Username.” While the 
 message may be helpful for you, the problem is that hackers can use this 
 information to guess your login credentials and gain access to your website.
*/
add_filter('login_errors', 'cws_login_error_override');
function cws_login_error_override() {
    return 'Incorrect login details. Try again.';
}

// Remove the REALLY ANNOYING Login Page Shake
add_action('login_head', 'cws_login_head');
function cws_login_head() {
	remove_action('login_head', 'wp_shake_js', 12);
}

// Change the Redirect URL. Where do we go when we log into the site. 
add_filter("login_redirect", "cws_admin_login_redirect", 10, 3);
function cws_admin_login_redirect( $redirect_to, $request, $user ) {
	global $user;
	if( isset( $user->roles ) && is_array( $user->roles ) ) {
		if( in_array( "administrator", $user->roles ) ) {
				return $redirect_to;
		} else {
				return home_url();
		}
	} else {
		return $redirect_to;
	}
}  // end function def


// Set “Remember Me” To Checked

add_action( 'init', 'cws_login_checked_remember_me' );
function cws_login_checked_remember_me() {
	add_filter( 'login_footer', 'cws_rememberme_checked' );
}

function cws_rememberme_checked() { ?>
	<script>
	document.getElementById('rememberme').checked = true;
	</script>";

<?php
}
