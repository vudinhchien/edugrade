<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
	
add_action( 'widgets_init', 'gramotech_about_info_widget' );
if( !function_exists('gramotech_about_info_widget') ){
	function gramotech_about_info_widget() {
		register_widget( 'Widget_About_Info' );
	}
}	
	
class Widget_About_Info extends WP_Widget {

	/**
	 * @internal
	 */
	public function __construct() {
		$widget_ops = array( 'description' => '' );
		parent::__construct( false, esc_attr__( 'GramoTech: About Info', 'edugrade' ), $widget_ops );
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		$about_style = isset($instance['about_style'])? $instance['about_style']: '';
		$logo_image_src = isset($instance['logo_image_src'])? $instance['logo_image_src']: '';
		$about_description = isset($instance['about_description'])? $instance['about_description']: '';
		$signature_text = isset($instance['signature_text'])? $instance['signature_text']: '';
		$facebook = isset($instance['facebook'])? $instance['facebook']: '';
		$twitter = isset($instance['twitter'])? $instance['twitter']: '';
		$gplus = isset($instance['gplus'])? $instance['gplus']: '';
		$linkedin = isset($instance['linkedin'])? $instance['linkedin']: '';

		include( get_template_directory() . '/inc/widgets/about-info/views/widget.php');
		
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
			
		$about_style = isset($instance['about_style'])? $instance['about_style']: '';
		$logo_image_src = isset($instance['logo_image_src'])? $instance['logo_image_src']: '';
		$about_description = isset($instance['about_description'])? $instance['about_description']: '';
		$signature_text = isset($instance['signature_text'])? $instance['signature_text']: '';
		$facebook = isset($instance['facebook'])? $instance['facebook']: '';
		$twitter = isset($instance['twitter'])? $instance['twitter']: '';
		$linkedin = isset($instance['linkedin'])? $instance['linkedin']: '';
		$gplus = isset($instance['gplus'])? $instance['gplus']: '';
		?>

		<!-- Title -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('about_style')); ?>"><?php echo esc_attr__('About Style :', 'edugrade'); ?></label>		
			<select class="widefat" name="<?php echo esc_attr($this->get_field_name('about_style')); ?>" id="<?php echo esc_attr($this->get_field_id('about_style')); ?>">
				
				<option value="style-1" <?php if ($about_style == 'style-1'){ echo esc_attr__(' selected ','edugrade');} ?>><?php echo esc_attr__('Style 1(sidebar)','edugrade'); ?></option>				
				<option value="style-2" <?php if ($about_style == 'style-2'){ echo esc_attr__(' selected ','edugrade');} ?>><?php echo esc_attr__('Style 2(footer)','edugrade'); ?></option>					
			</select> 
		</p>	
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_attr__('Title :', 'edugrade'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>	
		
		<!-- Logo -->
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('logo_image_src')); ?>"><?php echo esc_attr__('Logo/About Image Src :', 'edugrade'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_image_src')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_image_src')); ?>" type="text" value="<?php echo esc_attr($logo_image_src); ?>" />
		</p>
		
		<!-- Description -->
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('about_description')); ?>"><?php echo esc_attr__('Enter Description :', 'edugrade'); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('about_description')); ?>" name="<?php echo esc_attr($this->get_field_name('about_description')); ?>"><?php echo esc_attr($about_description); ?></textarea>
		</p>
		
		<!-- Button Url -->
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('signature_text')); ?>"><?php echo esc_attr__('Signature Text :', 'edugrade'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('signature_text')); ?>" name="<?php echo esc_attr($this->get_field_name('signature_text')); ?>" type="text" value="<?php echo esc_attr($signature_text); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php echo esc_attr__('Facebook profile Url :', 'edugrade'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php echo esc_attr__('Twitter Profile url:', 'edugrade'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php echo esc_attr__('Linkedin Profile url :', 'edugrade'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('gplus')); ?>"><?php echo esc_attr__('Google Plus :', 'edugrade'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('gplus')); ?>" name="<?php echo esc_attr($this->get_field_name('gplus')); ?>" type="text" value="<?php echo esc_attr($gplus); ?>" />
		</p>
		
	<?php
	}
}