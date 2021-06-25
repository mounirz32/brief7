<?php
/**
 * Header options.
 *
 * @package Blog Decode
 */

$default = blog_decode_get_default_theme_options();

// Header Author Section
$wp_customize->add_section( 'section_home_header',
	array(
		'title'      => __( 'Header', 'blog-decode' ),
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_header_background_section]',
	array(
		'default'           => $default['disable_header_background_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_decode_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Blog_Decode_Switch_Control( $wp_customize, 'theme_options[disable_header_background_section]',
    array(
		'label' 			=> __('Enable/Disable Header Background Image', 'blog-decode'),
		'section'    		=> 'section_home_header',
		 'settings'  		=> 'theme_options[disable_header_background_section]',
		'on_off_label' 		=> blog_decode_switch_options(),
    )
) );

// header title setting and control
$wp_customize->add_setting( 'theme_options[header_background_image]', array(
	'type'              => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[header_background_image]', array(
	'label'           	=> esc_html__( 'Select Header Background', 'blog-decode' ),
	'section'        	=> 'section_home_header',
	'settings'    		=> 'theme_options[header_background_image]',	
	'active_callback' 	=> 'blog_decode_header_background_active',
) ) );

// Number of items
$wp_customize->add_setting('theme_options[header_top_buttom_padding]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'blog_decode_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[header_top_buttom_padding]', 
	array(
	'label'       => __('Top Bottom Padding', 'blog-decode'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 160.', 'blog-decode'),
	'section'     => 'section_home_header',   
	'settings'    => 'theme_options[header_top_buttom_padding]',		
	'type'        => 'number',
	'input_attrs' => array(
			'min'	=> 10,
			'max'	=> 160,
			'step'	=> 1,
		),
	)
);