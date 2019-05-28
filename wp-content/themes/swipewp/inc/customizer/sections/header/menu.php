<?php
/**
 * Main Menu section
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_register_section_main_menu' );

if( ! function_exists( 'swipewp_customize_register_section_main_menu' ) ) :

    function swipewp_customize_register_section_main_menu( $wp_customize ) {

        /**
         * Main Menu section
         */
        $wp_customize->add_section( 'swipewp_main_menu_section',
            array(
                'priority'       => 10,
                'panel'          => 'swipewp_header_settings_panel',
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => __( 'Main Menu Section', 'swipewp' ),
                'description'    => __( 'Extra options for Main Menu.', 'swipewp' ),
            )
        );

        /**
         * Select field for main menu layout
         */
        $wp_customize->add_setting( 'swipewp_main_menu_layout_option',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => 'bg-color-layout',
                'sanitize_callback' => 'swipewp_sanitize_select',
            )
        );
        $wp_customize->add_control( 'swipewp_main_menu_layout_option',
            array(
                'label'             => __( 'Layout Option', 'swipewp' ),
                'section'           => 'swipewp_main_menu_section',
                'settings'          => 'swipewp_main_menu_layout_option',
                'type'			    => 'select',
                'choices'           => array(
                    'bg-transparent-layout' => esc_html( 'Transparent Background', 'swipewp' ),
                    'bg-color-layout' => esc_html( 'Solid Background', 'swipewp' ), 
                ),
                'priority'          => 5,
            )
        );

        /**
         * Toggle for show hide search icons
         */
        $wp_customize->add_setting( 'swipewp_main_menu_search_option',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => 'swipewp_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Swipewp_Control_Toggle(
            $wp_customize, 'swipewp_main_menu_search_option',
                array(
                    'label'         => __( 'Enable Search Icon', 'swipewp' ),
                    'description'   => __( 'Enable/disable search icon at main menu.', 'swipewp' ),
                    'section'       => 'swipewp_main_menu_section',
                    'settings'      => 'swipewp_main_menu_search_option',
                    'priority'      => 10,
                )
            )
        );

        /**
         * Toggle for show hide woo cart icons
         */
        $wp_customize->add_setting( 'swipewp_main_menu_cart_option',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => 'swipewp_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Swipewp_Control_Toggle(
            $wp_customize, 'swipewp_main_menu_cart_option',
                array(
                    'label'             => __( 'Enable Woo Cart Icon', 'swipewp' ),
                    'description'       => __( 'Enable/disable WooCommerce cart icon at main menu.', 'swipewp' ),
                    'section'           => 'swipewp_main_menu_section',
                    'settings'          => 'swipewp_main_menu_cart_option',
                    'priority'          => 15,
                    'active_callback'   => 'swipewp_woo_field_active_callback'
                )
            )
        );

        /**
         * Toggle for show hide side menu toggle bars
         */
        $wp_customize->add_setting( 'swipewp_main_menu_toggle_bars_option',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => 'swipewp_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Swipewp_Control_Toggle(
            $wp_customize, 'swipewp_main_menu_toggle_bars_option',
                array(
                    'label'             => __( 'Enable Side Menu Toggle Bars', 'swipewp' ),
                    'description'       => __( 'Enable/disable Side Menu Toggle Bars at main menu.', 'swipewp' ),
                    'section'           => 'swipewp_main_menu_section',
                    'settings'          => 'swipewp_main_menu_toggle_bars_option',
                    'priority'          => 20,
                )
            )
        );

        /**
         * Text field for inactive sidebar title
         */
        $wp_customize->add_setting( 'side_toggle_sidebar_inactive_txt',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '',
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_control( 'side_toggle_sidebar_inactive_txt',
            array(
                'label'             => __( 'Custom Text for Inactive sidebar', 'swipewp' ),
                'section'           => 'swipewp_main_menu_section',
                'settings'          => 'side_toggle_sidebar_inactive_txt',
                'type'			    => 'text',
                'priority'          => 20,
                'active_callback'   => 'swipewp_main_menu_toggle_bars_option_active_callback'
            )
        );
        $wp_customize->selective_refresh->add_partial( 'side_toggle_sidebar_inactive_txt', array(
            'selector'            => '.sidebar-wrapper .sidebar-top-menu-toggle-wrap .side-menu-widget-wrapper .side-toggle-text',
            'container_inclusive' => false,
            'settings'            => 'side_toggle_sidebar_inactive_txt',
            'render_callback'     => 'swipewp_render_partial_side_toggle_sidebar_inactive_txt',
        ) );

        /**
         * Toggle for show hide sticky menu
         */
        $wp_customize->add_setting( 'swipewp_main_menu_sticky_menu_option',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => 'swipewp_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Swipewp_Control_Toggle(
            $wp_customize, 'swipewp_main_menu_sticky_menu_option',
                array(
                    'label'             => __( 'Enable Sticky Menu', 'swipewp' ),
                    'description'       => __( 'Enable/disable Sticky Menu Option.', 'swipewp' ),
                    'section'           => 'swipewp_main_menu_section',
                    'settings'          => 'swipewp_main_menu_sticky_menu_option',
                    'priority'          => 25,
                )
            )
        );
    }

endif;