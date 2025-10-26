<?php
/**
 * Image Text 2 Component Template
 *
 * @package Casino
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

$section_label = get_field('section_label_2');
$main_heading = get_field('main_heading_2');
$item_1_number = get_field('item_1_number_2');
$item_1_title = get_field('item_1_title_2');
$item_1_content = get_field('item_1_content_2');
$item_2_number = get_field('item_2_number_2');
$item_2_title = get_field('item_2_title_2');
$item_2_content = get_field('item_2_content_2');
$item_3_number = get_field('item_3_number_2');
$item_3_title = get_field('item_3_title_2');
$item_3_content = get_field('item_3_content_2');
$button_text = get_field('button_text_2');
$button_link = get_field('button_link_2');
$main_image = get_field('main_image_2');
?>

<?php if ($main_heading && $item_1_title && $main_image): ?>
<section class="image-text-2">
  <div class="container">
    <div class="image-text-2__grid">
      
      <!-- Text Content (Left Side) -->
      <div class="image-text-2__content">
        <!-- Header -->
        <div class="image-text-2__header">
          <?php if ($section_label): ?>
            <span class="image-text-2__label"><?= esc_html($section_label) ?></span>
          <?php endif; ?>
          
          <h2 class="image-text-2__heading"><?= esc_html($main_heading) ?></h2>
        </div>
  
        <div class="image-text-2__items">
          <?php if ($item_1_title && $item_1_content): ?>
            <div class="image-text-2__item-number"><?= esc_html($item_1_number ?: '1') ?></div>
            <div class="image-text-2__item">
         
              <div class="image-text-2__item-content">
                <h3 class="image-text-2__item-title"><?= esc_html($item_1_title) ?></h3>
                <p class="image-text-2__item-text"><?= esc_html($item_1_content) ?></p>
              </div>
            </div>
          <?php endif; ?>
          
          <?php if ($item_2_title && $item_2_content): ?>
            <div class="image-text-2__item-number"><?= esc_html($item_2_number ?: '2') ?></div>
            <div class="image-text-2__item">
              <div class="image-text-2__item-content">
                <h3 class="image-text-2__item-title"><?= esc_html($item_2_title) ?></h3>
                <p class="image-text-2__item-text"><?= esc_html($item_2_content) ?></p>
              </div>
            </div>
          <?php endif; ?>
          
          <?php if ($item_3_title && $item_3_content): ?>
            <div class="image-text-2__item-number"><?= esc_html($item_3_number ?: '3') ?></div>
            <div class="image-text-2__item">
              <div class="image-text-2__item-content">
                <h3 class="image-text-2__item-title"><?= esc_html($item_3_title) ?></h3>
                <p class="image-text-2__item-text"><?= esc_html($item_3_content) ?></p>
              </div>
            </div>
          <?php endif; ?>
        </div>
        
        <?php if ($button_text && $button_link): ?>
          <a href="<?= esc_url($button_link) ?>" class="image-text-2__button">
            <?= esc_html($button_text) ?>
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
        <?php endif; ?>
      </div>
      
      <!-- Images (Right Side) -->
      <div class="image-text-2__images">
        <?php if ($main_image): ?>
          <div class="image-text-2__main-image">
            <img src="<?= esc_url($main_image['url']) ?>" alt="<?= esc_attr($main_image['alt']) ?>">
          </div>
        <?php endif; ?>
      </div>
      
    </div>
  </div>
</section>
<?php endif; ?>
