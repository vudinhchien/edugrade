<?php get_header(); 

	if (function_exists('fw_get_db_settings_option')) {
		$enable_social_share = fw_get_db_settings_option('enable_social_share');	
	} else{
		$enable_social_share = '';
	}
	
	$gramotech_sidebar = '';
	$content_col = 'col-md-12';
	if (function_exists('fw_ext_sidebars_get_current_position')) {
		$current_position = fw_ext_sidebars_get_current_position();
		if ($current_position != 'full' && ( $current_position == 'left' || $current_position == 'right' )) {
			$gramotech_sidebar = $current_position;
			$content_col = 'col-md-9';
		}else if($current_position == 'full'){
			$gramotech_sidebar = $current_position;
			$content_col = 'col-md-12';
		}
	}

	if (isset($gramotech_sidebar) && $gramotech_sidebar == 'right') {
		$sidebar_position = 'pull-right';
		$content_position = 'pull-left';
	} else if (isset($gramotech_sidebar) && $gramotech_sidebar == 'left') {
		$sidebar_position = 'pull-left';
		$content_position = 'pull-right';
	}else if (isset($gramotech_sidebar) && $gramotech_sidebar == 'full') {
		$sidebar_position = '';
		$content_position = '';
	}else{
		$sidebar_position = 'default-position';
		$content_position = 'default-position';
	}
	?>
	<div class="main-content">
		<!--Event Grid Page Start-->
		<div class="event-details">
			<div class="container">
				<div class="row">
					<!--Event Details Col Start-->
					<div class="<?php echo esc_attr($content_col); echo ' '; echo esc_attr($content_position); ?>">
						<?php
						if ( have_posts() ){ 
							while (have_posts()){ the_post();

								global $post,$EM_Event;

								/* Get Post Meta Elements detail */
								$post_meta = fw_get_db_post_option($post->ID);
								
								/* Event Timmings */
								
								if(!empty($EM_Event->start_time)){												  
									$event_start_time = date("g:i a", strtotime($EM_Event->start_time));
								}
								if(!empty($EM_Event->end_time)){												  
									$event_end_time = date("g:i a", strtotime($EM_Event->end_time));
								}
								/* Event Date */
								if(!empty($EM_Event->start_date)){	
									$event_date =  date('d',strtotime($EM_Event->start_date));
									$event_month =  date('M',strtotime($EM_Event->start_date));
									$event_month_n =  date('m',strtotime($EM_Event->start_date));
									$event_year =  date('Y',strtotime($EM_Event->start_date));
									
								}
								if(isset($EM_Event->get_location()->location_address)){
									$location_address = esc_attr($EM_Event->get_location()->location_address);
								}
								
								wp_add_inline_script( 'gramotech-functions', 'jQuery(document).ready(function($){
										var austDay = new Date('.esc_attr($event_year).', '.esc_attr($event_month_n).', '.esc_attr($event_date).');
										$("#defaultCountdown").countdown({until: austDay});
										$("#year").text(austDay.getFullYear());
									});' 
								);
								
								 ?>
								<div class="details-col">
									<div class="title-area">
										<div class="edate"> <?php echo esc_attr($event_month); ?> <strong><?php echo esc_attr($event_date); ?></strong> </div>
										<span class="etime"><i class="far fa-clock"></i> <?php echo esc_attr($event_start_time); ?> - <?php echo esc_attr($event_end_time); ?></span>
										<h4><?php the_title(); ?></h4>
										<span><i class="fas fa-map-marker-alt"></i> <?php echo esc_attr($location_address); ?></span>
										<?php 
										if(function_exists('gramotech_get_social_shares')){ ?>
											<div class="share">
												<div class="dropdown">
													<button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-share-alt"></i> </button>
													<?php echo gramotech_get_social_shares($EM_Event->post_id); ?>
												</div>
											</div>	
											<?php
										}
										?>
									</div>
									<div class="e-img">
										<?php echo get_the_post_thumbnail($EM_Event->post_id, 'full'); ?>
									</div>
									<div class="event-counter">
										<div id="defaultCountdown"></div>
										<a class="participate" data-toggle="modal" data-target="#myModal" href="#"><?php echo esc_attr__('Participate Now','edugrade'); ?></a>
									</div>
									<?php 
									if(function_exists('gramotech_booking_form_event_manager')){
										gramotech_booking_form_event_manager(); 
									}
									$content = str_replace(']]>', ']]&gt;',$EM_Event->post_content); 
									echo do_shortcode($content); 
								
									if(isset($post_meta['event_gallery']) && !empty($post_meta['event_gallery'])){ ?>
										<div class="event-gallery gallery">
											<h3><?php echo esc_attr__('Event Gallery','edugrade'); ?></h3>
											<div id="event-gallery" class="owl-carousel owl-theme">
												<?php
												foreach($post_meta['event_gallery'] as $gallery_img){ ?>
													<div class="item">
														<div class="eimg"> 
															<a href="<?php echo esc_url($gallery_img['url']); ?>" data-rel="prettyPhoto[gallery1]" title="<?php echo esc_attr__('Event Gallery','edugrade'); ?>"><i class="far fa-image"></i></a> 
															<img src="<?php echo esc_url($gallery_img['url']); ?>" alt="<?php echo esc_attr__('img','edugrade'); ?>">
														</div>
													</div>
													<?php
												} ?>
											</div>
										</div>
										<?php
									} ?>
								   <?php comments_template( '', true ); ?>
								</div> 
								<?php 	
							}
						} ?>
					</div>
					<?php 
					if(function_exists('fw_ext_sidebars_get_current_position') && !empty($gramotech_sidebar)) { ?>
						<div class="col-md-3 <?php echo esc_attr($sidebar_position); ?>">
							<div class="sidebar"> 
								<?php echo fw_ext_sidebars_show('blue'); ?>
							</div>
						</div>
						<?php 
					}else{ } ?>
				</div>
			</div>
		</div>
	</div>
	<?php
get_footer(); ?>