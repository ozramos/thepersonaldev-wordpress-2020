<?php
require get_template_directory() . '/src/template-tags.php';
require get_template_directory() . '/src/customizer.php';
require get_template_directory() . '/src/blocks/captioned-heading.php';

/**
 * Global Asssets
 */
add_action('wp_enqueue_scripts', function () {
  $theme_version = wp_get_theme()->get( 'Version' );

  wp_enqueue_style( 'ad-hoc', get_stylesheet_uri(), [], $theme_version);
  wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/dist/styles/main.css', [], $theme_version);

  wp_enqueue_script( 'tpd-main', get_stylesheet_directory_uri() . '/dist/js/main.js', ['jquery',], $theme_version, true );
  wp_enqueue_script( 'tpd-customizer', get_stylesheet_directory_uri() . '/assets/js/theme-customizer.js', ['jquery', 'customize-preview'], $theme_version, true );
});

/**
 * Menus
 */
add_action('init', function () {
  register_nav_menus([
    'main' => 'Main Menu'
  ]);
});

/**
 * Custom Logo
 */
add_action('after_setup_theme', function () {
  add_theme_support('custom-logo');
});