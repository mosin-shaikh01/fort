<?php
declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$text = $args['text'] ?? '';
$url = $args['url'] ?? '#';
$type = $args['type'] ?? 'primary';
$size = $args['size'] ?? 'medium';
$disabled = $args['disabled'] ?? false;
$target = $args['target'] ?? '';
$class = $args['class'] ?? '';

if (empty($text)) {
    return;
}

$button_classes = [
    'button',
    'button--' . esc_attr($type),
    'button--' . esc_attr($size),
];

if ($disabled) {
    $button_classes[] = 'button--disabled';
}

if ($class) {
    $button_classes[] = esc_attr($class);
}

$target_attr = $target ? 'target="' . esc_attr($target) . '" rel="noopener"' : '';
$disabled_attr = $disabled ? 'disabled aria-disabled="true"' : '';
?>

<a href="<?php echo esc_url($url); ?>" class="<?php echo implode(' ', $button_classes); ?>" <?php echo $target_attr; ?> <?php echo $disabled_attr; ?>>
    <?php echo esc_html($text); ?>
</a>
