<?php
/**
 * The template for displaying all pages
 */

	get_header(); 
	 ?>
	<div class="container">
		<div class="up-events default-events-page">
			<div class="gramotech-content-area">
				<?php
				while ( have_posts() ) : the_post();
					global $post;
					
					$argu = array('pagination'=>1,'group'=>'this','scope'=>'all', 'limit' => 6);
					$argu['page'] = (!empty($_REQUEST['pno']) && is_numeric($_REQUEST['pno']) )? $_REQUEST['pno'] : 1;
					
					$EM_Events = EM_Events::get($argu); ?>
					<div class="row">
						<?php
						foreach ( $EM_Events as $event ) {
							
							$event_day = date('d',$event->start);
							$event_month = date('M',$event->start);
							$event_year = date('Y',$event->start);

							$event_start_time_modern = date("H:i a", strtotime($event->start_time));
							$event_end_time_modern = date("H:i a", strtotime($event->end_time));

							$location_address = '';

							if(isset($event->get_location()->location_address)){
								$location_address = esc_attr($event->get_location()->location_address);	
							}
							if($location_address <> ''){
								$loc_lat = $event->get_location()->location_latitude;
								$loc_lon = $event->get_location()->location_longitude;
							}
							
							$post_meta = fw_get_db_post_option($event->post_id);
							?>
							<div class="col-md-4 col-sm-4">
								<div class="event-box">
									<div class="event-thumb">
										<a href="<?php echo esc_url(get_permalink($event->post_id)); ?>"><i class="fas fa-link"></i></a>
										<div class="edate"> <?php echo esc_attr($event_month); ?>  <strong><?php echo esc_attr($event_day); ?></strong> </div>
										<span class="etime"><i class="far fa-clock"></i> <?php echo esc_attr($event_start_time_modern); ?> - <?php echo esc_attr($event_end_time_modern); ?></span> 
										<?php  echo get_the_post_thumbnail( $event->post_id, 'gramotech-events-grid' );  ?>
									</div>
									<div class="event-excerpt">
										<h4> <a href="<?php echo esc_url(get_permalink($event->post_id)); ?>"><?php echo esc_attr(get_the_title($event->post_id)); ?></a> </h4>
										<span><i class="fas fa-map-marker-alt"></i> <?php echo esc_attr($location_address); ?></span> 
									</div>
								</div>
							</div>
							<?php	
						}
						
						$events_count = EM_Events::count($argu); ?>
						
						<div class="gramotech-events-pagination text-center">
							<?php echo EM_Events::get_pagination_links($argu, $events_count); ?>
						</div>
						
					</div>
					<?php
					endwhile; // End of the loop.
				?>
			</div>
		</div>
	</div>	
		<?php
	get_footer(); ?>