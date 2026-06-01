<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$image           = $args['image'] ?? '';
$heading         = $args['heading'] ?? '';
$subtitle        = $args['subtitle'] ?? '';
$button_text     = $args['button_text'] ?? esc_html__('Explore', 'fort-explorer');
$button_url      = $args['button_url'] ?? '#';
$button2_text    = $args['button2_text'] ?? '';
$button2_url     = $args['button2_url'] ?? '#';
$overlay_opacity = $args['overlay_opacity'] ?? '0.4';
$extra_class     = $args['extra_class'] ?? '';

if (is_numeric($image)) {
    $image_url = wp_get_attachment_image_url($image, 'fort-hero');
} else {
    $image_url = $image;
}

$section_classes = trim('hero ' . esc_attr($extra_class));
$bg_style = $image_url ? 'background-image: url(' . esc_url($image_url) . ');' : '';
?>

<section class="<?php echo esc_attr($section_classes); ?>" style="<?php echo $bg_style; ?>">
    <div class="hero__overlay" style="opacity: <?php echo esc_attr($overlay_opacity); ?>;"></div>

    <div class="hero__content">
        <?php if (!empty($heading)) : ?>
            <h1 class="hero__heading">
                <?php echo wp_kses_post($heading); ?>
            </h1>
        <?php endif; ?>

        <?php if (!empty($subtitle)) : ?>
            <p class="hero__subtitle">
                <?php echo wp_kses_post($subtitle); ?>
            </p>
        <?php endif; ?>

        <?php if (!empty($button_text)) : ?>
            <div class="hero__actions">
                <a href="<?php echo esc_url($button_url); ?>" class="button button--primary button--large">
                    <?php echo esc_html($button_text); ?>
                </a>

                <?php if (!empty($button2_text)) : ?>
                    <a href="<?php echo esc_url($button2_url); ?>" class="button button--outline-white button--large">
                        <?php echo esc_html($button2_text); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
