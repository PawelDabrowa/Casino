<?php
if (!defined('ABSPATH')) { exit; }
get_header(); ?>
<div class="container">
  <header><h1><?php the_archive_title(); ?></h1></header>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php the_excerpt(); ?>
    </article>
  <?php endwhile; the_posts_navigation(); else : ?>
    <p><?php esc_html_e('Nothing here yet.', 'casino'); ?></p>
  <?php endif; ?>
</div>
<?php get_footer(); ?>
