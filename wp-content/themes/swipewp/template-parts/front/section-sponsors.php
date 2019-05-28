<?php
/**
 * Template part for displaying front page sponsors section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SwipeWP
 */

$swipewp_front_sponsors_option   = get_theme_mod( 'swipewp_front_sponsors_option', true );
$swipewp_sponsors_cat            = get_theme_mod( 'swipewp_sponsors_cat', '' );
if( false !== $swipewp_front_sponsors_option && !empty( $swipewp_sponsors_cat ) ) {
    
    $post_count = apply_filters( 'swipewp_sponsors_section_post_count', 5 );

    $section_args = array(
        'category_name'  => esc_attr( $swipewp_sponsors_cat ),
        'posts_per_page' => absint( $post_count )
    );
    $section_query = new WP_Query( $section_args );
?>
    <div id="section-sponsors" class="front-section-sponsors front-section">
        <div class="mt-container">
            <div class="sponsors-posts-wrapper">
                    <?php
                        $wow_time = 0;
                        if( $section_query->have_posts() ){
                            while( $section_query->have_posts() ){
                                $section_query->the_post();
                    ?>
                                <div class="single-post-wrapper sponser-column-4 wow fadeInUp" data-wow-delay="<?php echo esc_attr( $wow_time ).'s'; ?>">
                                        <?php if( has_post_thumbnail() ){ ?>
                                            <div class="image-wrap">
                                                <?php the_post_thumbnail( 'medium' ); ?>
                                            </div>
                                        <?php } ?>
                                </div><!-- .single-post-wrapper -->
                    <?php   $wow_time += 0.3;
                            }
                        }
                        wp_reset_postdata();
                    ?>
           </div> <!-- .sponsors-posts-wrapper -->
       </div><!-- mt-container -->
    </div><!-- #section-sponsors -->
<?php
}
