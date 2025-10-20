</main>
<footer class="site-footer">
  <div class="container">
    <nav class="footer-nav">
      <?php wp_nav_menu(array('theme_location'=>'footer-menu','container'=>false)); ?>
    </nav>
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> — <?php _e('All rights reserved.', 'vinamek'); ?></p>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
