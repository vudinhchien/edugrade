<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * @var string $before_title
 * @var string $after_title
 * @var string $before_widget
 * @var string $after_widget
 */
	global $gramotech_allowed_html;
	// Opening of widget
	echo wp_kses($before_widget,$gramotech_allowed_html);
	
	// Open of title tag
	if( !empty($title) ){
		echo wp_kses($args['before_title'], $gramotech_allowed_html) . esc_attr($title) . $args['after_title']; 
	} ?>
		<address>
			<ul>
				<li> <i class="fas fa-home"></i> <?php echo esc_attr($widget_address);?> </li>
				<li><i class="fas fa-phone"></i> <?php echo esc_attr($widget_phone);?></li>
				<li><i class="fas fa-envelope"></i> <?php echo esc_attr($widget_email);?></li>
				<li><i class="fas fa-globe"></i> <?php echo esc_attr($website);?></li>
			</ul>
		</address>	
	<?php

	echo wp_kses($after_widget,$gramotech_allowed_html); ?>