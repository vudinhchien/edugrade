<?php
/**
 * Template for displaying price of single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/price.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$user   = LP_Global::user();
$course = LP_Global::course();

if ( ! $price = $course->get_price_html() ) {
	return;
}
?>
<li>
	<strong><?php echo esc_attr__('Price:','edugrade'); ?></strong>
	<?php 
	if ( $course->has_sale_price() ) { ?>
		<h4><?php echo esc_attr($course->get_origin_price_html()); ?></h4>
		<?php 
	} ?> 
	<h4 class="price"><?php echo esc_attr($price); ?></h4>
</li>


