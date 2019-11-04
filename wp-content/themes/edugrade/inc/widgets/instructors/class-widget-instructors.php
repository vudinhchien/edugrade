<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
	
add_action( 'widgets_init', 'gramotech_instructors_widget' );
if( !function_exists('gramotech_instructors_widget') ){
	function gramotech_instructors_widget() {
		register_widget( 'Widget_Instructors' );
	}
}	
	
class Widget_Instructors extends WP_Widget {

	/**
	 * @internal
	 */
	public function __construct() {
		$widget_ops = array( 'description' => '' );
		parent::__construct( false, esc_attr__( 'GramoTech: Instructors Widget', 'edugrade' ), $widget_ops );
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		$instructors_order = $instance['instructors_order'];
		$num_fetch = $instance['num_fetch'];
		
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	
		$args = array(
			'role' => 'lp_teacher',
			'number' => $num_fetch,
			'order' => $instructors_order,
			'fields' => 'all'
		);
		
		$instructors = get_users( $args );
			include( get_template_directory() . '/inc/widgets/instructors/views/widget.php');		
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
		$instructors_order = isset($instance['category'])? $instance['instructors_order']: '';
		$num_fetch = isset($instance['num_fetch'])? $instance['num_fetch']: 3;
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_attr__('Title :', 'edugrade'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>		

		<!-- Post Category -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('instructors_order')); ?>"><?php echo esc_attr__('Instructors Order :', 'edugrade'); ?></label>		
			<select class="widefat" name="<?php echo esc_attr($this->get_field_name('instructors_order')); ?>" id="<?php echo esc_attr($this->get_field_id('instructors_order')); ?>">
					<option value="ASC" <?php if ($instructors_order == 'ASC'){ echo esc_attr__(' selected ','edugrade');} ?>><?php echo esc_attr__('ASC','edugrade'); ?></option>					
					<option value="DESC" <?php if ($instructors_order == 'DESC'){ echo esc_attr__(' selected ','edugrade');} ?>><?php echo esc_attr__('DESC','edugrade'); ?></option>					
			</select> 
		</p>
			
		<!-- Show Num --> 
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('num_fetch')); ?>"><?php echo esc_attr__('Num Fetch :', 'edugrade'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('num_fetch')); ?>" name="<?php echo esc_attr($this->get_field_name('num_fetch')); ?>" type="text" value="<?php echo esc_attr($num_fetch); ?>" />
		</p>
		<?php
	}
}