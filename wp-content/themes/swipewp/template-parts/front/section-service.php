<?php
/**
 * Template part for displaying front page service section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SwipeWP
 */

$swipewp_front_service_option = get_theme_mod( 'swipewp_front_service_option', true );
$swipewp_service_cat          = get_theme_mod( 'swipewp_service_cat', '' );

if( false !== $swipewp_front_service_option && !empty( $swipewp_service_cat ) ) {
    $post_count = apply_filters( 'swipewp_service_section_post_count', 6 );
    $section_args = array(
        'category_name'  => esc_attr( $swipewp_service_cat ),
        'posts_per_page' => absint( $post_count )
    );
    $section_query = new WP_Query( $section_args );
?>

    <div id="section-service" class="front-section-service front-section">
        <div class="mt-container">
            <div class="service-section-wrapper">
                <div class="section-title-wrapper">
                    <div class="category-details">
                        <?php
                            $get_cat_details        = get_category_by_slug( esc_attr( $swipewp_service_cat ) );
                            $category_title         = $get_cat_details->name;
                            $category_description   = $get_cat_details->description;
                        ?>
                        <h2 class="category-title wow fadeInUp"><?php echo esc_html( $category_title ); ?></h2>
                        <?php if( !empty( $category_description ) ) { ?>
                            <div class="section-description wow fadeInUp" data-wow-delay="0.3s"><?php echo wp_kses_post( $category_description );?></div>
                        <?php } ?>
                    </div><!-- .category-details -->
                </div><!-- .section-title-wrapper -->
                <div class="cat-posts-wrapper mt-column-wrapper">
                    <?php
                        if( $section_query->have_posts() ){
                            $wow_time = 0;
                            while( $section_query->have_posts() ){
                                $section_query->the_post();
                ?>
                                <div class="single-post-wrap mt-column-2 wow fadeInUp" data-wow-delay="<?php echo esc_attr( $wow_time ).'s'; ?>">
                                    <?php if( has_post_thumbnail() ){ ?>
                                        <div class="post-thumb"><?php the_post_thumbnail( 'thumbnail' );?></div>
                                    <?php } ?>
                                    <div class="post-details">
                                        <h3 class="sec-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <div class="post-content"><?php the_excerpt(); ?></div>
                                        <?php swipewp_read_more_button(); ?>
                                    </div><!-- .post-details -->
                                </div><!-- .single-post-wrap -->
                <?php
                                $wow_time += 0.3;
                            }
                        }
                        wp_reset_postdata();
                ?>
                </div><!-- .cat-posts-wrapper -->
            </div><!-- .service-section-wrapper -->
        </div><!-- .mt-container -->
    </div><!-- #section-service -->
<?php
}