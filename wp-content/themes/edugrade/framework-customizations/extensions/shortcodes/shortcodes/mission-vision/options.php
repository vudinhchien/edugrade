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
	'mission_vision_style' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'style1' => array(),
			'style2' => array(),
		),
		'picker' => array(
			'gadget' => array(
				'label' => esc_attr__('Mission/Vision Style', 'edugrade'),
				'type'  => 'select',
				'choices' => array(
					'style1' => esc_attr__('Style 1', 'edugrade'),
					'style2' => esc_attr__('Style 2', 'edugrade'),
				),
				'desc' => esc_attr__('Description', 'edugrade'),
			)
		),
		'choices' => array(
			'style1' => array(
				'element_title' => array(
					'label' => esc_attr__('Element Title', 'edugrade'),
					'type'  => 'text',
				),
				'mission_vision' => array(
					'label'         => esc_attr__( 'Mission/Vision/History', 'edugrade' ),
					'popup-title'   => esc_attr__( 'Add/Edit Mission/Vision/History', 'edugrade' ),
					'desc'          => esc_attr__( 'Here you can add, remove and edit Mission/Vision/History Element.', 'edugrade' ),
					'type'          => 'addable-popup',
					'template'      => '{{=mission_vision_title}}',
					'popup-options' => array(
						'mission_vision_title'   => array(
							'label' => esc_attr__( 'Title', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Title here', 'edugrade' ),
							'type'  => 'text'
						),
						'content'       => array(
							'label' => esc_attr__( 'Description', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Description here', 'edugrade' ),
							'type'  => 'textarea',
						),
					)
				),
				'help_support_title'   => array(
					'label' => esc_attr__( 'Help & Support Title', 'edugrade' ),
					'desc'  => esc_attr__( 'Enter Help & Support Title here', 'edugrade' ),
					'type'  => 'text'
				),
				'help_support_no'   => array(
					'label' => esc_attr__( 'Help & Support Number', 'edugrade' ),
					'desc'  => esc_attr__( 'Enter Help & Support Number here', 'edugrade' ),
					'type'  => 'text'
				),
			),
			'style2' => array(
				'mission_vision' => array(
					'label'         => esc_attr__( 'Mission/Vision/History', 'edugrade' ),
					'popup-title'   => esc_attr__( 'Add/Edit Mission/Vision/History', 'edugrade' ),
					'desc'          => esc_attr__( 'Here you can add, remove and edit Mission/Vision/History Element.', 'edugrade' ),
					'type'          => 'addable-popup',
					'template'      => '{{=mission_vision_title}}',
					'popup-options' => array(
						'mission_vision_title'   => array(
							'label' => esc_attr__( 'Title', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Title here', 'edugrade' ),
							'type'  => 'text'
						),
						'icon_image' => array(
							'label' => esc_attr__( 'Icon Image', 'edugrade' ),
							'desc'  => esc_attr__( 'Either upload a new, or choose an existing image from your media library', 'edugrade' ),
							'type'  => 'upload',
						),
						'content'       => array(
							'label' => esc_attr__( 'Description', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Description here', 'edugrade' ),
							'type'  => 'textarea',
						),
					)
				)
			),
		),
		'show_borders' => false,
	),
);
