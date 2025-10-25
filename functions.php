<?php
/**
 * Casino Theme Functions
 *
 * @package Casino
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Load theme setup
require get_template_directory() . '/inc/setup.php';

// Load ACF fields
require get_template_directory() . '/inc/acf-fields/loader.php';

// Load SVG support
require get_template_directory() . '/inc/lib/support-svg.php';

// Load CPT
require get_template_directory() . '/inc/cpt/casino-hotels.php';

/**
 * Disable all editors - Use ACF fields only
 */
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Remove Classic Editor support
add_action('init', function() {
    remove_post_type_support('page', 'editor');
    remove_post_type_support('post', 'editor');
});

// Hide editor tabs in admin (but allow ACF WYSIWYG fields)
add_action('admin_head', function() {
    echo '<style>
        #postdivrich, #postdivrich #wp-content-editor-container, 
        .wp-editor-tabs { display: none !important; }
        .acf-field { margin-top: 20px; }
        /* Allow ACF WYSIWYG fields to work */
        .acf-field .wp-editor-wrap { display: block !important; }
    </style>';
});

/**
 * Add ACF Options Page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug'  => 'theme-options',
        'capability' => 'edit_posts',
    ));
}

/**
 * Enqueue scripts and styles
 */
function casino_enqueue_assets() {
    // Get manifest file
    $manifest_path = get_template_directory() . '/dist/manifest.json';
    
    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), true);
        
        // Enqueue main CSS
        if (isset($manifest['styles.css'])) {
            $css_file = str_replace('auto/', '', $manifest['styles.css']);
            $css_path = get_template_directory() . '/dist/' . $css_file;
            if (file_exists($css_path)) {
                $css_version = filemtime($css_path);
                wp_enqueue_style(
                    'casino-main-style',
                    get_template_directory_uri() . '/dist/' . $css_file,
                    array(),
                    $css_version
                );
            }
        }
        
        // Enqueue main JS
        if (isset($manifest['main.js'])) {
            $js_file = str_replace('auto/', '', $manifest['main.js']);
            $js_path = get_template_directory() . '/dist/' . $js_file;
            if (file_exists($js_path)) {
                $js_version = filemtime($js_path);
                wp_enqueue_script(
                    'casino-main-script',
                    get_template_directory_uri() . '/dist/' . $js_file,
                    array(),
                    $js_version,
                    true
                );
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'casino_enqueue_assets');

/**
 * Add defer attribute to main script (except in admin)
 */
function casino_defer_scripts($tag, $handle, $src) {
    if (is_admin()) {
        return $tag;
    }
    
    if ('casino-main-script' === $handle) {
        return str_replace('<script ', '<script defer ', $tag);
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'casino_defer_scripts', 10, 3);

/**
 * Add loading="lazy" to images by default
 */
function casino_lazy_load_images($attr, $attachment, $size) {
    if (!is_admin()) {
        $attr['loading'] = 'lazy';
    }
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'casino_lazy_load_images', 10, 3);

/**
 * Add loading="lazy" to avatar images
 */
function casino_lazy_load_avatar($avatar) {
    if (!is_admin()) {
        $avatar = str_replace('<img ', '<img loading="lazy" ', $avatar);
    }
    return $avatar;
}
add_filter('get_avatar', 'casino_lazy_load_avatar');
