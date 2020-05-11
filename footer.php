  <footer class="footer-main container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-4">
        <?php dynamic_sidebar('footer-left') ?>
      </div>
      <?php if (is_active_sidebar('footer-center')): ?>
        <div class="col-xs-12 col-sm-6 col-md-4">
          <?php dynamic_sidebar('footer-center') ?>
        </div>
      <?php endif ?>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <?php dynamic_sidebar('footer-right') ?>
      </div>
      <?php if (is_active_sidebar('footer-copyright')): ?>
        <div class="col-xs-12 footer-copyright">
          <?php dynamic_sidebar('footer-copyright') ?>
        </div>
      <?php endif ?>
    </div>  
  </footer>

  <?php wp_footer() ?>
</body>
</html>