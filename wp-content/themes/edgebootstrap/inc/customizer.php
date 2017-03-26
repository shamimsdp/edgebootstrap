<?php
/**
 * edgebootstrap Theme Customizer
 *
 * @package edgebootstrap
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'edgebootstrap_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function edgebootstrap_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'edgebootstrap_customize_register' );

if ( ! function_exists( 'edgebootstrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function edgebootstrap_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'edgebootstrap_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'edgebootstrap' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'edgebootstrap' ),
			'priority'    => 160,
		) );

		$wp_customize->add_setting( 'edgebootstrap_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'container_type', array(
					'label'       => __( 'Container Width', 'edgebootstrap' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'edgebootstrap' ),
					'section'     => 'edgebootstrap_theme_layout_options',
					'settings'    => 'edgebootstrap_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'edgebootstrap' ),
						'container-fluid' => __( 'Full width container', 'edgebootstrap' ),
					),
					'priority'    => '10',
				)
			) );

		$wp_customize->add_setting( 'edgebootstrap_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'edgebootstrap_sidebar_position', array(
					'label'       => __( 'Sidebar Positioning', 'edgebootstrap' ),
					'description' => __( "Set sidebar's default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.",
					'edgebootstrap' ),
					'section'     => 'edgebootstrap_theme_layout_options',
					'settings'    => 'edgebootstrap_sidebar_position',
					'type'        => 'select',
					'choices'     => array(
						'right' => __( 'Right sidebar', 'edgebootstrap' ),
						'left'  => __( 'Left sidebar', 'edgebootstrap' ),
						'both'  => __( 'Left & Right sidebars', 'edgebootstrap' ),
						'none'  => __( 'No sidebar', 'edgebootstrap' ),
					),
					'priority'    => '20',
				)
			) );
	}
} // endif function_exists( 'edgebootstrap_theme_customize_register' ).
add_action( 'customize_register', 'edgebootstrap_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'edgebootstrap_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function edgebootstrap_customize_preview_js() {
		wp_enqueue_script( 'edgebootstrap_customizer', get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ), '20130508', true );
	}
}
add_action( 'customize_preview_init', 'edgebootstrap_customize_preview_js' );
