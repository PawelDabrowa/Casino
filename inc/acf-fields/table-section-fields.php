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
            array(
                'key' => 'field_top_rated_sticker',
                'label' => 'Top Rated Hotel Sticker',
                'name' => 'top_rated_sticker',
                'type' => 'group',
                'instructions' => 'Configure the "Top Rated Hotel" sticker for the first hotel',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_show_sticker',
                        'label' => 'Show Sticker',
                        'name' => 'show_sticker',
                        'type' => 'true_false',
                        'instructions' => 'Enable the "Top Rated Hotel" sticker on the first hotel',
                        'default_value' => 1,
                        'ui' => 1,
                    ),
                    array(
                        'key' => 'field_sticker_text',
                        'label' => 'Sticker Text',
                        'name' => 'sticker_text',
                        'type' => 'text',
                        'instructions' => 'Text to display on the sticker',
                        'default_value' => 'Top Rated Hotel',
                        'maxlength' => 50,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_show_sticker',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_sticker_color',
                        'label' => 'Sticker Background Color',
                        'name' => 'sticker_color',
                        'type' => 'color_picker',
                        'instructions' => 'Background color for the sticker',
                        'default_value' => '#8B5CF6',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_show_sticker',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                        ),
                    ),
                ),
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
