		<div class='primary-menu'>
			<?php
				/*
				 * Aria Label: Provides a label to differentiate multiple navigation landmarks
				 * hidden heading: provides navigational structure to site for scanning with screen reader
				 */
			?>
			<nav role="navigation" aria-label='<?php _e( 'Primary Menu ', 'universal' ); ?>'>
				<h1 class="screen-reader-text"><?php _e( 'Primary Menu', 'universal' ); ?></h1>
				<?php wp_nav_menu( array( 'theme_location'=>'primary' ) ); ?>
			</nav>
		</div>