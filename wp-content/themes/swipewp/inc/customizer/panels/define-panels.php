<?php
/**
 * Define required customizer panels
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_register_panel' );

if( ! function_exists( 'swipewp_customize_register_panel' ) ) :

    function swipewp_customize_register_panel( $wp_customize ) {
        
        /**
         * Register general settings panel
         */
        $wp_customize->add_panel( 'swipewp_general_settings_panel',
            array(
                'priority'          => 5,
                'capability'        => 'edit_theme_options',
                'theme_supports'    => '',
                'title'             => __( 'General Settings', 'swipewp' ),
                'description'       => __( 'Customize Site identity, Colors, Homepage Settings etc...', 'swipewp' )
            )
        );

        /**
         * Register header settings panel
         */
        $wp_customize->add_panel( 'swipewp_header_settings_panel',
            array(
                'priority'          => 10,
                'capability'        => 'edit_theme_options',
                'theme_supports'    => '',
                'title'             => __( 'Header Settings', 'swipewp' ),
                'description'       => __( 'Customize Top Header with extra options for header section.', 'swipewp' )
            )
        );

        /**
         * Register front page settings panel
         */
        $wp_customize->add_panel( 'swipewp_front_page_settings_panel',
            array(
                'priority'          => 15,
                'capability'        => 'edit_theme_options',
                'theme_supports'    => '',
                'title'             => __( 'Front Page Settings', 'swipewp' ),
                'description'       => __( 'Customize front page (Static Home Page) sections.', 'swipewp' )
            )
        );

        /**
         * Register design settings panel
         */
        $wp_customize->add_panel( 'swipewp_design_settings_panel',
            array(
                'priority'          => 20,
                'capability'        => 'edit_theme_options',
                'theme_supports'    => '',
                'title'             => __( 'Design Settings', 'swipewp' ),
                'description'       => __( 'Manage the layout/sidebar for innerpages.', 'swipewp' )
            )
        );

        /**
         * Register footer settings panel
         */
        $wp_customize->add_panel( 'swipewp_footer_settings_panel',
            array(
                'priority'          => 25,
                'capability'        => 'edit_theme_options',
                'theme_supports'    => '',
                'title'             => __( 'Footer Settings', 'swipewp' ),
                'description'       => __( 'Customize footer widget area and copyright section.', 'swipewp' )
            )
        );

        /**
         * Register additional features panel
         */
        $wp_customize->add_panel( 'swipewp_additional_features_panel',
            array(
                'priority'          => 30,
                'capability'        => 'edit_theme_options',
                'theme_supports'    => '',
                'title'             => __( 'Additional Features', 'swipewp' ),
                'description'       => __( 'Extra features to enhance website.', 'swipewp' )
            )
        );

    }

endif;
