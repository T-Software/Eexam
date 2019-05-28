<?php
/**
 * Template part for displaying front page testimonials section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SwipeWP
 */

$swipewp_front_testimonials_option   = get_theme_mod( 'swipewp_front_testimonials_option', true );
$swipewp_testimonials_cat            = get_theme_mod( 'swipewp_testimonials_cat', '' );
if( false !== $swipewp_front_testimonials_option && !empty( $swipewp_testimonials_cat ) ) {
    
    $post_count                          = apply_filters( 'swipewp_testimonials_section_post_count', 5 );
    $swipewp_testimonials_section_title  = get_theme_mod( 'swipewp_testimonials_section_title', '' );

    $section_args = array(
        'category_name'  => esc_attr( $swipewp_testimonials_cat ),
        'posts_per_page' => absint( $post_count )
    );
    $section_query = new WP_Query( $section_args );
?>
    <div id="section-testimonials" class="front-section-testimonials front-section">
        <div class="mt-container">
            <?php 
            if( !empty( $swipewp_testimonials_section_title ) ){ ?>
                <div class="section-title-wrapper">
                    <h2 class="section-title wow fadeInUp"><?php echo esc_html( $swipewp_testimonials_section_title ); ?></h2>
                </div><!-- .section-title-wrapper -->
            <?php 
            } ?>
            
            <div class="testimonials-posts-wrapper mt-column-wrapper">
                <?php $wow_time = 0;
                    if( $section_query->have_posts() ){
                        while( $section_query->have_posts() ){
                            $section_query->the_post();
                            $image_id = get_post_thumbnail_id();
                            $post_position = get_post( $image_id )->post_excerpt;
                ?>
                            <div class="single-post-wrapper mt-column-2 wow fadeInUp" data-wow-delay="<?php echo esc_attr( $wow_time ).'s'; ?>">
                                <?php if( has_post_thumbnail() ){ ?>
                                    <div class="image-wrap">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                <?php $image_class = ''; 
                                    }else{
                                        $image_class = 'no-thumbnail';
                                    } ?>
                                <div class="post-info-wrap <?php echo esc_html( $image_class ); ?>">
                                    <h3 class="post-title">
                                        <?php the_title(); ?>
                                    </h3>
                                    <?php 
                                    if( has_post_thumbnail() ){ ?>
                                        <span class="post-position">
                                            <?php echo esc_html( $post_position ); ?>
                                        </span>
                                    <?php 
                                    } ?>
                                    <div class="post-content">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div><!-- .post-info-wrap -->
                            </div><!-- .single-post-wrapper -->
                <?php   $wow_time += 0.3;
                        }
                    }
                    wp_reset_postdata();
                ?>
            </div><!-- .testimonials-posts-wrapper -->
        </div><!-- mt-container -->
    </div><!-- #section-testimonials -->
<?php
}
