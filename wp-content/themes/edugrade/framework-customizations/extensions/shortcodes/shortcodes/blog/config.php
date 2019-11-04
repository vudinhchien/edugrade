<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_attr__( 'Blog', 'edugrade' ),
	'description' => esc_attr__( 'Add a blog element', 'edugrade' ),
	'tab'         => esc_attr__( 'Edugrade', 'edugrade' ),
	'popup_size'  => 'medium'
);