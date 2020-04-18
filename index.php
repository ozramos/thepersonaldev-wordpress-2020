<?php
get_header(); ?>
  <main class="container">
    <?php if (have_posts()):
      while (have_posts()) : ?>
        <header class="post-header">
          <h1 class="post-title"><?= the_title() ?></h1>
          <?php if (has_excerpt()): ?>
            <div class="post-excerpt"><?= the_excerpt() ?></div>
          <?php endif ?>
        </header>
      
        <?php the_post();

        the_content();
      endwhile;
    endif; ?>
  </main>
<?php get_footer();