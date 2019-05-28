<?php
/**
 * Front Page Sponsors section
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_register_section_front_sponsors' );

if( ! function_exists( 'swipewp_customize_register_section_front_sponsors' ) ) :

    function swipewp_customize_register_section_front_sponsors( $wp_customize ) {

        /**
         * Sponsors section
         */
        $wp_customize->add_section( 'swipewp_front_sponsors_section',
            array(
                'priority'       => 40,
                'panel'          => 'swipewp_front_page_settings_panel',
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => __( 'Sponsors Section', 'swipewp' )
            )
        );

        /**
         * Toggle for show hide section
         */
        $wp_customize->add_setting( 'swipewp_front_sponsors_option',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => 'swipewp_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Swipewp_Control_Toggle(
            $wp_customize, 'swipewp_front_sponsors_option',
                array(
                    'label'         => __( 'Enable Section', 'swipewp' ),
                    'description'   => __( 'Enable/disable front team section.', 'swipewp' ),
                    'section'       => 'swipewp_front_sponsors_section',
                    'settings'      => 'swipewp_front_sponsors_option',
                    'priority'      => 5
                )
            )
        );

        /**
         * Select field for sponsors category
         */
        $wp_customize->add_setting( 'swipewp_sponsors_cat',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '',
                'sanitize_callback' => 'swipewp_sanitize_select',
            )
        );
        $wp_customize->add_control( 'swipewp_sponsors_cat',
            array(
                'label'             => __( 'Sponsors Category', 'swipewp' ),
                'section'           => 'swipewp_front_sponsors_section',
                'settings'          => 'swipewp_sponsors_cat',
                'type'			    => 'select',
                'choices'           => swipewp_get_categories_dropdown(),
                'priority'          => 15,
                'active_callback'   => 'swipewp_front_sponsors_option_active_callback'
            )
        );
    
    }

endif;