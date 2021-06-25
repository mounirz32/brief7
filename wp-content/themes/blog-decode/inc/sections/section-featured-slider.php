<?php 
/**
 * Template part for displaying Featured Slider Section
 *
 *@package Blog Decode
 */
    $slider_column = blog_decode_get_option( 'number_of_sr_column' );
    $slider_category = blog_decode_get_option( 'slider_category' );
    $enable_content     = blog_decode_get_option( 'slider_content_enable' );
    $slider_speed   = blog_decode_get_option( 'slider_speed' );
    $image_overlay   = blog_decode_get_option( 'disable_white_overlay' );
    $header_font_size = blog_decode_get_option( 'slider_font_size');
    ?>
    
<div class="featured-slider-wrapper" 
data-slick='{"slidesToShow": 1,
 "slidesToScroll": 1, 
 "infinite": true, 
 "speed": <?php echo esc_attr( $slider_speed) ?>, 
 "dots": true, 
 "arrows":true, 
 "autoplay": true, 
 "fade": false }'>

    <?php 
        $args = array (

            'posts_per_page' =>3,              
            'post_type' => 'post',
            'post_status' => 'publish',
            'paged' => 1,
            );
            if ( absint( $slider_category ) > 0 ) {
                $args['cat'] = absint( $slider_category );
            } 

    $loop = new WP_Query($args);                        
    if ( $loop->have_posts() ) :
    $i=0;  
        while ($loop->have_posts()) : $loop->the_post(); $i++;?>

            <article class="slick-item" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                <?php 
                    $class='';
                    if (false == $image_overlay) { 
                        $class='image-overlay';
                    } else{
                        $class='content-overlay';
                    }
                    if (false == $image_overlay)  {
                ?>
                    <div class="overlay"></div>
                <?php } ?>
                <div class="wrapper">
                    <div class="<?php echo esc_attr($class); ?> featured-content-wrapper">
                        <header class="entry-header">
                            <div class="entry-meta">
                                <?php blog_decode_entry_meta(); ?>
                            </div><!-- .entry-meta -->
                            <a href="<?php the_permalink();?>" >
                                <h2 class="entry-title"><?php the_title();?></h2>
                            </a>
                        </header>
                        <?php if ( ($enable_content==true)): ?>
                            <div class="entry-content">
                                <?php
                                    $excerpt = blog_decode_the_excerpt( 30 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->
                        <?php endif; ?>

                        <div class="separator"></div>
                        <div class="entry-meta">                 
                            <?php blog_decode_posted_on(); ?>
                        </div><!-- .entry-meta -->
                        <?php
                        $readmore_text   = blog_decode_get_option( 'slider_custom_btn_text_' . $i ); 
                        if ( ! empty( $readmore_text ) ) { ?>
                            <div class="read-more">
                                <a href="<?php the_permalink();?>" class="btn btn-primary"><?php echo esc_html($readmore_text);?></a>
                            </div><!-- .read-more -->
                        <?php } ?>
                    </div><!-- .featured-content-wrapper -->
                </div><!-- .wrapper -->
            </article><!-- .slick-item -->
        <?php endwhile;?>
    <?php endif;?>
    <?php wp_reset_postdata(); ?>
</div><!-- .featured-slider-wrapper -->