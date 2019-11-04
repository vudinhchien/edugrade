<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * @var string $before_title
 * @var string $after_title
 * @var string $before_widget
 * @var string $after_widget
 */
	global $gramotech_allowed_html;

	echo wp_kses($before_widget,$gramotech_allowed_html);

		if( !empty($title) ){ 
			echo wp_kses($args['before_title'],$gramotech_allowed_html) . esc_attr($title) . $args['after_title']; 
		} ?>
		<ul class="upcoming-events">
			<?php
			foreach ( $EM_Events as $event ) {
				$post_id = $event->post_id;
				
				/* Get Dates In Parts */
				
				$event_year = date('Y',$event->start);
				$event_month = date('M',$event->start);
				$event_day = date('d',$event->start);
				
				$location_address = '';

				if(isset($event->get_location()->location_address)){
					$location_address = esc_attr($event->get_location()->location_address);	
				}
				?>
			
				<li>
					<div class="up-top">
					<div class="upedate"> <?php echo esc_attr($event_month); ?> <strong><?php echo esc_attr($event_day); ?></strong> </div>
					<h5><a href="<?php echo esc_url(get_permalink($event->post_id)); ?>"><?php echo esc_attr(substr(get_the_title($event->post_id),0,27)); ?></a></h5>
					</div>
					<span><i class="fas fa-map-marker-alt"></i> <?php echo esc_attr($location_address); ?></span> 
				</li>
				<?php 	
			} /* end foreach */ 
			?>
		</ul>
	<?php
	wp_reset_postdata();
	echo wp_kses($after_widget,$gramotech_allowed_html); ?>