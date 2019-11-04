<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(	
	
	'instructor_style' => array(
		'label' => esc_attr__('Select Style', 'edugrade'),
		'type'  => 'select',
		'value' => array(),
		'desc' => esc_attr__('Select Style.', 'edugrade'),
		'choices' => array(
			'style-1' => esc_attr__('Style 1', 'edugrade'),
			'style-2' => esc_attr__('Style 2', 'edugrade'),
			'style-3' => esc_attr__('Style 3', 'edugrade'),
		),
	),
	'columns_layout' => array(
		'label' => esc_attr__('Select Columns', 'edugrade'),
		'type'  => 'select',
		'value' => array(),
		'desc' => esc_attr__('Select Columns.', 'edugrade'),
		'choices' => array(
			'col-md-4' => esc_attr__('3 Columns', 'edugrade'),
			'col-md-3' => esc_attr__('4 Colunms', 'edugrade'),
		),
	),
	'instructors_fetch' => array(
		'label' => esc_attr__('Fetch Instructors', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('Specify the number of instructors you want to pull out.', 'edugrade'),
	),
	'instructors_order' => array(
		'label' => esc_attr__('Order', 'edugrade'),
		'type'  => 'select',
		'value' => array(),
		'desc' => esc_attr__('Select Order.', 'edugrade'),
		'choices' => array(
			'asc' => esc_attr__('ASC', 'edugrade'),
			'desc' => esc_attr__('DESC', 'edugrade'),
		),
	),
	'instructors_pagination' => array(
		'label' => esc_attr__('Enable Pagination', 'edugrade'),
		'type'  => 'switch',
		'default'	=>	'disable',
		'left-choice' => array(
			'value' => 'enable',
			'label' => esc_attr__('Enable', 'edugrade'),
		),
		'right-choice' => array(
			'value' => 'disable',
			'label' => esc_attr__('Disable', 'edugrade'),
		),
	),
);