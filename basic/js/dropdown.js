(function( $ ) { 'use strict';
	// make dropdowns functional on focus
	$( '.primary-menu' ).find( 'a' ).on( 'focus blur', function() {
		$( this ).parents( 'ul, li' ).toggleClass( 'focus' );
	} );
	
}(jQuery));