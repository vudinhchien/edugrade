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
	'gallery_style' => array(
		'label' => esc_attr__('Gallery Style', 'edugrade'),
		'type'  => 'select',
		'value' => array(),
		'desc' => esc_attr__('Select Gallery Style.', 'edugrade'),
		'choices' => array(
			'grid_view' => esc_attr__('Grid View', 'edugrade'),
			'masonry_view' => esc_attr__('Masonry View', 'edugrade'),
		),
	),
	'gallery_category' => array(
        'type'       => 'multi-select',
        'label'      => esc_attr__( 'Select Gallery Categories', 'edugrade' ),
        'population' => 'taxonomy',
        'source'     => 'gallery_category',
        'desc'       => esc_attr__( 'Show posts by category selection.','edugrade' ),
    ),
	'gallery_fetch' => array(
		'label' => esc_attr__('Fetch Posts', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('Specify the number of posts you want to pull out.', 'edugrade'),
	),
	'gallery_order_by' => array(
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
	'gallery_order' => array(
		'label' => esc_attr__('Order', 'edugrade'),
		'type'  => 'select',
		'value' => array(),
		'desc' => esc_attr__('Select Order.', 'edugrade'),
		'choices' => array(
			'asc' => esc_attr__('ASC', 'edugrade'),
			'desc' => esc_attr__('DESC', 'edugrade'),
		),
	),
	'gallery_pagination' => array(
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