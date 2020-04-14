<?php

add_action('init', function () {
  $assets = include(get_template_directory() . '/dist/js/blocks/prefixed-title.asset.php');

  wp_register_script(
    'tpd-blocks-prefixed-title',
    get_stylesheet_directory_uri() . '/dist/js/blocks/prefixed-title.js',
    $assets['dependencies'],
    $assets['version']
  );

  register_block_type('tpd/prefixed-title', [
    'editor_script' => 'tpd-blocks-prefixed-title'
  ]);
});