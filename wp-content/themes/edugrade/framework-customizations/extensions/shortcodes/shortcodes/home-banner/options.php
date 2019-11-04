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
	'banner_style' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'banner_style1' => array(),
			'banner_style2' => array(),
		),
		'picker' => array(
			'gadget' => array(
				'label' => esc_attr__('Banner Style', 'edugrade'),
				'type'  => 'select',
				'choices' => array(
					'banner_style1' => esc_attr__('Banner Style 1', 'edugrade'),
					'banner_style2' => esc_attr__('Banner Style 2', 'edugrade'),
				),
				'desc' => esc_attr__('Description', 'edugrade'),
			)
		),
		'choices' => array(
			'banner_style1' => array(
				'bg_image' => array(
					'label' => esc_attr__( 'Background Image', 'edugrade' ),
					'desc'  => esc_attr__( 'Either upload a new, or choose an existing image from your media library', 'edugrade' ),
					'type'  => 'upload',
				),
				'video_id' => array(
					'label' => esc_attr__('Video Id (Youtube , Vimeo)', 'edugrade'),
					'type'  => 'text',
				),
				'banner_title' => array(
					'label' => esc_attr__('Banner Title', 'edugrade'),
					'type'  => 'text',
				),
				'banner_title2' => array(
					'label' => esc_attr__('Title 2', 'edugrade'),
					'type'  => 'text',
				),
				'caption' => array(
					'label' => esc_attr__('Caption', 'edugrade'),
					'type'  => 'text',
				),
			),
			'banner_style2' => array(
				'bg_image' => array(
					'label' => esc_attr__( 'Background Image', 'edugrade' ),
					'desc'  => esc_attr__( 'Either upload a new, or choose an existing image from your media library', 'edugrade' ),
					'type'  => 'upload',
				),
				'banner_title' => array(
					'label' => esc_attr__('Banner Title', 'edugrade'),
					'type'  => 'text',
				),
				'banner_title2' => array(
					'label' => esc_attr__('Title 2', 'edugrade'),
					'type'  => 'text',
				),
				'caption' => array(
					'label' => esc_attr__('Caption', 'edugrade'),
					'type'  => 'text',
				),
			),
		),
		'show_borders' => false,
	),
);
