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
	'services_style' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'service-style1' => array(),
			'service-style2' => array(),
			'service-style3' => array(),
			'service-style4' => array(),
			'service-style5' => array(),
		),
		'picker' => array(
			'gadget' => array(
				'label' => esc_attr__('Services Style', 'edugrade'),
				'type'  => 'select',
				'choices' => array(
					'service-style1' => esc_attr__('Service Style 1', 'edugrade'),
					'service-style2' => esc_attr__('Service Style 2', 'edugrade'),
					'service-style3' => esc_attr__('Service Style 3', 'edugrade'),
					'service-style4' => esc_attr__('Service Style 4', 'edugrade'),
					'service-style5' => esc_attr__('Service Style 5', 'edugrade'),
				),
				'desc' => esc_attr__('Description', 'edugrade'),
			)
		),
		'choices' => array(
			'service-style1' => array(
				'services_cols' => array(
					'label' => esc_attr__('Services Columns', 'edugrade'),
					'type'  => 'select',
					'choices' => array(
						'col-md-6' => esc_attr__('2 Columns', 'edugrade'),
						'col-md-3' => esc_attr__('4 Columns', 'edugrade'),
					),
				),
				'services' => array(
					'label'         => esc_attr__( 'Services', 'edugrade' ),
					'popup-title'   => esc_attr__( 'Add/Edit Services', 'edugrade' ),
					'desc'          => esc_attr__( 'Here you can add, remove and edit your Services.', 'edugrade' ),
					'type'          => 'addable-popup',
					'template'      => '{{=service_title}}',
					'popup-options' => array(
						'service_title'   => array(
							'label' => esc_attr__( 'Service Title', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Title of the Service', 'edugrade' ),
							'type'  => 'text'
						),
						'content'       => array(
							'label' => esc_attr__( 'Service Content', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Service Content here', 'edugrade' ),
							'type'  => 'textarea',
						),
						'service_image' => array(
							'label' => esc_attr__( 'Service Image', 'edugrade' ),
							'desc'  => esc_attr__( 'Either upload a new, or choose an existing image from your media library', 'edugrade' ),
							'type'  => 'upload',
						)
					)
				)
			),
			'service-style2' => array(
				'element_title'   => array(
					'label' => esc_attr__( 'Element Title', 'edugrade' ),
					'desc'  => esc_attr__( 'Enter the Title of the Service', 'edugrade' ),
					'type'  => 'text'
				),
				'element_bg_image' => array(
					'label' => esc_attr__( 'Background Image', 'edugrade' ),
					'desc'  => esc_attr__( 'Either upload a new, or choose an existing image from your media library', 'edugrade' ),
					'type'  => 'upload',
				),
				'services' => array(
					'label'         => esc_attr__( 'Services', 'edugrade' ),
					'popup-title'   => esc_attr__( 'Add/Edit Services', 'edugrade' ),
					'desc'          => esc_attr__( 'Here you can add, remove and edit your Services.', 'edugrade' ),
					'type'          => 'addable-popup',
					'template'      => '{{=service_title}}',
					'popup-options' => array(
						'service_title'   => array(
							'label' => esc_attr__( 'Service Title', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Title of the Service', 'edugrade' ),
							'type'  => 'text'
						),
						'icon_class'   => array(
							'label' => esc_attr__( 'Svg Icon Class', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Icon Class', 'edugrade' ),
							'type'  => 'text'
						),
						'bg_color'   => array(
							'label' => esc_attr__( 'Background Color', 'edugrade' ),
							'desc'  => esc_attr__( 'Select Background Color', 'edugrade' ),
							'type'  => 'color-picker',
						),
					)
				)
			),
			'service-style3' => array(
				'services' => array(
					'label'         => esc_attr__( 'Services', 'edugrade' ),
					'popup-title'   => esc_attr__( 'Add/Edit Services', 'edugrade' ),
					'desc'          => esc_attr__( 'Here you can add, remove and edit your Services.', 'edugrade' ),
					'type'          => 'addable-popup',
					'template'      => '{{=service_title}}',
					'popup-options' => array(
						'service_title'   => array(
							'label' => esc_attr__( 'Service Title', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Title of the Service', 'edugrade' ),
							'type'  => 'text'
						),
						'icon_class'   => array(
							'label' => esc_attr__( 'Icon Class', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Icon Class', 'edugrade' ),
							'type'  => 'text'
						),
						'bg_color'   => array(
							'label' => esc_attr__( 'Background Color', 'edugrade' ),
							'desc'  => esc_attr__( 'Select Background Color', 'edugrade' ),
							'type'  => 'color-picker',
						),
						'external_link'   => array(
							'label' => esc_attr__( 'External Link Url', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the External Link Url', 'edugrade' ),
							'type'  => 'text'
						),
					)
				)
			),
			'service-style4' => array(
				'element_title'   => array(
					'label' => esc_attr__( 'Element Title', 'edugrade' ),
					'desc'  => esc_attr__( 'Enter the Title of the Service', 'edugrade' ),
					'type'  => 'text'
				),
				'content'       => array(
					'label' => esc_attr__( 'Element Description', 'edugrade' ),
					'desc'  => esc_attr__( 'Enter the Description here', 'edugrade' ),
					'type'  => 'textarea',
				),
				'external_btn_txt'   => array(
					'label' => esc_attr__( 'External Button Text', 'edugrade' ),
					'desc'  => esc_attr__( 'Enter the External Button Text of the Service', 'edugrade' ),
					'type'  => 'text'
				),
				'external_btn_url'   => array(
					'label' => esc_attr__( 'External Button Url', 'edugrade' ),
					'desc'  => esc_attr__( 'Enter the External Button Url of the Service', 'edugrade' ),
					'type'  => 'text'
				),
				'services' => array(
					'label'         => esc_attr__( 'Services', 'edugrade' ),
					'popup-title'   => esc_attr__( 'Add/Edit Services', 'edugrade' ),
					'desc'          => esc_attr__( 'Here you can add, remove and edit your Services.', 'edugrade' ),
					'type'          => 'addable-popup',
					'template'      => '{{=service_title}}',
					'popup-options' => array(
						'service_title'   => array(
							'label' => esc_attr__( 'Service Title', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Title of the Service', 'edugrade' ),
							'type'  => 'text'
						),
						'icon_class'   => array(
							'label' => esc_attr__( 'Svg Icon Class', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Icon Class', 'edugrade' ),
							'type'  => 'text'
						),
						'bg_color'   => array(
							'label' => esc_attr__( 'Background Color', 'edugrade' ),
							'desc'  => esc_attr__( 'Select Background Color', 'edugrade' ),
							'type'  => 'color-picker',
						),
					)
				)
			),
			'service-style5' => array(
				'services_cols' => array(
					'label' => esc_attr__('Services Columns', 'edugrade'),
					'type'  => 'select',
					'choices' => array(
						'col-md-4' => esc_attr__('3 Columns', 'edugrade'),
						'col-md-3' => esc_attr__('4 Columns', 'edugrade'),
					),
				),
				'services' => array(
					'label'         => esc_attr__( 'Services', 'edugrade' ),
					'popup-title'   => esc_attr__( 'Add/Edit Services', 'edugrade' ),
					'desc'          => esc_attr__( 'Here you can add, remove and edit your Services.', 'edugrade' ),
					'type'          => 'addable-popup',
					'template'      => '{{=service_title}}',
					'popup-options' => array(
						'service_title'   => array(
							'label' => esc_attr__( 'Service Title', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Title of the Service', 'edugrade' ),
							'type'  => 'text'
						),
						'content'       => array(
							'label' => esc_attr__( 'Service Content', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Service Content here', 'edugrade' ),
							'type'  => 'textarea',
						),
						'icon_class'   => array(
							'label' => esc_attr__( 'Icon Class', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Icon Class', 'edugrade' ),
							'type'  => 'text'
						),
						'bg_color'   => array(
							'label' => esc_attr__( 'Background Color', 'edugrade' ),
							'desc'  => esc_attr__( 'Select Background Color', 'edugrade' ),
							'type'  => 'color-picker',
						),
						
					)
				)
			),
		),
		'show_borders' => false,
	),
);