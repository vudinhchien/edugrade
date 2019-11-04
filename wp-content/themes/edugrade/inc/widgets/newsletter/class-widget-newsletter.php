<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

add_action( 'widgets_init', 'gramotech_newsletter_widget' );
if( !function_exists('gramotech_newsletter_widget') ){
	function gramotech_newsletter_widget() {
		register_widget( 'Widget_Newsletter' );
	}
}
	
class Widget_Newsletter extends WP_Widget {

	/**
	 * @internal
	 */
	public function __construct() {
		$widget_ops = array( 'description' => '' );
		parent::__construct( false, esc_attr__( 'GramoTech: Newsletter Widget', 'edugrade' ), $widget_ops );
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		$filepath = dirname( __FILE__ ) . '/views/widget.php';

		if ( file_exists( $filepath ) ) {
			include( $filepath );
		}
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
		?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_attr__('Title :', 'edugrade'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
	<?php
	}
}