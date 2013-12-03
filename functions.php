<?php
/**
 * fantrac functions and definitions
 *
 * @package fantrac
 * @since fantrac 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since fantrac 1.0
 */

if ( ! function_exists( 'fantrac_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since fantrac 1.0
 */
function fantrac_setup() {

	register_nav_menus( array(
		'primary_header' => __( 'Primary Header Menu', 'ivip' )
	) );

	add_editor_style('css/editor-styles.css');
	
}
endif; // fantrac_setup
add_action( 'after_setup_theme', 'fantrac_setup' );

add_action('tiny_mce_before_init', 'custom_tinymce_options');
if ( ! function_exists( 'custom_tinymce_options' )) {
	function custom_tinymce_options($init){
		$init['apply_source_formatting'] = true;
		return $init;
	}
}