<?php
/**
 * Check and setup theme's default settings
 *
 * @package edgebootstrap
 *
 */
function setup_theme_default_settings() {

	// check if settings are set, if not set defaults.
	// Caution: DO NOT check existence using === always check with == .
	// Latest blog posts style.
	$edgebootstrap_posts_index_style = get_theme_mod( 'edgebootstrap_posts_index_style' );
	if ( '' == $edgebootstrap_posts_index_style ) {
		set_theme_mod( 'edgebootstrap_posts_index_style', 'default' );
	}

	// Sidebar position.
	$edgebootstrap_sidebar_position = get_theme_mod( 'edgebootstrap_sidebar_position' );
	if ( '' == $edgebootstrap_sidebar_position ) {
		set_theme_mod( 'edgebootstrap_sidebar_position', 'right' );
	}

	// Container width.
	$edgebootstrap_container_type = get_theme_mod( 'edgebootstrap_container_type' );
	if ( '' == $edgebootstrap_container_type ) {
		set_theme_mod( 'edgebootstrap_container_type', 'container' );
	}
}
