<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package SwipeWP
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function swipewp_body_classes( $classes ) {

	global $post;

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
    
    /**
     * Disable top header 
     */
    $swipewp_top_header_option = get_theme_mod( 'swipewp_top_header_option', true );
    if( false == $swipewp_top_header_option ){
        $classes[] = esc_attr( 'no-top-header' );
    }
    
    /**
     * Header layout
     */
     $swipewp_main_menu_layout_option = get_theme_mod( 'swipewp_main_menu_layout_option', 'bg-color-layout' );
     $classes[] = esc_attr( $swipewp_main_menu_layout_option );   
    
	$swipewp_theme_layout_option = get_theme_mod( 'swipewp_theme_layout_option', 'full-width' );
	$classes[] = esc_html( $swipewp_theme_layout_option );
	/**
	 * Add classes about style and sidebar layout for archive, post and page
	 */
	if ( is_archive() || is_home() ) {
		$archive_sidebar = get_theme_mod( 'swipewp_archive_sidebar', 'right-sidebar' );
		$classes[] = esc_attr( $archive_sidebar );
	} elseif( is_single() ) {
		$single_post_sidebar = get_post_meta( $post->ID, 'swipewp_post_sidebar', true );
		if ( 'default-sidebar' !== $single_post_sidebar && !empty( $single_post_sidebar ) ) {
			$classes[] = esc_attr( $single_post_sidebar );
		} else {
			$posts_sidebar = get_theme_mod( 'swipewp_post_sidebar', 'right-sidebar' );
			$classes[] = esc_attr( $posts_sidebar );
		}
	} elseif( is_page() ) {
		$single_page_sidebar = get_post_meta( $post->ID, 'swipewp_post_sidebar', true );
		if ( 'default-sidebar' !== $single_page_sidebar && !empty( $single_page_sidebar ) ) {
			$classes[] = esc_attr( $single_page_sidebar );
		} else {
			$pages_sidebar = get_theme_mod( 'swipewp_page_sidebar', 'right-sidebar' );
			$classes[] = esc_attr( $pages_sidebar );
		}
	}

	return $classes;
}
add_filter( 'body_class', 'swipewp_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function swipewp_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'swipewp_pingback_header' );

if( ! function_exists( 'swipewp_fonts_url' ) ) :

	/**
	 * Enqueue fonts.
	 */
	function swipewp_fonts_url(){
		$fonts_url = '';

		$swipewp_Montserrat = _x( 'on', 'Montserrat: on or off', 'swipewp' );
		$swipewp_OpenSans = _x( 'on', 'OpenSans: on or off', 'swipewp' );
		$swipewp_Playball = _x( 'on', 'Playball: on or off', 'swipewp' );

		$font_families = array();

		if ( 'off' !== $swipewp_Montserrat ) {
				$font_families[] = 'Montserrat:300,300i,400,500,500i,600,600i,700,800,900';
		}

		if ( 'off' !== $swipewp_OpenSans ) {
				$font_families[] = 'OpenSans:400,400i,600,600i,700';
		}

		if ( 'off' !== $swipewp_Playball ) {
				$font_families[] = 'Playball';
		}

		$query_args = array(
			'family' => rawurlencode( implode( '|', $font_families ) ),
			'subset' => rawurlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

		return esc_url_raw( $fonts_url );

	}

endif;

/**
 * Enqueue scripts and styles for only admin
 *
 * @since 1.0.0
 */
add_action( 'admin_enqueue_scripts', 'swipewp_admin_scripts' );

function swipewp_admin_scripts( $hook ) {

    global $swipewp_version;
    if( 'widgets.php' != $hook && 'edit.php' != $hook && 'post.php' != $hook && 'post-new.php' != $hook ) {
        return;
    }

    wp_enqueue_script( 'jquery-ui-button' );
    
    wp_enqueue_script( 'swipewp-admin-script', get_template_directory_uri() .'/assets/js/admin-scripts.js', array( 'jquery' ), esc_attr( $swipewp_version ), true );

    wp_enqueue_style( 'swipewp-admin-style', get_template_directory_uri() . '/assets/css/admin-styles.css', array(), esc_attr( $swipewp_version ) );
}

/**
 * Enqueue scripts and styles.
 */
function swipewp_scripts() {

    global $swipewp_version;
    
	wp_enqueue_style( 'swipewp-default-fonts', swipewp_fonts_url(), array(), null );
	
	wp_enqueue_style( 'swipewp-font-awesome-v4', get_template_directory_uri() . '/assets/library/font-awesome/css/v4-shims.css', array(), '5.8.1' );

	wp_enqueue_style( 'font-awesome-all', get_template_directory_uri() . '/assets/library/font-awesome/css/all.css', array(), '5.8.1' );

	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/library/animate/animate.min.css', array(), '3.7.0' );

	wp_enqueue_style( 'preloader', get_template_directory_uri() .'/assets/css/mt-preloader.css', array(), esc_attr( $swipewp_version ) );
	wp_enqueue_style( 'swipewp-style', get_stylesheet_uri(), array(), esc_attr( $swipewp_version ) );

	wp_enqueue_style( 'swipewp-responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array(), esc_attr( $swipewp_version ) );

	wp_enqueue_script( 'swipewp-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'swipewp-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'mt-combine-scripts', get_template_directory_uri() . '/assets/js/combine-scripts.js', array('jquery'), esc_attr( $swipewp_version ), true );

	wp_enqueue_script( 'swipewp-custom-scripts', get_template_directory_uri() . '/assets/js/custom-scripts.js', array('jquery'), esc_attr( $swipewp_version ) );

	$swipewp_enable_wow_effect = get_theme_mod( 'swipewp_enable_wow_effect', true );
	$swipewp_sticky_menu_option = get_theme_mod( 'swipewp_main_menu_sticky_menu_option', true );

	if( true === $swipewp_enable_wow_effect ) {
        $wow_value = 'on';
	} else {
        $wow_value = 'off';
    }

    if( true === $swipewp_sticky_menu_option ) {
    	$sticky_value = 'on';
    } else {
    	$sticky_value = 'off';
    }

    wp_localize_script( 'swipewp-custom-scripts', 'swipewpObject', array(
        'wow_effect'     => $wow_value,
        'sticky_option'  => $sticky_value
    ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'swipewp_scripts' );


if( ! function_exists( 'swipewp_get_categories_dropdown' ) ):

	/**
	 * get default categories
	 * 
	 * @since 1.0.0
	 * 
	 * @return array options array
	 */
	function swipewp_get_categories_dropdown() {
		$swipewp_cat_args = array(
			'orderby' 	=> 'name',
			'parent' 	=> 0
		);
		$swipewp_get_raw_cats = get_categories( $swipewp_cat_args );
		$swipewp_get_cat_list = array();
		$swipewp_get_cat_list[''] = esc_html__( 'Select Category', 'swipewp' );
		foreach ( $swipewp_get_raw_cats as $cat ) {
			$swipewp_get_cat_list[esc_attr( $cat->slug )] = esc_html( $cat->name );
		}
		return $swipewp_get_cat_list;
	}

endif;


if( ! function_exists( 'swipewp_search_icon' ) ):

	/**
	 * function to display the search icon with hidden search bar
	 * 
	 * @since 1.0.0
	 */
	function swipewp_search_icon() {
?>
		<div class="menu-search">
			<div class="search-icon"> <i class="fas fa-search"></i></div>
				<div class="search-form-wrapper">
					<div class="search-form-sub-wrapper">
						<div class="search-title"> 
							<?php echo sprintf( '%s', esc_html( 'Enter Your Keyword', 'swipewp' ) ); ?> 
						</div>
						<?php get_search_form(); ?>
					</div><!-- search-form-sub-wrapper -->
				</div><!-- search-form-wrapper -->
		</div>
<?php
	}

endif;

if( ! function_exists( 'side_menu_toggle' ) ):

	/**
	 * function to display the side menu toggle bars icon with hidden sidebar
	 * 
	 * @since 1.0.0
	 */
	function side_menu_toggle() {
		$swipewp_main_menu_toggle_bars_option = get_theme_mod( 'swipewp_main_menu_toggle_bars_option', true );
		if( false == $swipewp_main_menu_toggle_bars_option ){
			return;
		}
		$side_toggle_sidebar_inactive_txt = get_theme_mod( 'side_toggle_sidebar_inactive_txt', '' );
?>
			<div class="side-menu-toggle">
				<i class="fa fa-bars"></i>
			</div><!-- .side-menu-toggle -->
			<div class="sidebar-wrapper">
				<div class="sidebar-top-menu-toggle-wrap">
					<div class="side-menu-widget-wrapper">
					<?php
						if( is_active_sidebar( 'sidebar-top-menu-toggle' ) ){ 
							dynamic_sidebar( 'sidebar-top-menu-toggle' );
						}else{
							echo '<p class="side-toggle-text">'.esc_html( $side_toggle_sidebar_inactive_txt ).'</p>';
						}
					?>
					</div><!-- side-menu-widget-wrapper -->
				</div><!-- .sidebar-top-menu-toggle-wrap -->
			</div><!-- sidebar-wrapper -->
<?php
	}

endif;


if( ! function_exists( 'swipewp_get_front_page_sections' ) ):

	/**
	 * function to manage the front page section
	 * 
	 * @return array
	 * @since 1.0.0
	 */
	function swipewp_get_front_page_sections() {
		$front_sections = array( 'banner', 'service', 'portfolio', 'team', 'blog', 'cta','testimonials', 'sponsors' );
		return apply_filters( 'swipewp_front_page_sections_id', $front_sections );
	}

endif;

if ( ! function_exists( 'swipewp_inner_header_bg_image' ) ) :

    /**
     * Background image for inner page header
     *
     * @since 1.0.0
     */

    function swipewp_inner_header_bg_image( $input ) {

		$inner_image_id = get_theme_mod( 'swipewp_inner_header_image', '' );

		if( !empty( $inner_image_id ) ) {
			$image_url = wp_get_attachment_url( $inner_image_id );
			$input .= 'background-image:url(' . esc_url( $image_url ) . ');';
			$input .= 'background-size:cover;';
			
			return $input;
		}
        
    }

endif;

add_filter( 'swipewp_inner_header_style_attribute', 'swipewp_inner_header_bg_image' );

if( ! function_exists( 'swipewp_css_strip_whitespace' ) ) :
	
	/**
	 * Get minified css and removed space
	 *
	 * @since 1.0.0
	 */

    function swipewp_css_strip_whitespace( $css ){
        $replace = array(
            "#/\*.*?\*/#s" => "",  // Strip C style comments.
            "#\s\s+#"      => " ", // Strip excess whitespace.
        );
        $search = array_keys( $replace );
        $css = preg_replace( $search, $replace, $css );

        $replace = array(
            ": "  => ":",
            "; "  => ";",
            " {"  => "{",
            " }"  => "}",
            ", "  => ",",
            "{ "  => "{",
            ";}"  => "}", // Strip optional semicolons.
            ",\n" => ",", // Don't wrap multiple selectors.
            "\n}" => "}", // Don't wrap closing braces.
            "} "  => "}\n", // Put each rule on it's own line.
        );
        $search = array_keys( $replace );
        $css = str_replace( $search, $replace, $css );

        return trim( $css );
    }

endif;

if( ! function_exists( 'swipewp_dynamic_styles' ) ):

	/**
	 * Function to manage the dynamic styles
	 * 
	 * @since 1.0.0
	 */
	function swipewp_dynamic_styles() {

		$swipewp_primary_theme_color = get_theme_mod( 'swipewp_primary_theme_color', '#10b765' );

		$output_css = '';

		$output_css .= ".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.reply .comment-reply-link,.widget_search .search-submit, #masthead .search-form-wrapper .search-close, .side-menu-toggle-off,.woocommerce .price-cart:after,.woocommerce ul.products li.product .price-cart .button:hover, .woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content, .woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.added_to_cart.wc-forward, .woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover,.woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover, .woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .woocommerce #respond input#submit.alt.disabled,.woocommerce #respond input#submit.alt.disabled:hover,.woocommerce #respond input#submit.alt:disabled,.woocommerce #respond input#submit.alt:disabled:hover,.woocommerce #respond input#submit.alt[disabled]:disabled,.woocommerce #respond input#submit.alt[disabled]:disabled:hover,.woocommerce a.button.alt.disabled,.woocommerce a.button.alt.disabled:hover,.woocommerce a.button.alt:disabled,.woocommerce a.button.alt:disabled:hover,.woocommerce a.button.alt[disabled]:disabled,.woocommerce a.button.alt[disabled]:disabled:hover,.woocommerce button.button.alt.disabled,.woocommerce button.button.alt.disabled:hover,.woocommerce button.button.alt:disabled,.woocommerce button.button.alt:disabled:hover,.woocommerce button.button.alt[disabled]:disabled,.woocommerce button.button.alt[disabled]:disabled:hover,.woocommerce input.button.alt.disabled,.woocommerce input.button.alt.disabled:hover,.woocommerce input.button.alt:disabled,.woocommerce input.button.alt:disabled:hover,.woocommerce input.button.alt[disabled]:disabled,.woocommerce input.button.alt[disabled]:disabled:hover, .woocommerce select .selected, .page .woocommerce-info, .woocommerce-noreviews, p.no-comments, .mt-scroll-to-top-wrapper, #section-cta .cta-button.cta-button1 a:hover{ background: ". esc_attr( $swipewp_primary_theme_color ) ."}\n";

		$output_css .= "#preloader-background, a:hover, a:focus, a:active, .comment-author .fn .url:hover,.top-header-wrapper .top-element.phone::before, .top-header-wrapper .top-element.email::before, .top-header-wrapper .top-element.address::before, .social-link a:hover, #masthead #primary-menu li a:hover, .banner-btn-wrap a:hover,#secondary .widget-title:before, #secondary .widget a:hover,.cat-links a:hover::before,.edit-link a:hover::before,.widget a:hover::before,.widget li:hover::before,.posted-on a:hover::before,.comments-link a:hover::before, .banner-btn-wrap a:hover, .post-more-btn:hover:after, .post-more-btn:hover,#section-team .post-position, #section-blog .post-title a:hover,#colophon .widget_archive a:hover, #colophon .widget_categories a:hover, #colophon .widget_recent_entries a:hover, #colophon .widget_meta a:hover, #colophon .widget_pages li a:hover, #colophon .widget_nav_menu li a:hover, #colophon .cat-links a:hover, #colophon .edit-link a:hover, #colophon .site-info a:hover, .trail-items .trail-item::before, .trail-items li a:hover,.navigation .nav-links a:hover,.entry-date.published:hover,.author a:hover, .entry-title a:hover,.search-results .search-result-detail .entry-meta a:hover, .woocommerce .woocommerce-message:before,.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce .woocommerce-message:before,.woocommerce div.product p.price ins,.woocommerce div.product span.price ins,.woocommerce div.product p.price del,.woocommerce .woocommerce-info:before, .search-icon i:hover, .side-menu-toggle i:hover, #section-portfolio .post-more-btn:hover, #section-portfolio .post-more-btn:hover::after, #masthead .widget .mt-social-icons-wrapper a:hover, .widget_archive a:hover, .widget_categories a:hover, .widget_recent_entries a:hover, .widget_meta a:hover, .widget_recent_comments li:hover, .widget_rss li:hover, .widget_pages li a:hover, .widget_nav_menu li a:hover, .single .cat-links a:hover, .entry-footer a:hover, #section-service .sec-post-title a:hover,a{ color: ". esc_attr( $swipewp_primary_theme_color ) ."}\n";
		
		$output_css .= "#masthead.header-sticky, .widget_search .search-submit, .custom-header .custom-header-wrapper, .btn, button, input[type='button'], input[type='reset'], input[type='submit'], .comment-list .comment-body, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message, .woocommerce form .form-row.woocommerce-validated .select2-container, .woocommerce form .form-row.woocommerce-validated input.input-text, .woocommerce form .form-row.woocommerce-validated select, #section-cta .cta-button.cta-button1 a:hover { border-color: ". esc_attr( $swipewp_primary_theme_color ) ."}\n";

		$refine_output_css = swipewp_css_strip_whitespace( $output_css );

        wp_add_inline_style( 'swipewp-style', $refine_output_css );

	}

endif;

add_action( 'wp_enqueue_scripts', 'swipewp_dynamic_styles' );

if( ! function_exists( 'swipewp_font_awesome_social_icon_array' ) ) :
    /**
     * Define font awesome social media icons
     *
     * @return array();
     * @since 1.0.0
     */
    function swipewp_font_awesome_social_icon_array(){
        return array(
            "fa fa-facebook-square","fa fa-facebook-f","fa fa-facebook","fa fa-facebook-official","fa fa-twitter-square","fa fa-twitter","fa fa-yahoo","fa fa-google","fa fa-google-wallet","fa fa-google-plus-circle","fa fa-google-plus-official","fa fa-instagram","fa fa-linkedin-square","fa fa-linkedin","fa fa-pinterest-p","fa fa-pinterest","fa fa-pinterest-square","fa fa-google-plus-square","fa fa-google-plus","fa fa-youtube-square","fa fa-youtube","fa fa-youtube-play","fa fa-vimeo","fa fa-vimeo-square",
        );
    }
endif;

if( !function_exists( 'swipewp_social_media_icons' ) ):
    /**
     * Social media function
     *
     * @since 1.0.0
     */
    function swipewp_social_media_icons() {
        $get_social_media_icons = get_theme_mod( 'social_media_icons', '' );
        $get_decode_social_media = json_decode( $get_social_media_icons );
        if( ! empty( $get_decode_social_media ) ) {
            echo '<div class="mt-social-icons-wrapper">';
            foreach ( $get_decode_social_media as $single_icon ) {
                $icon_class = $single_icon->mt_icons_list;
                $icon_url = $single_icon->mt_url_field;
                if( !empty( $icon_url ) ) {
                    echo '<span class="social-link"><a href="'. esc_url( $icon_url ) .'" target="_blank"><i class="'. esc_attr( $icon_class ) .'"></i></a></span>';
                }
            }
            echo '</div><!-- .mt-social-icons-wrapper -->';
        }
    }
endif;


if( !function_exists( 'swipewp_footer_scroll_to_top_option' ) ):
    /**
     * Scroll To Top function
     *
     * @since 1.0.0
     */
    function swipewp_footer_scroll_to_top_option() {
        $swipewp_footer_scroll_to_top_option = get_theme_mod( 'swipewp_footer_scroll_to_top_option', 'true' );
        if( false == $swipewp_footer_scroll_to_top_option ) {
			return;
		} ?>
			<div class="mt-scroll-to-top-wrapper">
				<i class="fas fa-arrow-up"></i>
			</div><!-- .mt-scroll-to-top-wrapper -->
	<?php
	}
endif;


if( !function_exists( 'swipewp_read_more_button' ) ):
	/**
	 * function to use filter for read more button label
	 *
	 * @since 1.0.0
	 */
	function swipewp_read_more_button() {
		$button_label = apply_filters( 'swipewp_read_more_button_label', __( 'Read More', 'swipewp' ) );

		echo '<div class="post-more-btn-wrap"><a href="'.esc_url( get_the_permalink() ) .'" class="post-more-btn">'. esc_html( $button_label ) .'</a></div>';
	}

endif;