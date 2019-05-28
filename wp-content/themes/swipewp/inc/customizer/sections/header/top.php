<?php
/**
 * Top header section
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_register_section_top_header' );

if( ! function_exists( 'swipewp_customize_register_section_top_header' ) ) :

    function swipewp_customize_register_section_top_header( $wp_customize ) {

        /**
         * Top Header section
         */
        $wp_customize->add_section( 'swipewp_top_header_section',
            array(
                'priority'       => 5,
                'panel'          => 'swipewp_header_settings_panel',
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => __( 'Top Header Section', 'swipewp' ),
                'description'    => __( 'Managed the content display at top header section.', 'swipewp' ),
            )
        );

        /**
         * Toggle for show hide section
         */
        $wp_customize->add_setting( 'swipewp_top_header_option',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => 'swipewp_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Swipewp_Control_Toggle(
            $wp_customize, 'swipewp_top_header_option',
                array(
                    'label'         => __( 'Enable Top Header', 'swipewp' ),
                    'description'   => __( 'Enable/disable top header section.', 'swipewp' ),
                    'section'       => 'swipewp_top_header_section',
                    'settings'      => 'swipewp_top_header_option',
                    'priority'      => 5
                )
            )
        );

        /**
         * Text field for phone
         */
        $wp_customize->add_setting( 'top_header_phone',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => __( '+01 452 4587254', 'swipewp' ),
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control( 'top_header_phone',
            array(
                'label'             => __( 'Phone', 'swipewp' ),
                'section'           => 'swipewp_top_header_section',
                'settings'          => 'top_header_phone',
                'type'			    => 'text',
                'priority'          => 10,
                'active_callback'   => 'swipewp_top_header_active_callback'
            )
        );

        /**
         * Text field for email
         */
        $wp_customize->add_setting( 'top_header_email',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => __( 'info@example.com', 'swipewp' ),
                'sanitize_callback' => 'sanitize_email',
            )
        );
        $wp_customize->add_control( 'top_header_email',
            array(
                'label'             => __( 'Email', 'swipewp' ),
                'section'           => 'swipewp_top_header_section',
                'settings'          => 'top_header_email',
                'type'			    => 'text',
                'priority'          => 15,
                'active_callback'   => 'swipewp_top_header_active_callback'
            )
        );

        /**
         * Text field for address
         */
        $wp_customize->add_setting( 'top_header_address',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => __( '8108 W. Saxon Street', 'swipewp' ),
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control( 'top_header_address',
            array(
                'label'             => __( 'Address', 'swipewp' ),
                'section'           => 'swipewp_top_header_section',
                'settings'          => 'top_header_address',
                'type'			    => 'text',
                'priority'          => 20,
                'active_callback'   => 'swipewp_top_header_active_callback'
            )
        );

        /**
         * Toggle for show hide social icons
         */
        $wp_customize->add_setting( 'swipewp_top_social_option',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => 'swipewp_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Swipewp_Control_Toggle(
            $wp_customize, 'swipewp_top_social_option',
                array(
                    'label'             => __( 'Enable Social Icons', 'swipewp' ),
                    'description'       => __( 'Enable/disable social icons at top header section.', 'swipewp' ),
                    'section'           => 'swipewp_top_header_section',
                    'settings'          => 'swipewp_top_social_option',
                    'priority'          => 25,
                    'active_callback'   => 'swipewp_top_header_active_callback'
                )
            )
        );

    }

endif;