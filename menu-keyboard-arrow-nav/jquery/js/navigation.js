// menu navigation with arrow keys 


( function( $ ) {

  $('.menu-item a').on('keydown', function(e) {

		// left key
		if(e.which === 37) {
			e.preventDefault();
			$(this).parent().prev().children('a').focus();
		}
		// right key
		else if(e.which === 39) {
			e.preventDefault();
			$(this).parent().next().children('a').focus();
		}
		// down key
		else if(e.which === 40) {
			e.preventDefault();
			if($(this).next().length){
				$(this).next().find('li:first-child a').first().focus();
			}
			else {
				$(this).parent().next().children('a').focus();
			}
		}
		// up key
		else if(e.which === 38) {
			e.preventDefault();
			if($(this).parent().prev().length){
				$(this).parent().prev().children('a').focus();
			}
			else {
				$(this).parents('ul').first().prev('a').focus();
			}
		}

	});

} )( jQuery );
