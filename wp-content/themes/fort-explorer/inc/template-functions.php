<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

function fort_get_template_part(string $slug, string $name = '', array $args = []): void {
    $template = '';

    if (!empty($name)) {
        $template = apply_filters(
            'fort_get_template_part',
            get_template_directory() . "/template-parts/{$slug}/{$slug}-{$name}.php",
            $slug,
            $name
        );

        if (!file_exists($template)) {
            $template = get_template_directory() . "/template-parts/{$slug}.php";
        }
    } else {
        $template = get_template_directory() . "/template-parts/{$slug}.php";
    }

    if (file_exists($template)) {
        extract($args);
        include $template;
    }
}

function fort_the_post_thumbnail(array $args = []): void {
    $defaults = [
        'size' => 'post-thumbnail',
        'class' => 'fort-featured-image',
        'lazy' => true,
    ];

    $args = wp_parse_args($args, $defaults);
    $attr = [];

    if ($args['lazy']) {
        $attr['loading'] = 'lazy';
    }

    if (!empty($args['class'])) {
        $attr['class'] = $args['class'];
    }

    if (has_post_thumbnail()) {
        the_post_thumbnail($args['size'], $attr);
    }
}

function fort_get_breadcrumb(): array {
    $breadcrumb = [];
    $home_url = home_url();

    $breadcrumb[] = [
        'url' => $home_url,
        'label' => esc_html__('Home', 'fort-explorer'),
    ];

    if (is_singular(['post', 'page'])) {
        if (is_singular('post')) {
            $breadcrumb[] = [
                'url' => get_permalink(get_option('page_for_posts')),
                'label' => esc_html__('Blog', 'fort-explorer'),
            ];
        }

        $breadcrumb[] = [
            'url' => get_permalink(),
            'label' => get_the_title(),
            'current' => true,
        ];
    } elseif (is_category()) {
        $breadcrumb[] = [
            'url' => get_category_link(get_queried_object_id()),
            'label' => single_cat_title('', false),
            'current' => true,
        ];
    } elseif (is_tag()) {
        $breadcrumb[] = [
            'url' => get_tag_link(get_queried_object_id()),
            'label' => single_tag_title('', false),
            'current' => true,
        ];
    } elseif (is_archive()) {
        $breadcrumb[] = [
            'url' => '',
            'label' => fort_get_archive_title(),
            'current' => true,
        ];
    }

    return apply_filters('fort_breadcrumb', $breadcrumb);
}

function fort_the_pagination(): void {
    $args = [
        'type' => 'list',
        'prev_text' => esc_html__('← Previous', 'fort-explorer'),
        'next_text' => esc_html__('Next →', 'fort-explorer'),
    ];

    the_posts_pagination($args);
}

function fort_get_excerpt(int $length = 150): string {
    $excerpt = wp_strip_all_tags(get_the_content());
    return fort_truncate_text($excerpt, $length);
}

function fort_get_post_meta_data(): array {
    return [
        'date' => get_the_date('F d, Y'),
        'author' => get_the_author(),
        'author_url' => get_author_posts_url(get_the_author_meta('ID')),
        'categories' => get_the_category_list(', '),
        'comments' => wp_count_comments(get_the_ID()),
    ];
}
