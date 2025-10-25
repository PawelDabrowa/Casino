<?php
/**
 * The template for displaying all pages
 *
 * @package Casino
 */

if (!defined('ABSPATH')) { exit; }

get_header(); ?>

<div class="container">
  <?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php get_template_part('templates/parts/image-text'); ?>
    <?php get_template_part('templates/parts/casino-hotels-table'); ?>
    </article>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>
