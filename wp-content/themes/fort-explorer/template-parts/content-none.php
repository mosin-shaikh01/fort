<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="no-content">
    <h2><?php esc_html_e('Nothing Found', 'fort-explorer'); ?></h2>
    <p>
        <?php
        if (is_search()) {
            esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fort-explorer');
        } else {
            esc_html_e('It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'fort-explorer');
        }
        ?>
    </p>
    <?php get_search_form(); ?>
</div>
