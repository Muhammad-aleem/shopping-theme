<?php
/**
 * Add Styles & scripts Template
 * 
 * @package Certified Theme
 */


function custom_cf_style_scripts() {

	wp_enqueue_style( 'style.css',get_template_directory_uri()."/assets/css/style.css");
	wp_enqueue_style( 'bootstrap.min.css',get_template_directory_uri()."/assets/css/lib/bootstrap.min.css");
	wp_enqueue_style( 'all.css',get_template_directory_uri()."/assets/css/lib/fontawesome-free/css/all.css");
	wp_enqueue_style( 'slick.min.css',get_template_directory_uri()."/assets/css/lib/slick.min.css");
	wp_enqueue_style( 'slick-theme.min.css',get_template_directory_uri()."/assets/css/lib/slick-theme.min.css");
	wp_enqueue_style( 'magnific-popup',get_template_directory_uri()."/assets/css/lib/magnific-popup.css");
	wp_style_add_data( 'custom-login-style', 'rtl', 'replace' );

	wp_enqueue_script( 'custom-login-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'));
	wp_enqueue_script( 'jquery.min.js', get_template_directory_uri() . '/assets/js/lib/jquery.min.js', array('jquery'));
    wp_enqueue_script( 'slick.min.js', get_template_directory_uri() . '/assets/js/lib/slick.min.js', array('jquery'));
    wp_enqueue_script( 'magnific-popup.js', get_template_directory_uri() . '/assets/js/lib/jquery.magnific-popup.min.js', array('jquery'));
	wp_enqueue_script( 'main.js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'init', 'custom_cf_style_scripts' );