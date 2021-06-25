<?php

$default = blog_decode_get_default_theme_options();
/**
* Add Header Top Panel
*/
$wp_customize->add_panel( 'header_top_panel', array(
    'title'          => __( 'Header Top', 'blog-decode' ),
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
) );

/** Header social links section */
$wp_customize->add_section(
    'header_search_section',
    array(
        'title'    => __( 'Search Form', 'blog-decode' ),
        'panel'    => 'header_top_panel',
        'priority' => 20,
    )
);

/** Header social links control */
$wp_customize->add_setting( 'theme_options[show_header_search]',
    array(

        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'blog_decode_sanitize_switch_control',
    )
);
$wp_customize->add_control( new Blog_Decode_Switch_Control( $wp_customize, 'theme_options[show_header_search]',
    array(
        'label'             => __('Show Search', 'blog-decode'),
        'section'           => 'header_search_section',
         'settings'         => 'theme_options[show_header_search]',
        'on_off_label'      => blog_decode_switch_options(),
    )
) );

/** Header social links section */
$wp_customize->add_section(
    'header_social_links_section',
    array(
        'title'    => __( 'Social Links', 'blog-decode' ),
        'panel'    => 'header_top_panel',
        'priority' => 20,
    )
);

/** Header social links control */
$wp_customize->add_setting( 'theme_options[show_header_social_links]',
    array(

        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'blog_decode_sanitize_switch_control',
    )
);
$wp_customize->add_control( new Blog_Decode_Switch_Control( $wp_customize, 'theme_options[show_header_social_links]',
    array(
        'label'             => __('Show Social Links', 'blog-decode'),
        'section'           => 'header_social_links_section',
         'settings'         => 'theme_options[show_header_social_links]',
        'on_off_label'      => blog_decode_switch_options(),
    )
) );

for( $i=1; $i<=4; $i++ ){

    // Setting social_links.
    $wp_customize->add_setting('theme_options[header_social_link_'.$i.']', array(
            'sanitize_callback' => 'esc_url_raw',
        ) );

    $wp_customize->add_control('theme_options[header_social_link_'.$i.']', array(
        'label'             => esc_html__( 'Social Links', 'blog-decode' ),
        'section'           => 'header_social_links_section',
        'active_callback'   => 'blog_decode_social_links_active',
        'type'              => 'url',
    ) );
}