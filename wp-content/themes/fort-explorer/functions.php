<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

require_once get_template_directory() . '/inc/constants.php';
require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/template-functions.php';
require_once get_template_directory() . '/inc/hooks.php';
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/acf-fields.php';

add_action('init', 'fort_load_textdomain', 1);

function fort_load_textdomain(): void {
    load_theme_textdomain('fort-explorer', get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'fort_theme_setup');

function fort_theme_setup(): void {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ]);
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    add_theme_support('custom-units', ['px', 'rem', 'em', 'vw', 'vh', '%']);

    add_image_size('fort-hero', 1920, 600, ['center', 'center']);
    add_image_size('fort-card', 400, 250, ['center', 'center']);
    add_image_size('blog-featured', 800, 450, ['center', 'center']);
    add_image_size('gallery-thumb', 300, 300, ['center', 'center']);
}

add_action('init', 'fort_register_nav_menus', 5);

function fort_register_nav_menus(): void {
    register_nav_menus([
        'primary' => esc_html__('Primary Menu', 'fort-explorer'),
        'footer' => esc_html__('Footer Menu', 'fort-explorer'),
    ]);
}

add_action('wp_enqueue_scripts', 'fort_enqueue_assets');

function fort_enqueue_assets(): void {
    wp_enqueue_style(
        'fort-google-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600&family=Cinzel:wght@500;600&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'fort-style',
        get_stylesheet_uri(),
        [],
        FORT_THEME_VERSION
    );

    wp_enqueue_script(
        'fort-app',
        get_template_directory_uri() . '/assets/js/app.js',
        [],
        FORT_THEME_VERSION,
        ['strategy' => 'defer']
    );
}

add_filter('body_class', 'fort_body_classes');

function fort_body_classes(array $classes): array {
    if (is_front_page()) {
        $classes[] = 'is-home';
    }

    if (is_single() || is_page()) {
        $classes[] = 'is-single';
    }

    if (is_archive()) {
        $classes[] = 'is-archive';
    }

    return $classes;
}
