<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog Decode
 */
/**
* Hook - blog_decode_action_doctype.
*
* @hooked blog_decode_doctype -  10
*/
do_action( 'blog_decode_action_doctype' );
?>
<head>
<?php
/**
* Hook - blog_decode_action_head.
*
* @hooked blog_decode_head -  10
*/
do_action( 'blog_decode_action_head' );
$header_font_size = blog_decode_get_option( 'header_top_buttom_padding');
?>
<style >
	.site-menu{
		padding: <?php echo esc_attr( $header_font_size) ?>px 50px !important;
	}

</style>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<?php

/**
* Hook - blog_decode_action_before.
*
* @hooked blog_decode_page_start - 10
*/
do_action( 'blog_decode_action_before' );

/**
*
* @hooked blog_decode_header_start - 10
*/
do_action( 'blog_decode_action_before_header' );

/**
*
*@hooked blog_decode_site_branding - 10
*@hooked blog_decode_header_end - 15 
*/
do_action('blog_decode_action_header');

/**
*
* @hooked blog_decode_content_start - 10
*/
do_action( 'blog_decode_action_before_content' );

/**
 * Banner start
 * 
 * @hooked blog_decode_banner_header - 10
*/
do_action( 'blog_decode_banner_header' );  
