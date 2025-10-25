<?php
/**
 * Hero Banner ACF Fields
 *
 * @package Casino
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Hero Banner Fields
 */
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_hero_banner',
        'title' => 'Hero Banner',
        'fields' => array(
            // Tab: Content
            array(
                'key' => 'field_hero_content_tab',
                'label' => 'Content',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_hero_content_group',
                'label' => 'Hero Content',
                'name' => 'hero_content',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_hero_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'instructions' => 'Enter the main title for the hero banner',
                        'required' => 1,
                        'maxlength' => 100,
                        'wrapper' => array(
                            'width' => '50',
                        ),
                    ),
                    array(
                        'key' => 'field_hero_intro_text',
                        'label' => 'Intro Text',
                        'name' => 'intro_text',
                        'type' => 'textarea',
                        'instructions' => 'Enter the introductory text for the hero banner',
                        'required' => 0,
                        'rows' => 4,
                        'maxlength' => 200,
                        'wrapper' => array(
                            'width' => '50',
                        ),
                    ),
                    array(
                        'key' => 'field_hero_button_text',
                        'label' => 'Button Text',
                        'name' => 'button_text',
                        'type' => 'text',
                        'instructions' => 'Enter the text for the call-to-action button (will scroll down)',
                        'required' => 0,
                        'maxlength' => 50,
                        'wrapper' => array(
                            'width' => '50',
                        ),
                    ),
                    array(
                        'key' => 'field_hero_button_target',
                        'label' => 'Button Target',
                        'name' => 'button_target',
                        'type' => 'url',
                        'instructions' => 'Enter the URL or anchor link for the button (e.g., #section or https://example.com)',
                        'required' => 0,
                        'wrapper' => array(
                            'width' => '50',
                        ),
                    ),
                ),
            ),
            // Tab: Images
            array(
                'key' => 'field_hero_images_tab',
                'label' => 'Images',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_hero_images_group',
                'label' => 'Hero Images',
                'name' => 'hero_images',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_hero_background_image',
                        'label' => 'Background Image',
                        'name' => 'background_image',
                        'type' => 'image',
                        'instructions' => 'Upload a background image for the hero banner',
                        'required' => 1,
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'wrapper' => array(
                            'width' => '50',
                        ),
                    ),
                    array(
                        'key' => 'field_hero_logo',
                        'label' => 'Logo',
                        'name' => 'logo',
                        'type' => 'image',
                        'instructions' => 'Upload the main logo for the hero banner',
                        'required' => 0,
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'wrapper' => array(
                            'width' => '50',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
        'description' => 'Fields for the hero banner section',
    ));
}