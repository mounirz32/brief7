<?php 
/**
 * Theme Options.
 *
 * @package Blog Decode
 */

$default = blog_decode_get_default_theme_options();

// Single Page Setting Section starts
$wp_customize->add_section('section_single_page', 
	array(    
	'title'       => __('Single Page Option', 'blog-decode'),
	'panel'       => 'theme_option_panel'    
	)
);

// Add Single Header Image enable setting and control.
$wp_customize->add_setting( 'theme_options[single_page_header_image_enable]', array(
	'default'           => $default['single_page_header_image_enable'],
	'sanitize_callback' => 'blog_decode_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[single_page_header_image_enable]', array(
	'label'             => esc_html__( 'Enable Header Image', 'blog-decode' ),
	'section'           => 'section_single_page',
	'type'              => 'checkbox',

) );

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[single_page_image_enable]', array(
	'default'           => $default['single_page_image_enable'],
	'sanitize_callback' => 'blog_decode_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[single_page_image_enable]', array(
	'label'             => esc_html__( 'Enable Featured Image', 'blog-decode' ),
	'section'           => 'section_single_page',
	'type'              => 'checkbox',

) );