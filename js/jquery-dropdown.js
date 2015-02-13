/**
 * Update the id on line 5 to match the menu container in your theme.
 */
( function( $ ) {
	$( '#site-navigation' ).find( 'a' ).on( 'focus blur', function() {
		$( this ).parents( 'li' ).toggleClass( 'focus' );
	} );
} )( jQuery );