<?php
/**
 * Main Menu section
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_register_section_header_inner_page' );

if( ! function_exists( 'swipewp_customize_register_section_header_inner_page' ) ) :

    function swipewp_customize_register_section_header_inner_page( $wp_customize ) {

        /**
         * Inner Page section
         */
        $wp_customize->add_section( 'swipewp_header_inner_page_section',
            array(
                'priority'       => 15,
                'panel'          => 'swipewp_header_settings_panel',
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => __( 'Inner Page Section', 'swipewp' ),
                'description'    => __( 'Extra options for inner pages header area.', 'swipewp' ),
            )
        );

        /**
         * Image field for innerpage header image
         */
        $wp_customize->add_setting( 'swipewp_inner_header_image',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Cropped_Image_Control(
            $wp_customize, 'swipewp_inner_header_image',
                array(
                    'label'             => __( 'Header Image', 'swipewp' ),
                    'description'       => __( 'Click "Select image" to upload an image file from your computer. You will be able to crop your image once you upload it for a perfect fit.', 'swipewp' ),
                    'section'           => 'swipewp_header_inner_page_section',
                    'settings'          => 'swipewp_inner_header_image',
                    'priority'          => 5,
                    'width'             => 1920,
                    'height'            => 250
                )
            )
        );

    }

endif;