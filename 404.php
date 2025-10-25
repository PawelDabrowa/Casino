<?php
if (!defined('ABSPATH')) { exit; }
get_header(); ?>
<div class="container">
  <h1><?php esc_html_e('Page not found', 'casino'); ?></h1>
  <p><?php esc_html_e('Try searching or go back to the homepage.', 'casino'); ?></p>
  <?php get_search_form(); ?>
</div>
<?php get_footer(); ?>
