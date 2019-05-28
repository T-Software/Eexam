<?php
/**
 * Define path for required files for Custom Control
 * 
 * @package SwipeWP
*/

if( ! function_exists( 'swipewp_register_custom_controls' ) ) :
    /**
     * Register Custom Controls
     * 
     * @since 1.0.0
    */
    function swipewp_register_custom_controls( $wp_customize ){
        
        // Load our custom control.
        
        require_once get_template_directory() . '/inc/customizer/controls/toggle/class-toggle-control.php';
        require_once get_template_directory() . '/inc/customizer/controls/radio-buttonset/class-radio-buttonset-control.php';
        require_once get_template_directory() . '/inc/customizer/controls/radio-image/class-radio-image-control.php';
        require_once get_template_directory() . '/inc/customizer/controls/repeater/class-repeater-control.php';
        
                
        // Register the control type.
        //$wp_customize->register_control_type( 'Swipewp_Control_Repeater' );
        $wp_customize->register_control_type( 'Swipewp_Control_Toggle' );
        $wp_customize->register_control_type( 'Swipewp_Control_Radio_Buttonset' );
        $wp_customize->register_control_type( 'Swipewp_Control_Radio_Image' );
        
    }

endif;

add_action( 'customize_register', 'swipewp_register_custom_controls' );