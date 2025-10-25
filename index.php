<?php
/**
 * Fallback for archives/home when no other template matches
 * @package Casino
 */

if (!defined('ABSPATH')) { exit; }

get_header(); ?>
<div class="container">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <article <?php post_class(); ?>>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="entry-summary">
          <?php the_excerpt(); ?>
        </div>
      </article>
    <?php endwhile; ?>

    <?php the_posts_navigation(); ?>
  <?php else : ?>
    <p><?php esc_html_e('No posts found.', 'casino'); ?></p>
  <?php endif; ?>
</div>
<?php get_footer(); ?>
