<?php
/**
 * File to sanitize customizer field
 *
 * @package SwipeWP
 */

if ( ! function_exists( 'swipewp_sanitize_checkbox' ) ) :

    /**
	 * Sanitize checkbox.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function swipewp_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );

	}

endif;

if ( ! function_exists( 'swipewp_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed                $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 */
	function swipewp_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;

if( ! function_exists( 'swipewp_sanitize_repeater' ) ) :
    /**
     * Sanitize repeater value
     *
     * @since 1.0.0
     */
    function swipewp_sanitize_repeater( $input, $setting ){
		$input_decoded = json_decode( $input, true );
            
        if( !empty( $input_decoded ) ) {
            foreach ( $input_decoded as $boxes => $box ){
                foreach ( $box as $key => $value ){
                    if( $key == 'mt_select_pages' || $key == 'mt_select_field' ) {
                        $input_decoded[$boxes][$key] = sanitize_key( $value );
                    } elseif( $key == 'url' || $key == 'mt_upload_field' ) {
                        $input_decoded[$boxes][$key] = esc_url_raw( $value );
                    } else {
                        $input_decoded[$boxes][$key] = wp_kses_post( $value );
                    }
                }
            }
            return json_encode( $input_decoded );
        }
        
        return $input;
    }
endif;
