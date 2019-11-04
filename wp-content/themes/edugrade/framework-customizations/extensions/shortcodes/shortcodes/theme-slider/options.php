<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'carousel_slider' => array(
		'label'         => esc_attr__( 'Slide', 'edugrade' ),
		'popup-title'   => esc_attr__( 'Add/Edit Slide', 'edugrade' ),
		'desc'          => esc_attr__( 'Here you can add, remove and edit your Slides.', 'edugrade' ),
		'type'          => 'addable-popup',
		'template'      => '{{=slide_heading}}',
		'popup-options' => array(
			'slide_heading'   => array(
				'label' => esc_attr__( 'Heading', 'edugrade' ),
				'desc'  => esc_attr__( 'Enter the Heading of the slide', 'edugrade' ),
				'type'  => 'text'
			),
			'slide_caption'   => array(
				'label' => esc_attr__( 'Caption', 'edugrade' ),
				'desc'  => esc_attr__( 'Enter the Caption of the slide', 'edugrade' ),
				'type'  => 'text'
			),
			'read_more_txt'    => array(
				'label' => esc_attr__( 'Read More Button Text', 'edugrade' ),
				'desc'  => esc_attr__( 'Enter Read More Button Text', 'edugrade' ),
				'type'  => 'text'
			),
			'read_more_url'    => array(
				'label' => esc_attr__( 'Read More Button Url', 'edugrade' ),
				'desc'  => esc_attr__( 'Enter Read More Button Url', 'edugrade' ),
				'type'  => 'text'
			),
			'slide_image' => array(
				'label' => esc_attr__( 'Image', 'edugrade' ),
				'desc'  => esc_attr__( 'Either upload a new, or choose an existing image from your media library', 'edugrade' ),
				'type'  => 'upload',
			),
		)
	)
);