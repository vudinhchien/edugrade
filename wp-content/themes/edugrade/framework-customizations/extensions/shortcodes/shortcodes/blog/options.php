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
	'blog_category' => array(
        'type'       => 'multi-select',
        'label'      => esc_attr__( 'Select Posts Categories', 'edugrade' ),
        'population' => 'taxonomy',
        'source'     => 'category',
        'desc'       => esc_attr__( 'Show posts by category selection.','edugrade' ),
    ),
	'blog_style' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'blog-modern' => array(),
			'blog-grid' => array(),
			'blog-list' => array(),
			'blog-full' => array(),
			'blog-videos' => array(),
			'blog-grid2' => array(),
		),
		'picker' => array(
			'gadget' => array(
				'label' => esc_attr__('Blog Style', 'edugrade'),
				'type'  => 'select',
				'choices' => array(
					'blog-modern' => esc_attr__('Blog Modern', 'edugrade'),
					'blog-grid' => esc_attr__('Blog Grid', 'edugrade'),
					'blog-list' => esc_attr__('Blog List', 'edugrade'),
					'blog-Full' => esc_attr__('Blog Full', 'edugrade'),
					'blog-videos' => esc_attr__('Blog Videos(Campus Tour)', 'edugrade'),
					'blog-grid2' => esc_attr__('Blog Grid Modern', 'edugrade'),
				),
				'desc' => esc_attr__('Description', 'edugrade'),
			)
		),
		'choices' => array(
			'blog-modern' => array(
				'heading' => array(
					'label' => esc_attr__('Heading', 'edugrade'),
					'type'  => 'text',
				),
				'external-link-txt' => array(
					'label' => esc_attr__('External Link text', 'edugrade'),
					'type'  => 'text',
				),
				'external-link-url' => array(
					'label' => esc_attr__('External Link Url', 'edugrade'),
					'type'  => 'text',
				),
			),
			'blog-grid' => array(
				'blog_columns' => array(
					'label' => esc_attr__('Columns', 'edugrade'),
					'type'  => 'select',
					'value' => array(),
					'desc' => esc_attr__('Select Columns', 'edugrade'),
					'choices' => array(
						'col-md-4' => esc_attr__('3 Columns', 'edugrade'),
						'col-md-3' => esc_attr__('4 columns', 'edugrade'),
					),
				),
			),
			'blog-videos' => array(
				'blog_columns' => array(
					'label' => esc_attr__('Columns', 'edugrade'),
					'type'  => 'select',
					'value' => array(),
					'desc' => esc_attr__('Select Columns', 'edugrade'),
					'choices' => array(
						'col-md-12' => esc_attr__('1 Column', 'edugrade'),
						'col-md-4' => esc_attr__('3 Columns', 'edugrade'),
						'col-md-3' => esc_attr__('4 columns', 'edugrade'),
					),
				),
			),
		),
		'show_borders' => false,
	),
	'blog_titles' => array(
		'label' => esc_attr__('Title Characters to fetch', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('Please Enter number of characters that you want to show for the post title.', 'edugrade'),
	),
	'blog_descrp' => array(
		'label' => esc_attr__('Description Characters to fetch', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('This is a number of characters that you want to show on the post description.', 'edugrade'),
	),
	'blogs_fetch' => array(
		'label' => esc_attr__('Fetch Posts', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('Specify the number of posts you want to pull out.', 'edugrade'),
	),
	'blog_order_by' => array(
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
	'blog_order' => array(
		'label' => esc_attr__('Order', 'edugrade'),
		'type'  => 'select',
		'value' => array(),
		'desc' => esc_attr__('Select Order.', 'edugrade'),
		'choices' => array(
			'asc' => esc_attr__('ASC', 'edugrade'),
			'desc' => esc_attr__('DESC', 'edugrade'),
		),
	),
	'blog_pagination' => array(
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