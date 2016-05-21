<?php
/**
 * Techfind Theme Customizer.
 *
 * @package Techfind
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function techfind_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Primary color setting
	$wp_customize->add_setting( 'primary_color' , array(
		'sanitize_callback'	=> 'glob_sanitize_hex_color',
		'default'     => '#c70909',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
		'label'        => __( 'Primary Color', 'glob' ),
		'section'    => 'colors',
		'settings'   => 'primary_color',
	) ) );

	// Second color setting
	$wp_customize->add_setting( 'secondary_color' , array(
		'default'     => '#333',
		'sanitize_callback'	=> 'glob_sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
		'label'        => __( 'Secondary Color', 'glob' ),
		'section'    => 'colors',
		'settings'   => 'secondary_color',
	) ) );


}
add_action( 'customize_register', 'techfind_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function techfind_customize_preview_js() {
	wp_enqueue_script( 'techfind_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'techfind_customize_preview_js' );



/*------------------------------------------------------------------------*/
/*  Glob Sanitize Functions.
/*------------------------------------------------------------------------*/

function glob_sanitize_file_url( $file_url ) {
	$output = '';
	$filetype = wp_check_filetype( $file_url );
	if ( $filetype["ext"] ) {
		$output = esc_url( $file_url );
	}
	return $output;
}

function glob_sanitize_number( $input ) {
    return force_balance_tags( $input );
}

function glob_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function glob_sanitize_hex_color( $color ) {
	if ( $color === '' ) {
		return '';
	}
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return $color;
	}
	return null;
}
function glob_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function glob_sanitize_text( $string ) {
	return wp_kses_post( balanceTags( $string ) );
}

function glob_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}
