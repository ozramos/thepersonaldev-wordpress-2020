<?php
require get_template_directory() . '/src/template-tags.php';
require get_template_directory() . '/src/customizer.php';

/**
 * Global Asssets
 */
add_action('wp_enqueue_scripts', function () {
	$theme_version = wp_get_theme()->get( 'Version' );

  wp_enqueue_style( 'ad-hoc', get_stylesheet_uri(), [], $theme_version);
  wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/dist/styles/main.css', [], $theme_version);

  wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/dist/js/main.js', [], $theme_version, true );
});