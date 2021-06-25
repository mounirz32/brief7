<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Blog Decode
 */

if( ! function_exists( 'blog_decode_site_branding' ) ) :
	/**
  	 * Site Branding
  	 *
  	 * @since 1.0.0
  	 */
function blog_decode_site_branding() { ?>
    <?php $enable_header_background = blog_decode_get_option('disable_header_background_section');
    $header_background_image = blog_decode_get_option('header_background_image'); 
      $show_header_social_links =blog_decode_get_option('show_header_social_links');
      $show_header_search =blog_decode_get_option('show_header_search'); ?>
      

     <div class="site-menu col-3" <?php if ($enable_header_background == true && !empty($enable_header_background) ) { ?> style="background-image: url('<?php echo esc_url($header_background_image) ?>');" <?php } else { ?> style="border-bottom: 1px solid #f0f0f1;" <?php } ?> >
        <div class="overlay"></div>
        
            <div class="widget widget_social_icons">
               <ul class="social-icons">
                    <?php if ( $show_header_social_links ==true ){ 
                    for ($i=0; $i <=4 ; $i++) { 
                      $show_social   = blog_decode_get_option( 'header_social_link_' . $i );
                        if ( isset( $show_social ) && !empty( $show_social) ) { 
                        ?>
                            <li><a href=" <?php echo esc_url($show_social); ?>" target="_blank"></a></li>
                        <?php } } }?>
                </ul> 
            </div><!-- .widget_social_icons -->
          <div class="site-branding" >
            <div class="site-logo">
                <?php if(has_custom_logo()):?>
                    <?php the_custom_logo();?>
                <?php endif;?>
            </div><!-- .site-logo -->

            <div id="site-identity">
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">  <?php bloginfo( 'name' ); ?></a>
                </h1>

                <?php 
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                    <p class="site-description"><?php echo esc_html($description);?></p>
                <?php endif; ?>
            </div><!-- #site-identity -->
        </div> <!-- .site-branding -->
        <?php if ( $show_header_search ==true ){ ?>
            <div class="top-search">
               <?php get_search_form( $echo = true ); ?>
            </div><!-- .widget_social_icons -->
        <?php } ?>
      </div><!-- .site-menu -->
    <div class="header-menu">
      <div class="wrapper">
          <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php echo esc_attr__('Primary Menu', 'blog-decode'); ?>">
              <button type="button" class="menu-toggle">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>

              <?php
              wp_nav_menu( array(
                  'theme_location' => 'primary',
                  'menu_id'        => 'primary-menu',
                  'menu_class'     => 'nav-menu',
                  'fallback_cb'    => 'blog_decode_primary_navigation_fallback',
              ) );
              ?>
          </nav><!-- #site-navigation -->
      </div><!-- .wrapper -->
    </div>
<?php }
endif;
add_action( 'blog_decode_action_header', 'blog_decode_site_branding', 10 );

if ( ! function_exists( 'blog_decode_footer_top_section' ) ) :

  /**
   * Top  Footer 
   *
   * @since 1.0.0
   */
  function blog_decode_footer_top_section() {
      $footer_sidebar_data = blog_decode_footer_sidebar_class();
      $footer_sidebar    = $footer_sidebar_data['active_sidebar'];
      $footer_class      = $footer_sidebar_data['class'];
      if ( empty( $footer_sidebar ) ) {
        return;
      }      ?>
      <div class="footer-widgets-area page-section <?php echo esc_attr( $footer_class ); ?>"> <!-- widget area starting from here -->
          <div class="wrapper">
            <?php
              for ( $i = 1; $i <= 4 ; $i++ ) {
                if ( is_active_sidebar( 'footer-' . $i ) ) {
                ?>
                  <div class="hentry">
                    <?php dynamic_sidebar( 'footer-' . $i ); ?>
                  </div>
                  <?php
                }
              }
            ?>
            </div>
          
      </div> <!-- widget area starting from here -->
    <?php
 }
endif;

add_action( 'blog_decode_action_footer', 'blog_decode_footer_top_section', 10 );

if ( ! function_exists( 'blog_decode_footer_section' ) ) :

  /**
   * Footer copyright
   *
   * @since 1.0.0
   */

  function blog_decode_footer_section() { ?>
        <div class="site-info">
            <?php 
                $copyright_footer = blog_decode_get_option('copyright_text'); 
                $powered_by_footer = blog_decode_get_option('powered_by_text'); 
                if ( ! empty( $copyright_footer ) ) {
                  $copyright_footer = wp_kses_data( $copyright_footer );
                }
                // Powered by content.
                $powered_by_text = sprintf( __( 'Theme Blog Decode by %s', 'blog-decode' ), '<a target="_blank" rel="designer" href="'.esc_url( 'http://sensationaltheme.com/' ).'">'. esc_html__( 'Sensational Theme', 'blog-decode' ). '</a>' );
            ?>
            <div class="wrapper">
                <span class="copy-right"><?php echo esc_html($copyright_footer);?><?php echo ( $powered_by_text);?></span>
            </div> 
        </div> <!-- site generator ends here -->
        
    <?php }

endif;
add_action( 'blog_decode_action_footer', 'blog_decode_footer_section', 20 );

if ( ! function_exists( 'blog_decode_footer_sidebar_class' ) ) :
  /**
   * Count the number of footer sidebars to enable dynamic classes for the footer
   *
   * @since Blog Decode 0.1
   */
  function blog_decode_footer_sidebar_class() {
    $data = array();
    $active_sidebar = array();
      $count = 0;

      if ( is_active_sidebar( 'footer-1' ) ) {
        $active_sidebar[]   = 'footer-1';
          $count++;
      }

      if ( is_active_sidebar( 'footer-2' ) ){
        $active_sidebar[]   = 'footer-2';
          $count++;
    }

      if ( is_active_sidebar( 'footer-3' ) ){
        $active_sidebar[]   = 'footer-3';
          $count++;
      }

      if ( is_active_sidebar( 'footer-4' ) ){
        $active_sidebar[]   = 'footer-4';
          $count++;
      }

      $class = '';

      switch ( $count ) {
          case '1':
            $class = 'col-1';
            break;
          case '2':
            $class = 'col-2';
            break;
          case '3':
            $class = 'col-3';
            break;
            case '4':
            $class = 'col-4';
            break;
      }

    $data['active_sidebar'] = $active_sidebar;
    $data['class']        = $class;

      return $data;
  }
endif;

if ( ! function_exists( 'blog_decode_excerpt_length' ) ) :

  /**
   * Implement excerpt length.
   *
   * @since 1.0.0
   *
   * @param int $length The number of words.
   * @return int Excerpt length.
   */
  function blog_decode_excerpt_length( $length ) {

    if ( is_admin() ) {
      return $length;
    }

    $excerpt_length = blog_decode_get_option( 'excerpt_length' );

    if ( absint( $excerpt_length ) > 0 ) {
      $length = absint( $excerpt_length );
    }

    return $length;
  }

endif;

add_filter( 'excerpt_length', 'blog_decode_excerpt_length', 999 );

if( ! function_exists( 'blog_decode_banner_header
  ' ) ) :
    /**
     * Page Header
    */
    function blog_decode_banner_header() { 

        if ( is_front_page() && is_home() ){ 
            $header_image = get_header_image();
            $header_image_url = ! empty( $header_image ) ?  $header_image : get_template_directory_uri() . '/assets/images/default-header.jpg';
        }
        elseif( is_front_page() ) {
            return;
        }
        else {
            $header_image_url = blog_decode_banner_image( $image_url = '' );
        } ?>
        <div id="page-site-header" style="background-image: url('<?php echo esc_url( $header_image_url ); ?>');">
            <div class="overlay"></div>
            <header class='page-header'> 
                <div class="wrapper">
                    <?php blog_decode_banner_title();?>
                </div><!-- .wrapper -->
            </header>
        </div><!-- #page-site-header -->
        <?php echo '<div class= "page-section">';
    }
endif;
add_action( 'blog_decode_banner_header', 'blog_decode_banner_header', 10 );

if( ! function_exists( 'blog_decode_banner_title' ) ) :
/**
 * Page Header
*/
function blog_decode_banner_title(){ 
    if ( ( is_front_page() && is_home() ) || is_home() ){ 
        echo '<h2 class="page-title">';
        esc_html_e( 'Blog','blog-decode' );
        echo '</h2>';
    }

    if( is_singular() ) {
        the_title( '<h2 class="page-title">', '</h2>' );
    }       

    if( is_archive() ){
        the_archive_description( '<div class="archive-description">', '</div>' );
        the_archive_title( '<h2 class="page-title">', '</h2>' );
    }

    if( is_search() ){ ?>
        <h2 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'blog-decode' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
    <?php }
    
    if( is_404() ) {
        echo '<h2 class="page-title">' . esc_html__( 'Error 404', 'blog-decode' ) . '</h2>';
    }
}
endif;

if( ! function_exists( 'blog_decode_banner_image' ) ) :
/**
 * Banner Header Image
*/
function blog_decode_banner_image( $image_url ){
    global $post;

    $archive_header = blog_decode_get_option( 'archive_header_image' );
    $search_header = blog_decode_get_option( 'search_header_image' );
    $header_404 = blog_decode_get_option( '404_header_image' );

    if ( is_home() && ! is_front_page() ){ 
        $image_url      = get_the_post_thumbnail_url( get_option( 'page_for_posts' ), 'full' );
        $header_image = get_header_image();
        $fallback_image = ! empty( $header_image ) ?  $header_image : get_template_directory_uri() . '/assets/images/default-header.jpg';
        $image_url      = ( ! empty( $image_url) ) ? $image_url : $fallback_image;
    }
    elseif( is_singular() ){
        $image_url      = get_the_post_thumbnail_url( $post->ID, 'full' );
        $header_image = get_header_image();
        $fallback_image = ! empty( $header_image ) ?  $header_image : get_template_directory_uri() . '/assets/images/default-header.jpg';
        $image_url      = ( ! empty( $image_url) ) ? $image_url : $fallback_image;
    }
    elseif( is_archive() ){
        $image_url = ( ! empty( $archive_header) ) ? $archive_header : get_template_directory_uri() . '/assets/images/default-header.jpg';
    }
    elseif( is_search() ){ 
        $image_url = ( ! empty( $search_header) ) ? $search_header : get_template_directory_uri() . '/assets/images/default-header.jpg';
    }
    elseif( is_404() ) {
        $image_url = ( ! empty( $header_404) ) ? $header_404 : get_template_directory_uri() . '/assets/images/default-header.jpg';
    }
    return $image_url;
}
endif;

if ( ! function_exists( 'blog_decode_posts_tags' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function blog_decode_posts_tags() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() && has_tag() ) { ?>
                <div class="tags-links">

                    <?php /* translators: used between list items, there is a space after the comma */
                    $tags = get_the_tags();
                    if ( $tags ) {

                        foreach ( $tags as $tag ) {
                            echo '<span><a href="' . esc_url( get_tag_link( $tag->term_id ) ) .'">' . esc_html( $tag->name ) . '</a></span>'; // WPCS: XSS OK.
                        }
                    } ?>
                </div><!-- .tags-links -->
        <?php } 
    }
endif;

/**
 * Render social links.
 *
 * @since 1.0
 */
function blog_decode_render_social_links() {

        $social_link1 = blog_decode_get_option( 'social_link_1' );
        $social_link2 = blog_decode_get_option( 'social_link_2' );
        $social_link3 = blog_decode_get_option( 'social_link_3' );
        
        if ( empty( $social_link1 ) && empty( $social_link2 ) && empty( $social_link3 ) && empty( $social_link4 ) && empty( $social_link5 ) ) {
                return;
        }

        echo '<div class="social-icons">';
        echo '<ul>';
        if ( ! empty( $social_link1 ) ) {
            echo '<li><a href="' . esc_url( $social_link1 ) . '"></a></li>';
        }
        if ( ! empty( $social_link2 ) ) {
            echo '<li><a href="' . esc_url( $social_link2 ) . '"></a></li>';
        }
        if ( ! empty( $social_link3 ) ) {
            echo '<li><a href="' . esc_url( $social_link3 ) . '"></a></li>';
        }
        echo '</ul>';
        echo '</div>';
}

if ( ! function_exists( 'blog_decode_pagination' ) ) :
  /**
   * blog/archive pagination.
   *
   * @return pagination type value
   */
  function blog_decode_pagination() {
    $pagination = blog_decode_get_option( 'pagination_type' );
    if ( $pagination == 'default' ) :
      the_posts_navigation();
    elseif ( $pagination == 'numeric' ) :
      the_posts_pagination( array(
          'mid_size' => 4,
          // 'prev_text' => ,
          // 'next_text' => ,
      ) );
    endif;
  }
endif;
add_action( 'blog_decode_pagination_action', 'blog_decode_pagination', 10 );
