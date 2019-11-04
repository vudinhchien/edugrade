<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();	
	$page_custom_class = (isset( $atts['page_custom_class'] ) && $atts['page_custom_class'] !='') ? $atts['page_custom_class'] : '';
	$event_category = (isset( $atts['event_category'] ) && $atts['event_category'] !='') ? $atts['event_category'] : '';
	$events_style = (isset( $atts['events_style'] ) && $atts['events_style'] !='') ? $atts['events_style'] : '';
	$element_title = (isset( $atts['element_title'] ) && $atts['element_title'] !='') ? $atts['element_title'] : '';
	$event_titles = (isset( $atts['event_titles'] ) && $atts['event_titles'] !='') ? $atts['event_titles'] : '10';
	$fetch_events = (isset( $atts['fetch_events'] ) && $atts['fetch_events'] !='') ? $atts['fetch_events'] : '';
	$events_order = (isset( $atts['events_order'] ) && $atts['events_order'] !='') ? $atts['events_order'] : '';
	
	
	$argu = array('pagination'=>1,'category'=>$event_category, 'group'=>'this','scope'=>'all', 'limit' => $fetch_events, 'order' => $events_order);
	$argu['page'] = (!empty($_REQUEST['pno']) && is_numeric($_REQUEST['pno']) )? $_REQUEST['pno'] : 1;
	$EM_Events = EM_Events::get( $argu );
	$events_count = count ( $EM_Events );

	if($events_style == 'style-1'){ ?>
		<div class="up-events <?php echo esc_attr($page_custom_class); ?>">
			<?php
			if(!empty($element_title)){ ?>
				<h2 class="stitle"><?php echo esc_attr($element_title); ?></h2>
				<?php	
			}
			?>
			
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
								<h4> <a href="<?php echo esc_url(get_permalink($event->post_id)); ?>"><?php echo substr(esc_attr(get_the_title($event->post_id)),0,$event_titles); ?></a> </h4>
								<span><i class="fas fa-map-marker-alt"></i> <?php echo esc_attr($location_address); ?></span> 
							</div>
						</div>
					</div>
					<?php	
				}
				?>
			</div>
		</div>
		<?php
	}else if($events_style == 'style-2'){ ?>
		<div class="news-events">
			<?php
			if(!empty($element_title)){ ?>
				<div class="title3"><h2><?php echo esc_attr($element_title); ?></h2></div>
				<?php	
			}
			?>
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
					if(isset($event->get_location()->location_town)){
						$location_town = esc_attr($event->get_location()->location_town);	
					}
					if($location_address <> ''){
						$loc_lat = $event->get_location()->location_latitude;
						$loc_lon = $event->get_location()->location_longitude;
					}
					
					$post_meta = fw_get_db_post_option($event->post_id);
					?>
				 
					<div class="col-md-6">
						<div class="event-box">
							<div class="event-date"> <?php echo esc_attr($event_month); ?> <strong><?php echo esc_attr($event_day); ?></strong> 
								<a href="<?php echo esc_url(get_permalink($event->post_id)); ?>"><img src="<?php  echo get_template_directory_uri();  ?>/assets/images/calc.png" alt="<?php echo esc_attr__('img','edugrade'); ?>"></a> 
							</div>
							<div class="event-txt">
								<ul class="event-meta">
									<li><i class="far fa-clock"></i> <?php echo esc_attr($event_start_time_modern); ?> - <?php echo esc_attr($event_end_time_modern); ?></li>
									<li><i class="fas fa-user"></i> <?php echo get_the_author(); ?></li>
								</ul>
								<h6> <a href="<?php echo esc_url(get_permalink($event->post_id)); ?>"><?php echo substr(esc_attr(get_the_title($event->post_id)),0,$event_titles); ?></a> </h6>
								<p class="loc"> <?php echo esc_attr($location_address); ?> <br/> <?php echo esc_attr($location_town); ?></p>
								<a href="<?php echo esc_url(get_permalink($event->post_id)); ?>" class="ed"> <i class="fas fa-angle-right"></i> <?php echo esc_attr__('Event Detail','edugrade'); ?> </a> 
							</div>
						</div>
					</div>
					<?php 
				} ?> 
			</div>
		</div>
		<?php
	}else{ ?>
		<div class="events-list">
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
				<div class="event-box">
					<div class="event-thumb">
						<a href="<?php echo esc_url(get_permalink($event->post_id)); ?>"><i class="fas fa-link"></i></a>
						<div class="edate"> <?php echo esc_attr($event_month); ?> <strong><?php echo esc_attr($event_day); ?></strong> </div>
						<?php  echo get_the_post_thumbnail( $event->post_id, 'gramotech-events-grid' );  ?>
					</div>
					<div class="event-excerpt">
						<span class="etime"><i class="far fa-clock"></i> <?php echo esc_attr($event_start_time_modern); ?> - <?php echo esc_attr($event_end_time_modern); ?></span>
						<h4> <a href="<?php echo esc_url(get_permalink($event->post_id)); ?>"><?php echo substr(esc_attr(get_the_title($event->post_id)),0,$event_titles); ?></a> </h4>
						<span><i class="fas fa-map-marker-alt"></i> <?php echo esc_attr($location_address); ?></span> 
					</div>
				</div>
				<?php 
			} ?> 
		</div>
		<?php
	} ?>