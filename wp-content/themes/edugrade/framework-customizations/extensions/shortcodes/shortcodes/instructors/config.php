<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_attr__( 'Instructors', 'edugrade' ),
	'description' => esc_attr__( 'Add Instructors element', 'edugrade' ),
	'tab'         => esc_attr__( 'Edugrade', 'edugrade' ),
	'popup_size'  => 'medium'
);