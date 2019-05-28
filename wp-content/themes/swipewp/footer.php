<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SwipeWP
 */

	/**
	 * Hook: swipewp_action_after_content
	 *
	 * @hooked - swipewp_content_end - 10
	 *
	 * @since 1.0.0
	 */

	do_action( 'swipewp_action_after_content' );

	/**
	 * Hook: swipewp_action_footer
	 *
	 * @hooked - swipewp_footer_start - 10
	 * @hooked - swipewp_top_footer_widgets_wrapper_start - 20
	 * @hooked - swipewp_top_footer_widgets_one - 30
	 * @hooked - swipewp_top_footer_widgets_two - 40
	 * @hooked - swipewp_top_footer_widgets_three - 50 
	 * @hooked - swipewp_top_footer_widgets_four - 60
	 * @hooked - swipewp_top_footer_widgets_wrapper_end - 70
	 * @hooked - swipewp_footer_copyright - 80
	 * @hooked - swipewp_footer_end - 90
	 *
	 * @since 1.0.0
	 */

	do_action( 'swipewp_action_footer' );

	/**
	 * Hook: swipewp_action_after_footer
	 *
	 * @since 1.0.0
	 */

	do_action( 'swipewp_action_after_footer' );

?>
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
