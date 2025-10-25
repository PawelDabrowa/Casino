<?php
/**
 * The template for displaying all single posts
 *
 * @package Casino
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

get_header(); ?>

<div class="container">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                
                <div class="entry-meta">
                    <span class="posted-on">
                        <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                            <?php echo esc_html(get_the_date()); ?>
                        </time>
                    </span>
                    
                    <?php if (get_the_author()) : ?>
                        <span class="byline">
                            <?php esc_html_e('by', 'casino'); ?> 
                            <span class="author vcard">
                                <a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                    <?php echo esc_html(get_the_author()); ?>
                                </a>
                            </span>
                        </span>
                    <?php endif; ?>
                </div>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('large', array('loading' => 'lazy')); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php
                // Get content from ACF fields
                $post_content = get_field('post_content');
                $post_excerpt = get_field('post_excerpt');
                $post_featured_video = get_field('post_featured_video');
                
                // Show featured video if available
                if ($post_featured_video) {
                    echo '<div class="post-featured-video">';
                    echo wp_oembed_get($post_featured_video);
                    echo '</div>';
                }
                
                // Show custom excerpt if available
                if ($post_excerpt) {
                    echo '<div class="post-excerpt">' . wp_kses_post($post_excerpt) . '</div>';
                }
                
                // Show main content
                if ($post_content) {
                    echo wp_kses_post($post_content);
                } else {
                    // Fallback message for ACF-only content
                    echo '<p>' . esc_html__('This post uses ACF fields for content. Please add content using the custom fields.', 'casino') . '</p>';
                }
                ?>
            </div>

            <footer class="entry-footer">
                <?php
                // Post categories
                $categories = get_the_category();
                if ($categories) {
                    echo '<div class="post-categories">';
                    echo '<span class="cat-links">' . esc_html__('Categories:', 'casino') . ' ';
                    the_category(', ');
                    echo '</span>';
                    echo '</div>';
                }
                
                // Post tags
                $tags = get_the_tags();
                if ($tags) {
                    echo '<div class="post-tags">';
                    echo '<span class="tags-links">' . esc_html__('Tags:', 'casino') . ' ';
                    the_tags('', ', ', '');
                    echo '</span>';
                    echo '</div>';
                }
                
                // Edit post link
                if (get_edit_post_link()) {
                    edit_post_link(
                        sprintf(
                            wp_kses(
                                __('Edit <span class="screen-reader-text">%s</span>', 'casino'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                }
                ?>
            </footer>
        </article>

        <?php
        // Post navigation
        the_post_navigation(array(
            'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'casino') . '</span> <span class="nav-title">%title</span>',
            'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'casino') . '</span> <span class="nav-title">%title</span>',
        ));
        ?>

    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
