<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$post_counts = wp_count_posts('fort');
$fort_count  = (int) ($post_counts->publish ?? 0);

$blog_counts = wp_count_posts('post');
$blog_count  = (int) ($blog_counts->publish ?? 0);

$region_count = wp_count_terms(['taxonomy' => 'region', 'hide_empty' => false]);
$region_count = is_wp_error($region_count) ? 0 : (int) $region_count;

$period_count = wp_count_terms(['taxonomy' => 'period', 'hide_empty' => false]);
$period_count = is_wp_error($period_count) ? 0 : (int) $period_count;

$stats = [
    [
        'number' => $fort_count,
        'suffix' => $fort_count > 0 ? '+' : '',
        'label'  => esc_html__('Historic Forts', 'fort-explorer'),
    ],
    [
        'number' => $region_count,
        'suffix' => '',
        'label'  => esc_html__('Regions', 'fort-explorer'),
    ],
    [
        'number' => $period_count,
        'suffix' => '',
        'label'  => esc_html__('Historical Periods', 'fort-explorer'),
    ],
    [
        'number' => $blog_count,
        'suffix' => $blog_count > 0 ? '+' : '',
        'label'  => esc_html__('Blog Articles', 'fort-explorer'),
    ],
];
?>

<section class="stats-bar" aria-label="<?php esc_attr_e('Site statistics', 'fort-explorer'); ?>">
    <div class="container">
        <div class="stats-bar__grid">
            <?php foreach ($stats as $stat) : ?>
                <div class="stats-bar__item">
                    <span class="stats-bar__number">
                        <?php echo esc_html(number_format($stat['number']) . $stat['suffix']); ?>
                    </span>
                    <span class="stats-bar__label"><?php echo esc_html($stat['label']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
