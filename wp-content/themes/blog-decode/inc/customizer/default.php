<?php
/**
 * Default theme options.
 *
 * @package Blog Decode
 */

if ( ! function_exists( 'blog_decode_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function blog_decode_get_default_theme_options() {

	$theme_data = wp_get_theme();
	$defaults = array();

	$defaults['disable_homepage_content_section'] 			= true;
    $defaults['show_header_social_links'] 			= true;
    $defaults['disable_header_background_section'] 	= false;
    $defaults['show_header_search'] 				= false;

	// Featured Slider Section
	$defaults['disable_featured-slider_section']	= false;
	$defaults['number_of_sr_column']				= 1;
	$defaults['slider_layout_option']				= 'default-slider';
	$defaults['slider_speed']						= 800;
	$defaults['disable_white_overlay']				= false;
	$defaults['disable_blog_banner_section']		= false;
	$defaults['slider_content_enable']				= true;


	// Popular Section
	$defaults['disable_popular_section']			= false;
	$defaults['popular_title']	   	 				= esc_html__( 'Popular Posts', 'blog-decode' );
	$defaults['circle_image']						= false;


	// Featured Section
	$defaults['disable_featured_section']			= false;
	$defaults['featured_readmore_text']	   	 		= esc_html__( 'Read More', 'blog-decode' );
	$defaults['featured_layout_option']				= 'featured-two';


	// Latest Posts Section

	$defaults['latest_posts_title']	   	 			= esc_html__( 'Recent New More Stories', 'blog-decode' );
	$defaults['number_of_latest_posts_column']		= 3;
	$defaults['pagination_type']					= 'default';

	//Sensational Section
	$defaults['disable_sensational_section']		= false;
	$defaults['sensational_title']	   	 			= esc_html__( 'Sensational Posts', 'blog-decode' );


	//Must Read Section
	$defaults['disable_mustread_section']	= false;
	$defaults['mustread_title']	   	 		= esc_html__( 'Must Read Posts', 'blog-decode' );
	$defaults['mustread_category_enable']		= true;

	// Single Post Option
	$defaults['single_post_image_enable']			= true;
	$defaults['single_post_header_image_enable']	= false;

	// Single Post Option

	$defaults['single_page_image_enable']			= true;
	$defaults['single_page_header_image_enable']	= false;
	
	//General Section
	$defaults['excerpt_length']						= 20;
	$defaults['layout_options_blog']				= 'right-sidebar';
	$defaults['layout_options_archive']				= 'right-sidebar';
	$defaults['layout_options_page']				= 'right-sidebar';	
	$defaults['layout_options_single']				= 'right-sidebar';	

	//Footer section 		
	$defaults['copyright_text']						= esc_html__( 'Copyright &copy; All rights reserved.', 'blog-decode' );

	// Pass through filter.
	$defaults = apply_filters( 'blog_decode_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'blog_decode_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function blog_decode_get_option( $key ) {

		$default_options = blog_decode_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;