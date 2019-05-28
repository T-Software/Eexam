<?php
/**
 * Front Page Services section
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_register_section_front_services' );

if( ! function_exists( 'swipewp_customize_register_section_front_services' ) ) :

    function swipewp_customize_register_section_front_services( $wp_customize ) {

        /**
         * Service section
         */
        $wp_customize->add_section( 'swipewp_front_services_section',
            array(
                'priority'       => 10,
                'panel'          => 'swipewp_front_page_settings_panel',
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => __( 'Services Section', 'swipewp' )
            )
        );

        /**
         * Toggle for show hide section
         */
        $wp_customize->add_setting( 'swipewp_front_service_option',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => 'swipewp_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Swipewp_Control_Toggle(
            $wp_customize, 'swipewp_front_service_option',
                array(
                    'label'         => __( 'Enable Section', 'swipewp' ),
                    'description'   => __( 'Enable/disable front services section.', 'swipewp' ),
                    'section'       => 'swipewp_front_services_section',
                    'settings'      => 'swipewp_front_service_option',
                    'priority'      => 5
                )
            )
        );

        /**
         * Select field for service category
         */
        $wp_customize->add_setting( 'swipewp_service_cat',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '',
                'sanitize_callback' => 'swipewp_sanitize_select',
            )
        );
        $wp_customize->add_control( 'swipewp_service_cat',
            array(
                'label'             => __( 'Service Category', 'swipewp' ),
                'section'           => 'swipewp_front_services_section',
                'settings'          => 'swipewp_service_cat',
                'type'			    => 'select',
                'choices'           => swipewp_get_categories_dropdown(),
                'priority'          => 15,
                'active_callback'   => 'swipewp_front_service_option_active_callback'
            )
        );

    }

endif;