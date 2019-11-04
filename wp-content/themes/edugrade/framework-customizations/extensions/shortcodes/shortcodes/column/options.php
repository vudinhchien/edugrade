<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'extra_custom_class' => array(
        'type' => 'text',
        'label' => esc_attr__('Column Class', 'edugrade'),
        'desc' => esc_attr__('Please add the Extra class for Column .', 'edugrade'),
    ),);