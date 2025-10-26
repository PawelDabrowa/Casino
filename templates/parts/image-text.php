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
$main_image = get_field('main_image');

?>

<?php if ($main_heading && $content && $main_image): ?>
<section class="image-text">
  <div class="container">
    <div class="image-text__grid">
      
      <!-- Text Content -->
      <div class="image-text__text-content">
        <!-- Label and Heading -->
        <div class="image-text__header">
          <?php if ($section_label): ?>
            <span class="image-text__label"><?= esc_html($section_label) ?></span>
          <?php endif; ?>
          
          <h2 class="image-text__heading"><?= esc_html($main_heading) ?></h2>
        </div>
        
        <!-- Text and Button -->
        <div class="image-text__content">
          <div class="image-text__text">
            <?= $content ?>
          </div>
          
          <?php if ($button_text && $button_link): ?>
            <a href="<?= esc_url($button_link) ?>" class="image-text__button">
              <?= esc_html($button_text) ?>
              <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15 0.5C17.0098 0.5 18.8918 0.88095 20.6514 1.63965C22.4208 2.40366 23.9553 3.4377 25.2588 4.74121C26.5621 6.04456 27.5954 7.57849 28.3584 9.34766L28.3594 9.34863C29.119 11.1082 29.5 12.9903 29.5 15C29.5 17.0097 29.119 18.8918 28.3594 20.6514L28.3584 20.6523C27.5954 22.4215 26.5621 23.9554 25.2588 25.2588C23.9554 26.5621 22.4215 27.5954 20.6523 28.3584L20.6514 28.3594C18.8918 29.119 17.0097 29.5 15 29.5C12.9903 29.5 11.1082 29.119 9.34863 28.3594L9.34766 28.3584C7.57849 27.5954 6.04456 26.5621 4.74121 25.2588C3.43786 23.9554 2.40459 22.4215 1.6416 20.6523L1.64063 20.6514C0.880978 18.8918 0.5 17.0097 0.5 15C0.5 12.9903 0.880978 11.1082 1.64063 9.34863L1.6416 9.34766C2.40459 7.57849 3.43786 6.04456 4.74121 4.74121C6.04468 3.43774 7.57827 2.40268 9.34766 1.63867C11.1074 0.87984 12.9901 0.5 15 0.5ZM12.1934 11.0996L12.5469 11.4531L14.0928 13H8.5L8.5 17L14.0928 17L12.5469 18.5469L12.1934 18.9004L15 21.707L21.707 15L15 8.29297L12.1934 11.0996Z" fill="white" stroke="url(#paint0_linear_1_73)"/>
              <defs>
              <linearGradient id="paint0_linear_1_73" x1="15" y1="0" x2="15" y2="30" gradientUnits="userSpaceOnUse">
              <stop stop-color="#DEDEDE"/>
              <stop offset="1" stop-color="#F1F1F1" stop-opacity="0"/>
              </linearGradient>
              </defs>
              </svg>
            </a>
          <?php endif; ?>
        </div>
      </div>
      
      <!-- Images -->
      <div class="image-text__images">
        <?php if ($main_image): ?>
          <div class="image-text__main-image">
            <img src="<?= esc_url($main_image['url']) ?>" alt="<?= esc_attr($main_image['alt']) ?>">
          </div>
        <?php endif; ?>
      </div>
      
    </div>
  </div>
</section>
<?php endif; ?>
