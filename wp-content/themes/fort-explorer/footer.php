<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}
?>

    <footer class="site-footer" role="contentinfo">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section footer-about">
                    <h3><?php bloginfo('name'); ?></h3>
                    <p><?php bloginfo('description'); ?></p>
                </div>

                <div class="footer-section footer-menu">
                    <h3><?php esc_html_e('Quick Links', 'fort-explorer'); ?></h3>
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer',
                        'fallback_cb' => false,
                        'container' => false,
                        'depth' => 1,
                    ]);
                    ?>
                </div>
            </div>

            <div class="footer-bottom">
                <p class="footer-copyright">
                    <?php
                    printf(
                        esc_html__('&copy; %d %s. All rights reserved.', 'fort-explorer'),
                        intval(date('Y')),
                        get_bloginfo('name')
                    );
                    ?>
                </p>
                <p class="footer-credit">
                    <?php
                    printf(
                        esc_html__('Powered by %s', 'fort-explorer'),
                        '<a href="' . esc_url('https://wordpress.org') . '">WordPress</a>'
                    );
                    ?>
                </p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
