<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();
	
	if($atts['facts_style']['gadget'] == 'style-1'){
		$style_1 = $atts['facts_style']['style-1'];
		?>
		<ul class="achievements">
			<?php
			foreach ( $style_1['facts'] as $fact ){ ?>
				<li> 
					<i class="<?php echo esc_attr($fact['icon_class']); ?>"></i> 
					<strong><?php echo esc_attr($fact['fact_count']); ?></strong> 
					<span class="title"><?php echo esc_attr($fact['fact_title']); ?></span> 
				</li>
				<?php
			} ?>
		</ul>
		<?php
	}else{
		$style_2 = $atts['facts_style']['style-2'];
		
		$fact_bg_image = (isset( $style_2['fact_bg_image']['url'] ) && $style_2['fact_bg_image']['url'] !='') ? $style_2['fact_bg_image']['url'] : '';
	
		$custom_css = '.about-facts{background: url('.esc_url($fact_bg_image).');}';
		
		wp_enqueue_style('gramotech-inline-style',get_template_directory_uri() . '/assets/css/internal-style.css');
		wp_add_inline_style( 'gramotech-inline-style', $custom_css );
		?>
		<div class="about-facts">
			<div class="container">
				<div class="row">
					<?php
					foreach ( $style_2['facts'] as $fact ){ ?>
						<div class="col-md-3 col-sm-3"> 
							<strong>
								<?php echo esc_attr($fact['fact_count']); ?> 
								<span><?php echo esc_attr($fact['fact_title']); ?></span>
							</strong> 
						</div>
						<?php
					} ?>
				</div>
			</div>
		</div>
		<?php
	} ?>