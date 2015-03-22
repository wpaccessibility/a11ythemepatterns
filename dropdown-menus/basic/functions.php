<?php

add_action( 'after_setup_theme', 'universal_setup' );
if ( ! function_exists( 'universal_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 *
	 *
	 * @uses register_nav_menus() To add support for navigation menus.
	 *
	 * @since YourTheme 0.9
	 */
	function universal_setup() {

		register_nav_menus( array( 
				'primary' => __( 'Main Menu', 'universal' )
			)
		);		
		
	}
}
