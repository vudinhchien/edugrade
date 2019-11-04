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
	'about_style' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'about-style1' => array(),
			'about-style2' => array(),
			'about-style3' => array(),
		),
		'picker' => array(
			'gadget' => array(
				'label' => esc_attr__('About Style', 'edugrade'),
				'type'  => 'select',
				'choices' => array(
					'about-style1' => esc_attr__('About Style 1', 'edugrade'),
					'about-style2' => esc_attr__('About Style 2', 'edugrade'),
					'about-style3' => esc_attr__('About Style 3', 'edugrade'),
				),
				'desc' => esc_attr__('Description', 'edugrade'),
			)
		),
		'choices' => array(
			'about-style1' => array(
				'about_title' => array(
					'label' => esc_attr__('About Title', 'edugrade'),
					'type'  => 'text',
				),
				'caption' => array(
					'label' => esc_attr__('caption', 'edugrade'),
					'type'  => 'text',
				),
				'content'  => array(
					'label' => esc_attr__( 'Content', 'edugrade' ),
					'desc'  => esc_attr__( 'Enter the Decription Content here', 'edugrade' ),
					'type'  => 'textarea',
				),
				'more-about' => array(
					'label' => esc_attr__('More About Text', 'edugrade'),
					'type'  => 'text',
				),
				'more-about-url' => array(
					'label' => esc_attr__('More About Url', 'edugrade'),
					'type'  => 'text',
				),
			),
			'about-style2' => array(
				'about_title' => array(
					'label' => esc_attr__('About Title', 'edugrade'),
					'type'  => 'text',
				),
				'content'  => array(
					'label' => esc_attr__( 'Content', 'edugrade' ),
					'desc'  => esc_attr__( 'Enter the Decription Content here', 'edugrade' ),
					'type'  => 'textarea',
				),
				'more_about' => array(
					'label' => esc_attr__('More About Text', 'edugrade'),
					'type'  => 'text',
				),
				'more_about_url' => array(
					'label' => esc_attr__('More About Url', 'edugrade'),
					'type'  => 'text',
				),
			),
			'about-style3' => array(
				'about_title' => array(
					'label' => esc_attr__('About Title', 'edugrade'),
					'type'  => 'text',
				),
				'about_caption' => array(
					'label' => esc_attr__('About Caption', 'edugrade'),
					'type'  => 'text',
				),
				'content'  => array(
					'label' => esc_attr__( 'Content', 'edugrade' ),
					'desc'  => esc_attr__( 'Enter the Decription Content here', 'edugrade' ),
					'type'  => 'textarea',
				),
				'video_title' => array(
					'label' => esc_attr__('Video Title', 'edugrade'),
					'type'  => 'text',
				),
				'video_url' => array(
					'label' => esc_attr__('Video Url', 'edugrade'),
					'type'  => 'text',
				),
				'about_image' => array(
					'label' => esc_attr__('About Image', 'edugrade'),
					'desc' => esc_attr__('Upload About Image from here.', 'edugrade'),
					'type' => 'upload',
				),
			),
		),
		'show_borders' => false,
	),
);
