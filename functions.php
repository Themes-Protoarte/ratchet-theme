<?php
/**
 * Ratchet functions and definitions
 *
 */


function ratchet_setup() {

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'ratchet' ) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );

}

add_action( 'after_setup_theme', 'ratchet_setup' );


/*
 *
 * Enqueue scripts and styles for front-end.
 *
 */
function ratchet_scripts_styles() {
	
	global $wp_styles;

	// Adds Ratchet JavaScript 
	wp_enqueue_script( 'ratchet', get_template_directory_uri() . '/js/ratchet.min.js', array(), null, true );

	// Loads our main stylesheet.
	wp_enqueue_style( 'ratchet-style', get_stylesheet_uri() );

}

add_action( 'wp_enqueue_scripts', 'ratchet_scripts_styles' );


/*
 *
 * Get a metadata item for a post thumbnail (featured image)
 *
 */
function get_post_thumbnail_field( $field = ‘caption’, $post_id = NULL, $suppress_filters = FALSE ) 
{
	$attachment_id = get_post_thumbnail_id( $post_id );

	if ( $attachment_id ) {

		$data = wp_prepare_attachment_for_js( $attachment_id );
		$field = $data[$field];

		if ( $suppress_filters ) return $field;

		return apply_filters(‘get_post_thumbnail_field’, $field);
	}
	
	return NULL;
}


/*
 *
 * Output the metadata value for a post thumbnail (featured image)
 *
 */
function the_post_thumbnail_field( $field = ‘caption’, $post_id = NULL, $suppress_filters = FALSE ) 
{
	echo get_post_thumbnail_field( $field, $post_id, $suppress_filters );
}


/*
 *
 * Output an unordered list for a popover table (tags or categories)
 *
 */
function ratchet_popover_table( $term_type='category' ) {

	$terms = get_terms( $term_type );
 						
 	if ( !empty( $terms ) && !is_wp_error( $terms ) ){

		echo '<ul class="table-view">';

		foreach ( $terms as $term ) {
       		echo '<li class="table-view-cell"><a href="' . get_term_link( $term ). '">' . $term->name . '</a></li>';
        }
        
        echo '</ul>';
	}  					  					
}