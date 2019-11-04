<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * @var string $before_title
 * @var string $after_title
 * @var string $before_widget
 * @var string $after_widget
 */
	global $gramotech_allowed_html;

	echo wp_kses($before_widget, $gramotech_allowed_html);

		if($about_style == 'style-1'){
			
			if( !empty($title) ){ 
				echo wp_kses($args['before_title'],$gramotech_allowed_html) . esc_attr($title) . $args['after_title']; 
			} ?>
			
			<div class="textwidget">
				<img src="<?php echo esc_url($logo_image_src); ?>" alt="<?php echo esc_attr__('img','edugrade'); ?>">
				<p> <?php echo esc_attr($about_description); ?> </p>
				<h5 class="name"><?php echo esc_attr($signature_text); ?></h5>
				<ul class="social">
					<li><a href="<?php echo esc_attr($facebook); ?>"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="<?php echo esc_attr($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
					<li><a href="<?php echo esc_attr($gplus); ?>"><i class="fab fa-google-plus-g"></i></a></li>
					<li><a href="<?php echo esc_attr($linkedin); ?>"><i class="fab fa-linkedin-in"></i></a></li>
				</ul>
			</div>
			<?php 	
		}else{
			if( !empty($title) ){ 
				echo wp_kses($args['before_title'],$gramotech_allowed_html) . esc_attr($title) . $args['after_title']; 
			} ?>
			
			<div class="textwidget">
				<img src="<?php echo esc_url($logo_image_src); ?>" alt="<?php echo esc_attr__('img','edugrade'); ?>">
				<p><?php echo esc_attr($about_description); ?></p>
				<?php 
				if(!empty($facebook) || !empty($twitter) || !empty($gplus) || !empty($linkedin) ){ ?>
					<ul class="footer-social">
						<?php 
						if(!empty($facebook)){ ?>
							<li><a href="<?php echo esc_attr($facebook); ?>"><i class="fab fa-facebook-f"></i></a></li>
							<?php
						}
						if(!empty($twitter)){ ?>
							<li><a href="<?php echo esc_attr($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
							<?php
						}
						if(!empty($gplus)){ ?>
							<li><a href="<?php echo esc_attr($gplus); ?>"><i class="fab fa-google-plus-g"></i></a></li>
							<?php
						}
						if(!empty($linkedin)){ ?>
							<li><a href="<?php echo esc_attr($linkedin); ?>"><i class="fab fa-linkedin-in"></i></a></li>
							<?php
						}
						?>
					</ul>
					<?php
				}
				?>
			</div>
			<?php
		}
		
	echo wp_kses($after_widget,$gramotech_allowed_html); ?>