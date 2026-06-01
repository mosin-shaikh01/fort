<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/* Get custom hero background image from ACF (front page) */
$hero_bg_acf = function_exists('get_field') ? get_field('hero_background_image') : false;
$hero_image  = '';

if ($hero_bg_acf && is_array($hero_bg_acf) && !empty($hero_bg_acf['url'])) {
    $hero_image = $hero_bg_acf['url'];
}

/* Fallback: Use latest fort's featured image */
if (!$hero_image) {
    $hero_forts = get_posts([
        'post_type'      => 'fort',
        'posts_per_page' => 1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);

    $hero_fort = !empty($hero_forts) ? $hero_forts[0] : null;
    if ($hero_fort && has_post_thumbnail($hero_fort->ID)) {
        $hero_image = get_the_post_thumbnail_url($hero_fort->ID, 'fort-hero');
    }
} else {
    $hero_forts = get_posts([
        'post_type'      => 'fort',
        'posts_per_page' => 1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);
    $hero_fort = !empty($hero_forts) ? $hero_forts[0] : null;
}

$hero_type   = $hero_fort ? wp_get_post_terms($hero_fort->ID, 'fort_type', ['fields' => 'names']) : [];
$hero_region = $hero_fort ? wp_get_post_terms($hero_fort->ID, 'region', ['fields' => 'names']) : [];
$hero_year   = $hero_fort ? get_field('fort_built_year', $hero_fort->ID) : '';
$bg_style    = $hero_image ? 'background-image: url(' . esc_url($hero_image) . ');' : '';
?>

<section class="home-hero" style="<?php echo $bg_style; ?>">
    <div class="home-hero__overlay"></div>

    <div class="home-hero__inner">
        <div class="home-hero__meta">
            <span class="home-hero__label"><?php esc_html_e('Feature Story', 'fort-explorer'); ?></span>
            <?php if (!empty($hero_type)) : ?>
                <span class="home-hero__type"><?php echo esc_html($hero_type[0]); ?></span>
            <?php endif; ?>
        </div>

        <h1 class="home-hero__heading">
            <?php
            if ($hero_fort) {
                echo esc_html($hero_fort->post_title);
            } else {
                esc_html_e("Discover India's Historic Forts", 'fort-explorer');
            }
            ?>
        </h1>

        <?php if ($hero_fort) : ?>
            <p class="home-hero__subtitle">
                <?php echo esc_html(wp_trim_words(get_the_excerpt($hero_fort->ID), 22, '...')); ?>
            </p>
            <div class="home-hero__footer">
                <div class="home-hero__info">
                    <?php if (!empty($hero_region)) : ?>
                        <span class="home-hero__region"><?php echo esc_html($hero_region[0]); ?></span>
                    <?php endif; ?>
                    <?php if ($hero_year) : ?>
                        <span class="home-hero__year">
                            <?php printf(esc_html__('Est. %s', 'fort-explorer'), esc_html($hero_year)); ?>
                        </span>
                    <?php endif; ?>
                </div>
                <a href="<?php echo esc_url(get_permalink($hero_fort->ID)); ?>" class="home-hero__cta">
                    <?php esc_html_e('Read Story', 'fort-explorer'); ?> &rarr;
                </a>
            </div>
        <?php else : ?>
            <p class="home-hero__subtitle">
                <?php esc_html_e('Journey through centuries of history, architecture and legend. Explore magnificent forts across the Indian subcontinent.', 'fort-explorer'); ?>
            </p>
            <div class="home-hero__footer">
                <a href="<?php echo esc_url(get_post_type_archive_link('fort') ?: home_url('/forts')); ?>" class="home-hero__cta">
                    <?php esc_html_e('Explore All Forts', 'fort-explorer'); ?> &rarr;
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
