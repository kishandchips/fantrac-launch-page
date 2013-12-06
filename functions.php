<?php

define('THEME_NAME', 'fantrac');

require( get_template_directory() . '/inc/default/functions.php' );

// Custom Actions

// Custom Filters

//add_filter('gform_submit_button', 'custom_submit_button', 10, 2);

//Custom Shortcodes

function custom_setup_theme() {

	register_nav_menus( array(
		'primary_header' => __( 'Primary Header', THEME_NAME ),
		'primary_footer' => __( 'Primary Footer', THEME_NAME )
	) );

	//add_image_size( 'custom_medium', 706, 400, true);
	
	add_editor_style('/css/editor-styles.css');
}

function custom_scripts() {
	global $wp_scripts;	
	wp_deregister_script('jquery');

	wp_enqueue_script('modernizr', get_template_directory_uri().'/js/libs/modernizr.min.js');
	wp_enqueue_script('jquery',  get_template_directory_uri().'/js/libs/jquery.min.js');
	wp_enqueue_script('easing', get_template_directory_uri().'/js/plugins/jquery.easing.js', array('jquery'), '', true);
	wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array('jquery'), '', true);
	wp_enqueue_script('ie7', get_template_directory_uri().'/js/lte-ie7.js', array('ie7'), '', true);

	$wp_scripts->add_data( 'ie7', 'conditional', 'lt IE 8' );	
}

function custom_styles() {
	global $wp_styles;

	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'ie7', get_template_directory_uri() . '/css/ie7.css' );

	$wp_styles->add_data('ie7', 'conditional', 'lt IE 8');
}