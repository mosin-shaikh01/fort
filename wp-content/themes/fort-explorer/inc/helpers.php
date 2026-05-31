<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

function fort_get_archive_title(): string {
    if (is_category()) {
        return single_cat_title('', false);
    }

    if (is_tag()) {
        return single_tag_title('', false);
    }

    if (is_author()) {
        return get_the_author();
    }

    if (is_year()) {
        return get_the_date('Y');
    }

    if (is_month()) {
        return get_the_date('F Y');
    }

    if (is_day()) {
        return get_the_date('F d, Y');
    }

    return __('Archive', 'fort-explorer');
}

function fort_get_archive_description(): string {
    if (is_category()) {
        return (string) category_description();
    }

    if (is_tag()) {
        return (string) tag_description();
    }

    if (is_author()) {
        return (string) get_the_author_meta('description');
    }

    return '';
}

function fort_format_date(int|string $date = 'now'): string {
    if (is_numeric($date)) {
        $timestamp = (int) $date;
    } else {
        $timestamp = strtotime((string) $date);
        if ($timestamp === false) {
            $timestamp = time();
        }
    }

    return wp_date('F d, Y', $timestamp);
}

function fort_truncate_text(string $text, int $length = 150): string {
    if (strlen($text) <= $length) {
        return $text;
    }

    $truncated = substr($text, 0, $length);
    $last_space = strrpos($truncated, ' ');

    if ($last_space === false) {
        return $truncated . '...';
    }

    return substr($truncated, 0, $last_space) . '...';
}

function fort_is_active_menu_item(int $post_id): bool {
    return is_singular() && get_the_ID() === $post_id;
}

function fort_get_theme_option(string $option, mixed $default = false): mixed {
    return get_option('fort_' . $option, $default);
}

function fort_update_theme_option(string $option, mixed $value): bool {
    return update_option('fort_' . $option, $value);
}
