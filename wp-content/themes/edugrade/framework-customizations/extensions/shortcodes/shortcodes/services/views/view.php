<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();
	global $post_builder_options;
	$page_custom_class = isset( $atts['page_custom_class'] ) ? $atts['page_custom_class'] : '';
	$services_style = isset( $atts['services_style'] ) ? $atts['services_style'] : '';
	
	if($atts['services_style']['gadget'] == 'service-style1'){
		$services_style1 = $atts['services_style']['service-style1']; 
		?>
		<div class="edugrade-courses">
			<div class="row"> 
				<?php
				foreach ( $services_style1['services'] as $service ){

					$service_image_url =  $service['service_image']['url'];
					?>
					<div class="col-md-4 col-sm-4">
						<div class="icon-box">
							<div class="icon-img">
								<img src="<?php echo esc_attr($service_image_url); ?>" alt="<?php echo esc_attr($service['service_title']); ?>">
							</div>
							<h4><?php echo esc_attr($service['service_title']); ?></h4>
							<p><?php echo esc_attr($service['content']); ?></p>
						</div>
					</div>
					<?php
				} ?>
			</div>
		</div>
		<?php
	}else if($atts['services_style']['gadget'] == 'service-style2'){
		$services_style2 = $atts['services_style']['service-style2']; 
		$custom_css = '';
		$custom_css.= '.home1-departments{background: url('.esc_url($services_style2['element_bg_image']['url']).') no-repeat center center;}';
		?>
		<div class="row">
			<div class="home1-departments">
				<div class="container">
					<h2 class="stitle"><?php echo esc_attr($services_style2['element_title']); ?></h2>
					<div class="row">
						<?php
						$service_counter = 0;
						foreach ( $services_style2['services'] as $service ){
							$service_counter++;
							$custom_css.= '.dprt-box-'.esc_attr($service_counter).'{background: '.esc_attr($service['bg_color']).';}';
							?>
							<div class="col-md-3 col-sm-3">
								<div class="dprt-box c1 dprt-box-<?php echo esc_attr($service_counter); ?>">
									<i class="<?php echo esc_attr($service['icon_class']); ?>"></i>
									<h5><?php echo esc_attr($service['service_title']); ?> </h5>
								</div>
							</div>
							<?php 
						} ?>
					</div>
				</div>
			</div>
		</div>	
		<?php
		wp_enqueue_style('gramotech-internal-style',get_template_directory_uri() . '/assets/css/internal-style.css');
		wp_add_inline_style( 'gramotech-internal-style', $custom_css);
		
	}else if($atts['services_style']['gadget'] == 'service-style3'){
		$services_style3 = $atts['services_style']['service-style3']; 
		?>
		<div class="home-contact-panel">
			<div class="row">
				<?php
				$service_counter = 0;
				$custom_css = '';
				foreach ( $services_style3['services'] as $service ){
					$service_counter++;
					$custom_css.= '	.ci-box-'.esc_attr($service_counter).' .hcp-icon,
									.ci-box-'.esc_attr($service_counter).':hover strong{background: '.esc_attr($service['bg_color']).';}
									.ci-box-'.esc_attr($service_counter).':hover .hcp-icon{color: '.esc_attr($service['bg_color']).';}';
					
					if(isset($service['external_link']) && $service['external_link'] <> ''){
						$service['external_link'] = $service['external_link'];
					}else{
						$service['external_link'] = '';
					}
					?>
					<div class="col-md-3 col-sm-3">
						<div class="ci-box ci-box-<?php echo esc_attr($service_counter); ?>">
							<div class="hcp-icon"> <i class="fas <?php echo esc_attr($service['icon_class']); ?>"></i> </div>
							<strong><a href="<?php echo esc_url($service['external_link']); ?>"><?php echo esc_attr($service['service_title']); ?></a></strong> 
						</div>
					</div>
					<?php
				}
				wp_enqueue_style('gramotech-internal-style',get_template_directory_uri() . '/assets/css/internal-style.css');
				wp_add_inline_style( 'gramotech-internal-style', $custom_css);
				?>
			</div>
		</div>
		<?php
	}else if($atts['services_style']['gadget'] == 'service-style4'){
		$services_style4 = $atts['services_style']['service-style4']; ?>
		<div class="home2-popular-courses">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4">
						<div class="pc-text">
						   <h3><?php echo esc_attr($services_style4['element_title']); ?></h3>
						   <p><?php echo esc_attr($services_style4['content']); ?></p>
						   <a href="<?php echo esc_attr($services_style4['external_btn_url']); ?>"><i class="fas fa-arrow-right"></i> <?php echo esc_attr($services_style4['external_btn_txt']); ?></a> 
						</div>
					</div>
					<div class="col-md-8">
						<ul class="deprts">
							<?php
							$service_counter = 0;
							$custom_css = '';
							foreach ( $services_style4['services'] as $service ){
								$service_counter++;
								$custom_css.= '.deprts .icon-box-2-'.esc_attr($service_counter).'{background: '.esc_attr($service['bg_color']).';}';
								?>
								<li>
									<div class="icon-box-2 icon-box-2-<?php echo esc_attr($service_counter); ?>"> 
										<i class="<?php echo esc_attr($service['icon_class']); ?>"></i> 
										<strong><?php echo esc_attr($service['service_title']); ?></strong> 
									</div>
								</li>
								<?php 
							}
							
							wp_enqueue_style('gramotech-internal-style',get_template_directory_uri() . '/assets/css/internal-style.css');
							wp_add_inline_style( 'gramotech-internal-style', $custom_css);
							
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php
	}else if($atts['services_style']['gadget'] == 'service-style5'){
		$services_style5 = $atts['services_style']['service-style5']; ?>
		
		<div class="edugrade-courses courses-new">
			<div class="row"> 
				<?php
				$service_counter = 0;
				$custom_css = '';
				foreach ( $services_style5['services'] as $service ){
					$service_counter++;
					$custom_css.= '.courses-icon-box-'.esc_attr($service_counter).'{background: '.esc_attr($service['bg_color']).';}';
					$custom_css.= '.icon-box.courses-box-'.esc_attr($service_counter).':after{background: '.esc_attr($service['bg_color']).';}';
					$custom_css.= '.icon-img.courses-icon-box-'.esc_attr($service_counter).'{border: 2px solid '.esc_attr($service['bg_color']).';}';
					$custom_css.= '.icon-box.courses-box-'.esc_attr($service_counter).':hover .icon-img.courses-icon-box-'.esc_attr($service_counter).'{background: #fff; color:'.esc_attr($service['bg_color']).';}';
					?>
					<div class="<?php echo esc_attr($services_style5['services_cols']); ?> col-sm-6">
						<div class="icon-box courses-box-<?php echo esc_attr($service_counter); ?>">
							<div class="icon-img courses-icon-box-<?php echo esc_attr($service_counter); ?>">
								<i class="<?php echo esc_attr($service['icon_class']); ?>"></i>
							</div>
							<h4><?php echo esc_attr($service['service_title']); ?></h4>
							<p><?php echo esc_attr($service['content']); ?></p>
						</div>
					</div>
					<?php 
				}
				
				wp_enqueue_style('gramotech-internal-style',get_template_directory_uri() . '/assets/css/internal-style.css');
				wp_add_inline_style( 'gramotech-internal-style', $custom_css); ?>
			</div>
		</div>
		<?php
	} ?>