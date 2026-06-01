<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$forts = get_posts([
    'post_type'      => 'fort',
    'posts_per_page' => 6,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post_status'    => 'publish',
]);

if (empty($forts)) {
    return;
}

$featured = $forts[0];
$side     = array_slice($forts, 1, 2);
$bottom   = array_slice($forts, 3, 3);
?>

<section class="main-section">
    <div class="section-header">
        <div class="section-header__left">
            <span class="section-label"><?php esc_html_e('Trending', 'fort-explorer'); ?></span>
            <h2 class="section-title"><?php esc_html_e('Popular Forts', 'fort-explorer'); ?></h2>
        </div>
        <a href="<?php echo esc_url(get_post_type_archive_link('fort') ?: home_url('/forts')); ?>" class="section-header__link">
            <?php esc_html_e('View All', 'fort-explorer'); ?> &rarr;
        </a>
    </div>

    <!-- Editorial grid: 1 large + 2 side -->
    <div class="editorial-grid">

        <article class="editorial-card editorial-card--featured">
            <?php if (has_post_thumbnail($featured->ID)) : ?>
                <a href="<?php echo esc_url(get_permalink($featured->ID)); ?>" class="editorial-card__img-wrap">
                    <?php echo wp_get_attachment_image(get_post_thumbnail_id($featured->ID), 'large', false, ['class' => 'editorial-card__img', 'loading' => 'eager', 'alt' => esc_attr($featured->post_title)]); ?>
                </a>
            <?php else : ?>
                <?php fort_image_placeholder('editorial-card__img-wrap editorial-card__img-wrap--placeholder'); ?>
            <?php endif; ?>
            <div class="editorial-card__body">
                <?php
                $type = wp_get_post_terms($featured->ID, 'fort_type', ['fields' => 'names']);
                if (!empty($type)) :
                ?>
                    <span class="editorial-card__badge"><?php echo esc_html($type[0]); ?></span>
                <?php endif; ?>
                <h3 class="editorial-card__title editorial-card__title--lg">
                    <a href="<?php echo esc_url(get_permalink($featured->ID)); ?>"><?php echo esc_html($featured->post_title); ?></a>
                </h3>
                <p class="editorial-card__excerpt">
                    <?php echo esc_html(wp_trim_words(get_the_excerpt($featured->ID), 20, '...')); ?>
                </p>
                <div class="editorial-card__meta">
                    <?php echo esc_html(get_the_date('M j, Y', $featured->ID)); ?>
                </div>
            </div>
        </article>

        <div class="editorial-grid__side">
            <?php foreach ($side as $fort) :
                $type = wp_get_post_terms($fort->ID, 'fort_type', ['fields' => 'names']);
            ?>
                <article class="editorial-card editorial-card--side">
                    <?php if (has_post_thumbnail($fort->ID)) : ?>
                        <a href="<?php echo esc_url(get_permalink($fort->ID)); ?>" class="editorial-card__img-wrap">
                            <?php echo wp_get_attachment_image(get_post_thumbnail_id($fort->ID), 'blog-featured', false, ['class' => 'editorial-card__img', 'loading' => 'lazy', 'alt' => esc_attr($fort->post_title)]); ?>
                        </a>
                    <?php else : ?>
                        <?php fort_image_placeholder('editorial-card__img-wrap editorial-card__img-wrap--placeholder'); ?>
                    <?php endif; ?>
                    <div class="editorial-card__body">
                        <?php if (!empty($type)) : ?>
                            <span class="editorial-card__badge editorial-card__badge--sm"><?php echo esc_html($type[0]); ?></span>
                        <?php endif; ?>
                        <h3 class="editorial-card__title">
                            <a href="<?php echo esc_url(get_permalink($fort->ID)); ?>"><?php echo esc_html($fort->post_title); ?></a>
                        </h3>
                        <div class="editorial-card__meta"><?php echo esc_html(get_the_date('M j, Y', $fort->ID)); ?></div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

    </div>

    <!-- Bottom 3 cards -->
    <?php if (!empty($bottom)) : ?>
        <div class="small-card-grid">
            <?php foreach ($bottom as $fort) :
                $type = wp_get_post_terms($fort->ID, 'fort_type', ['fields' => 'names']);
            ?>
                <article class="small-card">
                    <?php if (has_post_thumbnail($fort->ID)) : ?>
                        <a href="<?php echo esc_url(get_permalink($fort->ID)); ?>" class="small-card__img-wrap">
                            <?php echo wp_get_attachment_image(get_post_thumbnail_id($fort->ID), 'fort-card', false, ['class' => 'small-card__img', 'loading' => 'lazy', 'alt' => esc_attr($fort->post_title)]); ?>
                        </a>
                    <?php else : ?>
                        <?php fort_image_placeholder('small-card__img-wrap small-card__img-wrap--placeholder'); ?>
                    <?php endif; ?>
                    <div class="small-card__body">
                        <?php if (!empty($type)) : ?>
                            <span class="small-card__tag"><?php echo esc_html($type[0]); ?></span>
                        <?php endif; ?>
                        <h3 class="small-card__title">
                            <a href="<?php echo esc_url(get_permalink($fort->ID)); ?>"><?php echo esc_html($fort->post_title); ?></a>
                        </h3>
                        <span class="small-card__date"><?php echo esc_html(get_the_date('M j, Y', $fort->ID)); ?></span>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</section>
