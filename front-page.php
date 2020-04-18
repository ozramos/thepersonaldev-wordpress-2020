<?php
get_header(); ?>
  <main class="container">
    <?php if (have_posts()):
      while (have_posts()) {
        the_post();

        the_content();
      }
    endif; ?>
  </main>
<?php get_footer();