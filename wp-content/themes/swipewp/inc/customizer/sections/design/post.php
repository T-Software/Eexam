<?php
/**
 * Post Settings section
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_register_section_post_settings' );

if( ! function_exists( 'swipewp_customize_register_section_post_settings' ) ) :

    function swipewp_customize_register_section_post_settings( $wp_customize ) {

        /**
         * Post Settings Section
         */
        $wp_customize->add_section( 'swipewp_post_settings_section',
            array(
                'priority'       => 15,
                'panel'          => 'swipewp_design_settings_panel',
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => __( 'Post Settings', 'swipewp' )
            )
        );

        /**
         * Radio image field for Post Sidebar
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'swipewp_post_sidebar',
            array(
                'default'           => 'right-sidebar',
                'sanitize_callback' => 'sanitize_key',
            )
        );
        $wp_customize->add_control( new Swipewp_Control_Radio_Image(
            $wp_customize, 'swipewp_post_sidebar',
                array(
                    'label'         => __( 'Post Sidebars', 'swipewp' ),
                    'description'   => __( 'Choose sidebar from available layouts', 'swipewp' ),
                    'section'       => 'swipewp_post_settings_section',
                    'settings'      => 'swipewp_post_sidebar',
                    'priority'      => 5,
                    'choices'  => array(
                        'left-sidebar'  	 => get_template_directory_uri() . '/assets/images/left-sidebar.png',
                        'right-sidebar' 	 => get_template_directory_uri() . '/assets/images/right-sidebar.png',
                        'no-sidebar'         => get_template_directory_uri() . '/assets/images/no-sidebar.png',
                        'no-sidebar-center'  => get_template_directory_uri() . '/assets/images/no-sidebar-center.png'
                    ),
                )
            )
        );

    }

endif;