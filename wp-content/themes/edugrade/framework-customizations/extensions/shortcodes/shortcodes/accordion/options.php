<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'element_title'   => array(
		'type'  => 'text',
		'label' => esc_attr__('Element Title', 'edugrade')
	),
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_attr__( 'Tabs', 'edugrade' ),
		'popup-title'   => esc_attr__( 'Add/Edit Tabs', 'edugrade' ),
		'desc'          => esc_attr__( 'Create your tabs', 'edugrade' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'   => array(
				'type'  => 'text',
				'label' => esc_attr__('Title', 'edugrade')
			),
			'tab_content' => array(
				'type'  => 'textarea',
				'label' => esc_attr__('Content', 'edugrade')
			)
		)
	)
);