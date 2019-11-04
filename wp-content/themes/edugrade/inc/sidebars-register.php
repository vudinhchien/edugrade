<?php
/**
 * Register widget area.
*/

	function gramotech_widgets_init() {
		
		if(function_exists('fw_get_db_settings_option')){
			$footer_col_layout = fw_get_db_settings_option('footer_col_layout');
			if($footer_col_layout == ''){
				$footer_col_layout = 'col-md-4';
			}
		} else {
			$footer_col_layout = 'col-md-4';
		}
		
		register_sidebar( array(
			'name'          => esc_attr__( 'Blog Sidebar', 'edugrade' ),
			'id'            => 'default-sidebar',
			'description'   => esc_attr__( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'edugrade' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-widget gramotech-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="side-title">',
			'after_title'   => '</h4>',
		) );

		register_sidebar( array(
			'name'          => esc_attr__( 'Footer', 'edugrade' ),
			'id'            => 'sidebar-footer',
			'description'   => esc_attr__( 'Add widgets here to appear in your footer.(col-md-4 each sidebar)', 'edugrade' ),
			'before_widget' => '<div id="%1$s" class=" col-md-4 col-sm-6 %2$s"><div class="widget">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
		
		register_sidebar( array(
			'name'          => esc_attr__( 'Footer2', 'edugrade' ),
			'id'            => 'sidebar-footer2',
			'description'   => esc_attr__( 'Add widgets here to appear in your footer.(col-md-2 each sidebar) Default', 'edugrade' ),
			'before_widget' => '<div id="%1$s" class="col-md-2 col-sm-6 %2$s"><div class="widget">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
		
		register_sidebar( array(
			'name'          => esc_attr__( 'Footer3', 'edugrade' ),
			'id'            => 'sidebar-footer3',
			'description'   => esc_attr__( 'Add widgets here to appear in your footer.(col-md-4 each sidebar)', 'edugrade' ),
			'before_widget' => '<div id="%1$s" class="col-md-4 col-sm-6 %2$s"><div class="widget">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
		
	}
	add_action( 'widgets_init', 'gramotech_widgets_init' );
?>