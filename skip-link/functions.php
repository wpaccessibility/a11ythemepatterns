<?php

function yourtheme_enqueue_scripts() {
	wp_enqueue_script( 'yourtheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
}
add_action( 'wp_enqueue_scripts', 'yourtheme_enqueue_scripts' );