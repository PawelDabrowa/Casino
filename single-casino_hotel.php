<?php
/**
 * The template for displaying single casino hotel posts
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
                </div>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('large', array('loading' => 'lazy')); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php
                // Get casino hotel specific fields
                $hotel_logo = get_field('hotel_logo');
                $hotel_address = get_field('hotel_address');
                $star_rating = get_field('star_rating');
                $hotel_score = get_field('hotel_score');
                $external_link = get_field('external_link');
                $hotel_description = get_field('hotel_description');
                $hotel_features = get_field('hotel_features');
                $hotel_gallery = get_field('hotel_gallery');
                
                // Display hotel information
                if ($hotel_logo || $hotel_address || $star_rating || $hotel_score) :
                ?>
                <div class="hotel-info-section">
                    <?php if ($hotel_logo) : ?>
                        <div class="hotel-logo">
                            <img src="<?= esc_url($hotel_logo['url']) ?>" alt="<?= esc_attr($hotel_logo['alt']) ?>" class="hotel-logo-image">
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($hotel_address) : ?>
                        <div class="hotel-address">
                            <h3>Address</h3>
                            <p><?= esc_html($hotel_address) ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($star_rating) : ?>
                        <div class="hotel-rating">
                            <h3>Rating</h3>
                            <div class="star-rating">
                                <?php
                                $stars = floatval($star_rating);
                                $full_stars = floor($stars);
                                $has_half_star = ($stars - $full_stars) >= 0.5;
                                
                                for ($i = 1; $i <= 5; $i++):
                                    if ($i <= $full_stars):
                                        echo '<span class="star star-full">★</span>';
                                    elseif ($i == $full_stars + 1 && $has_half_star):
                                        echo '<span class="star star-half">☆</span>';
                                    else:
                                        echo '<span class="star star-empty">☆</span>';
                                    endif;
                                endfor;
                                ?>
                            </div>
                            <p><?= number_format($star_rating, 1) ?> stars</p>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($hotel_score) : ?>
                        <div class="hotel-score">
                            <h3>Overall Score</h3>
                            <div class="score-display">
                                <?php 
                                $score_percentage = ($hotel_score / 10) * 100;
                                ?>
                                <div class="score-circle" data-score="<?= $hotel_score ?>" style="--score: <?= $score_percentage / 100 ?>;">
                                    <span class="score-number"><?= number_format($hotel_score, 1) ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                
                <?php if ($hotel_description) : ?>
                    <div class="hotel-description">
                        <h3>Description</h3>
                        <?= wp_kses_post($hotel_description) ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($hotel_features) : ?>
                    <div class="hotel-features">
                        <h3>Features</h3>
                        <?= wp_kses_post($hotel_features) ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($hotel_gallery) : ?>
                    <div class="hotel-gallery">
                        <h3>Gallery</h3>
                        <div class="gallery-grid">
                            <?php foreach ($hotel_gallery as $image) : ?>
                                <div class="gallery-item">
                                    <img src="<?= esc_url($image['sizes']['medium']) ?>" alt="<?= esc_attr($image['alt']) ?>" loading="lazy">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if ($external_link) : ?>
                    <div class="hotel-actions">
                        <a href="<?= esc_url($external_link) ?>" class="visit-hotel-btn" target="_blank" rel="noopener">
                            Visit Hotel Website
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 0.5C12.2745 0.5 13.4768 0.71127 14.6104 1.13184L15.0918 1.3252C16.3745 1.87907 17.4852 2.62782 18.4287 3.57129C19.2541 4.39668 19.9303 5.34999 20.457 6.43457L20.6738 6.9082C21.2235 8.18121 21.5 9.54345 21.5 11C21.5 12.2746 21.2883 13.4768 20.8672 14.6104L20.6738 15.0918C20.1207 16.3745 19.3722 17.4853 18.4287 18.4287C17.4853 19.3722 16.3745 20.1207 15.0918 20.6738C13.8188 21.2235 12.4565 21.5 11 21.5C9.54345 21.5 8.18121 21.2235 6.9082 20.6738L6.43457 20.457C5.34999 19.9303 4.39668 19.2541 3.57129 18.4287C2.7459 17.6033 2.06966 16.65 1.54297 15.5654L1.32617 15.0918L1.13281 14.6104C0.711672 13.4768 0.5 12.2746 0.5 11C0.5 9.72545 0.711671 8.52318 1.13281 7.38965L1.32617 6.9082C1.87931 5.62551 2.62783 4.51475 3.57129 3.57129C4.39689 2.74569 5.35061 2.06931 6.43555 1.54199L6.9082 1.3252C8.18125 0.776224 9.54338 0.5 11 0.5ZM8.75293 8.13965L9.10645 8.49316L10.0127 9.40039H6.09961V12.5996H10.0127L9.10645 13.5068L8.75293 13.8604L11 16.1074L16.1074 11L11 5.89258L8.75293 8.13965Z" fill="white" stroke="url(#paint0_linear_1_183)"/>
                                <defs>
                                <linearGradient id="paint0_linear_1_183" x1="11" y1="0" x2="11" y2="22" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#DEDEDE"/>
                                <stop offset="1" stop-color="#F1F1F1" stop-opacity="0"/>
                                </linearGradient>
                                </defs>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
                
                <?php
                // Show main content if available
                the_content();
                ?>
            </div>

            <footer class="entry-footer">
                <!-- Edit link removed -->
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
