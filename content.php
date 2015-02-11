<?php
/**
 * Use this code snippet in your content.php to output accessible read more links.
 *
 * Be sure to change the text domain to the one matching your theme.
 */
?>
	<?php
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading %s', 'yourtheme' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		) );
	?>