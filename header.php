<?php
/**
 * The header for our theme
 *
 * @package Casino
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <?php get_template_part('templates/parts/head'); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'casino'); ?></a>


    <?php 
    // Include hero section on all pages
    get_template_part('templates/parts/hero');
    ?>

    <main id="primary" class="site-main">
