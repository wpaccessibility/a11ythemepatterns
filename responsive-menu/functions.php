<?php

/**
 * Enqueue scripts to handle opening and closing of menu toggle.
 */
add_action( 'wp_enqueue_scripts', 'yourtheme_scripts' );
function yourtheme_scripts() {
	wp_enqueue_script( 'yourtheme-responsive-toggle', get_template_directory_uri() . '/js/toggle.js', array('jquery'), '20160110', true);
}