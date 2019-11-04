<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();	
	$page_custom_class = (isset( $atts['page_custom_class'] ) && $atts['page_custom_class'] !='') ? $atts['page_custom_class'] : '';
	$banner_style = isset( $atts['banner_style'] ) ? $atts['banner_style'] : '';
	global $gramotech_allowed_html;
	
	if($atts['banner_style']['gadget'] == 'banner_style1'){
		$banner_style1 = $atts['banner_style']['banner_style1'];
		$bg_image = (isset( $banner_style1['bg_image']['url'] ) && $banner_style1['bg_image']['url'] !='') ? $banner_style1['bg_image']['url'] : '';
		?>
		<div class="row">
			<div class="banner-style-2">
				<div class="banner-video-caption">
					<div class="container">
						<div class="row">
							 <div class="col-md-6">
								<div class="video-wrap">
								   <iframe src="https://player.vimeo.com/video/<?php echo esc_attr($banner_style1['video_id']); ?>?color=e0dccb"></iframe>
								</div>
							 </div>
							 <div class="col-md-6">
								<div class="ctext">
								   <strong><?php echo esc_attr($banner_style1['banner_title']); ?></strong>
								   <h1><?php echo esc_attr($banner_style1['banner_title2']); ?></h1>
								   <p><?php echo esc_attr($banner_style1['caption']); ?></p>
								</div>
							 </div>
						</div>
					</div>
				</div>
				<span class="slide-img"> <img src="<?php echo esc_url($bg_image); ?>" alt="<?php echo esc_attr__('img','edugrade'); ?>"> </span> 
			</div>
		</div>	
		<?php
	}else{
		$banner_style2 = $atts['banner_style']['banner_style2'];
		$bg_image = (isset( $banner_style2['bg_image']['url'] ) && $banner_style2['bg_image']['url'] !='') ? $banner_style2['bg_image']['url'] : '';
		
		$title_arr = explode(' ',trim($banner_style2['banner_title']));
		$title_count = str_word_count($banner_style2['banner_title']);
		$remaining_title = '';
		?>
		
		<?php
	}
	?>