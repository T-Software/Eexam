<?php
/**
 * Template part for displaying front page team section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SwipeWP
 */

$swipewp_front_team_option   = get_theme_mod( 'swipewp_front_team_option', true );
$swipewp_team_cat            = get_theme_mod( 'swipewp_team_cat', '' );
if( false !== $swipewp_front_team_option && !empty( $swipewp_team_cat ) ) {
    
    $post_count                  = apply_filters( 'swipewp_team_section_post_count', 4 );
    $swipewp_team_section_title  = get_theme_mod( 'swipewp_team_section_title', '' );

    $section_args = array(
        'category_name'  => esc_attr( $swipewp_team_cat ),
        'posts_per_page' => absint( $post_count )
    );
    $section_query = new WP_Query( $section_args );
?>
    <div id="section-team" class="front-section-team front-section">
        <div class="mt-container">
            <?php 
            if( !empty( $swipewp_team_section_title ) ){ ?>
                <div class="section-title-wrapper">
                    <h2 class="section-title wow fadeInUp"><?php echo esc_html( $swipewp_team_section_title ); ?></h2>
                </div><!-- .section-title-wrapper -->
            <?php 
            } ?>
            <div class="team-posts-wrapper mt-column-wrapper">
                <?php $wow_time= 0;
                    if( $section_query->have_posts() ){
                        while( $section_query->have_posts() ){
                            $section_query->the_post();
                            $image_id = get_post_thumbnail_id();
                            $post_position = get_post( $image_id )->post_excerpt;
                ?>
                            <div class="single-post-wrapper mt-column-3 wow fadeInUp <?php if( !has_post_thumbnail() ){ echo 'no-post-thumbnail'; } ?>" data-wow-delay="<?php echo esc_attr( $wow_time ).'s'; ?>">
                                <div class="team-member-post">
                                    <?php if( has_post_thumbnail() ){ ?>
                                        <div class="image-wrap"><?php the_post_thumbnail(); ?></div>
                                    <?php } ?>
                                    <div class="post-info-wrap">
                                        <div class="post-title-wrapper"><a href="<?php the_permalink(); ?>"class="post-title"><?php the_title();?></a></div>
                                        <?php if( has_post_thumbnail() ){ ?><span class="post-position"><?php echo esc_html( $post_position ); ?></span><?php } ?>
                                        <div class="post-content"><?php the_excerpt(); ?></div>
                                        <div class="team-section-hover-wrapper" style="background: url('<?php the_post_thumbnail_url(); ?>') no-repeat scroll center center; background-size: cover">
                                            <div class="post-info-wrap">
                                                <div class="post-title-wrapper"><a href="<?php the_permalink(); ?>"class="post-title"><?php the_title();?></a></div>
                                                <?php if( has_post_thumbnail() ){ ?><span class="post-position"><?php echo esc_html( $post_position ); ?></span><?php } ?>
                                            </div><!-- .post-info-wrap -->
                                        </div><!-- team-section-hover-wrapper -->
                                    </div><!-- .post-info-wrap -->
                                </div><!-- .team-member-post -->
                            </div><!-- .single-post-wrapper -->
                <?php   $wow_time += 0.3;
                        }
                    }
                    wp_reset_postdata();
                ?>
            </div ><!-- .team-posts-wrapper -->
        </div><!-- .mt-container -->
    </div><!-- #section-team -->
<?php
}
