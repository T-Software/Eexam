<?php
/**
 * Customizer Partials
 * 
 * @package SwipeWP
 */


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function swipewp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function swipewp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Partial for side toggle sidebar inactive txt
 *
 * @since 1.0.0
 * @return void
 */
function swipewp_render_partial_side_toggle_sidebar_inactive_txt() {

	$side_toggle_sidebar_inactive_txt = get_theme_mod( 'side_toggle_sidebar_inactive_txt', '' );
	if ( ! empty( $side_toggle_sidebar_inactive_txt ) ) {
		$swipe_banner_title = esc_html( $side_toggle_sidebar_inactive_txt );
	}
	return $side_toggle_sidebar_inactive_txt;

}

/**
 * Partial for banner title
 *
 * @since 1.0.0
 * @return void
 */
function swipewp_render_partial_banner_title() {

	$swipewp_banner_title = get_theme_mod( 'swipewp_banner_title', '' );
	if ( ! empty( $swipewp_banner_title ) ) {
		$swipewp_banner_title = esc_html( $swipewp_banner_title );
	}
	return $swipewp_banner_title;

}

/**
 * Partial for banner description
 *
 * @since 1.0.0
 * @return void
 */
function swipewp_render_partial_banner_description() {

	$swipewp_banner_content = get_theme_mod( 'swipewp_banner_content', '' );
	if ( ! empty( $swipewp_banner_content ) ) {
		$swipewp_banner_content = wp_kses_post( $swipewp_banner_content );
	}
	return $swipewp_banner_content;

}

/**
 * Partial for banner button label
 *
 * @since 1.0.0
 * @return void
 */
function swipewp_render_partial_banner_btn_label() {

	$swipewp_banner_button_label = get_theme_mod( 'swipewp_banner_button_label', '' );
	if ( ! empty( $swipewp_banner_button_label ) ) {
		$swipewp_banner_button_label = esc_html( $swipewp_banner_button_label );
	}
	return $swipewp_banner_button_label;

}

/**
 * Partial for cta title
 *
 * @since 1.0.0
 * @return void
 */
function swipewp_render_partial_cta_title() {

	$swipewp_cta_title = get_theme_mod( 'swipewp_cta_title', '' );
	if ( ! empty( $swipewp_cta_title ) ) {
		$swipewp_cta_title = esc_html( $swipewp_cta_title );
	}
	return $swipewp_cta_title;

}

/**
 * Partial for cta description
 *
 * @since 1.0.0
 * @return void
 */
function swipewp_render_partial_cta_description() {

	$swipewp_cta_desc = get_theme_mod( 'swipewp_cta_desc', '' );
	if ( ! empty( $swipewp_cta_desc ) ) {
		$swipewp_cta_desc = esc_html( $swipewp_cta_desc );
	}
	return $swipewp_cta_desc;

}

/**
 * Partial for cta button1 label
 *
 * @since 1.0.0
 * @return void
 */
function swipewp_render_partial_cta_btn1_label() {

	$swipewp_cta_button1_label = get_theme_mod( 'swipewp_cta_button1_label', '' );
	if ( ! empty( $swipewp_cta_button1_label ) ) {
		$swipewp_cta_button1_label = esc_html( $swipewp_cta_button1_label );
	}
	return $swipewp_cta_button1_label;

}
