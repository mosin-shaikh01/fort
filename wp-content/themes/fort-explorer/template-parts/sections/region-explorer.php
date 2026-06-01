<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$regions = get_terms([
    'taxonomy'   => 'region',
    'hide_empty' => false,
    'orderby'    => 'count',
    'order'      => 'DESC',
    'number'     => 8,
]);

if (is_wp_error($regions)) {
    $regions = [];
}
?>

<section class="region-explorer">
    <div class="container">
        <div class="region-explorer__header">
            <h2 class="region-explorer__title">
                <?php esc_html_e('Explore by Region', 'fort-explorer'); ?>
            </h2>
            <p class="region-explorer__subtitle">
                <?php esc_html_e('Browse forts from different regions across the Indian subcontinent.', 'fort-explorer'); ?>
            </p>
        </div>

        <?php if (!empty($regions)) : ?>
            <div class="region-explorer__grid">
                <?php foreach ($regions as $region) : ?>
                    <a href="<?php echo esc_url(get_term_link($region)); ?>" class="region-card">
                        <span class="region-card__name"><?php echo esc_html($region->name); ?></span>
                        <span class="region-card__count">
                            <?php
                            printf(
                                esc_html(_n('%s Fort', '%s Forts', $region->count, 'fort-explorer')),
                                number_format((int) $region->count)
                            );
                            ?>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="region-explorer__footer">
                <a href="<?php echo esc_url(get_post_type_archive_link('fort') ?: home_url('/forts')); ?>" class="button button--secondary button--large">
                    <?php esc_html_e('View All Regions', 'fort-explorer'); ?>
                </a>
            </div>
        <?php else : ?>
            <p class="region-explorer__empty">
                <?php esc_html_e('No regions found yet.', 'fort-explorer'); ?>
            </p>
        <?php endif; ?>
    </div>
</section>
