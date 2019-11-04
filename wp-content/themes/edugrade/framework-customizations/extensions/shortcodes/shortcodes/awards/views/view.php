<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();
	$element_title = empty($atts['element_title']) ? '' : $atts['element_title'];
	?>
	
	<div class="national-awards">
		<h4><?php echo esc_attr($element_title); ?></h4>
		<div id="award-slider" class="owl-carousel owl-theme">
			<?php
			foreach ( fw_akg( 'awards', $atts, array() ) as $award ){ ?>
				<div class="item">
					<div class="award-circle"> 
						<i class="<?php echo esc_attr($award['icon_class']); ?>"></i> 
						<strong><?php echo esc_attr($award['award_value']); ?></strong> 
					</div>
				</div>
				<?php
			} ?>
	   </div>
	</div>