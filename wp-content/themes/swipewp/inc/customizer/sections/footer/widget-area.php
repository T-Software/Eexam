<?php
/**
 * Footer widget area section
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_register_section_footer_widgets' );

if( ! function_exists( 'swipewp_customize_register_section_footer_widgets' ) ) :

    function swipewp_customize_register_section_footer_widgets( $wp_customize ) {

        /**
         * Widget Area Section
         */
        $wp_customize->add_section( 'swipewp_footer_widget_section',
            array(
                'priority'       => 5,
                'panel'          => 'swipewp_footer_settings_panel',
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => __( 'Widget Area Section', 'swipewp' )
            )
        );

        /**
         * Toggle for show hide section
         */
        $wp_customize->add_setting( 'swipewp_footer_widgets_option',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => 'swipewp_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Swipewp_Control_Toggle(
            $wp_customize, 'swipewp_footer_widgets_option',
                array(
                    'label'         => __( 'Enable Section', 'swipewp' ),
                    'description'   => __( 'Enable/disable footer widget area section.', 'swipewp' ),
                    'section'       => 'swipewp_footer_widget_section',
                    'settings'      => 'swipewp_footer_widgets_option',
                    'priority'      => 5,
                )
            )
        );

        /**
         * Radio Buttonset for widget area column
         */
        $wp_customize->add_setting( 'swipewp_footer_widgets_column',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => 'mt-column-3',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control( new swipewp_Control_Radio_Buttonset(
            $wp_customize, 'swipewp_footer_widgets_column',
                array(
                    'label'         => __( 'Footer Widget Column', 'swipewp' ),
                    'section'       => 'swipewp_footer_widget_section',
                    'settings'      => 'swipewp_footer_widgets_column',
                    'priority'      => 10,
                    'choices'     => array(
                        'mt-column-1'  => __( 'Col 1', 'swipewp' ),
                        'mt-column-2'  => __( 'Col 2', 'swipewp' ),
                        'mt-column-3'  => __( 'Col 3', 'swipewp' ),
                        'mt-column-4'  => __( 'Col 4', 'swipewp' ),
                    ),
                    'active_callback'   => 'swipewp_footer_widges_option_active_callback',
                )
            )
        );

    }

endif;