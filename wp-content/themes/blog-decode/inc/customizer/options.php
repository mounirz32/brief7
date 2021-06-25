<?php 
/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function blog_decode_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blog-decode' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'blog_decode_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function blog_decode_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'blog-decode' ),
            'off'       => esc_html__( 'Disable', 'blog-decode' )
        );
        return apply_filters( 'blog_decode_switch_options', $arr );
    }
endif;


 /**
 * Get an array of google fonts.
 * 
 */
function blog_decode_font_choices() {
    $font_family_arr = array();
    $font_family_arr[''] = esc_html__( '--Default--', 'blog-decode' );

    // Make the request
    $request = wp_remote_get( get_theme_file_uri( 'assets/fonts/webfonts.json' ) );

    if( is_wp_error( $request ) ) {
        return false; // Bail early
    }
    // Retrieve the data
    $body = wp_remote_retrieve_body( $request );
    $data = json_decode( $body );
    if ( ! empty( $data ) ) {
        foreach ( $data->items as $items => $fonts ) {
            $family_str_arr = explode( ' ', $fonts->family );
            $family_value = implode( '-', array_map( 'strtolower', $family_str_arr ) );
            $font_family_arr[ $family_value ] = $fonts->family;
        }
    }

    return apply_filters( 'blog_decode_font_choices', $font_family_arr );
}

if ( ! function_exists( 'blog_decode_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function blog_decode_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'blog-decode' ),
            'header-font-1'   => esc_html__( 'Raleway', 'blog-decode' ),
            'header-font-2'   => esc_html__( 'Poppins', 'blog-decode' ),
            'header-font-3'   => esc_html__( 'Montserrat', 'blog-decode' ),
            'header-font-4'   => esc_html__( 'Open Sans', 'blog-decode' ),
            'header-font-5'   => esc_html__( 'Lato', 'blog-decode' ),
            'header-font-6'   => esc_html__( 'Ubuntu', 'blog-decode' ),
            'header-font-7'   => esc_html__( 'Playfair Display', 'blog-decode' ),
            'header-font-8'   => esc_html__( 'Lora', 'blog-decode' ),
            'header-font-9'   => esc_html__( 'Titillium Web', 'blog-decode' ),
            'header-font-10'   => esc_html__( 'Muli', 'blog-decode' ),
            'header-font-11'   => esc_html__( 'Oxygen', 'blog-decode' ),
            'header-font-12'   => esc_html__( 'Nunito Sans', 'blog-decode' ),
            'header-font-13'   => esc_html__( 'Maven Pro', 'blog-decode' ),
            'header-font-14'   => esc_html__( 'Cairo', 'blog-decode' ),
            'header-font-15'   => esc_html__( 'Philosopher', 'blog-decode' ),
            'header-font-16'   => esc_html__( 'Quicksand', 'blog-decode' ),
            'header-font-17'   => esc_html__( 'Henny Penny', 'blog-decode' ),
            'header-font-18'   => esc_html__( 'Fredericka', 'blog-decode' ),
            'header-font-19'   => esc_html__( 'Marck Script', 'blog-decode' ),
            'header-font-20'   => esc_html__( 'Kaushan Script', 'blog-decode' ),
        );

        $output = apply_filters( 'blog_decode_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;


if ( ! function_exists( 'blog_decode_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function blog_decode_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'blog-decode' ),
            'body-font-1'     => esc_html__( 'Raleway', 'blog-decode' ),
            'body-font-2'     => esc_html__( 'Poppins', 'blog-decode' ),
            'body-font-3'     => esc_html__( 'Roboto', 'blog-decode' ),
            'body-font-4'     => esc_html__( 'Open Sans', 'blog-decode' ),
            'body-font-5'     => esc_html__( 'Lato', 'blog-decode' ),
            'body-font-6'   => esc_html__( 'Ubuntu', 'blog-decode' ),
            'body-font-7'   => esc_html__( 'Playfair Display', 'blog-decode' ),
            'body-font-8'   => esc_html__( 'Lora', 'blog-decode' ),
            'body-font-9'   => esc_html__( 'Titillium Web', 'blog-decode' ),
            'body-font-10'   => esc_html__( 'Muli', 'blog-decode' ),
            'body-font-11'   => esc_html__( 'Oxygen', 'blog-decode' ),
            'body-font-12'   => esc_html__( 'Nunito Sans', 'blog-decode' ),
            'body-font-13'   => esc_html__( 'Maven Pro', 'blog-decode' ),
            'body-font-14'   => esc_html__( 'Cairo', 'blog-decode' ),
            'body-font-15'   => esc_html__( 'Philosopher', 'blog-decode' ),
        );

        $output = apply_filters( 'blog_decode_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

 ?>