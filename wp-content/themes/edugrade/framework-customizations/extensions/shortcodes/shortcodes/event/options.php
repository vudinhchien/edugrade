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
	'events_style' => array(
		'label' => esc_attr__('Events Style', 'edugrade'),
		'type'  => 'select',
		'value' => array(),
		'desc' => esc_attr__('Select Events Style.', 'edugrade'),
		'choices' => array(
			'style-1' => esc_attr__('Style 1', 'edugrade'),
			'style-2' => esc_attr__('Style 2', 'edugrade'),
			'style-3' => esc_attr__('Style 3', 'edugrade'),
		),
	),
	'element_title' => array(
		'label' => esc_attr__('Element Title', 'edugrade'),
		'desc' => esc_attr__('Add Element Title', 'edugrade'),
		'type' => 'text',
	),
	'event_category' => array(
        'type'       => 'multi-select',
        'label'      => esc_attr__( 'Select Event Categories', 'edugrade' ),
        'population' => 'taxonomy',
        'source'     => 'event-categories',
        'desc'       => esc_attr__( 'Show posts by category selection.','edugrade' ),
    ),
	'event_titles' => array(
		'label' => esc_attr__('Title Characters to fetch', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('This is a number of characters that you want to show on the post title.', 'edugrade'),
	),
	'fetch_events' => array(
		'label' => esc_attr__('Fetch Events', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('Specify the number of events you want to pull out.', 'edugrade'),
	),
	'events_order' => array(
		'label' => esc_attr__('Order', 'edugrade'),
		'type'  => 'select',
		'value' => array(),
		'desc' => esc_attr__('Select Events Order.', 'edugrade'),
		'choices' => array(
			'asc' => esc_attr__('Ascending', 'edugrade'),
			'desc' => esc_attr__('Descending', 'edugrade'),
		),
	),
);
