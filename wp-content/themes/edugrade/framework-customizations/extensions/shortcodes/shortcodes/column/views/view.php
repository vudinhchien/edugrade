<?php if (!defined('FW')) die('Forbidden');

$class = fw_ext_builder_get_item_width('page-builder', $atts['width'] . '/frontend_class');
$custom_class = isset( $atts['extra_custom_class'] ) ? $atts['extra_custom_class'] : '';
?>
<div class="<?php echo esc_attr($class); ?>   <?php echo esc_attr($custom_class); ?>">
	<?php echo do_shortcode($content); ?>
</div>
