		<div class='primary-menu'>
			<?php
				/*
				 * Aria Label: Provides a label to differentiate multiple navigation landmarks
				 * hidden heading: provides navigational structure to site for scanning with screen reader
				 *
				 * aria-hidden: Hides icon fonts from screen readers. If read, icon fonts may be read as "unpronounceable character".
				 *
				 * aria-expanded: Indicates whether or not the button currently represents an expanded or closed resource; value changes with JS
				 */
			?>
			<nav role="navigation" aria-label='<?php _e( 'Primary Menu ', 'yourtheme' ); ?>'>
				<button class='menu-toggle' aria-controls='menu-primary-id' aria-expanded='false'><span class='dashicons dashicons-menu' aria-hidden='true'></span> <span><?php _e( 'Toggle Menu','yourtheme' ); ?></span></button>			
				<?php wp_nav_menu( array( 'theme_location'=>'primary', 'menu_id'=>'menu-primary-id' ) ); ?>
			</nav>
		</div>