<?php
/**
 * edgebootstrap enqueue scripts
 *
 * @package edgebootstrap
 */

if ( ! function_exists( 'edgebootstrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function edgebootstrap_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'edgebootstrap-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'edgebootstrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'edgebootstrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'edgebootstrap_scripts' );
