<?php
/**
 * Ratchet functions and definitions
 *
 */

// Set up the content width value based on the theme's design and stylesheet.
// if ( ! isset( $content_width ) )
//	$content_width = 625;

/**
 * Twenty Twelve setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */
function ratchet_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 */

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'ratchet' ) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'ratchet_setup' );

/**
 * Enqueue scripts and styles for front-end.
 */
function ratchet_scripts_styles() {
	
	global $wp_styles;

	// Adds Ratchet JavaScript 
	wp_enqueue_script( 'ratchet', get_template_directory_uri() . '/js/ratchet.min.js', array(), null, true );

	// Loads our main stylesheet.
	wp_enqueue_style( 'ratchet-style', get_stylesheet_uri() );

}

add_action( 'wp_enqueue_scripts', 'ratchet_scripts_styles' );