<?php
/**
 * The template for displaying all pages
 *
 * @package Casino
 */

if (!defined('ABSPATH')) { exit; }

get_header(); ?>

<div class="main-container">
  <?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php if (is_front_page() || is_home()) : ?>
      <!-- Custom template for home page -->
      <?php get_template_part('templates/parts/image-text'); ?>
      <?php get_template_part('templates/parts/casino-hotels-table'); ?>
      <?php get_template_part('templates/parts/image-text-2'); ?>
    <?php else : ?>
      <!-- Normal editor content for other pages -->
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    <?php endif; ?>
    
    </article>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>
