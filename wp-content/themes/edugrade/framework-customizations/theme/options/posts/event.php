<?php 
if (!defined( 'FW' )) die('Forbidden');

$options = array(
	'events-box' => array(
		'title'   => esc_attr__( 'Event Custom Fields', 'edugrade' ),
		'type'    => 'box',
		'priority' => 'high',
		'options' => array(
			'event_gallery'    => array(
				'label' => esc_attr__('Event Gallery', 'edugrade'),
				'desc'  => esc_attr__('Description', 'edugrade'),
				'type'  => 'multi-upload',
				'value' => array(),
				'help'  => esc_attr__('Help tip', 'edugrade'),
				/**
				 * If set to `true`, the option will allow to upload only images, and display a thumb of the selected one.
				 * If set to `false`, the option will allow to upload any file from the media library.
				 */
				'images_only' => true,
			),
		),
	),
);