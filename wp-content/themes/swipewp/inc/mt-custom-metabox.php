<?php
/**
 * Functions for rendering meta boxes in post/page
 * 
 * @package SwipeWP
 */

add_action( 'add_meta_boxes', 'swipewp_sidebar_meta_boxes', 10, 2 );

if( ! function_exists( 'swipewp_sidebar_meta_boxes' ) ):

    /**
     * Register meta boxes
     * 
     * @since 1.0.0
     */
    function swipewp_sidebar_meta_boxes() {
    
        add_meta_box(
            'swipewp_post_sidebar',
            __( 'Sidebar Layout', 'swipewp' ),
            'swipewp_sidebar_callback',
            'post',
            'side',
            'default'
        );
        
        add_meta_box(
            'swipewp_post_sidebar',
            __( 'Sidebar Layout', 'swipewp' ),
            'swipewp_sidebar_callback',
            'page',
            'side',
            'default'
        );
        
    }

endif;

if( ! function_exists( 'swipewp_sidebar_callback' ) ):
    
    /**
     * Meta box display callback.
     *
     * @param WP_Post $post Current post object.
     * @since 1.0.0
     */
    function swipewp_sidebar_callback( $post ) {

        // Setup sidebar options.
        $swipewp_post_sidebar_option = array(
            'default-sidebar' => array(
                'id'        => 'post-default-sidebar',
                'value'     => 'default-sidebar',
                'label'     => __( 'Default Sidebar', 'swipewp' ),
                'thumbnail' => get_template_directory_uri() . '/assets/images/default-sidebar.png'
            ),
            'left-sidebar' => array(
                'id'        => 'post-right-sidebar',
                'value'     => 'left-sidebar',
                'label'     => __( 'Left sidebar', 'swipewp' ),
                'thumbnail' => get_template_directory_uri() . '/assets/images/left-sidebar.png'
            ),
            'right-sidebar' => array(
                'id'        => 'post-left-sidebar',
                'value'     => 'right-sidebar',
                'label'     => __( 'Right sidebar', 'swipewp' ),
                'thumbnail' => get_template_directory_uri() . '/assets/images/right-sidebar.png'
            ),
            'no-sidebar'    => array(
                'id'        => 'post-no-sidebar',
                'value'     => 'no-sidebar',
                'label'     => __( 'No sidebar Full width', 'swipewp' ),
                'thumbnail' => get_template_directory_uri() . '/assets/images/no-sidebar.png'
            ),
            'no-sidebar-center' => array(
                'id'        => 'post-no-sidebar-center',
                'value'     => 'no-sidebar-center',
                'label'     => __( 'No sidebar Content Centered', 'swipewp' ),
                'thumbnail' => get_template_directory_uri() . '/assets/images/no-sidebar-center.png'
            )
        );
    
        // Check for previously set.
        $post_sidebar = get_post_meta( $post->ID, 'swipewp_post_sidebar', true );
    
        // If it is then we use it otherwise set to default.
        $post_sidebar = ( $post_sidebar ) ? $post_sidebar : 'default-sidebar';
    
        // Create our nonce field.
        wp_nonce_field( 'swipewp_nonce_' . basename( __FILE__ ) , 'swipewp_post_sidebar_nonce' );
    
    ?>
        <div class="mt-meta-options-wrap">
            <div class="buttonset">
                <?php
                    foreach ( $swipewp_post_sidebar_option as $field ) {
                ?>
                        <input type="radio" id="<?php echo esc_attr( $field['id'] ); ?>" value="<?php echo esc_attr( $field['value'] ); ?>" name="swipewp_post_sidebar" <?php checked( $field['value'], $post_sidebar ); ?> />
                        <label for="<?php echo esc_attr( $field['id'] ); ?>">
                            <span class="screen-reader-text"><?php echo esc_html( $field['label'] ); ?></span>
                            <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" title="<?php echo esc_attr( $field['label'] ); ?>" alt="<?php echo esc_attr( $field['label'] ); ?>" />
                        </label>
                    
                <?php } ?>
            </div><!-- .buttonset -->
        </div><!-- .mt-meta-options-wrap -->
    <?php
    }

endif;

add_action( 'save_post', 'swipewp_save_post_meta' );

if( ! function_exists( 'swipewp_save_post_meta' ) ) :

    /**
     * Save meta box content.
     * 
     * @param int $post_id Post ID
     * @since 1.0.0
     */
    function swipewp_save_post_meta( $post_id ) {
        // Checks save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST['swipewp_post_sidebar_nonce'] ) && wp_verify_nonce( $_POST['swipewp_post_sidebar_nonce'], 'swipewp_nonce_' . basename( __FILE__ ) ) ) ? 'true' : 'false';
    
        // Exits script depending on save status
        if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
            return;
        }
    
        // Check for out input value.
        if ( isset( $_POST['swipewp_post_sidebar'] ) ) {
            
            // We validate making sure that the option is something we can expect.
            $value = in_array( $_POST['swipewp_post_sidebar'], array( 'no-sidebar', 'left-sidebar', 'right-sidebar', 'no-sidebar-center', 'default-sidebar' ) ) ? $_POST['swipewp_post_sidebar'] : 'default-sidebar';
            
            // We update our post meta.
            update_post_meta( $post_id, 'swipewp_post_sidebar', $value );
        }
    }

endif;
