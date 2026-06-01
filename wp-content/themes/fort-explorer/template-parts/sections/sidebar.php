<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/* Most Visited Forts */
$visited_forts = get_posts([
    'post_type'      => 'fort',
    'posts_per_page' => 5,
    'orderby'        => 'comment_count',
    'order'          => 'DESC',
    'post_status'    => 'publish',
]);

/* Regions */
$regions = get_terms([
    'taxonomy'   => 'region',
    'hide_empty' => false,
    'orderby'    => 'count',
    'order'      => 'DESC',
    'number'     => 10,
]);

/* Recent Posts */
$recent_posts = get_posts([
    'post_type'      => 'post',
    'posts_per_page' => 4,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);
?>

<!-- Widget: Most Visited -->
<?php if (!empty($visited_forts)) : ?>
    <div class="sidebar-widget">
        <h3 class="sidebar-widget__title"><?php esc_html_e('Most Visited', 'fort-explorer'); ?></h3>
        <ol class="sidebar-rank">
            <?php foreach ($visited_forts as $index => $fort) :
                $region = wp_get_post_terms($fort->ID, 'region', ['fields' => 'names']);
            ?>
                <li class="sidebar-rank__item">
                    <span class="sidebar-rank__number"><?php echo esc_html($index + 1); ?></span>

                    <?php if (has_post_thumbnail($fort->ID)) : ?>
                        <a href="<?php echo esc_url(get_permalink($fort->ID)); ?>" class="sidebar-rank__image-wrap" tabindex="-1" aria-hidden="true">
                            <?php echo wp_get_attachment_image(
                                get_post_thumbnail_id($fort->ID),
                                'gallery-thumb',
                                false,
                                ['class' => 'sidebar-rank__img', 'loading' => 'lazy', 'alt' => esc_attr($fort->post_title)]
                            ); ?>
                        </a>
                    <?php else : ?>
                        <?php fort_image_placeholder('sidebar-rank__placeholder'); ?>
                    <?php endif; ?>

                    <div class="sidebar-rank__info">
                        <a href="<?php echo esc_url(get_permalink($fort->ID)); ?>" class="sidebar-rank__title">
                            <?php echo esc_html($fort->post_title); ?>
                        </a>
                        <?php if (!empty($region)) : ?>
                            <span class="sidebar-rank__meta"><?php echo esc_html($region[0]); ?></span>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
<?php endif; ?>

<!-- Widget: Explore Regions -->
<?php if (!is_wp_error($regions) && !empty($regions)) : ?>
    <div class="sidebar-widget">
        <h3 class="sidebar-widget__title"><?php esc_html_e('Explore Regions', 'fort-explorer'); ?></h3>
        <div class="sidebar-tags">
            <?php foreach ($regions as $region) : ?>
                <a href="<?php echo esc_url(get_term_link($region)); ?>" class="sidebar-tag">
                    <?php echo esc_html($region->name); ?>
                    <span class="sidebar-tag__count"><?php echo esc_html($region->count); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<!-- Widget: Recent Stories -->
<?php if (!empty($recent_posts)) : ?>
    <div class="sidebar-widget">
        <h3 class="sidebar-widget__title"><?php esc_html_e('Recent Stories', 'fort-explorer'); ?></h3>
        <ul class="sidebar-posts">
            <?php foreach ($recent_posts as $post) : ?>
                <li class="sidebar-post">
                    <?php if (has_post_thumbnail($post->ID)) : ?>
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="sidebar-post__image-wrap" tabindex="-1" aria-hidden="true">
                            <?php echo wp_get_attachment_image(
                                get_post_thumbnail_id($post->ID),
                                'gallery-thumb',
                                false,
                                ['class' => 'sidebar-post__img', 'loading' => 'lazy', 'alt' => esc_attr($post->post_title)]
                            ); ?>
                        </a>
                    <?php else : ?>
                        <?php fort_image_placeholder('sidebar-post__placeholder'); ?>
                    <?php endif; ?>

                    <div class="sidebar-post__info">
                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="sidebar-post__title">
                            <?php echo esc_html($post->post_title); ?>
                        </a>
                        <time class="sidebar-post__date" datetime="<?php echo esc_attr(get_the_date('c', $post->ID)); ?>">
                            <?php echo esc_html(get_the_date('M j, Y', $post->ID)); ?>
                        </time>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
