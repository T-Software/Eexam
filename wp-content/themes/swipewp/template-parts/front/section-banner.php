<?php
/**
 * Template part for displaying front page banner section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SwipeWP
 */

$swipewp_front_banner_option = get_theme_mod( 'swipewp_front_banner_option', true );

if( false !== $swipewp_front_banner_option && has_custom_header() ){
    $swipewp_banner_title         = get_theme_mod( 'swipewp_banner_title', '' );
    $swipewp_banner_content       = get_theme_mod( 'swipewp_banner_content', '' );
    $swipewp_banner_button_label  = get_theme_mod( 'swipewp_banner_button_label', '' );
    $swipewp_banner_button_url    = get_theme_mod( 'swipewp_banner_button_url', '' );
?>
    <div id="section-banner" class="front-section-banner <?php if( has_header_video() ) echo esc_attr( ' video-banner' ); ?>">
        <div class="banner-item" style="display: none;">
            <?php the_custom_header_markup(); ?>
            <div class="banner-caption">
                <div class="mt-container">
                    <div class="caption-wrap wow fadeInUp">
                        <?php
                            if( !empty( $swipewp_banner_title ) ) {
                                echo '<h2 class="banner-title">'. esc_html( $swipewp_banner_title ) .'</h2>';
                            }

                            if( !empty( $swipewp_banner_content ) ) {
                                echo '<div class="banner-description">'. wp_kses_post( $swipewp_banner_content ) .'</div>';
                            }

                            if( !empty( $swipewp_banner_button_label ) ) {
                                echo '<div class="banner-btn-wrap"><a href="'. esc_url( $swipewp_banner_button_url ) .'" class="banner-btn">'. esc_html( $swipewp_banner_button_label ) .'</a></div>';
                            }
                        ?>
                    </div><!-- .caption-wrap -->
                </div><!-- .mt-container -->
            </div><!-- .banner-caption -->
        </div><!-- .banner-item -->
    </div><!-- #section-banner -->
<?php
}
