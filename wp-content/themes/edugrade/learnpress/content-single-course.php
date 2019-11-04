<?php
/**
 * Template for displaying course content within the loop.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/content-single-course.php
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

if ( post_password_required() ) {
	echo get_the_password_form();

	return;
}

	$gramotech_sidebar = '';
	$content_col = 'col-md-12';
	global $post;
	if (function_exists('fw_ext_sidebars_get_current_position')) {
		$current_position = fw_ext_sidebars_get_current_position();
		if ($current_position != 'full' && ( $current_position == 'left' || $current_position == 'right' )) {
			$gramotech_sidebar = $current_position;
			$content_col = 'col-md-9';
		}else if($current_position == 'full'){
			$gramotech_sidebar = $current_position;
			$content_col = 'col-md-12';
		}
	}

	if (isset($gramotech_sidebar) && $gramotech_sidebar == 'right') {
		$sidebar_position = 'pull-right';
		$content_position = 'pull-left';
	} else if (isset($gramotech_sidebar) && $gramotech_sidebar == 'left') {
		$sidebar_position = 'pull-left';
		$content_position = 'pull-right';
	}else if (isset($gramotech_sidebar) && $gramotech_sidebar == 'full') {
		$sidebar_position = '';
		$content_position = '';
	}else{
		$sidebar_position = '';
		$content_position = '';
	}

/**
 * @deprecated
 */
do_action( 'learn_press_before_main_content' );
do_action( 'learn_press_before_single_course' );
do_action( 'learn_press_before_single_course_summary' );

/**
 * @since 3.0.0
 */
do_action( 'learn-press/before-main-content' );

do_action( 'learn-press/before-single-course' );



?>
<div id="learn-press-course" class="course-summary">
	<div class="course-details">
	   
		<div class="row">
			<div class="<?php echo esc_attr($content_col); echo ' '; echo esc_attr($content_position); ?>">
				<div class="course-detail">
					<!--Large Image-->
					<div class="course-large-img"> 
						<?php learn_press_get_template( 'single-course/thumbnail.php' ); ?>
					</div>
					<!--Large Image--> 
					<!--Meta Tag Start-->
					<ul class="course-details-meta">
						<?php do_action( 'gramotech_single_course_meta' );
						if(function_exists('learn_press_get_course_rate')){
							$course_rate = learn_press_get_course_rate( get_the_id(), false );
							$percent = ( ! $course_rate['rated'] ) ? 0 : min( 100, ( round( $course_rate['rated'] * 2 ) / 2 ) * 20 );
							?>
							<li class="edugrade-review-stars">
								<strong><?php echo esc_attr__('Review:','edugrade'); ?></strong>
								<div class="review-stars-rated fc-rating">
									<div class="review-stars empty"></div>
									<div class="review-stars filled" style="width:<?php echo esc_attr($percent); ?>%;"></div>
								</div>
							</li><?php
						}
						do_action('gramotech_single_course_payment'); 
						?>
					</ul>
					<!--Meta Tag End-->
					<div class="course-text">
						<?php the_title( '<h4>', '</h4>' ); 
						/**
						 * @since 3.0.0
						 *
						 * @see learn_press_single_course_summary()
						 */
						do_action( 'learn-press/single-course-summary' );
						?>
					  
					</div>
				</div>
				
				<?php 
				if(function_exists('gramotech_related_courses')){
					gramotech_related_courses(get_the_id());
				} ?>
			 </div>
			 <?php 
			if(function_exists('fw_ext_sidebars_get_current_position') && !empty($gramotech_sidebar)) { ?>
				<div class="col-md-3 <?php echo esc_attr($sidebar_position); ?>">
					<div class="sidebar">
						<?php echo fw_ext_sidebars_show('blue'); ?>
					</div>
				</div>
				<?php 
			} ?>
			 <!-- Sidebar End --> 
		</div>
	</div>
</div>
<?php

/**
 * @since 3.0.0
 */
do_action( 'learn-press/after-main-content' );

do_action( 'learn-press/after-single-course' );

/**
 * @deprecated
 */
do_action( 'learn_press_after_single_course_summary' );
do_action( 'learn_press_after_single_course' );
do_action( 'learn_press_after_main_content' );