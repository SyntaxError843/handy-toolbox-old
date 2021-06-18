/**
 * Globalize jQuery as $ :D
 */

(($) => {
    /**
     * Execute code when document is ready
     */

    $(() => {

		/**
		 * Turn all input elements of type range into a custom-made slider
		 */  
		const $element = $( 'input[type="range"]' );

		/**
		 * The States of the slider
		 * 
		 * Basically these are the available classes
		 * 
		 */
		const states = [ 'low', 'med-low', 'med', 'med-high', 'high' ];

		/**
		 * The complicated logic part D:
		 * 
		 * NO NEED TO EDIT THIS!
		 */

		var currentState;
		var $handle;

		$element.rangeslider( {

			polyfill: false,

			onInit: function () {

				$handle = $( '.rangeslider__handle', this.$range );
				updateHandle( $handle[0], this.value );
				this.max !== 0 ? checkState( this.value / this.max ) : checkState( 0 );

			},

			onSlide: function ( position, value ) {

				$handle = $( '.rangeslider__handle', this.$range );
				updateHandle( $handle[0], value );
				this.max !== 0 ? checkState( this.value / this.max ) : checkState( 0 );

			},

		} );

		// Update the value inside the slider handle
		function updateHandle( el, val ) {

			el.textContent = val;

		}

		// Check if the slider state has changed
		function checkState( val ) {

			const currentIndex =  Math.floor(val * 4);

			if ( states[ currentIndex ] !== currentState ) {

				currentState = states[ currentIndex ];

				// Update handle color
				$handle
				.removeClass( function ( index, css ) {

					return ( css.match( /(^|\s)js-\S+/g ) || [] ).join( " " );

				} )
				.addClass( "js-" + currentState );

			}

		}

	} );
	
})(jQuery);
