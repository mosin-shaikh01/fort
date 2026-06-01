<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$title = $args['title'] ?? esc_html__('Latest from the Blog', 'fort-explorer');
$count = intval($args['count'] ?? 3);

$query = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => $count,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);
?>

<section class="latest-posts">
    <div class="container">
        <div class="latest-posts__header">
            <?php if (!empty($title)) : ?>
                <h2 class="latest-posts__title"><?php echo wp_kses_post($title); ?></h2>
            <?php endif; ?>
        </div>

        <?php if ($query->have_posts()) : ?>
            <div class="latest-posts__grid">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php
                    $post_id     = get_the_ID();
                    $categories  = get_the_category($post_id);
                    $category    = !empty($categories) ? $categories[0] : null;
                    $excerpt     = wp_trim_words(get_the_excerpt(), 20, '...');
                    $author_name = get_the_author();
                    ?>

                    <article class="post-card">
                        <div class="post-card__image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php
                                echo wp_get_attachment_image(
                                    get_post_thumbnail_id(),
                                    'blog-featured',
                                    false,
                                    ['class' => 'post-card__img', 'loading' => 'lazy', 'alt' => esc_attr(get_the_title())]
                                );
                                ?>
                            <?php else : ?>
                                <?php fort_image_placeholder('post-card__placeholder'); ?>
                            <?php endif; ?>
                        </div>

                        <div class="post-card__content">
                            <?php if ($category) : ?>
                                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="post-card__category">
                                    <?php echo esc_html($category->name); ?>
                                </a>
                            <?php endif; ?>

                            <h3 class="post-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <div class="post-card__meta">
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date()); ?>
                                </time>
                                <span><?php echo esc_html($author_name); ?></span>
                            </div>

                            <p class="post-card__excerpt"><?php echo esc_html($excerpt); ?></p>

                            <a href="<?php the_permalink(); ?>" class="post-card__link" aria-label="<?php echo esc_attr(sprintf(__('Read more about %s', 'fort-explorer'), get_the_title())); ?>">
                                <?php esc_html_e('Read More', 'fort-explorer'); ?>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="latest-posts__footer">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/blog')); ?>" class="button button--tertiary button--large">
                    <?php esc_html_e('View All Articles', 'fort-explorer'); ?>
                </a>
            </div>
        <?php else : ?>
            <p class="latest-posts__empty">
                <?php esc_html_e('No articles published yet.', 'fort-explorer'); ?>
            </p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </div>
</section>
