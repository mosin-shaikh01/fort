<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$title = $args['title'] ?? esc_html__('Featured Forts', 'fort-explorer');
$count = intval($args['count'] ?? 8);
$show_link = $args['show_link'] ?? true;
$link_text = $args['link_text'] ?? esc_html__('Explore All Forts', 'fort-explorer');
$link_url = $args['link_url'] ?? get_post_type_archive_link('fort');

$query = new WP_Query([
    'post_type' => 'fort',
    'posts_per_page' => $count,
    'orderby' => 'date',
    'order' => 'DESC',
]);
?>

<section class="featured-forts">
    <div class="container">
        <?php if (!empty($title)) : ?>
            <h2 class="featured-forts__title">
                <?php echo wp_kses_post($title); ?>
            </h2>
        <?php endif; ?>

        <?php if ($query->have_posts()) : ?>
            <div class="featured-forts__grid">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="featured-forts__item">
                        <?php
                        fort_get_template_part(
                            'components/fort-card',
                            '',
                            ['post_id' => get_the_ID()]
                        );
                        ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php if ($show_link && !empty($link_url)) : ?>
                <div class="featured-forts__footer">
                    <a href="<?php echo esc_url($link_url); ?>" class="button button--primary">
                        <?php echo esc_html($link_text); ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <p class="featured-forts__empty">
                <?php echo esc_html__('No forts found.', 'fort-explorer'); ?>
            </p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </div>
</section>
