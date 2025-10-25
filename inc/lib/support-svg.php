<?php
/**
 * SVG Support for WordPress Media Library
 * 
 * This file adds support for safe SVG uploads to the WordPress media library.
 * It includes sanitization and security measures to prevent malicious SVG files.
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add SVG support to WordPress media library
 */
function add_svg_support() {
    // Allow SVG uploads
    add_filter('upload_mimes', 'allow_svg_uploads');
    
    // Fix SVG display in media library
    add_filter('wp_check_filetype_and_ext', 'fix_svg_upload_mime_type', 10, 5);
    
    // Add SVG to allowed file types
    add_filter('wp_prepare_attachment_for_js', 'add_svg_to_attachment_response', 10, 3);
    
    // Sanitize SVG content on upload
    add_filter('wp_handle_upload_prefilter', 'sanitize_svg_upload');
}

/**
 * Allow SVG uploads by adding to allowed mime types
 */
function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}

/**
 * Fix SVG mime type detection
 */
function fix_svg_upload_mime_type($data, $file, $filename, $mimes, $real_mime = null) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    if ($ext === 'svg') {
        $data['ext'] = 'svg';
        $data['type'] = 'image/svg+xml';
    }
    
    return $data;
}

/**
 * Add SVG support to attachment response
 */
function add_svg_to_attachment_response($response, $attachment, $meta) {
    if ($response['mime'] === 'image/svg+xml') {
        $response['image'] = array(
            'src' => $response['url'],
            'width' => 150,
            'height' => 150
        );
        $response['thumb'] = $response['url'];
    }
    
    return $response;
}

/**
 * Sanitize SVG content on upload
 */
function sanitize_svg_upload($file) {
    if ($file['type'] === 'image/svg+xml') {
        $svg_content = file_get_contents($file['tmp_name']);
        
        if ($svg_content) {
            // Basic SVG sanitization
            $sanitized_svg = sanitize_svg_content($svg_content);
            
            if ($sanitized_svg !== false) {
                file_put_contents($file['tmp_name'], $sanitized_svg);
            } else {
                $file['error'] = 'Invalid or potentially malicious SVG file.';
            }
        }
    }
    
    return $file;
}

/**
 * Sanitize SVG content to remove potentially dangerous elements
 */
function sanitize_svg_content($svg_content) {
    // Remove XML declaration and comments
    $svg_content = preg_replace('/<\?xml[^>]*\?>/', '', $svg_content);
    $svg_content = preg_replace('/<!--.*?-->/s', '', $svg_content);
    
    // Remove script tags and event handlers
    $svg_content = preg_replace('/<script[^>]*>.*?<\/script>/is', '', $svg_content);
    $svg_content = preg_replace('/on\w+\s*=\s*["\'][^"\']*["\']/', '', $svg_content);
    
    // Remove potentially dangerous elements
    $dangerous_elements = array(
        'script', 'iframe', 'object', 'embed', 'link', 'meta', 'style'
    );
    
    foreach ($dangerous_elements as $element) {
        $svg_content = preg_replace('/<' . $element . '[^>]*>.*?<\/' . $element . '>/is', '', $svg_content);
        $svg_content = preg_replace('/<' . $element . '[^>]*\/>/is', '', $svg_content);
    }
    
    // Remove javascript: URLs
    $svg_content = preg_replace('/javascript:/i', '', $svg_content);
    
    // Remove data: URLs (except for images)
    $svg_content = preg_replace('/data:(?!image\/)/i', '', $svg_content);
    
    // Validate that it's still a valid SVG
    if (strpos($svg_content, '<svg') === false) {
        return false;
    }
    
    return $svg_content;
}

/**
 * Add SVG preview in media library
 */
function add_svg_media_preview() {
    ?>
    <style>
        .attachment .thumbnail img[src$=".svg"] {
            width: 100%;
            height: auto;
        }
        .media-icon img[src$=".svg"] {
            width: 100%;
            height: auto;
        }
    </style>
    <?php
}

/**
 * Initialize SVG support
 */
function init_svg_support() {
    add_svg_support();
    add_action('admin_head', 'add_svg_media_preview');
}

// Initialize SVG support
init_svg_support();
