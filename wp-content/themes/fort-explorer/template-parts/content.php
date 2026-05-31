<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('fort-post'); ?>>
    <header class="entry-header">
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h2>
        <div class="entry-meta">
            <time class="entry-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                <?php echo esc_html(get_the_date('F d, Y')); ?>
            </time>
            <span class="entry-author">
                <?php
                printf(
                    esc_html__('By %s', 'fort-explorer'),
                    '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' .
                    esc_html(get_the_author()) . '</a>'
                );
                ?>
            </span>
        </div>
    </header>

    <?php if (has_post_thumbnail()) : ?>
        <div class="entry-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('blog-featured', ['loading' => 'lazy']); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>

    <footer class="entry-footer">
        <a href="<?php the_permalink(); ?>" class="fort-read-more">
            <?php esc_html_e('Read More →', 'fort-explorer'); ?>
        </a>
    </footer>
</article>
