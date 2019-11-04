<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
	?>
	<div class="row">
		<div class="home1-slider">
			<div id="home1-slider" class="owl-carousel owl-theme">
				<?php 
				foreach ( $atts['carousel_slider'] as $carousel_slider ){ ?>
					<?php
					$slide_image_url =  $carousel_slider['slide_image']['url'];
					?>
					<div class="item">
						<div class="slide-caption"> 
							<strong>
								<?php echo esc_attr($carousel_slider['slide_heading']); ?><br>
								<?php echo esc_attr($carousel_slider['slide_caption']); ?>
							</strong> 
							<a href="<?php echo esc_attr($carousel_slider['read_more_url']); ?>"><?php echo esc_attr($carousel_slider['read_more_txt']); ?></a> 
						</div>
						<span class="slide-img"><img src="<?php echo esc_url($slide_image_url); ?>" alt="<?php echo esc_attr($carousel_slider['slide_heading']); ?>"></span> 
					</div>
					<?php 
				} ?> 
			</div>
		</div>
	</div>