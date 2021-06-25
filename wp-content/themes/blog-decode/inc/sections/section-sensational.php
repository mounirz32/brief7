<?php
    $sensational_title       = blog_decode_get_option( 'sensational_title' );

    for( $i=1; $i<=6; $i++ ) :
        $sensational_post_posts[] = absint(blog_decode_get_option( 'sensational_post_'.$i ) );
    endfor;

?>
<div class="wrapper">
    <?php if( !empty($sensational_title)):?>
        <div class="section-header">
            <?php if( !empty($sensational_title)):?>
                <h2 class="section-title"><?php echo esc_html($sensational_title);?></h2>
            <?php endif;?>
        </div>       
    <?php endif;?>  

    <div class="sensational-wrapper col-2 clear">
        <?php $args = array (
            'post_type'     => 'post',
            'post_per_page' => 6,
            'post__in'      => $sensational_post_posts,
            'orderby'       =>'post__in', 
            'ignore_sticky_posts' => true, 
        ); 
        
        $loop = new WP_Query($args);                        
        if ( $loop->have_posts() ) :
            $i=0;  
            while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                <?php if ($i%3==1 || $i%3==2 ): ?>
                  <div class="hentry"> 
                <?php endif ?>      
                    <article>

                            <?php if (has_post_thumbnail()) : ?>
                                <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'large');?>');">
                                    <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>
                            <div class="entry-container">
                                    <div class="entry-meta">
                                        <?php blog_decode_entry_meta(); ?>
                                    </div><!-- .entry-meta -->
                                <header class="entry-header">
                                    <h2 class="entry-title" ><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </header>

                                <div class="entry-meta">
                                    <?php blog_decode_posted_on(); ?>
                                </div><!-- .entry-meta -->

                                <?php if ($i%3==1): ?>
                                    <div class="entry-content">
                                        <?php
                                            $excerpt = blog_decode_the_excerpt( 20 );
                                            echo wp_kses_post( wpautop( $excerpt ) );
                                        ?>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>
                            </div><!-- .entry-container -->
                    </article>
                <?php if ($i%3==1 || ($i!=0 && $i%3==0)): ?>
                    </div> 
                <?php endif ?> 
            <?php endwhile;?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div><!-- .section-content -->