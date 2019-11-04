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
	'course_category' => array(
        'type'       => 'multi-select',
        'label'      => esc_attr__( 'Select Course Categories', 'edugrade' ),
        'population' => 'taxonomy',
        'source'     => 'course_category',
        'desc'       => esc_attr__( 'Show posts by category selection.','edugrade' ),
    ),
	'course_style' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'featured-courses' => array(),
			'courses-grid' => array(),
			'courses-grid-modern' => array(),
			'courses-list' => array(),
		),
		'picker' => array(
			'gadget' => array(
				'label' => esc_attr__('Courses Style', 'edugrade'),
				'type'  => 'select',
				'choices' => array(
					'featured-courses' => esc_attr__('Featured Courses', 'edugrade'),
					'courses-grid' => esc_attr__('Courses Grid', 'edugrade'),
					'courses-grid-modern' => esc_attr__('Courses Grid Modern', 'edugrade'),
					'courses-list' => esc_attr__('Courses List', 'edugrade'),
				),
				'desc' => esc_attr__('Description', 'edugrade'),
			)
		),
		'choices' => array(
			'featured-courses' => array(
				'heading' => array(
					'label' => esc_attr__('Heading', 'edugrade'),
					'type'  => 'text',
				),
			),
			'courses-grid' => array(
				'columns_layout' => array(
					'label' => esc_attr__('Select Columns', 'edugrade'),
					'type'  => 'select',
					'value' => array(),
					'desc' => esc_attr__('Select Columns.', 'edugrade'),
					'choices' => array(
						'col-md-6' => esc_attr__('2 Column', 'edugrade'),
						'col-md-4' => esc_attr__('3 Column', 'edugrade'),
						'col-md-3' => esc_attr__('4 Column', 'edugrade'),
					),
				),
			),
			'courses-list' => array(
				'columns_layout' => array(
					'label' => esc_attr__('Select Columns', 'edugrade'),
					'type'  => 'select',
					'value' => array(),
					'desc' => esc_attr__('Select Columns.', 'edugrade'),
					'choices' => array(
						'full-width' => esc_attr__('1 Column', 'edugrade'),
						'col-md-6' => esc_attr__('2 Column', 'edugrade'),
					),
				),
			),
		),
		'show_borders' => false,
	),
	'courses_titles' => array(
		'label' => esc_attr__('Title Characters to fetch', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('Please Enter number of characters that you want to show for the post title.', 'edugrade'),
	),
	'courses_descrp' => array(
		'label' => esc_attr__('Description Characters to fetch', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('This is a number of characters that you want to show on the post description.', 'edugrade'),
	),
	'courses_fetch' => array(
		'label' => esc_attr__('Fetch Posts', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('Specify the number of posts you want to pull out.', 'edugrade'),
	),
	'courses_order_by' => array(
		'label' => esc_attr__('Order By', 'edugrade'),
		'type'  => 'select',
		'value' => array(),
		'desc' => esc_attr__('Select Order By.', 'edugrade'),
		'choices' => array(
			'publish_date' => esc_attr__('Publish date', 'edugrade'),
			'title' => esc_attr__('Title', 'edugrade'),
			'random' => esc_attr__('Random', 'edugrade'),
		),
	),
	'courses_order' => array(
		'label' => esc_attr__('Order', 'edugrade'),
		'type'  => 'select',
		'value' => array(),
		'desc' => esc_attr__('Select Order.', 'edugrade'),
		'choices' => array(
			'asc' => esc_attr__('ASC', 'edugrade'),
			'desc' => esc_attr__('DESC', 'edugrade'),
		),
	),
	'courses_pagination' => array(
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