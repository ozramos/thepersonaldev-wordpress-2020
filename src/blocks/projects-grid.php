<?php

add_action('init', function () {
  $assets = include(get_template_directory() . '/dist/js/blocks/projects-grid.asset.php');

  wp_register_script(
    'tpd-blocks-projects-grid',
    get_stylesheet_directory_uri() . '/dist/js/blocks/projects-grid.js',
    $assets['dependencies'],
    $assets['version']
  );

  register_block_type('tpd/projects-grid', [
    'editor_script' => 'tpd-blocks-projects-grid'
  ]);
});