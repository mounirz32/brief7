<?php
/**
 * Featured options.
 *
 * @package Blog Decode
 */

$default = blog_decode_get_default_theme_options();

// Featured Section
$wp_customize->add_section( 'section_home_featured',
	array(
		'title'      => __( 'Featured post Section', 'blog-decode' ),
		'priority'   => 15,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_featured_section]',
	array(
		'default'           => $default['disable_featured_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_decode_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Blog_Decode_Switch_Control( $wp_customize, 'theme_options[disable_featured_section]',
    array(
		'label' 			=> __('Enable/Disable Featured Section', 'blog-decode'),
		'section'    		=> 'section_home_featured',
		'settings'  		=> 'theme_options[disable_featured_section]',
		'on_off_label' 		=> blog_decode_switch_options(),
    )
) );

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[featured_layout_option]', array(
	'default'           => $default['featured_layout_option'],
	'sanitize_callback' => 'blog_decode_sanitize_select',
) );

$wp_customize->add_control( 'theme_options[featured_layout_option]', array(
	'label'             => esc_html__( 'Choose Featured Layout', 'blog-decode' ),
	'section'           => 'section_home_featured',
	'type'              => 'radio',
	'active_callback' => 'blog_decode_featured_active',
	'choices'				=> array( 
		'default-featured'     => esc_html__( 'Default Design(Text Over Image)', 'blog-decode' ), 
		'featured-two'     => esc_html__( 'Design Two(Text Under Image)', 'blog-decode' ),
		)
) );


for( $i=1; $i<=5; $i++ ){

	// Additional Information First Post
	$wp_customize->add_setting('theme_options[featured_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'blog_decode_dropdown_posts'
		)
	);
	$wp_customize->add_control( new Blog_Decode_Dropdown_Chooser( $wp_customize,'theme_options[featured_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'blog-decode'), $i),
		'section'     => 'section_home_featured',  
		'settings'    => 'theme_options[featured_post_'.$i.']',	
		'choices'			=> blog_decode_post_choices(),	
		'type'        => 'dropdown-posts',
		'active_callback' => 'blog_decode_featured_active',
		)
	));
}
