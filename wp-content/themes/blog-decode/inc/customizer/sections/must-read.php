<?php
/**
 * Must Read options.
 *
 * @package Blog Decode Pro
 */

$default = blog_decode_get_default_theme_options();

// Must Read Section
$wp_customize->add_section( 'section_home_mustread',
	array(
		'title'      => __( 'Must Read Posts', 'blog-decode' ),
		'priority'   => 31,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_mustread_section]',
	array(
		'default'           => $default['disable_mustread_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_decode_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Blog_Decode_Switch_Control( $wp_customize, 'theme_options[disable_mustread_section]',
    array(
		'label' 			=> __('Enable/Disable Must Read Section', 'blog-decode'),
		'section'    		=> 'section_home_mustread',
		 'settings'  		=> 'theme_options[disable_mustread_section]',
		'on_off_label' 		=> blog_decode_switch_options(),
    )
) );

//Must Read Section title
$wp_customize->add_setting('theme_options[mustread_title]', 
	array(
	'default'           => $default['mustread_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[mustread_title]', 
	array(
	'label'       => __('Section Title', 'blog-decode'),
	'section'     => 'section_home_mustread',   
	'settings'    => 'theme_options[mustread_title]',
	'active_callback' => 'blog_decode_mustread_active',		
	'type'        => 'text'
	)
);

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[mustread_category_enable]', array(
	'default'           => $default['mustread_category_enable'],
	'sanitize_callback' => 'blog_decode_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[mustread_category_enable]', array(
	'label'             => esc_html__( 'Enable Category', 'blog-decode' ),
	'section'           => 'section_home_mustread',
	'type'              => 'checkbox',
	'active_callback' => 'blog_decode_mustread_active',
) );	

for( $i=1; $i<=6; $i++ ){

	// Posts
	$wp_customize->add_setting('theme_options[mustread_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'blog_decode_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[mustread_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'blog-decode'), $i),
		'section'     => 'section_home_mustread',   
		'settings'    => 'theme_options[mustread_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => blog_decode_post_choices(),
		'active_callback' => 'blog_decode_mustread_active',
		)
	);
}