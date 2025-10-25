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
      <button class="btn btn-primary hero__button"><?= esc_html($btn_text) ?></button>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
