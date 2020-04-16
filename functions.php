<?php
require get_template_directory() . '/src/template-tags.php';
require get_template_directory() . '/src/customizer.php';

require get_template_directory() . '/src/blocks/index.php';
require get_template_directory() . '/src/blocks/captioned-heading.php';
require get_template_directory() . '/src/blocks/labeled-progress-bar.php';
require get_template_directory() . '/src/blocks/projects-grid.php';

require get_template_directory() . '/src/cpt/projects.php';

/**
 * Global Asssets
 */
add_action('wp_enqueue_scripts', function () {
  $theme_version = wp_get_theme()->get( 'Version' );

  wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/dist/styles/main.css', [], $theme_version);
  wp_enqueue_style( 'adhoc', get_stylesheet_uri(), [], $theme_version);

  wp_enqueue_script( 'tpd-main', get_stylesheet_directory_uri() . '/dist/js/main.js', ['jquery',], $theme_version, true );
  wp_enqueue_script( 'tpd-customizer', get_stylesheet_directory_uri() . '/assets/js/theme-customizer.js', ['jquery', 'customize-preview'], $theme_version, true );
});

/**
 * Admin assets
 */
add_action('admin_enqueue_scripts', function () {
  $theme_version = wp_get_theme()->get( 'Version' );

  wp_enqueue_style('tpd-editor', get_stylesheet_directory_uri() . '/dist/styles/editor.css');
  wp_enqueue_style('tpd-editor-adhoc', get_stylesheet_directory_uri() . '/editor.css');
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
  add_theme_support('post-thumbnails', ['post', 'page', 'tpd_project']);
});

/**
 * Custom color settings
 */
add_action('after_setup_theme', function () {
  add_theme_support('editor-color-palette', [
    [
      'name' => 'Background 1',
      'slug' => 'bg-1',
      'color' => '#1f2336'
    ],
    [
      'name' => 'Background 2',
      'slug' => 'bg-2',
      'color' => '#313552'
    ],
    [
      'name' => 'Links & Highlights',
      'slug' => 'links-1',
      'color' => '#ffc576'
    ],
    [
      'name' => 'Text',
      'slug' => 'color-1',
      'color' => '#fff'
    ]
  ]);
});