<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blog Decode
 */
?>
<?php 
	$enable_category     = blog_decode_get_option( 'latest_category_enable' );
    $enable_posted_on     = blog_decode_get_option( 'latest_posted_on_enable' );
    $enable_video = blog_decode_get_option( 'latest_video_enable' );
    $header_font_size = blog_decode_get_option( 'latest_font_size');
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-item' ); ?>>
	<div class="post-item">
	
    	<?php if ( has_post_thumbnail()  ) { ?>
			<figure>
			    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</figure>
		<?php } ?>

		<div class="entry-container">
			<header class="entry-header">

				<div class="entry-meta">
					<?php blog_decode_entry_meta(); ?>
				</div><!-- .entry-meta -->

				
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title" style="font-size:'. esc_attr($header_font_size).'px; ">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title" style="font-size:'. esc_attr($header_font_size).'px; "><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-meta posted-on">
				<?php blog_decode_posted_on(); ?>
			</div><!-- .entry-meta -->

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
			<?php $latest_readmore_text = blog_decode_get_option( 'latest_readmore_text' );
	        if (!empty ($latest_readmore_text)) { ?>
	          <div class="latest-read-more"><a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($latest_readmore_text);?></a> </div>
        <?php } ?>
		</div><!-- .entry-container -->
		
	</div><!-- .post-item -->
</article><!-- #post-## -->
