<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'fort_register_post_types');
add_action('init', 'fort_register_taxonomies');

function fort_register_post_types(): void {
    register_post_type('fort', [
        'label' => esc_html__('Forts', 'fort-explorer'),
        'labels' => [
            'name' => esc_html__('Forts', 'fort-explorer'),
            'singular_name' => esc_html__('Fort', 'fort-explorer'),
            'add_new' => esc_html__('Add New Fort', 'fort-explorer'),
            'add_new_item' => esc_html__('Add New Fort', 'fort-explorer'),
            'edit_item' => esc_html__('Edit Fort', 'fort-explorer'),
            'new_item' => esc_html__('New Fort', 'fort-explorer'),
            'view_item' => esc_html__('View Fort', 'fort-explorer'),
            'search_items' => esc_html__('Search Forts', 'fort-explorer'),
            'all_items' => esc_html__('All Forts', 'fort-explorer'),
            'not_found' => esc_html__('No forts found', 'fort-explorer'),
            'not_found_in_trash' => esc_html__('No forts found in trash', 'fort-explorer'),
        ],
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'],
        'rewrite' => [
            'slug' => 'forts',
            'with_front' => true,
            'feeds' => true,
        ],
        'menu_icon' => 'dashicons-building',
        'capability_type' => 'post',
    ]);
}

function fort_register_taxonomies(): void {
    register_taxonomy('region', ['fort'], [
        'label' => esc_html__('Regions', 'fort-explorer'),
        'labels' => [
            'name' => esc_html__('Regions', 'fort-explorer'),
            'singular_name' => esc_html__('Region', 'fort-explorer'),
            'search_items' => esc_html__('Search Regions', 'fort-explorer'),
            'all_items' => esc_html__('All Regions', 'fort-explorer'),
            'edit_item' => esc_html__('Edit Region', 'fort-explorer'),
            'update_item' => esc_html__('Update Region', 'fort-explorer'),
            'add_new_item' => esc_html__('Add New Region', 'fort-explorer'),
            'new_item_name' => esc_html__('New Region Name', 'fort-explorer'),
        ],
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
        'rewrite' => [
            'slug' => 'region',
            'with_front' => true,
        ],
    ]);

    register_taxonomy('fort_type', ['fort'], [
        'label' => esc_html__('Fort Types', 'fort-explorer'),
        'labels' => [
            'name' => esc_html__('Fort Types', 'fort-explorer'),
            'singular_name' => esc_html__('Fort Type', 'fort-explorer'),
            'search_items' => esc_html__('Search Fort Types', 'fort-explorer'),
            'all_items' => esc_html__('All Fort Types', 'fort-explorer'),
            'edit_item' => esc_html__('Edit Fort Type', 'fort-explorer'),
            'update_item' => esc_html__('Update Fort Type', 'fort-explorer'),
            'add_new_item' => esc_html__('Add New Fort Type', 'fort-explorer'),
            'new_item_name' => esc_html__('New Fort Type Name', 'fort-explorer'),
        ],
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'hierarchical' => false,
        'rewrite' => [
            'slug' => 'fort-type',
            'with_front' => true,
        ],
    ]);

    register_taxonomy('period', ['fort'], [
        'label' => esc_html__('Historical Periods', 'fort-explorer'),
        'labels' => [
            'name' => esc_html__('Historical Periods', 'fort-explorer'),
            'singular_name' => esc_html__('Period', 'fort-explorer'),
            'search_items' => esc_html__('Search Periods', 'fort-explorer'),
            'all_items' => esc_html__('All Periods', 'fort-explorer'),
            'edit_item' => esc_html__('Edit Period', 'fort-explorer'),
            'update_item' => esc_html__('Update Period', 'fort-explorer'),
            'add_new_item' => esc_html__('Add New Period', 'fort-explorer'),
            'new_item_name' => esc_html__('New Period Name', 'fort-explorer'),
        ],
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'hierarchical' => false,
        'rewrite' => [
            'slug' => 'period',
            'with_front' => true,
        ],
    ]);
}
