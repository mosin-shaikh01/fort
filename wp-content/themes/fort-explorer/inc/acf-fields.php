<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

add_action('acf/init', 'fort_register_acf_fields');

function fort_register_acf_fields(): void {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group([
    'key' => 'group_fort_location_details',
    'title' => esc_html__('Location Details', 'fort-explorer'),
    'fields' => [
        [
            'key' => 'field_fort_latitude',
            'label' => esc_html__('Latitude', 'fort-explorer'),
            'name' => 'fort_latitude',
            'type' => 'number',
            'required' => 0,
            'default_value' => '',
            'placeholder' => esc_html__('e.g., 28.7041', 'fort-explorer'),
        ],
        [
            'key' => 'field_fort_longitude',
            'label' => esc_html__('Longitude', 'fort-explorer'),
            'name' => 'fort_longitude',
            'type' => 'number',
            'required' => 0,
            'default_value' => '',
            'placeholder' => esc_html__('e.g., 77.1025', 'fort-explorer'),
        ],
        [
            'key' => 'field_fort_address',
            'label' => esc_html__('Address', 'fort-explorer'),
            'name' => 'fort_address',
            'type' => 'text',
            'required' => 0,
        ],
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'fort',
            ],
        ],
    ],
]);

acf_add_local_field_group([
    'key' => 'group_fort_information',
    'title' => esc_html__('Fort Information', 'fort-explorer'),
    'fields' => [
        [
            'key' => 'field_fort_built_year',
            'label' => esc_html__('Built Year', 'fort-explorer'),
            'name' => 'fort_built_year',
            'type' => 'number',
            'required' => 0,
            'placeholder' => esc_html__('e.g., 1650', 'fort-explorer'),
        ],
        [
            'key' => 'field_fort_architect',
            'label' => esc_html__('Architect/Builder', 'fort-explorer'),
            'name' => 'fort_architect',
            'type' => 'text',
            'required' => 0,
        ],
        [
            'key' => 'field_fort_materials',
            'label' => esc_html__('Building Materials', 'fort-explorer'),
            'name' => 'fort_materials',
            'type' => 'text',
            'required' => 0,
            'placeholder' => esc_html__('e.g., Red sandstone, marble', 'fort-explorer'),
        ],
        [
            'key' => 'field_fort_significance',
            'label' => esc_html__('Historical Significance', 'fort-explorer'),
            'name' => 'fort_significance',
            'type' => 'wysiwyg',
            'required' => 0,
            'toolbar' => 'basic',
        ],
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'fort',
            ],
        ],
    ],
]);

acf_add_local_field_group([
    'key' => 'group_fort_media',
    'title' => esc_html__('Media & Gallery', 'fort-explorer'),
    'fields' => [
        [
            'key' => 'field_fort_gallery',
            'label' => esc_html__('Gallery Images', 'fort-explorer'),
            'name' => 'fort_gallery',
            'type' => 'gallery',
            'required' => 0,
            'return_format' => 'id',
        ],
        [
            'key' => 'field_fort_video_url',
            'label' => esc_html__('Drone Video URL', 'fort-explorer'),
            'name' => 'fort_video_url',
            'type' => 'url',
            'required' => 0,
            'placeholder' => esc_html__('e.g., https://youtube.com/...', 'fort-explorer'),
        ],
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'fort',
            ],
        ],
    ],
]);

acf_add_local_field_group([
    'key' => 'group_fort_visitor_info',
    'title' => esc_html__('Visitor Information', 'fort-explorer'),
    'fields' => [
        [
            'key' => 'field_fort_visiting_hours',
            'label' => esc_html__('Visiting Hours', 'fort-explorer'),
            'name' => 'fort_visiting_hours',
            'type' => 'text',
            'required' => 0,
            'placeholder' => esc_html__('e.g., 9:00 AM - 6:00 PM', 'fort-explorer'),
        ],
        [
            'key' => 'field_fort_entry_fee',
            'label' => esc_html__('Entry Fee', 'fort-explorer'),
            'name' => 'fort_entry_fee',
            'type' => 'number',
            'required' => 0,
            'placeholder' => esc_html__('e.g., 250', 'fort-explorer'),
        ],
        [
            'key' => 'field_fort_contact_phone',
            'label' => esc_html__('Contact Phone', 'fort-explorer'),
            'name' => 'fort_contact_phone',
            'type' => 'text',
            'required' => 0,
            'placeholder' => esc_html__('e.g., +91 98765 43210', 'fort-explorer'),
        ],
        [
            'key' => 'field_fort_website',
            'label' => esc_html__('Website URL', 'fort-explorer'),
            'name' => 'fort_website',
            'type' => 'url',
            'required' => 0,
        ],
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'fort',
            ],
        ],
    ],
]);

acf_add_local_field_group([
    'key' => 'group_fort_related',
    'title' => esc_html__('Related Information', 'fort-explorer'),
    'fields' => [
        [
            'key' => 'field_fort_facts',
            'label' => esc_html__('Interesting Facts', 'fort-explorer'),
            'name' => 'fort_facts',
            'type' => 'repeater',
            'required' => 0,
            'sub_fields' => [
                [
                    'key' => 'field_fort_fact',
                    'label' => esc_html__('Fact', 'fort-explorer'),
                    'name' => 'fact',
                    'type' => 'textarea',
                    'required' => 0,
                    'rows' => 3,
                ],
            ],
            'min' => 0,
            'max' => 10,
        ],
        [
            'key' => 'field_fort_related_forts',
            'label' => esc_html__('Related Forts', 'fort-explorer'),
            'name' => 'fort_related_forts',
            'type' => 'post_object',
            'required' => 0,
            'post_type' => ['fort'],
            'multiple' => 1,
            'return_format' => 'id',
        ],
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'fort',
            ],
        ],
    ],
    ]);
}
