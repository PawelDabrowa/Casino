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
$current_date = date('F j, Y');

// Get casino hotels ordered by score
$casino_hotels = get_posts(array(
    'post_type' => 'casino_hotel',
    'posts_per_page' => -1,
    'meta_key' => 'hotel_score',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'meta_query' => array(
        array(
            'key' => 'hotel_score',
            'compare' => 'EXISTS'
        )
    )
));
?>

<?php if (!empty($casino_hotels)): ?>
<section class="casino-hotels-table">
  <div class="container">
    <div class="table-header">
      <h2 class="table-heading"><?= esc_html($table_heading) ?></h2>
      <p class="table-date"><?= esc_html($current_date) ?></p>
    </div>
    
    <div class="hotels-list">
      <?php foreach ($casino_hotels as $index => $hotel): ?>
        <?php
        $hotel_logo = get_field('hotel_logo', $hotel->ID);
        $hotel_address = get_field('hotel_address', $hotel->ID);
        $star_rating = get_field('star_rating', $hotel->ID);
        $hotel_score = get_field('hotel_score', $hotel->ID);
        $external_link = get_field('external_link', $hotel->ID);
        $rank = $index + 1;
        ?>
        
        <div class="hotel-card">
          <div class="hotel-rank">
            <span class="rank-number"><?= $rank ?></span>
          </div>
          
          <div class="hotel-info">
            <?php if ($hotel_logo): ?>
              <div class="hotel-logo">
                <img src="<?= esc_url($hotel_logo['url']) ?>" alt="<?= esc_attr($hotel_logo['alt']) ?>">
              </div>
            <?php endif; ?>
            
            <div class="hotel-details">
              <h3 class="hotel-name"><?= esc_html($hotel->post_title) ?></h3>
              <?php if ($hotel_address): ?>
                <div class="hotel-address">
                  <span class="address-label">Address</span>
                  <p class="address-text"><?= esc_html($hotel_address) ?></p>
                </div>
              <?php endif; ?>
            </div>
          </div>
          
          <div class="hotel-rating">
            <div class="star-rating">
              <?php
              $stars = floatval($star_rating);
              $full_stars = floor($stars);
              $has_half_star = ($stars - $full_stars) >= 0.5;
              
              // Debug output for admin
              if (current_user_can('administrator')) {
                echo '<!-- Star Debug: Rating=' . $star_rating . ', Stars=' . $stars . ', Full=' . $full_stars . ', Half=' . ($has_half_star ? 'Yes' : 'No') . ' -->';
              }
              
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
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>
            <?php endif; ?>
            
            <a href="<?= get_permalink($hotel->ID) ?>" class="read-review-link">
              Read Review
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>
