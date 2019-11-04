<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();	
	$page_custom_class = (isset( $atts['page_custom_class'] ) && $atts['page_custom_class'] !='') ? $atts['page_custom_class'] : '';
	$element_title = isset( $atts['element_title'] ) ? $atts['element_title'] : '';
	$office_address = isset( $atts['office_address'] ) ? $atts['office_address'] : '';
	$office_address_icon = isset( $atts['office_address_icon'] ) ? $atts['office_address_icon'] : '';
	$office_phone = isset( $atts['office_phone'] ) ? $atts['office_phone'] : '';
	$office_phone_icon = isset( $atts['office_phone_icon'] ) ? $atts['office_phone_icon'] : '';
	$office_email = isset( $atts['office_email'] ) ? $atts['office_email'] : '';
	$office_email_icon = isset( $atts['office_email_icon'] ) ? $atts['office_email_icon'] : '';
	$office_description = isset( $atts['office_description'] ) ? $atts['office_description'] : '';
	$facebook_social_profile = isset( $atts['facebook_social_profile'] ) ? $atts['facebook_social_profile'] : '';
	$twitter_social_profile = isset( $atts['twitter_social_profile'] ) ? $atts['twitter_social_profile'] : '';
	$gplus_social_profile = isset( $atts['gplus_social_profile'] ) ? $atts['gplus_social_profile'] : '';
	$linkedin_social_profile = isset( $atts['linkedin_social_profile'] ) ? $atts['linkedin_social_profile'] : '';
	$contact_from_shortcode = (isset( $atts['contact_from_shortcode'] ) && $atts['contact_from_shortcode'] !='') ? $atts['contact_from_shortcode'] : '';
	
	fw()->backend->option_type('icon-v2')->packs_loader->enqueue_frontend_css();

	?>
	<div class="contact-address">
		<div class="row">
			<div class="col-md-5 nop">
				<div class="contact-bg">
				   <h3><?php echo esc_attr($element_title); ?></h3>
					<address>
						<ul>
							<li><i class="fas <?php echo esc_attr($office_address_icon["icon-class"]); ?>"></i> <?php echo esc_attr($office_address); ?></li>
							<li><i class="fas <?php echo esc_attr($office_phone_icon["icon-class"]); ?>"></i> <?php echo esc_attr($office_phone); ?> </li>
							<li><i class="far <?php echo esc_attr($office_email_icon["icon-class"]); ?>"></i><?php echo esc_attr($office_email); ?></li>
						</ul>
					</address>
					<ul class="social-links">
						<?php if($facebook_social_profile <> ''){ ?>
							<li><a href="<?php echo esc_url($facebook_social_profile); ?>"><i class="fab fa-facebook-f"></i></a></li>
							<?php
						}
						if($twitter_social_profile <> ''){  ?>
							<li><a href="<?php echo esc_url($twitter_social_profile); ?>"><i class="fab fa-twitter"></i></a></li>
							<?php
						}
						if($gplus_social_profile <> ''){  ?>
							<li><a href="<?php echo esc_url($gplus_social_profile); ?>"><i class="fab fa-google-plus-g"></i></a></li>
							<?php
						}
						if($linkedin_social_profile <> ''){  ?>
							<li><a href="<?php echo esc_url($linkedin_social_profile); ?>"><i class="fab fa-linkedin-in"></i></a></li>
							<?php
						}
						?>
					</ul>
					<p class="quote"> <?php echo esc_attr($office_description); ?> </p>
				</div>
			</div>
			<div class="col-md-7 nop">
				<?php echo do_shortcode($contact_from_shortcode); ?>
			 </div>
		</div>
	</div>	