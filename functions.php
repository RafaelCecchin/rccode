<?php
/**
 * RCCODE Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RCCODE
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_RCCODE_VERSION', '1.0.0' );


function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
        
    // Adding scripts file in the footer
    
    wp_enqueue_script( 'typewrite-js', get_stylesheet_directory_uri() . '/assets/scripts/typewrite.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/assets/scripts/slick.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'jqueryui-js', get_stylesheet_directory_uri() . '/assets/scripts/jquery-ui.min.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'site-js', get_stylesheet_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery', 'jqueryui-js' ), false, true );

    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_stylesheet_directory_uri() . '/assets/styles/style.css', array(), false, 'all' );
    wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/styles/slick.css', array(), false, 'all' );
    wp_enqueue_style( 'slick-theme-css', get_stylesheet_directory_uri() . '/assets/styles/slick-theme.css', array(), false, 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 15);

function admin_scripts() {
  // Adding admin file in the footer
  wp_enqueue_script( 'admin-js', get_stylesheet_directory_uri() . '/assets/scripts/admin.js', false, true );
  wp_enqueue_media();

  // Register admin stylesheet
  wp_enqueue_style( 'admin-css', get_stylesheet_directory_uri() . '/assets/styles/admin.css', false, 'all' );
}

add_action('admin_enqueue_scripts', 'admin_scripts', 16);





register_nav_menus(
	array(
		'frontpage-nav'		=> 'Página inicial',		// Main nav in header
	)
);



// Informações
require_once(get_stylesheet_directory().'/functions/information/information.php'); 