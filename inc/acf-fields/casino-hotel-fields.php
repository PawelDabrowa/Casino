<?php
/**
 * Casino Hotel ACF Fields
 *
 * @package Casino
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Casino Hotel Fields
 */
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_casino_hotel',
        'title' => 'Casino Hotel Details',
        'fields' => array(
            array(
                'key' => 'field_hotel_logo',
                'label' => 'Hotel Logo',
                'name' => 'hotel_logo',
                'type' => 'image',
                'instructions' => 'Upload the hotel logo',
                'required' => 1,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_hotel_address',
                'label' => 'Address',
                'name' => 'hotel_address',
                'type' => 'textarea',
                'instructions' => 'Enter the full hotel address',
                'required' => 1,
                'rows' => 3,
                'maxlength' => 200,
            ),
            array(
                'key' => 'field_star_rating',
                'label' => 'Star Rating',
                'name' => 'star_rating',
                'type' => 'select',
                'instructions' => 'Select the hotel star rating',
                'required' => 1,
                'choices' => array(
                    '5.0' => '5.0 Stars',
                    '4.5' => '4.5 Stars',
                    '4.0' => '4.0 Stars',
                ),
                'default_value' => '5.0',
            ),
            array(
                'key' => 'field_hotel_score',
                'label' => 'Score',
                'name' => 'hotel_score',
                'type' => 'number',
                'instructions' => 'Enter score from 0-10 (decimal allowed)',
                'required' => 1,
                'min' => 0,
                'max' => 10,
                'step' => 0.1,
                'default_value' => 9.0,
            ),
            array(
                'key' => 'field_external_link',
                'label' => 'External Link',
                'name' => 'external_link',
                'type' => 'url',
                'instructions' => 'Enter the external hotel website URL',
                'required' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'casino_hotel',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(),
        'active' => true,
        'description' => 'Fields for casino hotel details',
    ));
}
