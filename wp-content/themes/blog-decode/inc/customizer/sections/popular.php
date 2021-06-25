<?php
/**
 * Features options.
 *
 * @package Blog Decode
 */

$default = blog_decode_get_default_theme_options();

// Features Section
$wp_customize->add_section( 'section_home_popular',
	array(
		'title'      => __( 'Popular Posts ', 'blog-decode' ),
		'priority'   => 30,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_popular_section]',
	array(
		'default'           => $default['disable_popular_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_decode_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Blog_Decode_Switch_Control( $wp_customize, 'theme_options[disable_popular_section]',
    array(
		'label' 			=> __('Enable/Disable Features Section', 'blog-decode'),
		'section'    		=> 'section_home_popular',
		 'settings'  		=> 'theme_options[disable_popular_section]',
		'on_off_label' 		=> blog_decode_switch_options(),
    )
) );

//Features Section title
$wp_customize->add_setting('theme_options[popular_title]', 
	array(
	'default'           => $default['popular_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[popular_title]', 
	array(
	'label'       => __('Section Title', 'blog-decode'),
	'section'     => 'section_home_popular',   
	'settings'    => 'theme_options[popular_title]',
	'active_callback' => 'blog_decode_popular_active',		
	'type'        => 'text'
	)
);
$wp_customize->add_setting( 'theme_options[circle_image]',
	array(
		'default'           => $default['circle_image'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_decode_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Blog_Decode_Switch_Control( $wp_customize, 'theme_options[circle_image]',
    array(
		'label' 			=> __('Enable/Disable circle image ', 'blog-decode'),
		'section'    		=> 'section_home_popular',
		 'settings'  		=> 'theme_options[circle_image]',
		'on_off_label' 		=> blog_decode_switch_options(),
		'active_callback' 	=> 'blog_decode_popular_active',
    )
) );

// Setting  Blog Category.
$wp_customize->add_setting( 'theme_options[popular_category]',
	array(

	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new blog_decode_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[popular_category]',
		array(
		'label'    => __( 'Select Category', 'blog-decode' ),
		'section'  => 'section_home_popular',
		'settings' => 'theme_options[popular_category]',	
		'active_callback' => 'blog_decode_popular_active',		
		'priority' => 100,
		)
	)
);

