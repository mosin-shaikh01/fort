<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                fort_get_template_part('content', get_post_type());
            }
            fort_the_pagination();
        } else {
            fort_get_template_part('content', 'none');
        }
        ?>
    </div>
</main>

<?php
get_footer();
