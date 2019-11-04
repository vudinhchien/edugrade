<?php
/**
 * Template for displaying categories of single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/categories.php.
 *
 * @author  ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();
$course_counter = 0
?>
	<li class="course_categories"> 
		<strong><?php echo esc_attr__('Category:','edugrade'); ?> </strong>
		<?php
		foreach (get_the_terms(get_the_ID(), 'course_category') as $cat) {
		   echo '<a href="'.esc_url(get_term_link($cat->term_id)).'">'.esc_attr($cat->name).'</a> ';
		   $course_counter++;
		   if($course_counter == 2 ){break;}
		} ?>
	</li>
