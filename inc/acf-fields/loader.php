<?php
/**
 * ACF Fields Loader
 *
 * @package Casino
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Load all ACF field files
 */
function casino_load_acf_fields() {
    $acf_fields_dir = get_template_directory() . '/inc/acf-fields/';
    
    // List of field files to load
    $field_files = array(
        'hero-fields.php',
        'image-text-fields.php',
        'image-text-2-fields.php',
        'casino-hotel-fields.php',
        'table-section-fields.php',
    );
    
    // Load each field file
    foreach ($field_files as $file) {
        $file_path = $acf_fields_dir . $file;
        if (file_exists($file_path)) {
            require_once $file_path;
        }
    }
}
add_action('acf/init', 'casino_load_acf_fields');
