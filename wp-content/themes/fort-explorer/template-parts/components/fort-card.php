<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$post_id = $args['post_id'] ?? get_the_ID();
$post = get_post($post_id);

if (!$post || 'fort' !== $post->post_type) {
    return;
}

$fort_type = wp_get_post_terms($post_id, 'fort_type', ['fields' => 'names']);
$fort_type_name = !empty($fort_type) ? $fort_type[0] : '';
$year = get_field('fort_built_year', $post_id);
$excerpt = wp_trim_words(get_the_excerpt($post_id), 15, '...');
?>

<article class="fort-card">
    <div class="fort-card__image">
        <?php
        if (has_post_thumbnail($post_id)) {
            echo wp_get_attachment_image(
                get_post_thumbnail_id($post_id),
                'fort-card',
                false,
                ['class' => 'fort-card__img', 'loading' => 'lazy']
            );
        } else {
            echo '<div class="fort-card__placeholder" style="background: var(--color-bg-light); width: 100%; aspect-ratio: 4/3; display: flex; align-items: center; justify-content: center;">';
            echo esc_html__('No image', 'fort-explorer');
            echo '</div>';
        }
        ?>
    </div>

    <div class="fort-card__content">
        <h3 class="fort-card__title">
            <a href="<?php echo esc_url(get_permalink($post_id)); ?>">
                <?php echo esc_html($post->post_title); ?>
            </a>
        </h3>

        <?php if (!empty($fort_type_name)) : ?>
            <span class="fort-card__badge">
                <?php echo esc_html($fort_type_name); ?>
            </span>
        <?php endif; ?>

        <?php if ($year) : ?>
            <div class="fort-card__year">
                <?php echo esc_html__('Built:', 'fort-explorer') . ' ' . esc_html($year); ?>
            </div>
        <?php endif; ?>

        <p class="fort-card__excerpt">
            <?php echo esc_html($excerpt); ?>
        </p>

        <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="fort-card__link">
            <?php echo esc_html__('View Details →', 'fort-explorer'); ?>
        </a>
    </div>
</article>
