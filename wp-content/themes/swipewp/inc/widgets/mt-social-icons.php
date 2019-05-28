<?php
/**
 * Widget for Social Icons
 * 
 * @package SwipeWP
 */

if( ! class_exists( 'swipewp_Social_Icons' ) ):

    /**
     * Social Icons Widget
     * 
     * @since 1.0.0
     */

    class swipewp_Social_Icons extends WP_Widget {

        /**
         * Register widget with WordPress
         */

        public function __construct() {
           
            $widget_opts = array(
                'classname'                     => 'swipewp_social_icons',
                'description'                   => __( 'Display the assigned social icons, from customizer.', 'swipewp' ),
                'customize_selective_refresh'   => true,
            );

            parent::__construct( 'swipewp_social_icons', __( 'MT: Social Icons', 'swipewp' ), $widget_opts );
        }

        /**
         * Helper function that holds widget fields
         * Array is used in update and form functions
         */
        private function widget_fields() {
            $fields = array(
                'widget_title'      => array(
                    'swipewp_widget_field_name' => 'widget_title',
                    'swipewp_widget_field_title'  =>  __( 'Widget Title', 'swipewp' ),
                    'swipewp_widget_field_type'   => 'text',
                    'swipewp_widget_field_default' => __( 'Social Icons', 'swipewp' )
                )
            );

            return $fields;
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget( $args, $instance ) {
            extract( $args );

            if( empty( $instance ) ) {
                return ;
            }

            $widget_title = empty( $instance['widget_title'] ) ? '' : $instance['widget_title'];

            echo $before_widget;

                if( !empty( $widget_title ) ) {
                    echo $before_title.esc_html( $widget_title ).$after_title;
                }

                swipewp_social_media_icons();
                
            echo $after_widget;
        }

            /**
             * Sanitize widget form values as they are saved.
             *
             * @see WP_Widget::update()
             *
             * @param   array   $new_instance   Values just sent to be saved.
             * @param   array   $old_instance   Previously saved values from database.
             *
             * @uses    swipewp_sanitize_widget_field_value()      defined in enrollment-widget-fields.php
             *
             * @return  array Updated safe values to be saved.
             */
            public function update( $new_instance, $old_instance ) {
                $instance = $old_instance;

                $widget_fields = $this->widget_fields();

                // Loop through fields
                foreach ( $widget_fields as $widget_field ) {

                    extract( $widget_field );

                    // Use helper function to get updated field values
                    $instance[$swipewp_widget_field_name] = swipewp_sanitize_widget_field_value( $widget_field, $new_instance[$swipewp_widget_field_name] );
                }

                return $instance;
            }

            /**
             * Back-end widget form.
             *
             * @see WP_Widget::form()
             *
             * @param   array $instance Previously saved values from database.
             *
             * @uses    swipewp_widget_fields()        defined in enrollment-widget-fields.php
             */
            public function form( $instance ) {

                $widget_fields = $this->widget_fields();

                // Loop through fields
                foreach ( $widget_fields as $widget_field ) {

                    // Make array elements available as variables
                    extract( $widget_field );
                    if( !empty( $instance[$swipewp_widget_field_name] ) ) {
                        $swipewp_field_value = $instance[$swipewp_widget_field_name];
                    } elseif( isset( $widget_field['swipewp_widget_field_default'] ) ) {
                        $swipewp_field_value = $widget_field['swipewp_widget_field_default'];
                    } else {
                        $swipewp_field_value = null;
                    }
                    swipewp_widget_fields( $this, $widget_field, $swipewp_field_value );
                }
            }
    }
endif;