<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$fort_types = get_terms([
    'taxonomy'   => 'fort_type',
    'hide_empty' => false,
    'number'     => 6,
]);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <a class="skip-link screen-reader-text" href="#main">
        <?php esc_html_e('Skip to main content', 'fort-explorer'); ?>
    </a>

    <!-- Top Bar -->
    <div class="top-bar" role="complementary">
        <div class="container">
            <span class="top-bar__date">
                <?php echo esc_html(wp_date('l, F j, Y')); ?>
            </span>
            <span class="top-bar__tagline">
                <?php esc_html_e("India's Fort Discovery Platform", 'fort-explorer'); ?>
            </span>
        </div>
    </div>

    <!-- Masthead -->
    <header class="site-header" role="banner">
        <div class="container">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<a class="site-title" href="' . esc_url(home_url('/')) . '" rel="home">';
                    bloginfo('name');
                    echo '</a>';
                }
                ?>
            </div>

            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle menu', 'fort-explorer'); ?>">
                <span class="menu-toggle__bar"></span>
                <span class="menu-toggle__bar"></span>
                <span class="menu-toggle__bar"></span>
            </button>

            <nav id="primary-menu" class="site-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary navigation', 'fort-explorer'); ?>">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'fallback_cb'    => false,
                    'container'      => false,
                    'depth'          => 2,
                    'menu_id'        => 'primary-nav',
                ]);
                ?>
            </nav>
        </div>
    </header>

    <!-- Category Nav Bar -->
    <div class="category-nav" role="navigation" aria-label="<?php esc_attr_e('Category navigation', 'fort-explorer'); ?>">
        <div class="container">
            <ul class="category-nav__list">
                <li class="category-nav__item">
                    <a href="<?php echo esc_url(get_post_type_archive_link('fort') ?: home_url('/forts')); ?>" class="category-nav__link category-nav__link--all">
                        <?php esc_html_e('All Forts', 'fort-explorer'); ?>
                    </a>
                </li>
                <?php if (!is_wp_error($fort_types) && !empty($fort_types)) :
                    foreach ($fort_types as $type) : ?>
                        <li class="category-nav__item">
                            <a href="<?php echo esc_url(get_term_link($type)); ?>" class="category-nav__link">
                                <?php echo esc_html($type->name); ?>
                            </a>
                        </li>
                    <?php endforeach;
                endif; ?>
                <li class="category-nav__item">
                    <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/blog')); ?>" class="category-nav__link">
                        <?php esc_html_e('Stories', 'fort-explorer'); ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
