<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$post_id = $args['post_id'] ?? get_the_ID();
$post = get_post($post_id);

if (!$post) {
    return;
}

$excerpt = wp_trim_words(get_the_excerpt($post_id), 20, '...');
$author_name = get_the_author_meta('display_name', $post->post_author);
$date = get_the_date('F d, Y', $post_id);
?>

<article class="blog-card">
    <div class="blog-card__image">
        <?php
        if (has_post_thumbnail($post_id)) {
            echo wp_get_attachment_image(
                get_post_thumbnail_id($post_id),
                'blog-featured',
                false,
                ['class' => 'blog-card__img', 'loading' => 'lazy', 'alt' => esc_attr(get_the_title($post_id))]
            );
        } else {
            fort_image_placeholder();
        }
        ?>
    </div>

    <div class="blog-card__content">
        <h3 class="blog-card__title">
            <a href="<?php echo esc_url(get_permalink($post_id)); ?>">
                <?php echo esc_html($post->post_title); ?>
            </a>
        </h3>

        <div class="blog-card__meta">
            <time class="blog-card__date" datetime="<?php echo esc_attr(get_the_date('c', $post_id)); ?>">
                <?php echo esc_html($date); ?>
            </time>
            <span class="blog-card__author">
                <?php echo esc_html($author_name); ?>
            </span>
        </div>

        <p class="blog-card__excerpt">
            <?php echo esc_html($excerpt); ?>
        </p>

        <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="blog-card__link">
            <?php echo esc_html__('Read More →', 'fort-explorer'); ?>
        </a>
    </div>
</article>
