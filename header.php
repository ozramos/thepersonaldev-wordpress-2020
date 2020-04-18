<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="<?php bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" >

  <?php wp_head() ?>
</head>
<body <?php body_class() ?>>
  <?php wp_body_open() ?>

  <header class="header-main container">
    <section class="flex">
      <div class="site-title">
        <?php tcp_the_title_or_logo() ?>
      </div>
      <div class="flex text-uppercase">
        <?php if (has_nav_menu('main')): ?>
          <div class="desktop-main-menu-wrap">
            <?php wp_nav_menu(['theme_location' => 'main']) ?>
          </div>
        <?php endif ?>
        
        <?php tcp_the_navbar_callout() ?>
  
        <?php if (has_nav_menu('main')): ?>
          <a class="mobile-main-menu-hamburger">
            <span></span>
            <span></span>
            <span></span>
          </a>
        <?php endif ?>
      </div>
    </section>

    <?php if (has_nav_menu('main')): ?>
      <div class="mobile-main-menu-wrap">
        <?php wp_nav_menu(['theme_location' => 'main']) ?>
      </div>
    <?php endif ?>
  </header>