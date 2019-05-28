<?php
/**
 * Front Page Banner section
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_register_section_front_banner' );

if( ! function_exists( 'swipewp_customize_register_section_front_banner' ) ) :

    function swipewp_customize_register_section_front_banner( $wp_customize ) {

        $wp_customize->get_section( 'header_image' )->panel                    = 'swipewp_front_page_settings_panel';
        $wp_customize->get_section( 'header_image' )->title                    = __( 'Banner Section', 'swipewp' );
        $wp_customize->get_section( 'header_image' )->priority                 = 10;
        $wp_customize->get_section( 'header_image' )->description              = '';                                               
        $wp_customize->get_setting( 'header_image' )->transport                = 'refresh';
        $wp_customize->get_setting( 'header_video' )->transport                = 'refresh';
        $wp_customize->get_setting( 'external_header_video' )->transport       = 'refresh';


        /**
         * Toggle for show hide section
         */
        $wp_customize->add_setting( 'swipewp_front_banner_option',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => 'swipewp_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Swipewp_Control_Toggle(
            $wp_customize, 'swipewp_front_banner_option',
                array(
                    'label'         => __( 'Enable Banner Section', 'swipewp' ),
                    'description'   => __( 'Enable/disable banner section.', 'swipewp' ),
                    'section'       => 'header_image',
                    'settings'      => 'swipewp_front_banner_option',
                    'priority'      => 5
                )
            )
        );

        /**
         * Text field for banner title
         */
        $wp_customize->add_setting( 'swipewp_banner_title',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '',
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_control( 'swipewp_banner_title',
            array(
                'label'             => __( 'Banner Title', 'swipewp' ),
                'section'           => 'header_image',
                'settings'          => 'swipewp_banner_title',
                'type'			    => 'text',
                'priority'          => 15,
                'active_callback'   => 'swipewp_front_banner_option_active_callback'
            )
        );
        $wp_customize->selective_refresh->add_partial( 'swipewp_banner_title', array(
            'selector'            => '.front-section-banner .caption-wrap h2.banner-title',
            'container_inclusive' => false,
            'settings'            => 'swipewp_banner_title',
            'render_callback'     => 'swipewp_render_partial_banner_title',
        ) );

        /**
         * Textarea field for banner content
         */
        $wp_customize->add_setting( 'swipewp_banner_content',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_control( 'swipewp_banner_content',
            array(
                'label'             => __( 'Banner Content', 'swipewp' ),
                'section'           => 'header_image',
                'settings'          => 'swipewp_banner_content',
                'type'			    => 'textarea',
                'priority'          => 20,
                'active_callback'   => 'swipewp_front_banner_option_active_callback'
            )
        );
        $wp_customize->selective_refresh->add_partial( 'swipewp_banner_content', array(
            'selector'            => '.front-section-banner .caption-wrap .banner-description',
            'container_inclusive' => false,
            'settings'            => 'swipewp_banner_content',
            'render_callback'     => 'swipewp_render_partial_banner_description',
        ) );

        /**
         * Text field for banner button label
         */
        $wp_customize->add_setting( 'swipewp_banner_button_label',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '',
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_control( 'swipewp_banner_button_label',
            array(
                'label'             => __( 'Banner Button Label', 'swipewp' ),
                'section'           => 'header_image',
                'settings'          => 'swipewp_banner_button_label',
                'type'			    => 'text',
                'priority'          => 25,
                'active_callback'   => 'swipewp_front_banner_option_active_callback'
            )
        );
        $wp_customize->selective_refresh->add_partial( 'swipewp_banner_button_label', array(
            'selector'            => '.front-section-banner .caption-wrap .banner-btn-wrap>a',
            'container_inclusive' => false,
            'settings'            => 'swipewp_banner_button_label',
            'render_callback'     => 'swipewp_render_partial_banner_btn_label',
        ) );

        /**
         * Text field for banner button url
         */
        $wp_customize->add_setting( 'swipewp_banner_button_url',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '',
                'sanitize_callback' => 'esc_url_raw',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_control( 'swipewp_banner_button_url',
            array(
                'label'             => __( 'Banner Button Link', 'swipewp' ),
                'section'           => 'header_image',
                'settings'          => 'swipewp_banner_button_url',
                'type'			    => 'text',
                'priority'          => 30,
                'active_callback'   => 'swipewp_front_banner_option_active_callback'
            )
        );

    }
    
endif;