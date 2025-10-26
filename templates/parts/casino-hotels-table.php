<?php
/**
 * Casino Hotels Table Template
 *
 * @package Casino
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

$table_heading = get_field('table_heading') ?: 'Top Casino Hotels';
$top_rated_sticker = get_field('top_rated_sticker');
$current_date = date('m/d/y');

// Get casino hotels ordered by score (highest first)
$casino_hotels = get_posts(array(
    'post_type' => 'casino_hotel',
    'posts_per_page' => -1,
    'meta_key' => 'hotel_score',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'hotel_score',
            'compare' => 'EXISTS'
        ),
        array(
            'key' => 'hotel_score',
            'value' => 0,
            'compare' => '>',
            'type' => 'NUMERIC'
        )
    )
));

// Additional sorting to ensure proper order (fallback)
if (!empty($casino_hotels)) {
    usort($casino_hotels, function($a, $b) {
        $score_a = floatval(get_field('hotel_score', $a->ID));
        $score_b = floatval(get_field('hotel_score', $b->ID));
        return $score_b <=> $score_a; // Descending order
    });
}
?>

<?php if (!empty($casino_hotels)): ?>
<section id="casino-hotels-table" class="casino-hotels-table">
  <div class="">
    <div class="table-header">
      <h2 class="table-heading"><?= esc_html($table_heading) ?></h2>
      <p class="table-date">
        <img src="<?= get_template_directory_uri(); ?>/assets/images/uil_calender.svg" alt="Calendar" class="calendar-icon" loading="lazy">
        <?= esc_html($current_date) ?>
      </p>
      <?php if ($top_rated_sticker && $top_rated_sticker['show_sticker']): ?>
        <div class="top-rated-sticker" style="background-color: <?= esc_attr($top_rated_sticker['sticker_color'] ?: '#8B5CF6') ?>;">
          <?= esc_html($top_rated_sticker['sticker_text'] ?: 'Top Rated Hotel') ?>
        </div>
      <?php endif; ?>
    </div>
    
    <div class="hotels-list">
      <?php 
      // Debug: Uncomment the line below to see scores in order
      // foreach ($casino_hotels as $hotel) { echo get_field('hotel_score', $hotel->ID) . ' - ' . $hotel->post_title . '<br>'; }
      ?>
      <?php foreach ($casino_hotels as $index => $hotel): ?>
        <?php
        $hotel_logo = get_field('hotel_logo', $hotel->ID);
        $hotel_address = get_field('hotel_address', $hotel->ID);
        $star_rating = get_field('star_rating', $hotel->ID);
        $hotel_score = get_field('hotel_score', $hotel->ID);
        $external_link = get_field('external_link', $hotel->ID);
        $rank = $index + 1; // Rank based on descending score order (1 = highest score)
        ?>
        <div class="hotel-card-wrapper">
        <div class="hotel-rank">
            <span class="rank-number"><?= $rank ?></span>
          </div>
        <div class="hotel-card">
          
          
          <div class="hotel-info">
            <?php if ($hotel_logo): ?>
              <div class="hotel-logo">
                <img src="<?= esc_url($hotel_logo['url']) ?>" alt="<?= esc_attr($hotel_logo['alt']) ?>" loading="lazy">
              </div>
            <?php endif; ?>
            
            <!-- Score circle for mobile inline layout -->
            <div class="hotel-score-mobile">
              <?php 
              $score_percentage = ($hotel_score / 10) * 100;
              ?>
              <div class="score-circle" data-score="<?= $hotel_score ?>" style="--score: <?= $score_percentage / 100 ?>;">
                <span class="score-number"><?= number_format($hotel_score, 1) ?></span>
              </div>
              
              <!-- Stars below circle on mobile -->
              <div class="hotel-rating-mobile">
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
              </div>
            </div>
          </div>
          
            <div class="hotel-details">
              <?php if ($hotel_address): ?>
                <div class="hotel-address">
                  <span class="address-label">Address</span>
                  <p class="address-text"><?= esc_html($hotel_address) ?></p>
                </div>
              <?php endif; ?>
            </div>
     
          <div class="hotel-rating">
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
            <span class="rating-text">Excellent</span>
          </div>
          
          <div class="hotel-score">
            <?php 
            $score_percentage = ($hotel_score / 10) * 100;
            $score_degrees = $score_percentage * 3.6; // Convert percentage to degrees
            ?>
            <div class="score-circle" data-score="<?= $hotel_score ?>" style="--score: <?= $score_percentage / 100 ?>;">
              <span class="score-number"><?= number_format($hotel_score, 1) ?></span>
            </div>
          </div>
          
          <div class="hotel-actions">
            <?php if ($external_link): ?>
              <a href="<?= esc_url($external_link) ?>" class="visit-hotel-btn" target="_blank" rel="noopener">
                Visit Hotel
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
            <?php endif; ?>
            
            <a href="<?= get_permalink($hotel->ID) ?>" class="read-review-link">
              Read Review
            </a>
          </div>
        </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>
