<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'heading_style' => array(
		'label' => esc_attr__('Heading Style', 'edugrade'),
		'type'  => 'select',
		'value' => array(),
		'desc' => esc_attr__('Select Heading Style.', 'edugrade'),
		'choices' => array(
			'style-1' => esc_attr__('Style 1', 'edugrade'),
			'style-2' => esc_attr__('Style 2', 'edugrade'),
			'style-3' => esc_attr__('Style 3', 'edugrade'),
		),
	),
	'title'    => array(
		'type'  => 'text',
		'label' => esc_attr__( 'Heading Title', 'edugrade' ),
		'desc'  => esc_attr__( 'Write the heading title content', 'edugrade' ),
	),
	'heading_color'   => array(
		'label' => esc_attr__( 'Heading Color', 'edugrade' ),
		'desc'  => esc_attr__( 'Select Heading Color', 'edugrade' ),
		'type'  => 'color-picker',
	),
);
