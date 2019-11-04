<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_attr__( 'Accordion', 'edugrade' ),
	'description' => esc_attr__( 'Add an Accordion', 'edugrade' ),
	'tab'         => esc_attr__( 'Edugrade', 'edugrade' ),
);