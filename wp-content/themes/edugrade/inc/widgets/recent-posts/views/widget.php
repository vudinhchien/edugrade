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
		} 
		
		if($query->have_posts()){ ?>
		
			<div class="latest-posts">
				<ul>
					<?php
					while($query->have_posts()){ $query->the_post();
						
						$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), array(67,70));
						?>
						<li>
						   <img width="67" height="70" src="<?php echo esc_url($thumbnail[0]); ?>" alt="<?php echo esc_attr__('img','edugrade'); ?>">
						   <h6> <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_attr(substr(get_the_title(),0,34)); ?></a> </h6>
						   <span class="sb-date"><i class="far fa-calendar-alt"></i> <?php echo esc_attr(get_the_date('M d, Y')); ?></span> 
						</li>
						<?php
					} ?>
				</ul>
			</div><?php
		} ?>
	<?php

	wp_reset_postdata();
	echo wp_kses($after_widget,$gramotech_allowed_html); ?>