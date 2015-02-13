<?php

/**
 * Enqueues /js/dropdown.js. For jQuery use the commented out wp_enqueue_script.
 * Remember to update the text domain to match your theme.
 */
function yourtheme_scripts() {
	wp_enqueue_script(
		'yourtheme-navigation',
		get_template_directory_uri() . '/js/dropdown.js',
		array(),
		'1.0',
		true
	);

	/*
	wp_enqueue_script(
		'yourtheme-navigation',
		get_template_directory_uri() . '/js/jquery-dropdown.js',
		array( 'jquery' ),
		'1.0',
		true
	);
	*/
}
add_action( 'wp_enqueue_scripts', 'yourtheme_scripts' );
