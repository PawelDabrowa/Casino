<?php
/**
 * Image Text Component ACF Fields
 *
 * @package Casino
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Image Text Component Fields
 */
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_image_text_component',
        'title' => 'Image Text Component',
        'fields' => array(
            // Tab: Header
            array(
                'key' => 'field_tab_header',
                'label' => 'Header',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            // Section Label
            array(
                'key' => 'field_section_label',
                'label' => 'Section Label',
                'name' => 'section_label',
                'type' => 'text',
                'instructions' => 'Small label text (e.g., "About us")',
                'required' => 0,
                'maxlength' => 50,
                'wrapper' => array(
                    'width' => '50',
                ),
            ),
            // Main Heading
            array(
                'key' => 'field_main_heading',
                'label' => 'Main Heading',
                'name' => 'main_heading',
                'type' => 'text',
                'instructions' => 'Main heading text',
                'required' => 1,
                'maxlength' => 100,
                'wrapper' => array(
                    'width' => '50',
                ),
            ),
            // Button Text
            array(
                'key' => 'field_button_text',
                'label' => 'Button Text',
                'name' => 'button_text',
                'type' => 'text',
                'instructions' => 'Button text (e.g., "Read More")',
                'required' => 0,
                'maxlength' => 50,
                'wrapper' => array(
                    'width' => '50',
                ),
            ),
            // Button Link
            array(
                'key' => 'field_button_link',
                'label' => 'Button Link',
                'name' => 'button_link',
                'type' => 'url',
                'instructions' => 'Button destination URL',
                'required' => 0,
                'wrapper' => array(
                    'width' => '50',
                ),
            ),
            // Tab: Content
            array(
                'key' => 'field_tab_content',
                'label' => 'Content',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            // Content
            array(
                'key' => 'field_content_wysiwyg',
                'label' => 'Content',
                'name' => 'content_wysiwyg',
                'type' => 'wysiwyg',
                'instructions' => 'Main content text',
                'required' => 1,
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            // Tab: Image
            array(
                'key' => 'field_tab_image',
                'label' => 'Image',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            // Main Image
            array(
                'key' => 'field_main_image',
                'label' => 'Main Image',
                'name' => 'main_image',
                'type' => 'image',
                'instructions' => 'Large background image',
                'required' => 1,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(),
        'active' => true,
        'description' => 'Fields for the image text component',
    ));
}
