<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();	
	$page_custom_class = (isset( $atts['page_custom_class'] ) && $atts['page_custom_class'] !='') ? $atts['page_custom_class'] : '';
	$mission_vision_style = (isset( $atts['mission_vision_style'] ) && $atts['mission_vision_style'] !='') ? $atts['mission_vision_style'] : '';
	global $gramotech_allowed_html;
	
	if($atts['mission_vision_style']['gadget'] == 'style1'){
		$style1 = $atts['mission_vision_style']['style1'];
		?>
		
		<div class="history-vision">
			<div class="title3">
				<h2><?php echo esc_attr($style1['element_title']); ?></h2>
			</div>
			<div class="row">
			   <div class="history-tabs">
					<div class="col-md-4">
						<ul class="tab-nav" role="tablist">
							<?php 
							$tab_counter  = 0;
							foreach ( $style1['mission_vision'] as $mission_vision ){
								$tab_counter++;
								if($tab_counter == 1){
									$active_class = 'active';
								}else{
									$active_class = '';
								}
								?>
								<li role="presentation" class="<?php echo esc_attr($active_class); ?>">
									<a href="#tab<?php echo esc_attr($tab_counter); ?>" aria-controls="tab<?php echo esc_attr($tab_counter); ?>" role="tab" data-toggle="tab"><?php echo esc_attr($mission_vision['mission_vision_title']); ?></a>
								</li>
								<?php 
							} ?>
						</ul>
						<div class="help-banner">
							<h4><?php echo esc_attr($style1['help_support_title']); ?></h4>
							<strong> <i class="fas fa-phone-square"></i> <?php echo esc_attr($style1['help_support_no']); ?></strong> 
						</div>
					</div>
					<div class="col-md-8">
						<div class="tab-content">
							<?php 
							$tab_counter2  = 0;
							foreach ( $style1['mission_vision'] as $mission_vision ){
								$tab_counter2++;
								if($tab_counter2 == 1){
									$active_class2 = 'active';
								}else{
									$active_class2 = '';
								}
								?>
								<div role="tabpanel" class="tab-pane <?php echo esc_attr($active_class2); ?>" id="tab<?php echo esc_attr($tab_counter2); ?>">
								   <h4><?php echo esc_attr($mission_vision['mission_vision_title']); ?></h4>
								   <?php echo wp_kses($mission_vision['content'],$gramotech_allowed_html); ?>
								</div>
								<?php 
							} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
	}else{
		$style2 = $atts['mission_vision_style']['style2'];
		?>
		
		<div class="about-uni">
			<div class="row">
				<?php 
				$tab_counter  = 0;
				foreach ( $style2['mission_vision'] as $mission_vision ){
					
					if($tab_counter == 1){
						$middle_class = 'middle';
					}else{
						$middle_class = '';
					}
					$icon_image_url =  $mission_vision['icon_image']['url'];
					?>
					<div class="col-md-4 col-sm-4 nop">
						<div class="about-box <?php echo esc_attr($middle_class); ?>">
							<img src="<?php echo esc_attr($icon_image_url); ?>" alt="<?php echo esc_attr($mission_vision['mission_vision_title']); ?>">
							<h3><?php echo esc_attr($mission_vision['mission_vision_title']); ?></h3>
							<?php echo wp_kses($mission_vision['content'],$gramotech_allowed_html); ?>
						</div>
					</div>
					<?php
					$tab_counter++;
				} ?>
			</div>
		</div>
		<?php
	} ?>	