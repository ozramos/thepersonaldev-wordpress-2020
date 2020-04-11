<?php
/**
 * Outputs either a linked site title or logo
 */
function tcp_the_title_or_logo () {
  $theme_logo = get_theme_mod( 'custom_logo' );
  ?>
    <a href="<?= get_home_url() ?>" class="color-1">
      <?php if ($theme_logo): ?>
        <img class="site-title-image" src="<?= wp_get_attachment_image_src($theme_logo, 'full')[0] ?>">
      <?php else: ?>
        <?php bloginfo('name') ?>
      <?php endif ?>
    </a>
  <?php
}

/**
 * Displays the navbar callout (to the right of the menu)
 */
function tcp_the_navbar_callout () {
  $callout_label = get_theme_mod('tpd_navbar_callout_label');
  $callout_link = get_theme_mod('tpd_navbar_callout_link');

  if ($callout_label) : ?>
    <a class="navbar-callout" href="<?= $callout_link ?>"><?= $callout_label ?></a>
  <?php endif;
}