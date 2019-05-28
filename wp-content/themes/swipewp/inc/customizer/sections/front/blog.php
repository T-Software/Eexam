<?php
/**
 * Front Page Blog section
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_register_section_front_blog' );

if( ! function_exists( 'swipewp_customize_register_section_front_blog' ) ) :

    function swipewp_customize_register_section_front_blog( $wp_customize ) {

        /**
         * Blog section
         */
        $wp_customize->add_section( 'swipewp_front_blog_section',
            array(
                'priority'       => 25,
                'panel'          => 'swipewp_front_page_settings_panel',
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => __( 'Blog Section', 'swipewp' )
            )
        );

        /**
         * Toggle for show hide section
         */
        $wp_customize->add_setting( 'swipewp_front_blog_option',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => 'swipewp_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Swipewp_Control_Toggle(
            $wp_customize, 'swipewp_front_blog_option',
                array(
                    'label'         => __( 'Enable Section', 'swipewp' ),
                    'description'   => __( 'Enable/disable front blog section.', 'swipewp' ),
                    'section'       => 'swipewp_front_blog_section',
                    'settings'      => 'swipewp_front_blog_option',
                    'priority'      => 5
                )
            )
        );

        /**
         * Text field for section title
         */
        $wp_customize->add_setting( 'swipewp_blog_section_title',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control( 'swipewp_blog_section_title',
            array(
                'label'             => __( 'Section Title', 'swipewp' ),
                'section'           => 'swipewp_front_blog_section',
                'settings'          => 'swipewp_blog_section_title',
                'type'			    => 'text',
                'priority'          => 10,
                'active_callback'   => 'swipewp_front_blog_option_active_callback',
                'input_attrs'       => array(
                    'placeholder' => __( 'Featured Insights', 'swipewp' ),
                )
            )
        );

        /**
         * Select field for blog category
         */
        $wp_customize->add_setting( 'swipewp_blog_cat',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '',
                'sanitize_callback' => 'swipewp_sanitize_select',
            )
        );
        $wp_customize->add_control( 'swipewp_blog_cat',
            array(
                'label'             => __( 'Blog Category', 'swipewp' ),
                'section'           => 'swipewp_front_blog_section',
                'settings'          => 'swipewp_blog_cat',
                'type'			    => 'select',
                'choices'           => swipewp_get_categories_dropdown(),
                'priority'          => 15,
                'active_callback'   => 'swipewp_front_blog_option_active_callback'
            )
        );
    
    }

endif;