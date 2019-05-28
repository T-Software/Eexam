<?php
/**
 * Assign the panel for default customizer sections.
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_assign_default_section' );

 if( ! function_exists ( 'swipewp_customize_assign_default_section' ) ) :

    function swipewp_customize_assign_default_section( $wp_customize ) {
        
        /**
         * Move Site Identity section to General Settings panel
         */
        $wp_customize->get_section( 'title_tagline' )->panel        = 'swipewp_general_settings_panel';
        $wp_customize->get_section( 'colors' )->panel               = 'swipewp_general_settings_panel';
        $wp_customize->get_section( 'background_image' )->panel     = 'swipewp_general_settings_panel';
        $wp_customize->get_section( 'static_front_page' )->panel    = 'swipewp_general_settings_panel';
    }

endif;