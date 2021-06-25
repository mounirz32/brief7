<?php
/**
 * The template for displaying home page.
 * @package Blog Decode
 */

if ( 'posts' == get_option( 'show_on_front' )  || 'posts' != get_option( 'show_on_front' )){ 
    get_header(); ?>
    <?php $enabled_sections = blog_decode_get_sections();
    if( is_array( $enabled_sections ) ) {
        foreach( $enabled_sections as $section ) {

            if( ( $section['id'] == 'featured-slider' ) ){ ?>
                <?php $disable_featured_slider = blog_decode_get_option( 'disable_featured-slider_section' );
                if( true == $disable_featured_slider): ?>
                    
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <?php $slider_layout = blog_decode_get_option( 'slider_layout_option'); ?>
                        <?php if ($slider_layout=='default-slider'){ ?>
                            <div class="wrapper">
                                <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            </div>
                        <?php } else {
                                 get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); 
                        } ?>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'featured' ) { ?>
                <?php $disable_featured_section = blog_decode_get_option( 'disable_featured_section' );
                if( true ==$disable_featured_section): ?>
                
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                    
            <?php endif; ?>  
            <?php } elseif ( $section['id'] == 'sensational' ) { ?>
                <?php $disable_sensational_section = blog_decode_get_option( 'disable_sensational_section' );
                if( true === $disable_sensational_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section">

                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        
                    </section>
                <?php endif; ?>

            <?php } elseif( $section['id'] == 'popular' ) { ?>
                <?php $disable_popular_section = blog_decode_get_option( 'disable_popular_section' );
                 if( true ==$disable_popular_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section blog-posts">
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>
        <?php } elseif( $section['id'] == 'mustread' ) { ?>
                <?php $disable_mustread_section = blog_decode_get_option( 'disable_mustread_section' );
                 if( true ==$disable_mustread_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="relative page-section">
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>

           <?php
            }
        }
    }
    $disable_homepage_content_section = blog_decode_get_option( 'disable_homepage_content_section' );
    if('posts' == get_option( 'show_on_front' )){ ?>
       <?php include( get_home_template() ); ?>
    <?php } elseif(($disable_homepage_content_section == true ) && ('posts' != get_option( 'show_on_front' ))) { ?>
        <div class="wrapper">
           <?php include( get_page_template() ); ?>
        </div>
     <?php  }
    get_footer();
}