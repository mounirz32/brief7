<?php 
 /*
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blog Decode
 */
?>
<?php 
    $enable_image     = blog_decode_get_option( 'single_post_image_enable' );
    $enable_header_image     = blog_decode_get_option( 'single_post_header_image_enable' );
 ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ($enable_header_image==false): ?>
		<header class="entry-header">
	        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	    </header>
	<?php endif ?>
	<div class="entry-meta">
		<?php 
			blog_decode_posted_on();
			blog_decode_entry_meta(); 
		?>
	</div><!-- .entry-meta -->	
	<?php
		if ( $enable_image ) { ?>
			<div class="featured-image">
		        <?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
			</div><!-- .featured-post-image -->
		<?php } ?>
	<div class="entry-content">
		
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blog-decode' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php blog_decode_posts_tags(); ?>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'blog-decode' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>	
</article><!-- #post-## -->