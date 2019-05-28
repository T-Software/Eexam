<?php
/**
 * All added customizer field inside general panel.
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_register_added_field' );

if( ! function_exists( 'swipewp_customize_register_added_field' ) ) :

    function swipewp_customize_register_added_field( $wp_customize ) {

        /**
         * Theme Options section
         */
        $wp_customize->add_section( 'swipewp_theme_option_section',
            array(
                'priority'       => 140,
                'panel'          => 'swipewp_general_settings_panel',
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => __( 'Theme Options', 'swipewp' )
            )
        );

        /**
         * Primary Theme Color
         */
        $wp_customize->add_setting( 'swipewp_primary_theme_color',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '#10b765',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize, 'swipewp_primary_theme_color',
                array(
                    'label'      => __( 'Primary Theme Color', 'swipewp' ),
                    'section'    => 'swipewp_theme_option_section',
                    'settings'   => 'swipewp_primary_theme_color',
                    'priority'   => 5
                )
            )
        );

        /**
         * Toggle for enable preloader
         */
        $wp_customize->add_setting( 'swipewp_enable_preloader',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => 'swipewp_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Swipewp_Control_Toggle(
            $wp_customize, 'swipewp_enable_preloader',
                array(
                    'label'         => __( 'Enable preloader', 'swipewp' ),
                    'description'   => __( 'Enable/disable preloader before site loads.', 'swipewp' ),
                    'section'       => 'swipewp_theme_option_section',
                    'settings'      => 'swipewp_enable_preloader',
                    'priority'      => 10
                )
            )
        );

        /**
         * Toggle for enable breadcrumbs
         */
        $wp_customize->add_setting( 'swipewp_enable_breadcrumbs',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => 'swipewp_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Swipewp_Control_Toggle(
            $wp_customize, 'swipewp_enable_breadcrumbs',
                array(
                    'label'         => __( 'Enable breadcrumbs', 'swipewp' ),
                    'description'   => __( 'Enable/disable breadcrumbs at inner pages.', 'swipewp' ),
                    'section'       => 'swipewp_theme_option_section',
                    'settings'      => 'swipewp_enable_breadcrumbs',
                    'priority'      => 15
                )
            )
        );

        /**
         * Toggle for enable wow animation
         */
        $wp_customize->add_setting( 'swipewp_enable_wow_effect',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => 'swipewp_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Swipewp_Control_Toggle(
            $wp_customize, 'swipewp_enable_wow_effect',
                array(
                    'label'         => __( 'Enable wow effect', 'swipewp' ),
                    'description'   => __( 'Enable/disable wow animation at front page only.', 'swipewp' ),
                    'section'       => 'swipewp_theme_option_section',
                    'settings'      => 'swipewp_enable_wow_effect',
                    'priority'      => 20
                )
            )
        );

        /**
         * Radio image field for Page Sidebar
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'swipewp_theme_layout_option',
            array(
                'default'           => 'full-width',
                'sanitize_callback' => 'sanitize_key',
            )
        );
        $wp_customize->add_control( new Swipewp_Control_Radio_Image(
            $wp_customize, 'swipewp_theme_layout_option',
                array(
                    'label'         => __( 'Theme Layout', 'swipewp' ),
                    'description'   => __( 'Choose from available layouts', 'swipewp' ),
                    'section'       => 'swipewp_theme_option_section',
                    'settings'      => 'swipewp_theme_layout_option',
                    'priority'      => 50,
                    'choices'  => array(
                        'boxed-layout'   => get_template_directory_uri() . '/assets/images/boxed-layout.png',
                        'full-width' 	 => get_template_directory_uri() . '/assets/images/full-width.png',
                    ),
                )
            )
        );
    }

endif;