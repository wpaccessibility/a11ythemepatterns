<?php

if ( ! function_exists( 'yourtheme_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 * Be sure to change the text domain to the one matching your theme.
 *
 * @since Your Theme 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function yourtheme_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading %s', 'yourtheme' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'yourtheme_excerpt_more' );
endif;