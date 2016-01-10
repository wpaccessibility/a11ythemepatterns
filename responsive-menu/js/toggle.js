(function( $ ) { 'use strict';
	// menu toggle	
	$( '.menu-toggle' ).on( 'click', function() { 
		$( '.primary-menu nav ul' ).toggle();
		var visible = $( '.primary-menu nav ul' ).is( ':visible' );
		if ( visible ) {
			$(this).addClass( 'open' ).attr( 'aria-expanded', 'true' );
		} else {
			$(this).removeClass( 'open' ).attr( 'aria-expanded', 'false' );
		}
	} );

}(jQuery));