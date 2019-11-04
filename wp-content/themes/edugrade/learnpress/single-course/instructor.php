<?php
/**
 * Template for displaying instructor of single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/instructor.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$course = LP_Global::course();
global $gramotech_allowed_html;
?>

	<li class="instructor-styling"> 
		<?php echo wp_kses($course->get_instructor()->get_profile_picture(),$gramotech_allowed_html); ?>
		<strong><?php echo esc_attr__('Instructor:','edugrade'); ?></strong> 
		<?php echo wp_kses($course->get_instructor_html(),$gramotech_allowed_html); ?>
	</li>