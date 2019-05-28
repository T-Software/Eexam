<?php
/**
 * Define custom fields for widgets
 * 
 * @package SwipeWP
 */

function swipewp_widget_fields( $instance, $widget_field, $swipewp_field_value ) {

    extract( $widget_field );
    
    switch ( $swipewp_widget_field_type ) {
        
        /**
         * text field
         */
        case 'text' :
        ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $swipewp_widget_field_name ) ); ?>"><?php echo esc_html( $swipewp_widget_field_title ); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $swipewp_widget_field_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $swipewp_widget_field_name ) ); ?>" type="text" value="<?php echo esc_html( $swipewp_field_value ); ?>" />

                <?php if ( isset( $swipewp_widget_field_description ) ) { ?>
                    <br />
                    <small><em><?php echo esc_html( $swipewp_widget_field_description ); ?></em></small>
                <?php } ?>
            </p>
        <?php
            break;
        
        default:
            break;
    }
}

function swipewp_sanitize_widget_field_value( $widget_field, $new_field_value ) {

    extract( $widget_field );

    return sanitize_text_field( $new_field_value );
}