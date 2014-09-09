<?php

add_theme_support('post-thumbnails');


function hntr_load_javascript_files() {
	wp_enqueue_script('jquery');	
	wp_enqueue_script('background', get_template_directory_uri().'/scripts/background.js', array('jquery'));
	if ( is_front_page() ) {
		wp_enqueue_script('home-page-script', get_template_directory_uri().'/scripts/home.js', array('jquery', 'background'));
		
	} else {
		wp_enqueue_script('regular-page-script', get_template_directory_uri().'/scripts/page.js', array('jquery', 'background'));
	}
}

add_action( 'wp_enqueue_scripts', 'hntr_load_javascript_files' );
?>