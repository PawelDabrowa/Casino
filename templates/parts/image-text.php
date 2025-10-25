<?php
/**
 * Image Text Component Template
 *
 * @package Casino
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

$section_label = get_field('section_label');
$main_heading = get_field('main_heading');
$content = get_field('content_wysiwyg');
$button_text = get_field('button_text');
$button_link = get_field('button_link');
$image_position = get_field('image_position') ?: 'right';
$main_image = get_field('main_image');
$overlay_image = get_field('overlay_image');

// Debug output for admin
if (current_user_can('administrator')) {
    echo '<!-- Image Text Debug: ';
    echo 'Section Label: ' . ($section_label ? 'Found' : 'Not found') . ' | ';
    echo 'Main Heading: ' . ($main_heading ? 'Found' : 'Not found') . ' | ';
    echo 'Content: ' . ($content ? 'Found' : 'Not found') . ' | ';
    echo 'Button Text: ' . ($button_text ? 'Found' : 'Not found') . ' | ';
    echo 'Main Image: ' . ($main_image ? 'Found' : 'Not found') . ' | ';
    echo 'Overlay Image: ' . ($overlay_image ? 'Found' : 'Not found');
    echo ' -->';
}
?>

<?php if ($main_heading && $content && $main_image): ?>
<section class="image-text image-text--<?= esc_attr($image_position) ?>">
  <div class="container">
    <div class="image-text__grid">
      
      <!-- Text Content -->
      <div class="image-text__content">
        <?php if ($section_label): ?>
          <span class="image-text__label"><?= esc_html($section_label) ?></span>
        <?php endif; ?>
        
        <h2 class="image-text__heading"><?= esc_html($main_heading) ?></h2>
        
        <div class="image-text__text">
          <?= $content ?>
        </div>
        
        <?php if ($button_text && $button_link): ?>
          <a href="<?= esc_url($button_link) ?>" class="image-text__button">
            <?= esc_html($button_text) ?>
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
        <?php endif; ?>
      </div>
      
      <!-- Images -->
      <div class="image-text__images">
        <?php if ($main_image): ?>
          <div class="image-text__main-image">
            <img src="<?= esc_url($main_image['url']) ?>" alt="<?= esc_attr($main_image['alt']) ?>">
          </div>
        <?php endif; ?>
        
        <?php if ($overlay_image): ?>
          <div class="image-text__overlay-image">
            <img src="<?= esc_url($overlay_image['url']) ?>" alt="<?= esc_attr($overlay_image['alt']) ?>">
          </div>
        <?php endif; ?>
      </div>
      
    </div>
  </div>
</section>
<?php endif; ?>
