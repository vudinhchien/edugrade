<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_attr__( 'Mission/Vision', 'edugrade' ),
	'description' => esc_attr__( 'Add a Mission/Vision info element', 'edugrade' ),
	'tab'         => esc_attr__( 'Edugrade', 'edugrade' ),
	'popup_size'  => 'medium'
);