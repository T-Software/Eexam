<?php
/**
 * Contains functions related to the theme widgets.
 * 
 * @package SwipeWP
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function swipewp_widgets_init() {
    
    /**
     * Register default sidebar
     * 
     * @since 1.0.0
     */
    register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'swipewp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'swipewp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
    ) );

    /**
     * Register Top Menu toggle sidebar
     * 
     * @since 1.0.0
     */
    register_sidebar( array(
      'name'          => esc_html__( 'Top Toggle Menu Sidebar', 'swipewp' ),
      'id'            => 'sidebar-top-menu-toggle',
      'description'   => esc_html__( 'Add widgets here.', 'swipewp' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4 class="widget-title">',
      'after_title'   => '</h4>',
      ) );    
    
    /**
     * Register footer widget area
     * 
     * @since 1.0.0
     */
    register_sidebars( 4, array(
		'name'          => esc_html__( 'Footer Area %d', 'swipewp' ),
		'id'            => 'swipewp-footer-area',
		'description'   => esc_html__( 'Added widgets are display at footer widget area.', 'swipewp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'swipewp_widgets_init' );

if( ! function_exists( 'swipewp_register_widgets' ) ):

    /**
     * Function to register required widgets
     * 
     * @since 1.0.0
     */
    function swipewp_register_widgets() {

        // Register social icons widget
        register_widget( 'swipewp_Social_Icons' );
    }

endif;

add_action( 'widgets_init', 'swipewp_register_widgets' );


/**
 * Load required files for widget
 * 
 * @since 1.0.0
 */

require get_template_directory() . '/inc/widgets/widget-fields.php';
require get_template_directory() . '/inc/widgets/mt-social-icons.php';