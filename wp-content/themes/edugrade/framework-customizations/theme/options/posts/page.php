<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$options = array(
    'page-box' => array(
		'title'   => esc_attr__( 'Page Settings', 'edugrade' ),
		'type'    => 'box',
		'options' => array(
			'sub_header_status' => array(
				'type'  => 'multi-picker',
				'label' => false,
				'desc'  => false,
				'value' => array(
					'gadget' => 'enable',
					'enable' => array(
						'sub_header_image' => '',
						'page_caption' => '',
						'page_extra_class' => '',
					),
					'disable' => array(),
				),
				'picker' => array(
					'gadget' => array(
						'label' => esc_attr__('Sub Header', 'edugrade'),
						'type'  => 'switch',
						'left-choice' => array(
							'value' => 'enable',
							'label' => esc_attr__('Enable', 'edugrade'),
						),
						'right-choice' => array(
							'value' => 'disable',
							'label' => esc_attr__('Disable', 'edugrade'),
						),
						'desc' => esc_attr__('Enable/Disable Sub Header From here.', 'edugrade'),
					)
				),
				'choices' => array(
					'enable' => array(
						'sub_header_image' => array(
							'label' => esc_attr__('Sub Header Image', 'edugrade'),
							'type'  => 'upload',
							'value' => '',
							'desc' => esc_attr__('Upload Subheader Image from here.', 'edugrade'),
						),
						'page_caption' => array(
							'label' => esc_attr__('Add Page Caption', 'edugrade'),
							'type'  => 'text',
							'desc' => esc_attr__('Add Page Caption for sub header from here.', 'edugrade'),
						),
						'page_extra_class' => array(
							'label' => esc_attr__('Add Extra Class for page', 'edugrade'),
							'type'  => 'text',
							'desc' => esc_attr__('Add Extra Class for page from here.', 'edugrade'),
						),
						'sub_header_bottom_space' => array(
							'label' => esc_attr__('Sub Header Bottom Space', 'edugrade'),
							'type'  => 'select',
							'value' => array(),
							'desc' => esc_attr__('Enable/Disable Sub header bottom space from here.', 'edugrade'),
							'choices' => array(
								'enable' => esc_attr__('Enable', 'edugrade'),
								'disable' => esc_attr__('Disable', 'edugrade'),
							),
						),
						
					),
					'disable' => array(),
				),
				
				'show_borders' => false,
				
			),
		)
	),
);