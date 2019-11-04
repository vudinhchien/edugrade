<?php

$cfg = array();

$cfg = array(
    'sidebar_positions' => array(
		'full' => array(
			'icon_url' => 'full.png',
			'sidebars_number' => 0
		),
		'left' => array(
			'icon_url' => 'left.png',
			'sidebars_number' => 1
		),
		'right' => array(
			'icon_url' => 'right.png',
			'sidebars_number' => 1
		),
	),
	'dynamic_sidebar_args' => array(
		'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-widget gramotech-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="side-title">',
		'after_title'   => '</h4>',
	),
	'show_in_post_types' => false
);