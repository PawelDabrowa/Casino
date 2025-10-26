<?php
/**
 * Hero Banner Template
 *
 * @package Casino
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

$hero_images = get_field('hero_images');
$hero_content = get_field('hero_content');

$bg_image   = $hero_images['background_image'] ?? null;
$logo       = $hero_images['logo'] ?? null;
$title      = $hero_content['title'] ?? null;
$intro      = $hero_content['intro_text'] ?? null;
$btn_text   = $hero_content['button_text'] ?? null;

// Fallback branding logic
$display_logo = null;
$display_title = null;
$display_description = null;

// Priority 1: ACF logo
if ($logo) {
    $display_logo = $logo;
}
// Priority 2: WordPress custom logo
elseif (has_custom_logo()) {
    $custom_logo_id = get_theme_mod('custom_logo');
    $custom_logo = wp_get_attachment_image_src($custom_logo_id, 'full');
    if ($custom_logo) {
        $display_logo = array(
            'url' => $custom_logo[0],
            'alt' => get_bloginfo('name')
        );
    }
}

// Only use ACF title
$display_title = $title;

// Only use ACF intro
$display_description = $intro;

?>

<?php if ($bg_image || $display_title || $display_logo): ?>
<section class="hero"<?= $bg_image ? ' style="background-image: url(\'' . esc_url($bg_image['url']) . '\');"' : '' ?>>
  <div class="hero__content">
    <?php if ($display_logo): ?>
      <a href="<?= esc_url(home_url('/')) ?>" class="hero__logo-link">
        <img src="<?= esc_url($display_logo['url']) ?>" alt="<?= esc_attr($display_logo['alt']) ?>" class="hero__logo">
      </a>
    <?php endif; ?>

    <?php if ($display_title): ?>
      <h1 class="hero__title">
        <?php if (!$display_logo): ?>
          <a href="<?= esc_url(home_url('/')) ?>" class="hero__title-link"><?= esc_html($display_title) ?></a>
        <?php else: ?>
          <?= esc_html($display_title) ?>
        <?php endif; ?>
      </h1>
    <?php endif; ?>

    <?php if ($display_description): ?>
      <p class="hero__intro"><?= esc_html($display_description) ?></p>
    <?php endif; ?>

    <?php if ($btn_text): ?>
      <a href="#casino-hotels-table" class="hero__button"><?= esc_html($btn_text) ?>
      <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M29.5 15C29.5 17.0098 29.119 18.8918 28.3604 20.6514C27.5963 22.4208 26.5623 23.9553 25.2588 25.2588C23.9554 26.5621 22.4215 27.5954 20.6523 28.3584L20.6514 28.3594C18.8918 29.119 17.0097 29.5 15 29.5C12.9903 29.5 11.1082 29.119 9.34863 28.3594L9.34766 28.3584C7.57849 27.5954 6.04456 26.5621 4.74121 25.2588C3.43786 23.9554 2.40459 22.4215 1.6416 20.6523L1.64062 20.6514C0.880979 18.8918 0.499999 17.0097 0.499999 15C0.499999 12.9903 0.880979 11.1082 1.64062 9.34863L1.6416 9.34766C2.40459 7.57849 3.43786 6.04456 4.74121 4.74121C6.04456 3.43786 7.57849 2.40459 9.34766 1.6416L9.34863 1.64062C11.1082 0.880977 12.9903 0.499999 15 0.499999C17.0097 0.499999 18.8918 0.880978 20.6514 1.64062L20.6523 1.6416C22.4215 2.40459 23.9554 3.43786 25.2588 4.74121C26.5623 6.04468 27.5973 7.57827 28.3613 9.34766C29.1202 11.1074 29.5 12.9901 29.5 15ZM18.9004 12.1934L18.5469 12.5469L17 14.0928L17 8.5L13 8.5L13 14.0928L11.4531 12.5469L11.0996 12.1934L8.29297 15L15 21.707L21.707 15L18.9004 12.1934Z" fill="white" stroke="url(#paint0_linear_1_61)"/>
<defs>
<linearGradient id="paint0_linear_1_61" x1="30" y1="15" x2="-6.55671e-07" y2="15" gradientUnits="userSpaceOnUse">
<stop stop-color="#DEDEDE"/>
<stop offset="1" stop-color="#F1F1F1" stop-opacity="0"/>
</linearGradient>
</defs>
</svg>
</a>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
