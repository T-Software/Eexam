<?php
/**
 * Template part for displaying front page call to action section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SwipeWP
 */
$swipewp_front_cta_option = get_theme_mod( 'swipewp_front_cta_option', false );
if( false == $swipewp_front_cta_option ){
    return;
}
$swipewp_cta_bg_image = get_theme_mod( 'swipewp_cta_bg_image', '' );
$swipewp_cta_title = get_theme_mod( 'swipewp_cta_title', '' );
$swipewp_cta_desc = get_theme_mod( 'swipewp_cta_desc', '' );
$swipewp_cta_button1_label = get_theme_mod( 'swipewp_cta_button1_label', '' );
$swipewp_cta_button1_url = get_theme_mod( 'swipewp_cta_button1_url', '' );
?>
<div id="section-cta" class="front-section-cta front-section" style="background:url( <?php echo esc_url( $swipewp_cta_bg_image ); ?>) no-repeat fixed center center;  background-size:cover">
    <div class="section-cta-wrapper">
        <div class="mt-container wow fadeInUp">
            <?php if( !empty( $swipewp_cta_title ) || !empty( $swipewp_cta_desc ) ){ ?>
                <div class="cta-title wrapper">
                    <?php 
                    if( !empty( $swipewp_cta_title ) ){ ?>
                        <div class="section-title-wrapper">
                            <h2 class="section-title"><?php echo esc_html( $swipewp_cta_title ); ?></h2>
                        </div><!-- .section-title-wrapper -->
                    <?php  
                    }
                    if( !empty( $swipewp_cta_desc ) ){ ?>
                        <div class="section-desc-wrapper">
                            <?php echo esc_html( $swipewp_cta_desc ); ?>
                        </div><!-- .section-desc-wrapper -->
                    <?php 
                    } ?>
                </div> <!-- cta-title wrapper -->
            <?php 
                }
                if( !empty( $swipewp_cta_button1_url ) ){ ?>    
                    <div class="cta-button-wrapper">
                        <div class="cta-button cta-button1"><a href="<?php echo esc_url( $swipewp_cta_button1_url ); ?>"><?php echo esc_html( $swipewp_cta_button1_label ); ?></a></div>
                    </div><!-- .cta-button-wrapper -->
            <?php
                }
            ?>

        </div><!-- .mt-container -->
    </div><!-- .section-cta-wrapper -->
</div><!-- #section-cta -->