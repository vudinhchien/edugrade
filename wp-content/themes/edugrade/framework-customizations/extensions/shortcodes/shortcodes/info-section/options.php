<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'page_custom_class' => array(
        'type' => 'text',
        'label' => esc_attr__('Page Custom Class', 'edugrade'),
        'desc' => esc_attr__('Please add the page custom class.', 'edugrade'),
    ),
	'info_title'   => array(
		'label' => esc_attr__( 'Title', 'edugrade' ),
		'desc'  => esc_attr__( 'Enter the Title here', 'edugrade' ),
		'type'  => 'text'
	),
	'content'       => array(
		'label' => esc_attr__( 'Description', 'edugrade' ),
		'desc'  => esc_attr__( 'Enter the Description here', 'edugrade' ),
		'type'  => 'textarea',
	),
	'button_text'   => array(
		'label' => esc_attr__( 'Button Text', 'edugrade' ),
		'desc'  => esc_attr__( 'Enter the Button text here', 'edugrade' ),
		'type'  => 'text'
	),
	'button_url'   => array(
		'label' => esc_attr__( 'Button Url', 'edugrade' ),
		'desc'  => esc_attr__( 'Enter the Button Url here', 'edugrade' ),
		'type'  => 'text'
	),
	'video_image' => array(
		'label' => esc_attr__( 'Video Image', 'edugrade' ),
		'desc'  => esc_attr__( 'Either upload a new, or choose an existing image from your media library', 'edugrade' ),
		'type'  => 'upload',
	),
	'video_title'   => array(
		'label' => esc_attr__( 'Video Title', 'edugrade' ),
		'desc'  => esc_attr__( 'Enter the Video Title here', 'edugrade' ),
		'type'  => 'text'
	),
	'video_caption'   => array(
		'label' => esc_attr__( 'Video Caption', 'edugrade' ),
		'desc'  => esc_attr__( 'Enter the Video Caption here', 'edugrade' ),
		'type'  => 'text'
	),
	'video_url'   => array(
		'label' => esc_attr__( 'Video Url', 'edugrade' ),
		'desc'  => esc_attr__( 'Enter the Video Url here', 'edugrade' ),
		'type'  => 'text'
	),
	
);
