<?php
/**
 * Displays Header navigation
 */
	// navigation
	if( has_nav_menu('header_menu') ){
		$args = array(
			'menu'=>'',
			'menu_class'=> 'nav navbar-nav',
			'menu_id'=> '',
			'container'=> 'ul',
			'container_class'=> '',
			'container_id'=> '',
			'fallback_cb'=> '',
			'before'=> '',
			'after'=> '',
			'link_before'=> '',
			'link_after'=> '',
			'echo'=> 'true',
			'depth'=> '0',
			'walker'=> new gramotech_menu_walker(),
			'theme_location'=>'header_menu', 
			'items_wrap'=>'<ul id="%1$s" class="%2$s">%3$s</ul>', 	
			'item_spacing'=>'preserve'	 
		);
		wp_nav_menu( $args);
		
	}else{
		$args = array(
			'menu'=>'',
			'menu_class'=> 'nav navbar-nav',
			'menu_id'=> '',
			'container'=> 'ul',
			'container_class'=> '',
			'container_id'=> '',
			'fallback_cb'=> '',
			'echo'        => true,
			'show_home'   => true,
			'before'=> '',
			'after'=> '',
			'link_before'=> '',
			'link_after'=> '',
			'depth'=> '0',
			'items_wrap'=>'<ul id="%1$s" class="%2$s">%3$s</ul>', 	
			'item_spacing'=>'preserve'
		);
		wp_nav_menu( $args);
	}
?>