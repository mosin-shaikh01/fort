<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$forts = get_posts([
    'post_type'      => 'fort',
    'posts_per_page' => 5,
    'orderby'        => 'comment_count',
    'order'          => 'DESC',
    'post_status'    => 'publish',
]);

if (empty($forts)) {
    return;
}
?>

<section class="most-visited">
    <div class="container">

        <div class="section-header">
            <div class="section-header__left">
                <span class="section-label"><?php esc_html_e('Top Picks', 'fort-explorer'); ?></span>
                <h2 class="section-title"><?php esc_html_e('Most Visited Forts', 'fort-explorer'); ?></h2>
            </div>
            <a href="<?php echo esc_url(get_post_type_archive_link('fort') ?: home_url('/forts')); ?>" class="section-header__link">
                <?php esc_html_e('See All', 'fort-explorer'); ?> &rarr;
            </a>
        </div>

        <div class="most-visited__list">
            <?php foreach ($forts as $index => $fort) :
                $rank        = $index + 1;
                $type_terms  = wp_get_post_terms($fort->ID, 'fort_type', ['fields' => 'names']);
                $region_terms = wp_get_post_terms($fort->ID, 'region', ['fields' => 'names']);
                $year        = get_field('fort_built_year', $fort->ID);
            ?>
                <article class="visited-item">
                    <span class="visited-item__rank"><?php echo esc_html(str_pad((string) $rank, 2, '0', STR_PAD_LEFT)); ?></span>

                    <?php if (has_post_thumbnail($fort->ID)) : ?>
                        <a href="<?php echo esc_url(get_permalink($fort->ID)); ?>" class="visited-item__image-wrap" tabindex="-1" aria-hidden="true">
                            <?php echo wp_get_attachment_image(get_post_thumbnail_id($fort->ID), 'gallery-thumb', false, ['class' => 'visited-item__img', 'loading' => 'lazy', 'alt' => esc_attr($fort->post_title)]); ?>
                        </a>
                    <?php else : ?>
                        <?php fort_image_placeholder('visited-item__placeholder'); ?>
                    <?php endif; ?>

                    <div class="visited-item__info">
                        <h3 class="visited-item__title">
                            <a href="<?php echo esc_url(get_permalink($fort->ID)); ?>">
                                <?php echo esc_html($fort->post_title); ?>
                            </a>
                        </h3>
                        <div class="visited-item__meta">
                            <?php if (!empty($region_terms)) : ?>
                                <span class="visited-item__region"><?php echo esc_html($region_terms[0]); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($type_terms)) : ?>
                                <span class="visited-item__type"><?php echo esc_html($type_terms[0]); ?></span>
                            <?php endif; ?>
                            <?php if ($year) : ?>
                                <span class="visited-item__year">
                                    <?php printf(esc_html__('Est. %s', 'fort-explorer'), esc_html($year)); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <a href="<?php echo esc_url(get_permalink($fort->ID)); ?>" class="visited-item__arrow" aria-label="<?php echo esc_attr(sprintf(__('Visit %s', 'fort-explorer'), $fort->post_title)); ?>">
                        &rarr;
                    </a>
                </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>
