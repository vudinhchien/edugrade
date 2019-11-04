<?php 
if (!defined( 'FW' )) die('Forbidden');

$options = array(
	'gallery-box' => array(
		'title'   => esc_attr__( 'Gallery Custom Fields', 'edugrade' ),
		'type'    => 'box',
		'options' => array(
			'gallery-header-bg-image' => array(
				'label' => esc_attr__( 'Header Background Image', 'edugrade' ),
				'desc'  => esc_attr__( 'Click here to Upload the Header Background Image.', 'edugrade' ),
				'type'  => 'upload'
			),
		),
	),
);