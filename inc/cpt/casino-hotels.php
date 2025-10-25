<?php
/**
 * Casino Hotels Custom Post Type
 *
 * @package Casino
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Casino Hotels Custom Post Type
 */
function register_casino_hotels_cpt() {
    $labels = array(
        'name'                  => 'Casino Hotels',
        'singular_name'         => 'Casino Hotel',
        'menu_name'             => 'Casino Hotels',
        'name_admin_bar'        => 'Casino Hotel',
        'archives'              => 'Casino Hotel Archives',
        'attributes'            => 'Casino Hotel Attributes',
        'parent_item_colon'     => 'Parent Casino Hotel:',
        'all_items'             => 'All Casino Hotels',
        'add_new_item'          => 'Add New Casino Hotel',
        'add_new'               => 'Add New',
        'new_item'              => 'New Casino Hotel',
        'edit_item'             => 'Edit Casino Hotel',
        'update_item'           => 'Update Casino Hotel',
        'view_item'             => 'View Casino Hotel',
        'view_items'            => 'View Casino Hotels',
        'search_items'          => 'Search Casino Hotels',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
    );

    $args = array(
        'label'                 => 'Casino Hotel',
        'description'           => 'Casino Hotels listings',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'taxonomies'            => array(),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-building',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );

    register_post_type('casino_hotel', $args);
}
add_action('init', 'register_casino_hotels_cpt', 0);
