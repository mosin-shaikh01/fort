<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}
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

    <header class="site-header" role="banner">
        <div class="container">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<h1 class="site-title">';
                    bloginfo('name');
                    echo '</h1>';
                }
                ?>
            </div>

            <nav class="site-navigation" role="navigation">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'fallback_cb' => false,
                    'container' => false,
                    'depth' => 2,
                ]);
                ?>
            </nav>
        </div>
    </header>
