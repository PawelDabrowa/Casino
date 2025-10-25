<?php
/**
 * Table Section ACF Fields
 *
 * @package Casino
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Table Section Fields
 */
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_table_section',
        'title' => 'Table Section',
        'fields' => array(
            array(
                'key' => 'field_table_heading',
                'label' => 'Table Heading',
                'name' => 'table_heading',
                'type' => 'text',
                'instructions' => 'Enter the main heading for the table section',
                'required' => 1,
                'maxlength' => 100,
                'default_value' => 'Top Casino Hotels',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 2,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(),
        'active' => true,
        'description' => 'Fields for the casino hotels table section',
    ));
}
