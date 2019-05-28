<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SwipeWP
 */

	/**
	 * Hook: swipewp_action_doctype
	 *
	 * @hooked - swipewp_doctype - 10
	 *
	 * @since 1.0.0
	 */

	do_action( 'swipewp_action_doctype' );

?>
<head itemscope itemtype="http://schema.org/WebSite">
	<?php
		
		/**
		 * Hook: swipewp_action_head
		 *
		 * @hooked - swipewp_head_meta - 10
		 *
		 * @since 1.0.0
		 */

		do_action( 'swipewp_action_head' );

		wp_head()
	?>
</head>

<?php
	/**
	 * Hook: swipewp_before_body
	 */

	 do_action( 'swipewp_before_body' );
?>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<?php

	/**
	 * Hook: swipewp_action_before_header
	 *
	 * @hooked - swipewp_page_start - 10
	 *
	 * @since 1.0.0
	 */

	do_action( 'swipewp_action_before_header' );

	/**
	 * Hook: swipewp_action_header
	 *
	 * @hooked - swipewp_header_start - 10
	 * @hooked - swipewp_site_branding - 20
	 * @hooked - swipewp_primary_menu - 30
	 * @hooked - swipewp_header_end - 40
	 *
	 * @since 1.0.0
	 */
	do_action( 'swipewp_action_header' );

	if( ! is_front_page() ) {
		/**
		 * Hook: swipewp_action_inner_page_header
		 *
		 * @hooked - swipewp_inner_page_header_start - 10
		 * @hooked - swipewp_inner_page_header_title - 20
		 * @hooked - swipewp_inner_page_breadcrumb_content - 30
		 * @hooked - swipewp_inner_page_header_end - 40
		 *
		 * @since 1.0.0
		 */
		do_action( 'swipewp_action_inner_page_header' );
	}

	/**
	 * Hook: swipewp_action_before_content
	 *
	 * @hooked - swipewp_content_start - 10
	 *
	 * @since 1.0.0
	 */

	do_action( 'swipewp_action_before_content' );
		