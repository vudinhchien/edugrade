<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'sidebar'    => array(
		'label'   => esc_attr__( 'Sidebar', 'edugrade' ),
		'desc'    => '',
		'type'    => 'select',
		'choices' => FW_Shortcode_Widget_Area::get_sidebars()
	),
	'responsive' => array(
		'attr'          => array( 'class' => 'fw-advanced-button' ),
		'type'          => 'popup',
		'label'         => esc_attr__( 'Responsive Behavior', 'edugrade' ),
		'button'        => esc_attr__( 'Settings', 'edugrade' ),
		'size'          => 'medium',
		'popup-options' => array(
			'desktop_display'          => array(
				'type'   => 'multi-picker',
				'label'  => false,
				'desc'   => false,
				'picker' => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_attr__( 'Desktop', 'edugrade' ),
						'desc'         => esc_attr__( 'Display this shortcode on desktop?', 'edugrade' ),
						'help'         => esc_attr__( 'Applies to devices with the resolution higher then 1200px (desktops and laptops)', 'edugrade' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_attr__( 'No', 'edugrade' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_attr__( 'Yes', 'edugrade' ),
						)
					),
				),
			),
			'tablet_landscape_display' => array(
				'type'   => 'multi-picker',
				'label'  => false,
				'desc'   => false,
				'picker' => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_attr__( 'Tablet Landscape', 'edugrade' ),
						'desc'         => esc_attr__( 'Display this shortcode on tablet landscape?', 'edugrade' ),
						'help'         => esc_attr__( 'Applies to devices with the resolution between 992px - 1199px (tablet landscape)', 'edugrade' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_attr__( 'No', 'edugrade' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_attr__( 'Yes', 'edugrade' ),
						)
					),
				),
			),
			'tablet_display'           => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_attr__( 'Tablet Portrait', 'edugrade' ),
						'desc'         => esc_attr__( 'Display this shortcode on tablet portrait?', 'edugrade' ),
						'help'         => esc_attr__( 'Applies to devices with the resolution between 768px - 991px (tablet portrait)', 'edugrade' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_attr__( 'No', 'edugrade' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_attr__( 'Yes', 'edugrade' ),
						)
					),
				),
				'choices' => array(),
			),
			'smartphone_display'       => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_attr__( 'Smartphone', 'edugrade' ),
						'desc'         => esc_attr__( 'Display this shortcode on smartphone?', 'edugrade' ),
						'help'         => esc_attr__( 'Applies to devices with the resolution up to 767px (smartphones both portrait and landscape as well as some low-resolution tablets)', 'edugrade' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_attr__( 'No', 'edugrade' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_attr__( 'Yes', 'edugrade' ),
						)
					),
				),
				'choices' => array(),
			),
		),
	),
	'class'      => array(
		'label' => esc_attr__( 'Custom Class', 'edugrade' ),
		'desc'  => esc_attr__( 'Enter custom CSS class', 'edugrade' ),
		'type'  => 'text',
		'value' => '',
	),
);