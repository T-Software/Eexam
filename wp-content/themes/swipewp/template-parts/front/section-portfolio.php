<?php
/**
 * Template part for displaying front page portfolio section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SwipeWP
 */

$swipewp_front_portfolio_option   = get_theme_mod( 'swipewp_front_portfolio_option', true );
$swipewp_portfolio_cat            = get_theme_mod( 'swipewp_portfolio_cat', '' );
if( false !== $swipewp_front_portfolio_option && !empty( $swipewp_portfolio_cat ) ) {
    
    $post_count = apply_filters( 'swipewp_portfolio_section_post_count', 8 );
    $swipewp_portfolio_section_title  = get_theme_mod( 'swipewp_portfolio_section_title', '' );
    $section_args = array(
        'category_name'  => esc_attr( $swipewp_portfolio_cat ),
        'posts_per_page' => absint( $post_count )
    );
    $section_query = new WP_Query( $section_args );
?>
    <div id="section-portfolio" class="front-section-portfolio front-section">
        <?php if( !empty( $swipewp_portfolio_section_title ) ){ ?>
            <div class="section-title-wrapper">
                <h2 class="section-title wow fadeInUp"><?php echo esc_html( $swipewp_portfolio_section_title ); ?></h2>
            </div><!-- .section-title-wrapper -->
        <?php } ?>
            <div class="portfolio-posts-wrapper portfolio-column-wrapper">
                <?php
                    if( $section_query->have_posts() ){
                        $wow_time = 0;
                        while( $section_query->have_posts() ){
                            $section_query->the_post();
                ?>
                            <div class="single-post-wrapper portfolio-column wow fadeInUp" data-wow-delay="<?php echo esc_attr( $wow_time ).'s'; ?>">
                                <?php if( has_post_thumbnail() ){ ?>
                                    <div class="image-wrap"><?php the_post_thumbnail(); ?></div>
                                <?php } ?>
                                <div class="post-info-wrap">
                                    <h3 class="post-title"><?php the_title(); ?></h3>
                                    <?php swipewp_read_more_button(); ?>
                                </div><!-- .post-info-wrap -->
                            </div><!-- .single-post-wrapper -->
                <?php
                            $wow_time += 0.3;
                        }
                    }
                    wp_reset_postdata();
                ?>
            </div><!-- .portfolio-posts-wrapper -->
    </div><!-- #section-portfolio -->
<?php
}
