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
    'render_callback' => 'tpd_blocks_projects_grid_render',
    'attributes' => [
      'excludedTags' => [
        'type' => 'array',
        'default' => [],
        'items' => ['type' => 'number']
      ]
    ]
  ]);
});

function tpd_blocks_projects_grid_render ($attributes, $content) {
  $tax_query = null;
  if ($tags = $attributes['excludedTags']) {
    $tax_query = [[
      'taxonomy' => 'project_tag',
      'field' => 'id',
      'operator' => 'NOT IN',
      'terms' => $tags
    ]];
  }
  
  $posts = get_posts([
    'post_type' => 'tpd_project',
    'posts_per_page' => 6,
    'order_by' => 'order',
    'order' => 'ASC',
    'tax_query' => $tax_query
  ]);

  if (!count($posts)) {
    return 'No Posts';
  }
  
  global $post;
  ob_start(); ?>
    <div class="tpd-projects-grid row">
      <?php foreach($posts as $post): setup_postdata($post); ?>
        <?php if (has_post_thumbnail($post->ID)): ?>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="tpd-projects-item">
              <a href="<?= get_permalink() ?>" class="tpd-projects-item-cover">
                <?php the_post_thumbnail() ?>
              </a>
              <div class="tpd-projects-item-content">
                <h3><a href="<?= get_permalink() ?>"><?php the_title() ?></a></h3>
                <p class="tpd-projects-item-tags"><?= get_the_term_list($post->ID, 'project_tag') ?></p>
                <p><?php the_excerpt() ?></p>
                <p>
                  <a href="<?= get_permalink() ?>" class="button">Read More</a>
                </p>
              </div>
            </div>
          <?php endif ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php
  
  wp_reset_postdata();
  return ob_get_clean();
}