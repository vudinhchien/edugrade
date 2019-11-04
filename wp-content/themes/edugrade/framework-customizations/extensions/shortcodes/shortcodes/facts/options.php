<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'facts_style' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'value' => array(
			'style-1' => array(),
			'style-2' => array(),
		),
		'picker' => array(
			'gadget' => array(
				'label' => esc_attr__('Facts Style', 'edugrade'),
				'type'  => 'select',
				'choices' => array(
					'style-1' => esc_attr__('Style 1', 'edugrade'),
					'style-2' => esc_attr__('Style 2', 'edugrade'),
				),
				'desc' => esc_attr__('Description', 'edugrade'),
			)
		),
		'choices' => array(
			'style-1' => array(
				'facts' => array(
					'label'         => esc_attr__( 'Facts', 'edugrade' ),
					'popup-title'   => esc_attr__( 'Add/Edit facts', 'edugrade' ),
					'desc'          => esc_attr__( 'Here you can add, remove and edit Facts Element.', 'edugrade' ),
					'type'          => 'addable-popup',
					'template'      => '{{=fact_title}}',
					'popup-options' => array(
						'fact_title'   => array(
							'label' => esc_attr__( 'Fact Title', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Title here', 'edugrade' ),
							'type'  => 'text'
						),
						'fact_count' => array(
							'label' => esc_attr__( 'Fact Count', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter fact count from here', 'edugrade' ),
							'type'  => 'text',
						),
						'icon_class'   => array(
							'label' => esc_attr__( 'Icon Class', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Icon Class', 'edugrade' ),
							'type'  => 'text'
						),
					),
				),
			),
			'style-2' => array(
				'fact_bg_image'   => array(
					'label' => esc_attr__( 'Fact Bg Image', 'edugrade' ),
					'desc'  => esc_attr__( 'Fact Background Image', 'edugrade' ),
					'type'  => 'upload'
				),
				'facts' => array(
					'label'         => esc_attr__( 'Facts', 'edugrade' ),
					'popup-title'   => esc_attr__( 'Add/Edit facts', 'edugrade' ),
					'desc'          => esc_attr__( 'Here you can add, remove and edit Facts Element.', 'edugrade' ),
					'type'          => 'addable-popup',
					'template'      => '{{=fact_title}}',
					'popup-options' => array(
						'fact_title'   => array(
							'label' => esc_attr__( 'Fact Title', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter the Title here', 'edugrade' ),
							'type'  => 'text'
						),
						'fact_count' => array(
							'label' => esc_attr__( 'Fact Count', 'edugrade' ),
							'desc'  => esc_attr__( 'Enter fact count from here', 'edugrade' ),
							'type'  => 'text',
						),
					),
				),
			),
		),
		'show_borders' => false,
	),
);