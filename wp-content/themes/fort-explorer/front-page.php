<?php
/**
 * Template Name: Home Page
 * Template Post Type: page
 */
declare(strict_types=1);

get_header();
?>

<main id="main" class="site-main site-main--home" role="main">

    <!-- Feature Story Hero -->
    <?php get_template_part('template-parts/sections/home-hero'); ?>

    <!-- Magazine Two-Column Layout -->
    <div class="magazine-layout">
        <div class="container">
            <div class="magazine-layout__grid">

                <!-- Main Column -->
                <div class="magazine-layout__main">
                    <?php get_template_part('template-parts/sections/popular-forts'); ?>
                    <?php
                    get_template_part('template-parts/sections/latest-posts', '', [
                        'title' => __('Latest Stories', 'fort-explorer'),
                        'count' => 3,
                    ]);
                    ?>
                </div>

                <!-- Sidebar -->
                <aside class="magazine-layout__sidebar" role="complementary" aria-label="<?php esc_attr_e('Sidebar', 'fort-explorer'); ?>">
                    <?php get_template_part('template-parts/sections/sidebar'); ?>
                </aside>

            </div>
        </div>
    </div>

    <!-- CTA Banner -->
    <?php get_template_part('template-parts/sections/cta-banner'); ?>

</main>

<?php get_footer(); ?>
