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
    'editor_script' => 'tpd-blocks-projects-grid',
    'render_callback' => 'tpd_blocks_projects_grid_render'
  ]);
});

function tpd_blocks_projects_grid_render ($attributes, $content) {
  $posts = get_posts([
    'post_type' => 'tpd_project',
    'posts_per_page' => 6
  ]);

  if (!count($posts)) {
    return 'No Posts';
  }
  
  global $post;
  ob_start(); ?>
    <div class="tpd-projects-grid row">
      <?php foreach($posts as $post): setup_postdata($post); ?>
        <div class="tpd-projects-item col-xs-12 col-lg-4">
          <?php if (has_post_thumbnail($post->ID)): ?>
            <div class="tpd-projects-item-cover">
              <?php the_post_thumbnail() ?>
            </div>
          <?php endif ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php
  
  wp_reset_postdata();
  return ob_get_clean();
}