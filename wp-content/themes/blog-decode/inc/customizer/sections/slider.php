<?php
/**
 * Slider options.
 *
 * @package Blog Decode
 */

$default = blog_decode_get_default_theme_options();

// Featured Slider Section
$wp_customize->add_section( 'section_featured_slider',
	array(
		'title'      => __( 'Featured Slider Section', 'blog-decode' ),
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_featured-slider_section]',
	array(
		'default'           => $default['disable_featured-slider_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_decode_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Blog_Decode_Switch_Control( $wp_customize, 'theme_options[disable_featured-slider_section]',
    array(
		'label' 	=> __('Disable slider Section', 'blog-decode'),
		'section'    			=> 'section_featured_slider',
		'on_off_label' 		=> blog_decode_switch_options(),
    )
) );

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_layout_option]', array(
	'default'           => $default['slider_layout_option'],
	'sanitize_callback' => 'blog_decode_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[slider_layout_option]', array(
	'label'             => esc_html__( 'Choose Slider Layout', 'blog-decode' ),
	'section'           => 'section_featured_slider',
	'type'              => 'radio',
	'active_callback' => 'blog_decode_slider_active',
	'choices'				=> array( 
		'default-slider'     => esc_html__( 'Default Slider', 'blog-decode' ), 
		'fullwidth-slider'     => esc_html__( 'Full Width Slider', 'blog-decode' ),
		)
) );

// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_content_enable]', array(
	'default'           => $default['slider_content_enable'],
	'sanitize_callback' => 'blog_decode_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_content_enable]', array(
	'label'             => esc_html__( 'Enable Content', 'blog-decode' ),
	'section'           => 'section_featured_slider',
	'type'              => 'checkbox',
	'active_callback' => 'blog_decode_slider_active',
) );

// Number of items
$wp_customize->add_setting('theme_options[slider_speed]', 
	array(
	'default' 			=> $default['slider_speed'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'blog_decode_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[slider_speed]', 
	array(
	'label'       => __('Slider Speed', 'blog-decode'),
	'description' => __('Slider Speed Default speed 800', 'blog-decode'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[slider_speed]',		
	'type'        => 'number',
	'active_callback' => 'blog_decode_slider_active',
	)
);

// Setting  Slider Category.
$wp_customize->add_setting( 'theme_options[slider_category]',
	array(

	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new blog_decode_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[slider_category]',
		array(
		'label'    => __( 'Select Category', 'blog-decode' ),
		'section'  => 'section_featured_slider',
		'settings' => 'theme_options[slider_category]',	
		'active_callback' => 'blog_decode_slider_active',		
		)
	)
);

for( $i=1; $i<=3; $i++ ){

	// Slider Button Text
	$wp_customize->add_setting('theme_options[slider_custom_btn_text_' . $i . ']', 
		array(

		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[slider_custom_btn_text_' . $i . ']', 
		array(
		'label'       => sprintf( __('Button Label %d', 'blog-decode'),$i ),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_custom_btn_text_' . $i . ']',	
		'active_callback' => 'blog_decode_slider_active',	
		'type'        => 'text',
		)
	);
}