<?php
/**
 * Agency Ecommerce Theme Customizer.
 *
 * @package Agency_Ecommerce
 */

/**
 * Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function agency_ecommerce_customize_register( $wp_customize ) {

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'            => '.site-title a',
			'container_inclusive' => false,
			'render_callback'     => 'agency_ecommerce_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'            => '.site-description',
			'container_inclusive' => false,
			'render_callback'     => 'agency_ecommerce_customize_partial_blogdescription',
		) );
	}

	// Sanitization.
	require_once trailingslashit( get_template_directory() ) . '/core/customizer/sanitize.php';

	// Active callback.
	require_once trailingslashit( get_template_directory() ) . '/core/customizer/customizer-helper.php';

	// Load options.
	require_once trailingslashit( get_template_directory() ) . '/core/customizer/sections.php';


}
add_action( 'customize_register', 'agency_ecommerce_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function agency_ecommerce_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function agency_ecommerce_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Enqueue style for custom customize control.
 */
function agency_ecommerce_custom_customize_enqueue() {
	wp_enqueue_style( 'agency-ecommerce-customize', get_template_directory_uri() . '/core/customizer/css/customize-controls.css' );

}
add_action( 'customize_controls_enqueue_scripts', 'agency_ecommerce_custom_customize_enqueue' );