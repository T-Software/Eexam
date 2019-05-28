<?php
/**
 * Sub Footer section
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_register_section_footer_sub' );

if( ! function_exists( 'swipewp_customize_register_section_footer_sub' ) ) :

    function swipewp_customize_register_section_footer_sub( $wp_customize ) {

        /**
         * Sub Footer Section
         */
        $wp_customize->add_section( 'swipewp_footer_sub_section',
            array(
                'priority'       => 10,
                'panel'          => 'swipewp_footer_settings_panel',
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => __( 'Sub Footer Section', 'swipewp' )
            )
        );

        /**
         * Text field for copyright
         */
        $wp_customize->add_setting( 'swipewp_copyright_text',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => __( 'SwipeWP', 'swipewp' ),
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control( 'swipewp_copyright_text',
            array(
                'label'             => __( 'Copyright Text', 'swipewp' ),
                'section'           => 'swipewp_footer_sub_section',
                'settings'          => 'swipewp_copyright_text',
                'type'			    => 'text',
                'priority'          => 5,
                'input_attrs'       => array(
                    'placeholder' => __( '&copy; SwipeWP 2019', 'swipewp' ),
                )
            )
        );
    
    }

endif;