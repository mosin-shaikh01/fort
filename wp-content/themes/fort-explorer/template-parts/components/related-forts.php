<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$post_id = $args['post_id'] ?? get_the_ID();
$count = intval($args['count'] ?? 3);
$title = $args['title'] ?? esc_html__('Related Forts', 'fort-explorer');

if (!$post_id || 'fort' !== get_post_type($post_id)) {
    return;
}

$related_ids = get_field('fort_related_forts', $post_id);
$related_ids = is_array($related_ids) ? $related_ids : [];

if (empty($related_ids)) {
    $terms = wp_get_post_terms($post_id, ['region', 'fort_type', 'period'], ['fields' => 'ids']);

    if (!empty($terms)) {
        $query = new WP_Query([
            'post_type' => 'fort',
            'posts_per_page' => $count + 1,
            'tax_query' => [
                [
                    'taxonomy' => ['region', 'fort_type', 'period'],
                    'field' => 'id',
                    'terms' => $terms,
                    'operator' => 'IN',
                ],
            ],
            'post__not_in' => [$post_id],
            'orderby' => 'rand',
        ]);
    } else {
        $query = new WP_Query([
            'post_type' => 'fort',
            'posts_per_page' => $count,
            'post__not_in' => [$post_id],
            'orderby' => 'date',
            'order' => 'DESC',
        ]);
    }
} else {
    $related_ids = array_slice($related_ids, 0, $count);
    $query = new WP_Query([
        'post_type' => 'fort',
        'post__in' => $related_ids,
        'posts_per_page' => $count,
        'orderby' => 'post__in',
    ]);
}
?>

<?php if ($query->have_posts()) : ?>
    <section class="related-forts">
        <div class="container">
            <?php if (!empty($title)) : ?>
                <h2 class="related-forts__title">
                    <?php echo wp_kses_post($title); ?>
                </h2>
            <?php endif; ?>

            <div class="related-forts__grid">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="related-forts__item">
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
        </div>
    </section>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
