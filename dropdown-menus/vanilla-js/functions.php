<?php

if ( ! function_exists( 'yourtheme_setup' ) ) {
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function yourtheme_setup() {
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array( 
			'primary' => __( 'Main Menu', 'yourtheme' )
		)
	);
}
endif;
add_action( 'after_setup_theme', 'yourtheme_setup' );

/**
 * Enqueue scripts and styles.
 */
function yourtheme_scripts() {
	wp_enqueue_style( 'yourtheme-style', get_stylesheet_uri() );

	wp_enqueue_script(
		'yourtheme-navigation',
		get_template_directory_uri() . '/js/dropdown.js',
		array(),
		'1.0',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'yourtheme_scripts' );
