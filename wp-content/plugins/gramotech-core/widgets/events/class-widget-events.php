<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
	
add_action( 'widgets_init', 'gramotech_events_widget' );
if( !function_exists('gramotech_events_widget') ){
	function gramotech_events_widget() {
		register_widget( 'Widget_Events' );
	}
}	
	
class Widget_Events extends WP_Widget {

	/**
	 * @internal
	 */
	public function __construct() {
		$widget_ops = array( 'description' => '' );
		parent::__construct( false, esc_attr__( 'GramoTech: Events Widget', 'edugrade' ), $widget_ops );
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		$category = $instance['category'];
		$num_fetch = $instance['num_fetch'];
		
		global $EM_Events,$bp;
		/* Get the Set Array of Events those */
		$EM_Events = EM_Events::get( array('category'=>$category, 'group'=>'this','scope'=>'all', 'limit' => $num_fetch, 'order' => 'DESC') );
		if($EM_Events <> ''){ 
			include( 'views/widget.php');
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
		$category = isset($instance['category'])? $instance['category']: '';
		$num_fetch = isset($instance['num_fetch'])? $instance['num_fetch']: 3;
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_attr__('Title :', 'edugrade'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>		

		<!-- Post Category -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('category')); ?>"><?php echo esc_attr__('Category :', 'edugrade'); ?></label>		
			<select class="widefat" name="<?php echo esc_attr($this->get_field_name('category')); ?>" id="<?php echo esc_attr($this->get_field_id('category')); ?>">
				<option value="" <?php if(empty($category)) echo esc_attr__(' selected ','edugrade'); ?>><?php echo esc_attr__('All', 'edugrade') ?></option>
				<?php 	
				$category_list = get_terms('event-categories');
				foreach($category_list as $term){ ?>
					<option value="<?php echo esc_attr($term->slug); ?>" <?php if ($category == $term->slug){ echo esc_attr__(' selected ','edugrade');} ?>><?php echo esc_attr($term->name); ?></option>				
					<?php 
				} ?>	
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