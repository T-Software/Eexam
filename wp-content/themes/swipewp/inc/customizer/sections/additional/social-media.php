<?php
/**
 * Social Media section
 * 
 * @package SwipeWP
 */

add_action( 'customize_register', 'swipewp_customize_register_section_social_media' );

if( ! function_exists( 'swipewp_customize_register_section_social_media' ) ) :

    function swipewp_customize_register_section_social_media( $wp_customize ) {

        /**
         * Social Media Section
         */
        $wp_customize->add_section( 'swipewp_social_media_section',
            array(
                'priority'       => 5,
                'panel'          => 'swipewp_additional_features_panel',
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => __( 'Social Media', 'swipewp' )
            )
        );

        /**
         * Repeater field for social media
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'social_media_icons', 
            array(
                'capability'       => 'edit_theme_options',
                'default'          => json_encode(array(
                        array(
                            'mt_icons_list' => 'fa fa-twitter',
                            'mt_url_field'  => '',
                        )
                    )
                ),
                'sanitize_callback' => 'wp_kses_post'
            )
        );
        $wp_customize->add_control( new Swipewp_Control_Repeater(
            $wp_customize, 
                'social_media_icons', 
                array(
                    'label'           => __( 'Social Media', 'swipewp' ),
                    'section'         => 'swipewp_social_media_section',
                    'settings'        => 'social_media_icons',
                    'priority'        => 5,
                    'swipewp_box_label_text'       => __( 'Social Media Icons','swipewp' ),
                    'swipewp_box_add_control_text' => __( 'Add Icon','swipewp' )
                ),
                array(
                    'mt_icons_list' => array(
                        'type'        => 'social_icon',
                        'label'       => __( 'Social Media Logo', 'swipewp' ),
                        'description' => __( 'Choose social media icon.', 'swipewp' )
                    ),
                    'mt_url_field' => array(
                        'type'        => 'url',
                        'label'       => __( 'Social Icon Url', 'swipewp' ),
                        'description' => __( 'Enter social media url.', 'swipewp' )
                    )
                )
            ) 
        );
    
    }

endif;