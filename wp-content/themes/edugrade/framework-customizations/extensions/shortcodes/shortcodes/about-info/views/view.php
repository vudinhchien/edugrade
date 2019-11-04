<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();	
	$page_custom_class = (isset( $atts['page_custom_class'] ) && $atts['page_custom_class'] !='') ? $atts['page_custom_class'] : '';
	$about_style = (isset( $atts['about_style'] ) && $atts['about_style'] !='') ? $atts['about_style'] : '';
	global $gramotech_allowed_html;
	
	if($atts['about_style']['gadget'] == 'about-style1'){
		$about_style1 = $atts['about_style']['about-style1'];
		?>
		<div class="welcome-box">
			<div class="welcome-title">
				<strong><?php echo esc_attr($about_style1['caption']); ?></strong>
				<h1><?php echo esc_attr($about_style1['about_title']); ?></h1>
			</div>
			<p> <?php echo esc_attr($about_style1['content']); ?> </p>
		   <a class="btn-style-1" href="<?php echo esc_url($about_style1['more-about-url']); ?>"><?php echo esc_attr($about_style1['more-about']); ?></a> 
		</div>
		<?php
	}else if($atts['about_style']['gadget'] == 'about-style2'){
		$about_style2 = $atts['about_style']['about-style2'];
		?>
		<div class="who-we-are">
			<h2 class="h3-title"><?php echo esc_attr($about_style2['about_title']); ?></h2>
            <p><?php echo esc_attr($about_style2['content']); ?></p>
            <a href="<?php echo esc_url($about_style2['more-about-url']); ?>">
				<i class="fas fa-long-arrow-alt-right"></i> <?php echo esc_attr($about_style2['more-about']); ?>
			</a> 
		</div>
		<?php
	}else if($atts['about_style']['gadget'] == 'about-style3'){
		$about_style3 = $atts['about_style']['about-style3'];
		?>
		<div class="about-wrap">
			<div class="row">
				<div class="col-md-7">
					<div class="abouttxt"> <span class="note"><?php echo esc_attr($about_style3['about_caption']); ?></span>
						<h1><?php echo esc_attr($about_style3['about_title']); ?></h1>
						<?php echo wp_kses($about_style3['content'],$gramotech_allowed_html); ?>
					</div>
				</div>
				<div class="col-md-5">
					<div class="about-video">
						<div class="over-info gallery"> 
							<a href="<?php echo esc_url($about_style3['video_url']); ?>" data-rel="prettyPhoto[]">
								<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/videoicon.png" alt="<?php echo esc_attr($about_style3['about_title']); ?>">
							</a> 
							<strong><?php echo esc_attr($about_style3['video_title']); ?></strong> 
						</div>
						<img src="<?php echo esc_url($about_style3['about_image']['url']); ?>" alt="<?php echo esc_attr($about_style3['about_title']); ?>"> 
					</div>
				</div>
			</div>
		</div>
		<?php
	} 
	?>