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
	'blog_post' => array(
		'type'  => 'select',
		'label'      => esc_attr__( 'Select Post', 'edugrade' ),
		'population' => 'array',
		'choices' => gramotech_fetch_posts_dropdown('post'),
		'desc'       => esc_attr__( 'Show post by post selection.','edugrade' ),
	),
);