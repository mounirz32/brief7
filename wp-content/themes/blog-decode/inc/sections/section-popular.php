<?php 
/**
 * Template part for displaying Services Section
 *
 *@package Blog Decode
 */

$popular_title       = blog_decode_get_option( 'popular_title' );
$popular_category = blog_decode_get_option( 'popular_category' );

?>
<div class="wrapper"> 
    <?php if( !empty($popular_title)):?>
        <div class="section-header">
            <?php if( !empty($popular_title)):?>
                <h2 class="section-title"><?php echo esc_html($popular_title);?></h2>
            <?php endif;?>
        </div>       
    <?php endif;?>       
    <div class="section-content clear">
        <?php $args = array (

                'posts_per_page' =>8,              
                'post_type' => 'post',
                'post_status' => 'publish',
                'paged' => 1,
                );
                if ( absint( $popular_category ) > 0 ) {
                    $args['cat'] = absint( $popular_category );
                }
            $circle_image = blog_decode_get_option( 'circle_image');
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); ?>  
                    <article class="<?php echo (has_post_thumbnail() ? 'has' : 'no'); ?>-post-thumbnail <?php echo ( ( true == $circle_image ) && !( $i%4 == 0 ) ) ? 'circle-image' : ''; ?> <?php echo ( ( 0 == $i ) || ( $i%4 == 0 ) ) ? 'full-width' : 'half-width'; ?>">
                        <div class="post-item-wrapper">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'blog-thumbnails');?>');">
                                    <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>

                            <div class="entry-container">
                                <span class="cat-links">
                                    <?php blog_decode_entry_meta(); ?>
                                </span><!-- .cat-links -->
                                <header class="entry-header">
                                    <h2 class="entry-title" ><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <?php
                                        if ( ( 0 == $i ) || ( $i%4 == 0 ) ) {
                                            $excerpt = blog_decode_the_excerpt( 100 );
                                            echo wp_kses_post( wpautop( $excerpt ) );
                                        } else {
                                                $excerpt = blog_decode_the_excerpt( 20 );
                                                echo wp_kses_post( wpautop( $excerpt ) );
                                            }
                                    ?>
                                </div><!-- .entry-content -->
                                <div class="entry-meta posted-on">
                                    <?php blog_decode_posted_on(); ?>
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-container -->
                        </div><!-- .post-item-wrapper -->
                    </article>
                <?php $i++; ?>
                <?php endwhile;?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
    </div>  
</div>