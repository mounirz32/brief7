<?php 

    $featured_content_type     = blog_decode_get_option( 'featured_content_type' );
    $number_of_featured_items  = blog_decode_get_option( 'number_of_featured_items' );
    $featured_btn_txt = blog_decode_get_option( 'featured_readmore_text' );
    for( $i=1; $i<=5; $i++ ) :
        $featured_post_posts[] = absint(blog_decode_get_option( 'featured_post_'.$i ) );
    endfor;

?>
        
<div class="section-content col-3 clear">
    <?php
        $args = array (
            'post_type'     => 'post',
            'post_per_page' => 5,
            'post__in'      => $featured_post_posts,
            'orderby'       =>'post__in', 
        ); 
            
        $loop = new WP_Query($args);                        
        if ( $loop->have_posts() ) :
            $i=0;  
            while ($loop->have_posts()) : $loop->the_post(); $i++;?>  
                <article class="has-post-thumbnail">
                    <div class="featured-wrapper">
                        <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( ); ?>');">
                            <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
                        </div><!-- .featured-image -->

                        <div class="overlay-one"></div>
                        <div class="overlay-two"></div>

                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            </header>

                            <div class="entry-content">
                                <?php
                                    if ($i==1) {
                                        $excerpt = blog_decode_the_excerpt( 50 );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    } else {
                                        $excerpt = blog_decode_the_excerpt( 20 );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    }
                                ?>
                            </div><!-- .entry-content -->
                        </div><!-- .entry-container -->
                    </div><!-- .travel-destination-wrapper -->
                </article>         
            <?php endwhile;?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
</div><!-- .section-content -->
