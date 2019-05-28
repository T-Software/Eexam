<?php
/**
 * Template part for displaying front page blog section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SwipeWP
 */

$swipewp_front_blog_option   = get_theme_mod( 'swipewp_front_blog_option', true );
$swipewp_blog_cat            = get_theme_mod( 'swipewp_blog_cat', '' );
$swipewp_blog_cat_id         = get_cat_ID( $swipewp_blog_cat );

if( false !== $swipewp_front_blog_option && !empty( $swipewp_blog_cat ) ) {
    
    $post_count                   = apply_filters( 'swipewp_team_section_post_count', 2 );
    $swipewp_blog_section_title   = get_theme_mod( 'swipewp_blog_section_title', '' );
    $swipewp_blog_view_all_label  = apply_filters( 'swipewp_blog_view_all_label', __( 'View All', 'swipewp' ) );

    $section_args = array(
        'category_name'  => esc_attr( $swipewp_blog_cat ),
        'posts_per_page' => absint( $post_count )
    );
    $section_query = new WP_Query( $section_args );
?>
    <div id="section-blog" class="front-section-blog front-section">
        <div class="mt-container">
        <?php if( !empty( $swipewp_blog_section_title ) ){ ?>
            <div class="section-title-wrapper">
                <h2 class="section-title wow fadeInUp"><?php echo esc_html( $swipewp_blog_section_title ); ?></h2>
            </div><!-- .section-title-wrapper -->
        <?php } ?>
            <div class="blog-posts-wrapper mt-column-wrapper">
                <?php
                    if( $section_query->have_posts() ){
                        $wow_time = 0;
                        while( $section_query->have_posts() ){
                            $section_query->the_post();
                ?>
                            <div class="single-post-wrapper mt-column-2 wow fadeInUp" data-wow-delay="<?php echo esc_attr( $wow_time ).'s'; ?>">
                                <div class="news-post">
                                    <?php if( has_post_thumbnail() ){ ?>
                                        <div class="image-wrap"><?php the_post_thumbnail(); ?></div>
                                    <?php } ?>
                                    <div class="post-info-wrap">
                                        <div class="post-meta">
                                            <?php swipewp_front_post_meta(); ?>
                                        </div>
                                        <h3 class="post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <div class="post-content"><?php the_excerpt(); ?></div>
                                        <?php swipewp_read_more_button(); ?>
                                    </div><!-- .post-info-wrap -->
                                </div><!-- news-post -->
                            </div><!-- .single-post-wrapper -->
                <?php
                            $wow_time += 0.3;
                        }
                    }
                    wp_reset_postdata();
                ?>
            </div><!-- .blog-posts-wrapper -->
            <div class="btn-wrap">
                <a href="<?php echo esc_url( get_category_link( $swipewp_blog_cat_id ) ); ?>"><?php echo esc_html( $swipewp_blog_view_all_label ); ?></a>
            </div>
        </div><!-- mt-container -->
    </div><!-- #section-blog -->
<?php
}
