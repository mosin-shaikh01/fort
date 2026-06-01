<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="cta-banner" aria-labelledby="cta-banner-heading">
    <div class="container">
        <div class="cta-banner__inner">
            <h2 class="cta-banner__title" id="cta-banner-heading">
                <?php esc_html_e('Start Your Fort Explorer Journey', 'fort-explorer'); ?>
            </h2>

            <p class="cta-banner__subtitle">
                <?php esc_html_e('Discover centuries of Indian history, plan your visits, and dive deep into the stories behind every stone.', 'fort-explorer'); ?>
            </p>

            <div class="cta-banner__actions">
                <a href="<?php echo esc_url(get_post_type_archive_link('fort')); ?>" class="button button--white button--large">
                    <?php esc_html_e('Explore Forts', 'fort-explorer'); ?>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/blog')); ?>" class="button button--outline-white button--large">
                    <?php esc_html_e('Read the Blog', 'fort-explorer'); ?>
                </a>
            </div>
        </div>
    </div>
</section>
