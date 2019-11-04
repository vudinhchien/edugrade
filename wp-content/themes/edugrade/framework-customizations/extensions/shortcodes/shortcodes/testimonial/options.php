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
	'testimonial_title'   => array(
		'label' => esc_attr__( 'Title', 'edugrade' ),
		'desc'  => esc_attr__( 'Enter the Title here', 'edugrade' ),
		'type'  => 'text'
	),
	'testimonial_caption'   => array(
		'label' => esc_attr__( 'Caption', 'edugrade' ),
		'desc'  => esc_attr__( 'Enter the Caption here', 'edugrade' ),
		'type'  => 'text'
	),
	'testimonial_designation'   => array(
		'label' => esc_attr__( 'Designation', 'edugrade' ),
		'desc'  => esc_attr__( 'Enter the Designation here', 'edugrade' ),
		'type'  => 'text'
	),
	'testimonial_image' => array(
		'label' => esc_attr__( 'Testimonial Image', 'edugrade' ),
		'desc'  => esc_attr__( 'Either upload a new, or choose an existing image from your media library', 'edugrade' ),
		'type'  => 'upload',
	),
	'content'       => array(
		'label' => esc_attr__( 'Description', 'edugrade' ),
		'desc'  => esc_attr__( 'Enter the Description here', 'edugrade' ),
		'type'  => 'textarea',
	),
);
