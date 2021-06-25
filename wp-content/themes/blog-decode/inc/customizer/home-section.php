<?php
/**
 * Home Page Options.
 *
 * @package Blog Decode
 */

$default = blog_decode_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => __( 'Front Page Sections', 'blog-decode' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

/**
* Section Customizer Options.
*/
require get_template_directory() . '/inc/customizer/sections/header.php';
require get_template_directory() . '/inc/customizer/sections/slider.php';
require get_template_directory() . '/inc/customizer/sections/featured.php';
require get_template_directory() . '/inc/customizer/sections/popular.php';
require get_template_directory() . '/inc/customizer/sections/sensational.php';
require get_template_directory() . '/inc/customizer/sections/must-read.php';
require get_template_directory() . '/inc/customizer/sections/latest.php';
