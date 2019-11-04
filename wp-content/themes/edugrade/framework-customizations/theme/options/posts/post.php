<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
	'post-box' => array(
		'title' => esc_attr__('Post Custom Fields', 'edugrade'),
		'type' => 'box',
		'options' => array(
			'post-caption' => array(
				'type' => 'text',
				'label' => esc_attr__('Post Caption', 'edugrade'),
				'desc' => esc_attr__('Please add post caption here.', 'edugrade'),
			),
			'post-settings' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'gadget' => array(
						'label'   => esc_attr__( 'Post Format', 'edugrade' ),
						'desc'   => esc_attr__( 'Select Post Format', 'edugrade' ),
						'type'    => 'radio',
						'value'    => 'image',
						'choices' => array(
							'image' => esc_attr__('Image', 'edugrade'),
							'gallery' => esc_attr__('Image Slider', 'edugrade'),
							'youtube-video' => esc_attr__('Youtube Video', 'edugrade'),
							'soundcloud-audio' => esc_attr__('Audio', 'edugrade'),
						),
						'inline' => true,
					)
				),
				'choices'      => array(
					'image'  => array(
						'post_image' => array(
							'type' => 'html',
							'html' => 'Featured Image',
							'desc' => esc_attr__('Please add featured image.', 'edugrade'),
							'images_only' => true,
						),
					),
					'gallery'  => array(
						'post_post_gallery' => array(
							'type' => 'multi-upload',
							'label' => esc_attr__('Add Image Slider', 'edugrade'),
							'desc' => esc_attr__('Add Image Slider for this post.', 'edugrade'),
							'images_only' => true,
						),
					),
					'youtube-video'  => array(
						'youtube_video_link' => array(
							'type' => 'text',
							'label' => esc_attr__('Youtube Video Link', 'edugrade'),
							'desc' => esc_attr__('Please add youtube video url here.', 'edugrade'),
						),
					),
					'soundcloud-audio'  => array(
						'soundcloud_audio_embed' => array(
							'type' => 'textarea',
							'label' => esc_attr__('Soundcloud Audio Embed Code', 'edugrade'),
							'desc' => esc_attr__('Please add Soundcloud Complete Audio Embed Code here.', 'edugrade'),
						),
					),
				)
			),
		)
	), 
);