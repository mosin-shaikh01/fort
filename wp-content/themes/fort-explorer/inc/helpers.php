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

function fort_image_placeholder(string $extra_class = ''): void {
    $classes = trim('img-placeholder ' . $extra_class);
    ?>
    <div class="<?php echo esc_attr($classes); ?>" role="img" aria-label="<?php esc_attr_e('No image available', 'fort-explorer'); ?>">
        <svg class="img-placeholder__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" focusable="false">
            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
            <circle cx="8.5" cy="8.5" r="1.5"/>
            <polyline points="21 15 16 10 5 21"/>
        </svg>
        <span class="img-placeholder__text"><?php esc_html_e('No Image', 'fort-explorer'); ?></span>
    </div>
    <?php
}
