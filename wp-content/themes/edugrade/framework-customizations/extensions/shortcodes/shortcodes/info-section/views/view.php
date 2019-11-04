<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();	
	$page_custom_class = (isset( $atts['page_custom_class'] ) && $atts['page_custom_class'] !='') ? $atts['page_custom_class'] : '';
	$info_title = (isset( $atts['info_title'] ) && $atts['info_title'] !='') ? $atts['info_title'] : '';
	$content = (isset( $atts['content'] ) && $atts['content'] !='') ? $atts['content'] : '';
	$button_text = (isset( $atts['button_text'] ) && $atts['button_text'] !='') ? $atts['button_text'] : '';
	$button_url = (isset( $atts['button_url'] ) && $atts['button_url'] !='') ? $atts['button_url'] : '';
	$video_image = (isset( $atts['video_image'] ) && $atts['video_image'] !='') ? $atts['video_image'] : '';
	$video_title = (isset( $atts['video_title'] ) && $atts['video_title'] !='') ? $atts['video_title'] : '';
	$video_caption = (isset( $atts['video_caption'] ) && $atts['video_caption'] !='') ? $atts['video_caption'] : '';
	$video_url = (isset( $atts['video_url'] ) && $atts['video_url'] !='') ? $atts['video_url'] : '';
	
	global $gramotech_allowed_html;
	
	?>
	<div class="explore-students">
		<div class="row">
			<div class="col-md-6">
				<h1> <?php echo esc_attr($info_title); ?> </h1>
				<p> <?php echo esc_attr($content); ?></p>
				<a class="conbtn" href="<?php echo esc_url($button_url); ?>"><?php echo esc_attr($button_text); ?></a>
			</div>
			<div class="col-md-6">
				<div class="ex-video gallery">
					<img src="<?php echo esc_url($video_image['url']); ?>" alt="<?php echo esc_attr($info_title); ?>">
					<div class="video-icon">
						<a href="<?php echo esc_url($video_url); ?>" data-rel="prettyPhoto[]"><i class="fas fa-play"></i></a>
						<strong><?php echo esc_attr($video_title); ?></strong>
						<em><?php echo esc_attr($video_caption); ?></em>
					</div>	
				</div>
			</div>
		</div>
	</div>