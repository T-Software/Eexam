/**
 * Custom scripts for Radio Buttonset Control
 *
 * @package SwipeWP
 */

wp.customize.controlConstructor['radio-buttonset'] = wp.customize.Control.extend({

	ready: function() {

		'use strict';

		var control = this;

		// Change the value
		this.container.on( 'click', 'input', function() {
			control.setting.set( jQuery( this ).val() );
		});
	}

});