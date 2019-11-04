<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * @var string $before_title
 * @var string $after_title
 * @var string $before_widget
 * @var string $after_widget
 */
	global $gramotech_allowed_html;

	echo wp_kses($before_widget,$gramotech_allowed_html);
	?>
	<div class="other-members">
		<?php
		if( !empty($title) ){ 
			echo '<h3 class="stitle2">' . esc_attr($title) . '</h3>'; 
		} ?>
		<ul>
			<?php
			foreach($instructors as $instructor){
				$instructor_meta = get_user_meta( $instructor->ID);
				?>
				<li><a href="<?php echo (home_url('/').'profile/'. esc_attr($instructor_meta['nickname'][0])); ?>"><?php echo esc_attr($instructor_meta['first_name'][0] .' '. $instructor_meta['last_name'][0]); ?></a></li>
				<?php
			} ?>
			
		</ul>
	</div>
	<?php
	wp_reset_postdata();
	echo wp_kses($after_widget,$gramotech_allowed_html); ?>