<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_footer', 'fort_add_schema_markup');

function fort_add_schema_markup(): void {
    if (!is_singular()) {
        return;
    }

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebPage',
        'name' => get_the_title(),
        'description' => get_bloginfo('description'),
        'url' => get_permalink(),
    ];

    if (has_post_thumbnail()) {
        $schema['image'] = [
            '@type' => 'ImageObject',
            'url' => wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0] ?? '',
        ];
    }

    echo '<script type="application/ld+json">';
    echo wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    echo '</script>';
}

add_filter('get_the_excerpt', 'fort_filter_excerpt_more');

function fort_filter_excerpt_more(string $excerpt): string {
    if (empty($excerpt)) {
        return $excerpt;
    }

    return $excerpt . ' <a class="fort-read-more" href="' . esc_url(get_permalink()) . '">' .
        esc_html__('Read More →', 'fort-explorer') . '</a>';
}

add_filter('wp_footer', 'fort_add_defer_to_scripts', 10);

function fort_add_defer_to_scripts(): void {
    if (!is_admin()) {
        echo "\n<!-- Fort Explorer Theme v" . esc_attr(FORT_THEME_VERSION) . " -->\n";
    }
}
