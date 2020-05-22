<?php
require get_template_directory() . '/src/template-tags.php';
require get_template_directory() . '/src/customizer.php';

require get_template_directory() . '/src/blocks/index.php';
require get_template_directory() . '/src/blocks/captioned-heading.php';
require get_template_directory() . '/src/blocks/labeled-progress-bar.php';
require get_template_directory() . '/src/blocks/projects-grid.php';
require get_template_directory() . '/src/blocks/icon-callout.php';

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
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails', ['post', 'page', 'projects', 'journal']);
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

/**
 * Widgets
 */
add_action('widgets_init', function () {
  register_sidebar([
    'id' => 'footer-left',
    'name' => 'Footer: Left Column',
    'description' => 'Shown at the bottom of the site to the left (or as the first footer item on mobile)',
    'before_widget' => '<div id="$1" class="$2">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
  ]);

  register_sidebar([
    'id' => 'footer-center',
    'name' => 'Footer: Center Column',
    'description' => 'Shown at the bottom of the site in the center (or as the second footer item on mobile)',
    'before_widget' => '<div id="$1" class="$2">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
  ]);

  register_sidebar([
    'id' => 'footer-right',
    'name' => 'Footer: Right Column',
    'description' => 'Shown at the bottom of the site to the right (or as the last footer item on mobile)',
    'before_widget' => '<div id="$1" class="$2">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
  ]);

  register_sidebar([
    'id' => 'footer-copyright',
    'name' => 'Footer: Copyright',
    'description' => 'Shown below all columns',
    'before_widget' => '<div id="$1" class="$2">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
  ]);
});