<?php
/**
 * Page Settings section
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_register_section_page_settings' );

if( ! function_exists( 'swipewp_customize_register_section_page_settings' ) ) :

    function swipewp_customize_register_section_page_settings( $wp_customize ) {

        /**
         * Page Settings Section
         */
        $wp_customize->add_section( 'swipewp_page_settings_section',
            array(
                'priority'       => 10,
                'panel'          => 'swipewp_design_settings_panel',
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => __( 'Page Settings', 'swipewp' )
            )
        );

        /**
         * Radio image field for Page Sidebar
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'swipewp_page_sidebar',
            array(
                'default'           => 'right-sidebar',
                'sanitize_callback' => 'sanitize_key',
            )
        );
        $wp_customize->add_control( new Swipewp_Control_Radio_Image(
            $wp_customize, 'swipewp_page_sidebar',
                array(
                    'label'         => __( 'Page Sidebars', 'swipewp' ),
                    'description'   => __( 'Choose sidebar from available layouts', 'swipewp' ),
                    'section'       => 'swipewp_page_settings_section',
                    'settings'      => 'swipewp_page_sidebar',
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