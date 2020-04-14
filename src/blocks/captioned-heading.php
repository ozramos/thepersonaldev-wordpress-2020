<?php

/**
 * Adds a subtitle above a heading
 */
add_action('init', function () {
  $assets = include(get_template_directory() . '/dist/js/blocks/captioned-heading.asset.php');

  wp_register_script(
    'tpd-blocks-captioned-heading',
    get_stylesheet_directory_uri() . '/dist/js/blocks/captioned-heading.js',
    $assets['dependencies'],
    $assets['version']
  );
  
  register_block_type('tpd/captioned-heading', [
    'editor_script' => 'tpd-blocks-captioned-heading'
  ]);
});