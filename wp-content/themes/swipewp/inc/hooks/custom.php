<?php
/**
 * Custom hook functions.
 * 
 * This file contains hook functions attached to theme hooks.
 * 
 * @package SwipeWP
 */

if( ! function_exists( 'swipewp_doctype' ) ):

    /**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
	function swipewp_doctype() {
?>
        <!DOCTYPE html>
        <html <?php language_attributes(); ?>>
<?php
    }
    
endif;

add_action( 'swipewp_action_doctype', 'swipewp_doctype', 10 );


if( ! function_exists( 'swipewp_head_meta' ) ):

    /**
     * Header meta
     * 
     * @since 1.0.0
     */
    function swipewp_head_meta() {
?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">
<?php
    }

endif;
add_action( 'swipewp_action_head', 'swipewp_head_meta', 10 );

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'swipewp_preloader' ) ):

    /**
     * preloader function
     * 
     * @since 1.0.0
     */
    function swipewp_preloader() {
        $swipewp_enable_preloader = get_theme_mod( 'swipewp_enable_preloader', true );
        if( false == $swipewp_enable_preloader ){
            return;
        }
?>
        <div id="preloader-background">
            <div class="preloader-wrapper">
                <div class="sk-spinner sk-spinner-pulse"></div>
            </div><!-- .preloader-wrapper -->
        </div><!-- #preloader-background -->
<?php
    }
endif;
add_action( 'swipewp_action_before_header', 'swipewp_preloader', 5 );

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'swipewp_page_start' ) ):

    /**
     * page start
     * 
     * @since 1.0.0
     */
    function swipewp_page_start() {
?>
        <div id="page" class="site">
	        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'swipewp' ); ?></a>
<?php
    }
endif;
add_action( 'swipewp_action_before_header', 'swipewp_page_start', 10 );

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'swipewp_top_header' ) ):

    /**
     * function to display top header content
     * 
     * @since 1.0.0
     */
    function swipewp_top_header() {
        $swipewp_top_header_option = get_theme_mod( 'swipewp_top_header_option', true );
        if( false !== $swipewp_top_header_option ) {
            $top_header_phone = get_theme_mod( 'top_header_phone', __( '+01 452 4587254', 'swipewp' ) );
            $top_header_email = get_theme_mod( 'top_header_email', __( 'info@example.com', 'swipewp' ) );
            $top_header_address = get_theme_mod( 'top_header_address' , __( '8108 W. Saxon Street', 'swipewp' ) );
            $swipewp_top_social_option = get_theme_mod( 'swipewp_top_social_option', true );
            if( !empty( $top_header_phone ) || !empty( $top_header_email ) || !empty( $top_header_address ) || false !== $swipewp_top_social_option ) {
?>
                <div class="top-header-wrapper">
                    <div class="mt-container mt-clearfix">
                        <div class="top-header">
                            <div class="top-left-sec">
                                <div class="top-element phone">
                                    <?php echo esc_html( $top_header_phone ); ?>
                                </div><!-- .phone -->
                                <div class="top-element email">
                                    <?php echo esc_html( $top_header_email ); ?>
                                </div><!-- .email -->
                                <div class="top-element address">
                                    <?php echo esc_html( $top_header_address ); ?>
                                </div><!-- .address -->
                            </div><!-- .top-left-sec -->
                            
                                <?php 
                                if( true == $swipewp_top_social_option ){
                                    echo '<div class="top-right-sec">';
                                        swipewp_social_media_icons();
                                    echo '</div><!-- .top-right-sec -->';    
                                } ?>
                            
                        </div><!-- .top-header -->
                    </div><!-- .mt-container -->
                </div><!-- .top-header-wrapper -->
<?php
            }
        }
    }

endif;
add_action( 'swipewp_action_before_header', 'swipewp_top_header', 20 );

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'swipewp_header_start' ) ):

    /**
     * header start
     * 
     * @since 1.0.0
     */
    function swipewp_header_start() {
?>
      
            <header id="masthead" class="site-header" itemscope itemtype="http://schema.org/WPHeader">
                <div class="mt-container">

<?php
    }

endif;
add_action( 'swipewp_action_header', 'swipewp_header_start', 10 );

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'swipewp_site_branding' ) ):

    /**
     * site branding
     * 
     * @since 1.0.0
     */
    function swipewp_site_branding() {
?>
        <div class="site-branding" itemscope itemtype="http://schema.org/Organization">
			<?php
            the_custom_logo();
                if ( is_front_page() || is_home() ) :
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                else :
                    ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                endif;
                $swipewp_description = get_bloginfo( 'description', 'display' );
                if ( $swipewp_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo wp_kses_post($swipewp_description); /* WPCS: xss ok. */ ?></p>
                <?php endif; ?>
		</div><!-- .site-branding -->
<?php
    }
endif;
add_action( 'swipewp_action_header', 'swipewp_site_branding', 20 );

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'swipewp_primary_menu' ) ):

    /**
     * primary menu
     * 
     * @since 1.0.0
     */
    function swipewp_primary_menu() {
?>
        <div class="menu-wrapper">
            <nav id="site-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">  
            <div class="menu-toggle-off"><i class="fas fa-arrow-right"></i></div>             
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary_menu',
                        'menu_id'        => 'primary-menu',
                    ) );
                ?>
            </nav><!-- #site-navigation -->

            <div class="masthead-right-side">
                <?php $swipewp_main_menu_cart_option = get_theme_mod( 'swipewp_main_menu_cart_option', true );
                    if ( false !== $swipewp_main_menu_cart_option && class_exists( 'WooCommerce' ) ) { ?>
                        <div class="menu-cart-wrapper">
                            <?php swipewp_woocommerce_header_cart(); ?>
                        </div>
                <?php }

                    $swipewp_main_menu_search_option = get_theme_mod( 'swipewp_main_menu_search_option', true );
                    if( false !== $swipewp_main_menu_search_option ) {
                            swipewp_search_icon();
                    }
                    
                    side_menu_toggle();
                ?>
            </div><!--masthead-right-side -->
            <div class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></div>
        </div><!-- .menu-wrapper -->
<?php
    }

endif;
add_action( 'swipewp_action_header', 'swipewp_primary_menu', 30 );

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'swipewp_header_end' ) ):

    /**
     * header end
     * 
     * @since 1.0.0
     */
    function swipewp_header_end() {
?>
                </div><!-- .mt-container -->
            </header><!-- #masthead -->
<?php
    }

endif;
add_action( 'swipewp_action_header', 'swipewp_header_end', 40 );

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'swipewp_inner_page_header_start' ) ) :

	/**
	 * function to manage starting div of section
     * 
     * @since 1.0.0
	 */

	function swipewp_inner_page_header_start() {
		$inner_header_attribute = '';
		$inner_header_attribute = apply_filters( 'swipewp_inner_header_style_attribute', $inner_header_attribute );
		if( !empty( $inner_header_attribute ) ) {
			$header_class = 'has-bg-img';
		} else {
			$header_class = 'no-bg-img';
		}
?>
		<div class="custom-header <?php echo esc_attr( $header_class ); ?>" <?php echo ( ! empty( $inner_header_attribute ) ) ? ' style="' . esc_attr( $inner_header_attribute ) . '" ' : ''; ?>>
            <div class="custom-header-wrapper">
                <div class="mt-container">
<?php
                if( is_single() || is_page() ) {
                    echo '<header class="entry-header">';
                } else {
                    echo '<header class="page-header">';
                }
    	}

endif;
add_action( 'swipewp_action_inner_page_header', 'swipewp_inner_page_header_start', 10 );

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'swipewp_inner_page_header_title' ) ) :
    /**
     * function to display the page title
     * 
     * @since 1.0.0
     */

    function swipewp_inner_page_header_title() {
        if( is_single() || is_page() ) {
            the_title( '<h1 class="entry-title">', '</h1>' );
        } elseif( is_archive() ) {
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
        } elseif( is_search() ) {
    ?>
            <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'swipewp' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    <?php
        } elseif( is_404() ) {
            echo '<h1 class="entry-title">'. esc_html( '404 Error', 'swipewp' ) .'</h1>';
        } elseif( is_home() ) {
            $page_for_posts_id = get_option( 'page_for_posts' );
            $page_title = get_the_title( $page_for_posts_id );
    ?>
            <h1 class="entry-title"><?php echo esc_html( $page_title ); ?></h1>
    <?php
        }
    }

endif;
add_action( 'swipewp_action_inner_page_header', 'swipewp_inner_page_header_title', 20 );

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if( !function_exists( 'swipewp_inner_page_breadcrumb_content' ) ) :

    /**
     * function to manage the breadcrumbs content
     * 
     * @since 1.0.0
     */

    function swipewp_inner_page_breadcrumb_content() {

        $swipewp_enable_breadcrumbs = get_theme_mod( 'swipewp_enable_breadcrumbs', true );

        if ( false === $swipewp_enable_breadcrumbs ) {
            return;
        }
?>
        <nav id="breadcrumb" class="mt-breadcrumb">
            <?php
            breadcrumb_trail( array(
                'container'   => 'div',
                'before'      => '<div class="breadcrumb-wrapper">',
                'after'       => '</div>',
                'show_browse' => false,
            ) );
            ?>
        </nav>
<?php
    }

endif;
add_action( 'swipewp_action_inner_page_header', 'swipewp_inner_page_breadcrumb_content', 30 );

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'swipewp_inner_page_header_end' ) ) :

    /**
     * function to manage ending div of section
     * 
     * @since 1.0.0
     */

    function swipewp_inner_page_header_end() {
?>
                </header>
            </div><!-- .mt-container -->
        </div><!-- custom-header-wrapper -->
    </div><!-- .custom-header -->
<?php
	}
	
endif;
add_action( 'swipewp_action_inner_page_header', 'swipewp_inner_page_header_end', 40 );

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'swipewp_content_start' ) ):

    /**
     * content start
     * 
     * @since 1.0.0
     */
    function swipewp_content_start() {
?>
        <div id="content" class="site-content">
<?php
    }

endif;
add_action( 'swipewp_action_before_content', 'swipewp_content_start', 10 );

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'swipewp_content_end' ) ):

    /**
     * content end
     * 
     * @since 1.0.0
     */
    function swipewp_content_end() {
?>
        </div><!-- #content -->
<?php
    }

endif;
add_action( 'swipewp_action_after_content', 'swipewp_content_end', 10 );

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 
if( ! function_exists( 'swipewp_footer_start' ) ):

    /**
     * footer section start
     * 
     * @since 1.0.0
     */
    function swipewp_footer_start() {
        echo '<footer id="colophon" class="site-footer" itemscope itemtype="http://schema.org/WPFooter">';
    }

endif;
add_action( 'swipewp_action_footer', 'swipewp_footer_start', 10 );

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 
if( ! function_exists( 'swipewp_top_footer_widgets_wrapper_start' ) ):
    /**
     * Top footer wrapper start
     * 
     */
    function swipewp_top_footer_widgets_wrapper_start() {
?>
     <div class="top-footer-wrapper mt-column-wrapper">
        <div class="mt-container">
<?php
    }
endif;

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 
$swipewp_footer_widgets_column = get_theme_mod( 'swipewp_footer_widgets_column', 'mt-column-3' );
if( ! function_exists( 'swipewp_top_footer_widgets_one' ) ):
    /**
     * Top footer widget one
     * 
     */
    function swipewp_top_footer_widgets_one() {
        global $swipewp_footer_widgets_column;
        if( !is_active_sidebar( 'swipewp-footer-area' ) ){
            return;
        }
        echo '<div class="swipewp-footer-area '.esc_html( $swipewp_footer_widgets_column ).'">';
            dynamic_sidebar( 'swipewp-footer-area' );
        echo '</div><!-- .swipewp-footer-area -->';
    }
endif;

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 
if( ! function_exists( 'swipewp_top_footer_widgets_two' ) ):
    /**
     * Top footer widget two
     * 
     */
    function swipewp_top_footer_widgets_two() {
        global $swipewp_footer_widgets_column;
        if( !is_active_sidebar( 'swipewp-footer-area-2' ) || $swipewp_footer_widgets_column == 'mt-column-1' ){
            return;
        }
        echo '<div class="swipewp-footer-area '.esc_html( $swipewp_footer_widgets_column ).'">';
            dynamic_sidebar( 'swipewp-footer-area-2' );
        echo '</div><!-- .swipewp-footer-area -->';
    }
endif;

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 
if( ! function_exists( 'swipewp_top_footer_widgets_three' ) ):
    /**
     * Top footer widget three
     * 
     */
    function swipewp_top_footer_widgets_three() {
        global $swipewp_footer_widgets_column;
        if( !is_active_sidebar( 'swipewp-footer-area-3' ) || $swipewp_footer_widgets_column == 'mt-column-1' || $swipewp_footer_widgets_column == 'mt-column-2' ){
            return;
        }
        echo '<div class="swipewp-footer-area '.esc_html( $swipewp_footer_widgets_column ).'">';
            dynamic_sidebar( 'swipewp-footer-area-3' );
        echo '</div><!-- .swipewp-footer-area -->';
    }
endif;

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 
if( ! function_exists( 'swipewp_top_footer_widgets_four' ) ):
    /**
     * Top footer widget four
     * 
     */
    function swipewp_top_footer_widgets_four() {
        global $swipewp_footer_widgets_column;
        if( !is_active_sidebar( 'swipewp-footer-area-4' ) || $swipewp_footer_widgets_column != 'mt-column-4' ){
            return;
        }
        echo '<div class="swipewp-footer-area '.esc_html( $swipewp_footer_widgets_column ).'">';
            dynamic_sidebar( 'swipewp-footer-area-4' );
        echo '</div><!-- .swipewp-footer-area -->';    
    }
endif;

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 
if( ! function_exists( 'swipewp_top_footer_widgets_wrapper_end' ) ):
    /**
     * Top footer wrapper end
     * 
     */
    function swipewp_top_footer_widgets_wrapper_end() {
?>      </div><!--mt-container -->
        </div><!-- .top-footer-wrapper -->
        <?php
        swipewp_footer_scroll_to_top_option();
        ?>
<?php
    }
endif;

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 
$swipewp_footer_widgets_option = get_theme_mod( 'swipewp_footer_widgets_option', true );
if( true == $swipewp_footer_widgets_option ){
    add_action( 'swipewp_action_footer', 'swipewp_top_footer_widgets_wrapper_start', 20 );
    add_action( 'swipewp_action_footer', 'swipewp_top_footer_widgets_one', 30 );
    add_action( 'swipewp_action_footer', 'swipewp_top_footer_widgets_two', 40 );
    add_action( 'swipewp_action_footer', 'swipewp_top_footer_widgets_three', 50 );
    add_action( 'swipewp_action_footer', 'swipewp_top_footer_widgets_four', 60 );
    add_action( 'swipewp_action_footer', 'swipewp_top_footer_widgets_wrapper_end', 70 );
}

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 
if( ! function_exists( 'swipewp_footer_copyright' ) ):
    /**
     * Footer Copyright text 
     * 
     */
    function swipewp_footer_copyright() {

        $swipewp_copyright_text = get_theme_mod( 'swipewp_copyright_text', 'swipewp' );
?>
        <div class="site-info">
            <div class="mt-container">
            <?php
                if( !empty( $swipewp_copyright_text ) ) {
                    echo '<span class="copyright-text">'. esc_html( $swipewp_copyright_text ) .'</span>';
                }
            ?>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'swipewp' ), 'swipewp', '<a href="https://mysterythemes.com/">Mystery Themes</a>' );
				?>
            </div><!-- mt-container -->
		</div><!-- .site-info -->
<?php
    }
endif;
add_action( 'swipewp_action_footer', 'swipewp_footer_copyright', 80 );

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 


if( ! function_exists( 'swipewp_footer_end' ) ):

    /**
     * footer section end
     * 
     * @since 1.0.0
     */
    function swipewp_footer_end() {
        echo '</footer><!-- #colophon -->';
    }

endif;
add_action( 'swipewp_action_footer', 'swipewp_footer_end', 90 );