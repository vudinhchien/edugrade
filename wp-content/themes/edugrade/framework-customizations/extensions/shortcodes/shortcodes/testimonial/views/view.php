<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();	
	$page_custom_class = (isset( $atts['page_custom_class'] ) && $atts['page_custom_class'] !='') ? $atts['page_custom_class'] : '';
	$testimonial_designation = (isset( $atts['testimonial_designation'] ) && $atts['testimonial_designation'] !='') ? $atts['testimonial_designation'] : '';
	$testimonial_title = (isset( $atts['testimonial_title'] ) && $atts['testimonial_title'] !='') ? $atts['testimonial_title'] : '';
	$testimonaial_content = (isset( $atts['content'] ) && $atts['content'] !='') ? $atts['content'] : '';
	$testimonial_caption = (isset( $atts['testimonial_caption'] ) && $atts['testimonial_caption'] !='') ? $atts['testimonial_caption'] : '';
	$testimonial_image = (isset( $atts['testimonial_image'] ) && $atts['testimonial_image'] !='') ? $atts['testimonial_image'] : '';
	
	global $gramotech_allowed_html;
	
	?>
	
	<div class="about-principle">
        <div class="row">
			<div class="col-md-5 col-sm-4"><img src="<?php echo esc_url($testimonial_image['url']); ?>" alt="<?php echo esc_attr($testimonial_title); ?>"></div>
			<div class="col-md-7 col-sm-8">
				<div class="about-principle-text">
					<span class="note"><?php echo esc_attr($testimonial_caption); ?></span>
					<p><?php echo esc_attr($testimonaial_content); ?></p>
					<h6><?php echo esc_attr($testimonial_title); ?></h6>
					<strong class="rank"><?php echo esc_attr($testimonial_designation); ?></strong> 
				</div>
			</div>
        </div>
    </div>