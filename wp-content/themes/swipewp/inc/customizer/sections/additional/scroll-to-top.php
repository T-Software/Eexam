<?php
/**
 * Scroll To Top section
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_register_section_scroll_to_top' );

if( ! function_exists( 'swipewp_customize_register_section_scroll_to_top' ) ) :

    function swipewp_customize_register_section_scroll_to_top( $wp_customize ) {

        /**
         * Scroll To Top Section
         */
        $wp_customize->add_section( 'swipewp_scroll_to_top_section',
            array(
                'priority'       => 10,
                'panel'          => 'swipewp_additional_features_panel',
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => __( 'Scroll To Top', 'swipewp' )
            )
        );

        /**
         * Toggle for show hide side Scroll To Top button
         */
        $wp_customize->add_setting( 'swipewp_footer_scroll_to_top_option',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => true,
                'sanitize_callback' => 'swipewp_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Swipewp_Control_Toggle(
            $wp_customize, 'swipewp_footer_scroll_to_top_option',
                array(
                    'label'             => __( 'Enable Scroll To Top Button', 'swipewp' ),
                    'description'       => __( 'Enable/disable Scroll To Top Button at footer.', 'swipewp' ),
                    'section'           => 'swipewp_scroll_to_top_section',
                    'settings'          => 'swipewp_footer_scroll_to_top_option',
                    'priority'          => 5,
                )
            )
        );
    
    }

endif;