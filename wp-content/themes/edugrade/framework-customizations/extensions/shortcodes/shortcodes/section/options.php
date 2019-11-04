<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
		'general' => array(
			'title' =>  esc_attr__('General', 'edugrade'),
			'type' => 'tab',
			'options' => array(
				'custom_id' => array(
					'label' => esc_attr__('Custom ID', 'edugrade'),
					'desc' => esc_attr__('Add Custom ID', 'edugrade'),
					'type' => 'text',
				),
				'custom_classes' => array(
					'label' => esc_attr__('Custom Classes', 'edugrade'),
					'desc' => esc_attr__('Add Custom Classes', 'edugrade'),
					'type' => 'text',
				),
				'fullwidth' => array(
					'type'  => 'switch',
					'value' => 'no',
					'left-choice' => array(
						'value' => 'no',
						'label' => esc_attr__('No', 'edugrade'),
					),
					'right-choice' => array(
						'value' => 'yes',
						'label' => esc_attr__('Yes', 'edugrade'),
					),
					'label' => esc_attr__('Full Width', 'edugrade'),
					'desc'  => esc_attr__('Select Section Width', 'edugrade'),
				),
			),
		),
		'background' => array(
			'title' =>  esc_attr__('Background', 'edugrade'),
			'type' => 'tab',
			'options' => array(
				'background-option' => array(
					'type'  => 'multi-picker',
					'label' => false,
					'desc'  => false,
					'value' => array(
						'background-color' => array(),
						'background-image' => array(),
						'background-video' => array(),
					),
					'picker' => array(
						'gadget' => array(
							'label' => esc_attr__('Background Type', 'edugrade'),
							'type'  => 'select',
							'choices' => array(
								'background-color' => esc_attr__('Background Color', 'edugrade'),
								'background-image' => esc_attr__('Background Image', 'edugrade'),
								'background-video' => esc_attr__('Background Video', 'edugrade'),
							),
							'desc' => esc_attr__('Description', 'edugrade'),
						)
					),
					'choices' => array(
						'background-color' => array(
							'bg_color' => array(
								'label' => esc_attr__('Background Color', 'edugrade'),
								'type'  => 'color-picker',
								'value' => '',
								'desc' => esc_attr__('Select Background Color from here.', 'edugrade'),
							),
						),
						'background-image' => array(
							'bg_image' => array(
								'label' => esc_attr__('Background Image', 'edugrade'),
								'desc' => esc_attr__('Please select the background image', 'edugrade'),
								'type' => 'background-image'
							),
							'bg_color' => array(
								'label' => esc_attr__('Background Color', 'edugrade'),
								'type'  => 'color-picker',
								'value' => '',
								'desc' => esc_attr__('Select Background from here.', 'edugrade'),
							),
							'bg_opacity' => array(
								'label' => esc_attr__('Background Opacity', 'edugrade'),
								'type'  => 'slider',
								'properties' => array(
									'min' => 0,
									'max' => 1,
									'step' => 0.1, // Set slider step. Always > 0. Could be fractional.
								),
								'desc' => esc_attr__('Set Background Opacity from here', 'edugrade'),
							),
							'bg_repeat' => array(
								'type' => 'select',
								'value' => 'no-repeat',
								'attr' => array(),
								'label' => esc_attr__('Background Repeat', 'edugrade'),
								'desc' => esc_attr__('Repeat Background', 'edugrade'),
								'choices' => array(
									'no-repeat' => esc_attr__('No Repeat', 'edugrade'),
									'repeat' => esc_attr__('Repeat', 'edugrade'),
									'repeat-x' => esc_attr__('Repeat X', 'edugrade'),
									'repeat-y' => esc_attr__('Repeat Y', 'edugrade'),
								),
							),
							'bg_size' => array(
								'type' => 'select',
								'value' => 'initial',
								'attr' => array(),
								'label' => esc_attr__('Background Size', 'edugrade'),
								'desc' => esc_attr__('Background Size', 'edugrade'),
								'choices' => array(
									'auto' => esc_attr__('Auto', 'edugrade'),
									'initial' => esc_attr__('Initial', 'edugrade'),
									'cover' => esc_attr__('Cover', 'edugrade'),
									'contain' => esc_attr__('Contain', 'edugrade'),
								),
							),
						),
						'background-video' => array(
							'video-settings' => array(
								'type'         => 'multi-picker',
								'label'        => false,
								'desc'         => false,
								'picker'       => array(
									'gadget' => array(
										'label'   => esc_attr__( 'Post Format', 'edugrade' ),
										'desc'   => esc_attr__( 'Select Post Format', 'edugrade' ),
										'type'    => 'radio',
										'value'    => 'youtube',
										'choices' => array(
											'youtube'  => esc_attr__( 'Youtube', 'edugrade' ),
											'uploaded' => esc_attr__( 'Video', 'edugrade' ),
										),
										'inline' => true,
									)
								),
								'choices'      => array(
									'youtube'  => array(
										'video' => array(
											'label' => '',
											'desc'  => esc_attr__( 'Insert a YouTube video URL', 'edugrade' ),
											'type'  => 'text',
										),
									),
									'uploaded' => array(
										'video' => array(
											'label'       => '',
											'desc'        => esc_attr__( 'Upload a video', 'edugrade' ),
											'images_only' => false,
											'type'        => 'upload',
										),
									),
								)
							),
						),
					),
					'show_borders' => false,
				),
			)
		),
		'padding' => array(
			'title' =>  esc_attr__('Padding', 'edugrade'),
			'type' => 'tab',
			'options' => array(
				'padding_top' => array(
					'type' => 'text',
					'value' => '',
					'label' => esc_attr__('Padding Top', 'edugrade'),
					'desc' => esc_attr__('add padding top (ie:50)', 'edugrade'),
				),
				'padding_right' => array(
					'type' => 'text',
					'value' => '',
					'label' => esc_attr__('Padding Right', 'edugrade'),
					'desc' => esc_attr__('add padding Right (ie:50)', 'edugrade'),
				),
				'padding_bottom' => array(
					'type' => 'text',
					'value' => '',
					'label' => esc_attr__('Padding Bottom', 'edugrade'),
					'desc' => esc_attr__('add padding bottom (ie:50)', 'edugrade'),
				),
				'padding_left' => array(
					'type' => 'text',
					'value' => '',
					'label' => esc_attr__('Padding Left', 'edugrade'),
					'desc' => esc_attr__('add padding left (ie:50)', 'edugrade'),
				),
			),
		),
		'margin' => array(
			'title' =>  esc_attr__('Margin', 'edugrade'),
			'type' => 'tab',
			'options' => array(
				'margin_top' => array(
					'type' => 'text',
					'value' => '',
					'label' => esc_attr__('Margin Top', 'edugrade'),
					'desc' => esc_attr__('add Margin top (ie:50)', 'edugrade'),
				),
				'margin_right' => array(
					'type' => 'text',
					'value' => '',
					'label' => esc_attr__('Margin Right', 'edugrade'),
					'desc' => esc_attr__('add Margin Right (ie:50)', 'edugrade'),
				),
				'margin_bottom' => array(
					'type' => 'text',
					'value' => '',
					'label' => esc_attr__('Margin Bottom', 'edugrade'),
					'desc' => esc_attr__('add Margin bottom (ie:50)', 'edugrade'),
				),
				'margin_left' => array(
					'type' => 'text',
					'value' => '',
					'label' => esc_attr__('Margin Left', 'edugrade'),
					'desc' => esc_attr__('add Margin left (ie:50)', 'edugrade'),
				),
			),
		),
		
);