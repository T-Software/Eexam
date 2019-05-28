<?php
/**
 * Front Page CTA section
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_register_section_front_cta' );

if( ! function_exists( 'swipewp_customize_register_section_front_cta' ) ) :

    function swipewp_customize_register_section_front_cta( $wp_customize ) {

        /**
         * Call To Action section
         */
        $wp_customize->add_section( 'swipewp_front_cta_section',
            array(
                'priority'       => 30,
                'panel'          => 'swipewp_front_page_settings_panel',
                'capability'     => 'edit_theme_options',
                'title'          => __( 'Call To Action Section', 'swipewp' )
            )
        );

        /**
         * Toggle for show hide section
         */
        $wp_customize->add_setting( 'swipewp_front_cta_option',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => false,
                'sanitize_callback' => 'swipewp_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Swipewp_Control_Toggle(
            $wp_customize, 'swipewp_front_cta_option',
                array(
                    'label'         => __( 'Enable Section', 'swipewp' ),
                    'description'   => __( 'Enable/disable front call to action section.', 'swipewp' ),
                    'section'       => 'swipewp_front_cta_section',
                    'settings'      => 'swipewp_front_cta_option',
                    'priority'      => 5
                )
            )
        );
            
        /**
         * Image field for cta background
         */
        $wp_customize->add_setting(
            'swipewp_cta_bg_image',
            array(
                'capability'    => 'edit_theme_options',
                'default'       => '',
                'sanitize_callback' => 'esc_url_raw',
            )
        );
        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'swipewp_cta_bg_image',
                array(
                    'label'         => __( 'Background Image', 'swipewp' ),
                    'description'   => __( 'Add image for section background.', 'swipewp' ),
                    'section'       => 'swipewp_front_cta_section',
                    'settings'      => 'swipewp_cta_bg_image',
                    'priority'      => 20,
                    'active_callback' => 'swipewp_front_cta_option_active_callback'
                )
            )
        );

        /**
         * Text field for cta title
         */
        $wp_customize->add_setting( 'swipewp_cta_title',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '',
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_control( 'swipewp_cta_title',
            array(
                'label'             => __( 'Call To Action Title', 'swipewp' ),
                'section'           => 'swipewp_front_cta_section',
                'settings'          => 'swipewp_cta_title',
                'type'			    => 'text',
                'priority'          => 30,
                'active_callback'   => 'swipewp_front_cta_option_active_callback'
            )
        );
        $wp_customize->selective_refresh->add_partial( 'swipewp_cta_title', array(
            'selector'            => '.section-cta-wrapper .section-title',
            'container_inclusive' => false,
            'settings'            => 'swipewp_cta_title',
            'render_callback'     => 'swipewp_render_partial_cta_title',
        ) );

        /**
         * Text field for cta description
         */
        $wp_customize->add_setting( 'swipewp_cta_desc',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '',
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_control( 'swipewp_cta_desc',
            array(
                'label'             => __( 'Call To Action Sub Title', 'swipewp' ),
                'section'           => 'swipewp_front_cta_section',
                'settings'          => 'swipewp_cta_desc',
                'type'			    => 'text',
                'priority'          => 40,
                'active_callback'   => 'swipewp_front_cta_option_active_callback'
            )
        );
        $wp_customize->selective_refresh->add_partial( 'swipewp_cta_desc', array(
            'selector'            => '.section-cta-wrapper .section-desc-wrapper',
            'container_inclusive' => false,
            'settings'            => 'swipewp_cta_desc',
            'render_callback'     => 'swipewp_render_partial_cta_description',
        ) );
        
        /**
         * Text field for cta button 1 label
         */
        $wp_customize->add_setting( 'swipewp_cta_button1_label',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '',
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
                )
        );
        $wp_customize->add_control( 'swipewp_cta_button1_label',
            array(
                'label'             => __( 'Button 1 Label', 'swipewp' ),
                'section'           => 'swipewp_front_cta_section',
                'settings'          => 'swipewp_cta_button1_label',
                'type'			    => 'text',
                'priority'          => 50,
                'active_callback'   => 'swipewp_front_cta_option_active_callback'
            )
        );
        $wp_customize->selective_refresh->add_partial( 'swipewp_cta_button1_label', array(
            'selector'            => '.section-cta-wrapper .cta-button1>a',
            'container_inclusive' => false,
            'settings'            => 'swipewp_cta_button1_label',
            'render_callback'     => 'swipewp_render_partial_cta_btn1_label',
        ) );

        /**
         * Text field for cta button 1 url
         */
        $wp_customize->add_setting( 'swipewp_cta_button1_url',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '',
                'sanitize_callback' => 'esc_url_raw',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_control( 'swipewp_cta_button1_url',
            array(
                'label'             => __( 'Button 1 Link', 'swipewp' ),
                'section'           => 'swipewp_front_cta_section',
                'settings'          => 'swipewp_cta_button1_url',
                'type'			    => 'text',
                'priority'          => 60,
                'active_callback'   => 'swipewp_front_cta_option_active_callback'
            )
        );
    }
    
endif;