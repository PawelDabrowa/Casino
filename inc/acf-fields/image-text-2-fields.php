<?php
/**
 * Image Text 2 Component ACF Fields
 *
 * @package Casino
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Image Text 2 Component Fields
 */
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_image_text_2_component',
        'title' => 'Image Text 2 Component',
        'fields' => array(
            // Tab: Header
            array(
                'key' => 'field_tab_header_2',
                'label' => 'Header',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            // Section Label
            array(
                'key' => 'field_section_label_2',
                'label' => 'Section Label',
                'name' => 'section_label_2',
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
                'key' => 'field_main_heading_2',
                'label' => 'Main Heading',
                'name' => 'main_heading_2',
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
                'key' => 'field_button_text_2',
                'label' => 'Button Text',
                'name' => 'button_text_2',
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
                'key' => 'field_button_link_2',
                'label' => 'Button Link',
                'name' => 'button_link_2',
                'type' => 'url',
                'instructions' => 'Button destination URL',
                'required' => 0,
                'wrapper' => array(
                    'width' => '50',
                ),
            ),
            // Tab: Content
            array(
                'key' => 'field_tab_content_2',
                'label' => 'Content',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            // Item 1
            array(
                'key' => 'field_item_1_number_2',
                'label' => 'Item 1 Number',
                'name' => 'item_1_number_2',
                'type' => 'text',
                'instructions' => 'Number for first item',
                'required' => 0,
                'maxlength' => 10,
                'wrapper' => array(
                    'width' => '20',
                ),
            ),
            array(
                'key' => 'field_item_1_title_2',
                'label' => 'Item 1 Title',
                'name' => 'item_1_title_2',
                'type' => 'text',
                'instructions' => 'Title for first item',
                'required' => 0,
                'maxlength' => 100,
                'wrapper' => array(
                    'width' => '40',
                ),
            ),
            array(
                'key' => 'field_item_1_content_2',
                'label' => 'Item 1 Content',
                'name' => 'item_1_content_2',
                'type' => 'textarea',
                'instructions' => 'Content for first item',
                'required' => 0,
                'rows' => 3,
                'wrapper' => array(
                    'width' => '40',
                ),
            ),
            // Item 2
            array(
                'key' => 'field_item_2_number_2',
                'label' => 'Item 2 Number',
                'name' => 'item_2_number_2',
                'type' => 'text',
                'instructions' => 'Number for second item',
                'required' => 0,
                'maxlength' => 10,
                'wrapper' => array(
                    'width' => '20',
                ),
            ),
            array(
                'key' => 'field_item_2_title_2',
                'label' => 'Item 2 Title',
                'name' => 'item_2_title_2',
                'type' => 'text',
                'instructions' => 'Title for second item',
                'required' => 0,
                'maxlength' => 100,
                'wrapper' => array(
                    'width' => '40',
                ),
            ),
            array(
                'key' => 'field_item_2_content_2',
                'label' => 'Item 2 Content',
                'name' => 'item_2_content_2',
                'type' => 'textarea',
                'instructions' => 'Content for second item',
                'required' => 0,
                'rows' => 3,
                'wrapper' => array(
                    'width' => '40',
                ),
            ),
            // Item 3
            array(
                'key' => 'field_item_3_number_2',
                'label' => 'Item 3 Number',
                'name' => 'item_3_number_2',
                'type' => 'text',
                'instructions' => 'Number for third item',
                'required' => 0,
                'maxlength' => 10,
                'wrapper' => array(
                    'width' => '20',
                ),
            ),
            array(
                'key' => 'field_item_3_title_2',
                'label' => 'Item 3 Title',
                'name' => 'item_3_title_2',
                'type' => 'text',
                'instructions' => 'Title for third item',
                'required' => 0,
                'maxlength' => 100,
                'wrapper' => array(
                    'width' => '40',
                ),
            ),
            array(
                'key' => 'field_item_3_content_2',
                'label' => 'Item 3 Content',
                'name' => 'item_3_content_2',
                'type' => 'textarea',
                'instructions' => 'Content for third item',
                'required' => 0,
                'rows' => 3,
                'wrapper' => array(
                    'width' => '40',
                ),
            ),
            // Tab: Image
            array(
                'key' => 'field_tab_image_2',
                'label' => 'Image',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ),
            // Main Image
            array(
                'key' => 'field_main_image_2',
                'label' => 'Main Image',
                'name' => 'main_image_2',
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
        'description' => 'Fields for the image text 2 component',
    ));
}
