<?php

 // Enqueue scripts

function yourtheme_scripts() {

	wp_enqueue_script(
		'yourtheme-menu-arrow-nav',
		get_template_directory_uri() . '/js/navigation.js', array(), '20150423', true);

}

add_action( 'wp_enqueue_scripts', 'yourtheme_scripts' );
