<?php
/**
 * Define callback functions for active_callback.
 * 
 * @package SwipeWP
 */
/**
 * Define callback functions for active_callback.
 * 
 * @package Swipe Pro
 */

if( ! function_exists( 'swipewp_main_menu_toggle_bars_option_active_callback' ) ):

    /**
	 * Check if sidebar toggle menu option is enabled.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function swipewp_main_menu_toggle_bars_option_active_callback( $control ) {
        if( false !== $control->manager->get_setting( 'swipewp_main_menu_toggle_bars_option' )->value() ){
            return true;
        } else {
            return false;
        }
    }
    
endif; 

if( ! function_exists( 'swipewp_top_header_active_callback' ) ):

    /**
	 * Check if top header option is enabled.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function swipewp_top_header_active_callback( $control ) {
        if( false !== $control->manager->get_setting( 'swipewp_top_header_option' )->value() ){
            return true;
        } else {
            return false;
        }
    }
    
endif;


if( ! function_exists( 'swipewp_woo_field_active_callback' ) ):

    /**
	 * Check if woocommerce plugin is activated .
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function swipewp_woo_field_active_callback() {
        if( class_exists( 'WooCommerce' ) ) {
            return true;
        } else {
            return false;
        }
    }

endif;


if( ! function_exists( 'swipewp_front_banner_option_active_callback' ) ):

    /**
	 * Check if Banner option is enabled.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function swipewp_front_banner_option_active_callback( $control ) {
        if( false !== $control->manager->get_setting( 'swipewp_front_banner_option' )->value() ){
            return true;
        } else {
            return false;
        }
    }

endif;


if( ! function_exists( 'swipewp_front_service_option_active_callback' ) ):

    /**
	 * Check if Service option is enabled.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function swipewp_front_service_option_active_callback( $control ) {
        if( false !== $control->manager->get_setting( 'swipewp_front_service_option' )->value() ){
            return true;
        } else {
            return false;
        }
    }

endif;


if( ! function_exists( 'swipewp_front_portfolio_option_active_callback' ) ):

    /**
	 * Check if Portfolio option is enabled.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function swipewp_front_portfolio_option_active_callback( $control ) {
        if( false !== $control->manager->get_setting( 'swipewp_front_portfolio_option' )->value() ){
            return true;
        } else {
            return false;
        }
    }

endif;


if( ! function_exists( 'swipewp_front_team_option_active_callback' ) ):

    /**
	 * Check if Team option is enabled.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function swipewp_front_team_option_active_callback( $control ) {
        if( false !== $control->manager->get_setting( 'swipewp_front_team_option' )->value() ){
            return true;
        } else {
            return false;
        }
    }

endif;


if( ! function_exists( 'swipewp_front_blog_option_active_callback' ) ):

    /**
	 * Check if Blog option is enabled.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function swipewp_front_blog_option_active_callback( $control ) {
        if( false !== $control->manager->get_setting( 'swipewp_front_blog_option' )->value() ){
            return true;
        } else {
            return false;
        }
    }

endif;

if( ! function_exists( 'swipewp_front_cta_option_active_callback' ) ):

    /**
	 * Check if CTA option is enabled.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function swipewp_front_cta_option_active_callback( $control ) {
        if( false !== $control->manager->get_setting( 'swipewp_front_cta_option' )->value() ){
            return true;
        } else {
            return false;
        }
    }

endif;

if( ! function_exists( 'swipewp_front_testimonials_option_active_callback' ) ):

    /**
	 * Check if Testimonials option is enabled.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function swipewp_front_testimonials_option_active_callback( $control ) {
        if( false !== $control->manager->get_setting( 'swipewp_front_testimonials_option' )->value() ){
            return true;
        } else {
            return false;
        }
    }

endif;


if( ! function_exists( 'swipewp_front_sponsors_option_active_callback' ) ):

    /**
	 * Check if Sonsors option is enabled.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function swipewp_front_sponsors_option_active_callback( $control ) {
        if( false !== $control->manager->get_setting( 'swipewp_front_sponsors_option' )->value() ){
            return true;
        } else {
            return false;
        }
    }

endif;


if( ! function_exists( 'swipewp_footer_widges_option_active_callback' ) ):

    /**
	 * Check if Footer Widget option is enabled.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function swipewp_footer_widges_option_active_callback( $control ) {
        if( false !== $control->manager->get_setting( 'swipewp_footer_widgets_option' )->value() ){
            return true;
        } else {
            return false;
        }
    }

endif;
