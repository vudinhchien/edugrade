<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(	
	'element_title'         => array(
		'label' => esc_attr__( 'Title', 'edugrade' ),
		'desc'  => esc_attr__( 'Awards Title', 'edugrade' ),
		'type'  => 'text',
	),
	'awards' => array(
		'label'         => esc_attr__( 'Awards', 'edugrade' ),
		'popup-title'   => esc_attr__( 'Add/Edit Awards', 'edugrade' ),
		'desc'          => esc_attr__( 'Here you can add, remove and edit Awards Element.', 'edugrade' ),
		'type'          => 'addable-popup',
		'template'      => '{{=award_value}}',
		'popup-options' => array(
			'award_value'   => array(
				'label' => esc_attr__( 'Award Value', 'edugrade' ),
				'desc'  => esc_attr__( 'Enter the Award value here', 'edugrade' ),
				'type'  => 'text'
			),
			'icon_class'   => array(
				'label' => esc_attr__( 'Icon Class', 'edugrade' ),
				'desc'  => esc_attr__( 'Enter Icon Class', 'edugrade' ),
				'type'  => 'text'
			),
		)
	)
);