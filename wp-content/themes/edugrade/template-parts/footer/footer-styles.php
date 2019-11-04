<?php
/**
 * Displays footer 
 */
	if(function_exists('fw_get_db_settings_option')){
		$footer_style = fw_get_db_settings_option('footer_style');
		$copyright_option = fw_get_db_settings_option('copyright_option/'. fw_get_db_settings_option('copyright_option/'. 'gadget'));
		
	} else {
		$copyright_option = '';
		$copyright_text = '';
	}
	
	if(isset($footer_style) && $footer_style['gadget'] == 'footer-style-1'){
		$footer_style1 = $footer_style['footer-style-1'];
		?>
		<div class="newsletter">
			<div class="container">
			   <div class="row">
					<div class="col-md-4">
						<h3><?php echo esc_attr($footer_style1['newsletter_title']); ?></h3>
						<strong><?php echo esc_attr($footer_style1['newsletter_caption']); ?></strong> 
					</div>
					<div class="col-md-8">
						<form class="footer-newsletter" id="subscribe" method="post" data-ajax="<?php echo admin_url( 'admin-ajax.php' ); ?>">
							<div class="input-group"> <i class="far fa-envelope-open"></i>
								<input type="hidden" class="form-control" id="fname" name="fname">
								<input type="text" class="form-control" name= "email_address" id= "email_address" placeholder="<?php echo esc_attr__('Enter email','edugrade'); ?>">
								<input type="submit" value="<?php echo esc_attr__('Subscribe','edugrade'); ?>" class="subscribe">
							</div>
							<div class="status"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<footer class="footer theme-footer1">
			<?php 
			if( is_active_sidebar( 'sidebar-footer' ) || is_active_sidebar( 'sidebar-footer2' ) || is_active_sidebar( 'sidebar-footer3' ) ) {
				?>
				<div class="container">
					<div class="row">
						<?php 
						if( is_active_sidebar( 'sidebar-footer' )) {
							dynamic_sidebar('Footer');
						}
						
						if( is_active_sidebar( 'sidebar-footer2' )) {
						dynamic_sidebar('Footer2');
						}
						
						if( is_active_sidebar( 'sidebar-footer3' )) {
						dynamic_sidebar('Footer3'); 
						} ?>
					</div>
				</div>
				
				<?php 
			} ?>
			<div class="copyrights">
				<div class="container">
					<div class="row">
						<div class="col-md-6"> 
							<?php 
							if(isset($copyright_option) && $copyright_option <> ''){ ?>
								<p> <?php echo esc_attr($copyright_option['copyright_text']);?> </p>
								<?php 
							} ?>
						</div>
						<div class="col-md-6">
							<ul class="footer-social">
								<?php echo gramotech_social_icons(); ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
			<?php	
	}else if(isset($footer_style) && $footer_style['gadget'] == 'footer-style-2'){
		$footer_style2 = $footer_style['footer-style-2'];	
		$newsletter_background_img = $footer_style2['newsletter_background_img'];		
		$footer_img = $footer_style2['footer_logo_img'];		
		if(!empty($newsletter_background_img['url'])){
			$custom_css = '
				.newsletter-wrap.custom-img{background: url('.esc_url($newsletter_background_img['url']).') no-repeat; background-size: cover !important;}
				.footer-bottom .footer-logo.edugrade-footer-logo-bg{background:'.esc_attr($footer_style2['footer_logo_bg_color']).';}
			';
			
			wp_enqueue_style('gramotech-inline-style',get_template_directory_uri() . '/assets/css/internal-style.css');
			wp_add_inline_style( 'gramotech-inline-style', $custom_css );	
		}
		
		?>
		<footer class="footer-home-2">
			<!--Newsletter Start-->
			<div class="newsletter-wrap custom-img">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h3><?php echo esc_attr($footer_style2['newsletter_title']); ?></h3>
							<p><?php echo esc_attr($footer_style2['newsletter_title']); ?></p>
						</div>
						<form class="footer-newsletter" id="subscribe" method="post" data-ajax="<?php echo admin_url( 'admin-ajax.php' ); ?>">
							<ul>
								<li class="col-md-5 col-sm-4">
								   <input type="text" class="form-control" id="fname" name="fname" placeholder="<?php echo esc_attr__('Full Name','edugrade'); ?>">
								</li>
								<li class="col-md-5 col-sm-4">
								   <input type="email" name= "email_address" id= "email_address" class="form-control" placeholder="<?php echo esc_attr__('Email','edugrade'); ?>">
								</li>
								<li class="col-md-2 col-sm-4">
								   <input type="submit" value="<?php echo esc_attr__('Subscribe Now','edugrade'); ?>">
								</li>
							</ul>
							<div class="status"></div>
						</form>
					</div>
				</div>
			</div>
			<!--Newsletter End--> 
			<!--Footer Bottom Start-->
			<div class="footer-bottom">
				<div class="footer-logo edugrade-footer-logo-bg"> 
					<img src="<?php echo empty($footer_img['url']) ? get_template_directory_uri() .'/assets/images/flogo.png' : esc_url($footer_img['url']) ; ?>" alt="<?php echo esc_attr__('img','edugrade'); ?>"> 
				</div>	
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<?php 
							if(isset($copyright_option) && $copyright_option <> ''){ ?>
								<p> <?php echo esc_attr($copyright_option['copyright_text']);?> </p>
								<?php 
							} ?>
						</div>
						<div class="col-md-6 col-sm-6">
							<ul class="flinks">
								<li> <a href="<?php echo esc_url($footer_style2['terms_conditions_url']); ?>"><i class="fas fa-angle-double-right"></i> <?php echo esc_attr__('Terms &amp; Condition','edugrade'); ?> </a> </li>
								<li> <a href="<?php echo esc_url($footer_style2['privacy_policy_url']); ?>"><i class="fas fa-angle-double-right"></i> <?php echo esc_attr__('Privacy Policy','edugrade'); ?></a> </li>
							</ul>
							<ul class="footer-social">
								<?php echo gramotech_social_icons(); ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!--Footer Bottom End--> 
		</footer>
			<?php	
	}else if(isset($footer_style) && $footer_style['gadget'] == 'footer-style-3'){
		$footer_style3 = $footer_style['footer-style-3'];
		global $gramotech_allowed_html; ?>
		
		<footer class="footer-with-map footer">
			<div class="footer-map">
				<div id="map">
					<?php echo wp_kses($footer_style3['google_map_embed_code'],$gramotech_allowed_html); ?>
				</div>
            </div>
            <div class="container">
				<div class="footer-style-3-widgets">
					<div class="row">
						<?php 
						if( is_active_sidebar( 'sidebar-footer' )) {
							dynamic_sidebar('Footer');
						} ?>
					</div>
				</div>	
            </div>
            <div class="copyrights">
				<div class="container">
					<div class="row">
						<div class="col-md-6"> 
							<?php 
							if(isset($copyright_option) && $copyright_option <> ''){ ?>
								<?php echo esc_attr($copyright_option['copyright_text']);?>
								<?php 
							} ?>
						</div>
					</div>
				</div>
            </div>
		</footer>
			<?php	
	}else{ ?>
		<footer class="footer default-footer">
			<?php 
			if( is_active_sidebar( 'sidebar-footer' )) { ?>
				<div class="edugrade-footer-default">
					<div class="container">
						<div class="row">
						<?php dynamic_sidebar('Footer'); ?>
						</div>
					</div>
				</div>
				<?php 
			} ?>
			<div class="copyrights">
				<div class="container">
					<div class="row">
						<div class="col-md-6"> <?php echo esc_attr__('Edugrade 2018, All Rights Reserved, Design &amp; Developed By','edugrade'); ?> <a href="#"><?php echo esc_attr__('GramoTech','edugrade'); ?></a> </div>  
					</div>
				</div>
			</div>
		</footer>
		<?php
	}
	 ?>