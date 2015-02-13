/**
 * Update the id on line 7 to match the menu container in your theme.
 */
( function() {
	var container,
		links;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	links = container.getElementsByTagName( 'a' );

	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].onfocus = toggleFocus;
		links[i].onblur = toggleFocus;
	}

	// Toggle the .focus class on li tag ancestors of the target link.
	function toggleFocus() {
		var current = this;

		while ( container !== current ) {
			if ( 'li' === current.tagName.toLowerCase() ) {
				if ( -1 !== current.className.indexOf( 'focus' ) ) {
					current.className = current.className.replace( ' focus', '' );
				} else {
					current.className += ' focus';
				}
			}
			current = current.parentElement;
		}
	}
} )();
