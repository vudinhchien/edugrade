<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
	
add_action( 'widgets_init', 'gramotech_contact_widget' );
if( !function_exists('gramotech_contact_widget') ){
	function gramotech_contact_widget() {
		register_widget( 'Widget_Contact' );
	}
}	
	
class Widget_Contact extends WP_Widget {

	/**
	 * @internal
	 */
	public function __construct() {
		$widget_ops = array( 'description' => '' );
		parent::__construct( false, esc_attr__( 'GramoTech: Contact Widget', 'edugrade' ), $widget_ops );
	}

	/**
	 * @param array $args
	 * @param array $instance
	*/
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );	
		$widget_address = $instance['widget_address'];
		$widget_phone = $instance['widget_phone'];	
		$widget_email = $instance['widget_email'];	
		$website = $instance['website'];
		
		include( get_template_directory() . '/inc/widgets/contact/views/widget.php' );
	}

	/**
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	/**
	 * @param array $instance
	 *
	 * @return string|void
	 */
	public function form( $instance ) {
		
		$title = isset($instance['title'])? $instance['title']: '';
		$widget_address = isset($instance['widget_address'])? $instance['widget_address']: '';
		$widget_phone = isset($instance['widget_phone'])? $instance['widget_phone']: '';
		$widget_email = isset($instance['widget_email'])? $instance['widget_email']: '';
		$website = isset($instance['website'])? $instance['website']: '';
		
		?>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_attr__('Title :', 'edugrade'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<!-- Widget address --> 
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('widget_address')); ?>"><?php echo esc_attr__('Address:', 'edugrade'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_address')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_address')); ?>" type="text" value="<?php echo esc_attr($widget_address); ?>" />
		</p>
		<!-- Widget email --> 
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('widget_email')); ?>"><?php echo esc_attr__('Email address:', 'edugrade'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_email')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_email')); ?>" type="text" value="<?php echo esc_attr($widget_email); ?>" />
		</p>
		<!-- Widget phone --> 
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('widget_phone')); ?>"><?php echo esc_attr__('Phone Number:', 'edugrade'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_phone')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_phone')); ?>" type="text" value="<?php echo esc_attr($widget_phone); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('website')); ?>"><?php echo esc_attr__('Website URL:', 'edugrade'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('website')); ?>" name="<?php echo esc_attr($this->get_field_name('website')); ?>" type="text" value="<?php echo esc_attr($website); ?>" />
		</p>
	<?php
	}
}