<?php
/**
 * Sensational options.
 *
 * @package Blog Decode
 */

$default = blog_decode_get_default_theme_options();

// Sensational Section
$wp_customize->add_section( 'section_home_sensational',
	array(
		'title'      => __( 'Sensational Posts', 'blog-decode' ),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_sensational_section]',
	array(
		'default'           => $default['disable_sensational_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_decode_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Blog_Decode_Switch_Control( $wp_customize, 'theme_options[disable_sensational_section]',
    array(
		'label' 			=> __('Enable/Disable Sensational Section', 'blog-decode'),
		'section'    		=> 'section_home_sensational',
		 'settings'  		=> 'theme_options[disable_sensational_section]',
		'on_off_label' 		=> blog_decode_switch_options(),
    )
) );

//Sensational Section title
$wp_customize->add_setting('theme_options[sensational_title]', 
	array(
	'default'           => $default['sensational_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[sensational_title]', 
	array(
	'label'       => __('Section Title', 'blog-decode'),
	'section'     => 'section_home_sensational',   
	'settings'    => 'theme_options[sensational_title]',
	'active_callback' => 'blog_decode_sensational_active',		
	'type'        => 'text'
	)
);

for( $i=1; $i<=6; $i++ ){

	// Posts
	$wp_customize->add_setting('theme_options[sensational_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'blog_decode_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[sensational_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'blog-decode'), $i),
		'section'     => 'section_home_sensational',   
		'settings'    => 'theme_options[sensational_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => blog_decode_post_choices(),
		'active_callback' => 'blog_decode_sensational_active',
		)
	);
}