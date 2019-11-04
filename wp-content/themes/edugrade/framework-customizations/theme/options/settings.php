<?php 
if (!defined( 'FW' )) die('Forbidden');

$options = array(
    'general' => array(
        'title' =>  esc_attr__('General', 'edugrade'),
        'type' => 'tab',
        'options' => array(
			'general-box' => array(
				'title' =>  esc_attr__('Logo Panel', 'edugrade'),
				'type' => 'tab',
				'options' => array(
					'logo' => array(
						'label' => esc_attr__('Logo', 'edugrade'),
						'desc' => esc_attr__('Upload your logo from here.', 'edugrade'),
						'type' => 'upload',
					),
					'favicon' => array(
						'label' => esc_attr__('Favicon', 'edugrade'),
						'desc' => esc_attr__('Upload favicon Image from here.', 'edugrade'),
						'type' => 'upload',
					),
					'logo_width' => array(
						'label' => esc_attr__('Logo Width', 'edugrade'),
						'type'  => 'slider',
						'properties' => array(
							'min' => 0,
							'max' => 500,
							'step' => 1, // Set slider step. Always > 0. Could be fractional.
						),
						'desc' => esc_attr__('Set logo width from here.(px)', 'edugrade'),
					),
					'logo_height' => array(
						'label' => esc_attr__('Logo Height', 'edugrade'),
						'type'  => 'slider',
						'properties' => array(
							'min' => 0,
							'max' => 500,
							'step' => 1, // Set slider step. Always > 0. Could be fractional.
						),
						'desc' => esc_attr__('Set logo height from here.(px)', 'edugrade'),
					),
					'logo_margin_top' => array(
						'label' => esc_attr__('Logo Top Margin', 'edugrade'),
						'type'  => 'slider',
						'properties' => array(
							'min' => 0,
							'max' => 500,
							'step' => 1, // Set slider step. Always > 0. Could be fractional.
						),
						'desc' => esc_attr__('Set logo Top Margin from here.(px)', 'edugrade'),
					),
					'logo_margin_bottom' => array(
						'label' => esc_attr__('Logo Bottom Margin', 'edugrade'),
						'type'  => 'slider',
						'properties' => array(
							'min' => 0,
							'max' => 500,
							'step' => 1, // Set slider step. Always > 0. Could be fractional.
						),
						'desc' => esc_attr__('Set logo Bottom Margin from here.(px)', 'edugrade'),
					),
				),
			),
			'header-box' => array(
				'title' =>  esc_attr__('Header Settings', 'edugrade'),
				'type' => 'tab',
				'options' => array(
					'header_style' => array(
						'label' => esc_attr__('Select Header Style', 'edugrade'),
						'desc'  => esc_attr__('Select Header Style from the given Options', 'edugrade'),
						'type'  => 'select',
						'value' => '',
						'choices' => array(
							'' => '---',
							'header-1' => esc_attr__('Header Style 1', 'edugrade'),
							'header-2' => esc_attr__('Header Style 2', 'edugrade'),
						),
					),
					'apply_button_text' => array(
						'label' => esc_attr__('Apply Button Text', 'edugrade'),
						'type'  => 'text',
					),
					'apply_button_url' => array(
						'label' => esc_attr__('Apply Button URL', 'edugrade'),
						'type'  => 'text',
					),
					'blog_post_top' => array(
						'type'  => 'select',
						'label'      => esc_attr__( 'Select Post', 'edugrade' ),
						'population' => 'array',
						'choices' => gramotech_fetch_posts_dropdown_noall('post'),
						'desc'       => esc_attr__( 'Show post by post selection.','edugrade' ),
					),
				),
			),
			'footer-box' => array(
				'title' =>  esc_attr__('Footer Settings', 'edugrade'),
				'type' => 'tab',
				'options' => array(
					'footer_style' => array(
						'type'  => 'multi-picker',
						'label' => false,
						'desc'  => false,
						'value' => array(
							'footer-style-1' => array(),
							'footer-style-2' => array(),
							'footer-style-3' => array(),
						),
						'picker' => array(
							'gadget' => array(
								'label' => esc_attr__('Footer Style', 'edugrade'),
								'type'  => 'select',
								'choices' => array(
									'' => '---',
									'footer-style-1' => esc_attr__('Footer Style 1', 'edugrade'),
									'footer-style-2' => esc_attr__('Footer Style 2', 'edugrade'),
									'footer-style-3' => esc_attr__('Footer Style 3', 'edugrade'),
								),
								'desc' => esc_attr__('Description', 'edugrade'),
							)
						),
						'choices' => array(
							'footer-style-1' => array(
								'newsletter_title' => array(
									'label' => esc_attr__('Newsletter Title', 'edugrade'),
									'type'  => 'text',
								),
								'newsletter_caption' => array(
									'label' => esc_attr__('Newsletter Caption', 'edugrade'),
									'type'  => 'text',
								),
							),
							'footer-style-2' => array(
								'newsletter_title' => array(
									'label' => esc_attr__('Newsletter Title', 'edugrade'),
									'type'  => 'text',
								),
								'newsletter_caption' => array(
									'label' => esc_attr__('Newsletter Caption', 'edugrade'),
									'type'  => 'text',
								),
								'newsletter_background_img' => array(
									'label' => esc_attr__('Newsletter Background Image', 'edugrade'),
									'desc' => esc_attr__('Upload Newsletter Background Image from here.', 'edugrade'),
									'type' => 'upload',
								),
								'footer_logo_img' => array(
									'label' => esc_attr__('Footer Logo Image', 'edugrade'),
									'desc' => esc_attr__('Upload Footer Logo Image from here.', 'edugrade'),
									'type' => 'upload',
								),
								'footer_logo_bg_color' => array(
									'type'  => 'color-picker',
									'value' => '',
									'label' => esc_attr__('Logo Background Color', 'edugrade'),
									'desc'  => esc_attr__('Select Logo Background Color.', 'edugrade'),
								),
								'terms_conditions_url' => array(
									'label' => esc_attr__('Terms and Conditions Page URL(Leave Blank to hide)', 'edugrade'),
									'type'  => 'text',
								),
								'privacy_policy_url' => array(
									'label' => esc_attr__('Privacy Policy Page URL(Leave Blank to hide)', 'edugrade'),
									'type'  => 'text',
								),
								
							),
							'footer-style-3' => array(
								'google_map_embed_code' => array(
									'label' => esc_attr__('Google Map Embed Code(Iframe)', 'edugrade'),
									'type'  => 'textarea',
								),
							),
						),
						'show_borders' => false,
					),
					'copyright_option' => array(
						'type'  => 'multi-picker',
						'label' => false,
						'desc'  => false,
						'value' => array(
							'gadget' => 'enable',
							'enable' => array(
								'copyright_text' => '',
							),
							'disable' => array(),
						),
						'picker' => array(
							'gadget' => array(
								'label' => esc_attr__('Copyrights Enable/Disable', 'edugrade'),
								'type'  => 'switch',
								'left-choice' => array(
									'value' => 'enable',
									'label' => esc_attr__('Enable', 'edugrade'),
								),
								'right-choice' => array(
									'value' => 'disable',
									'label' => esc_attr__('Disable', 'edugrade'),
								),
								'desc'  => esc_attr__('Enable/Disable Copy Rights from here', 'edugrade'),
							)
						),
						'choices' => array(
							'enable' => array(
								'copyright_text' => array(
									'label' => esc_attr__('Copyright Text', 'edugrade'),
									'type'  => 'text',
									'value' => '',
									'desc' => esc_attr__('Add Copyright Text from here.', 'edugrade'),
								),
							),
							'disable' => array(),
						),
						'show_borders' => false,
					),
				),
			),
			'subheader-box' => array(
				'title' =>  esc_attr__('Sub Header Settings', 'edugrade'),
				'type' => 'tab',
				'options' => array(
					'theme_option_page_bg_image' => array(
						'label' => esc_attr__('Default Page Subheader Background Image', 'edugrade'),
						'desc' => esc_attr__('Upload Default Page Subheader Background Image from here.', 'edugrade'),
						'type' => 'upload',
					),
					'post_theme_option_background_img' => array(
						'label' => esc_attr__('Default All Posts Subheader Background Image', 'edugrade'),
						'desc' => esc_attr__('Upload Default All Posts Detail Page Subheader Background Image from here.', 'edugrade'),
						'type' => 'upload',
					),
					'search_theme_option_background_img' => array(
						'label' => esc_attr__('Default Search/Archive Subheader Background Image', 'edugrade'),
						'desc' => esc_attr__('Upload Default Search/Archive Subheader Background Image from here.', 'edugrade'),
						'type' => 'upload',
					),
					'error_theme_option_background_img' => array(
						'label' => esc_attr__('Default 404 Page Subheader Background Image', 'edugrade'),
						'desc' => esc_attr__('Upload Default 404 Page Subheader Background Image from here.', 'edugrade'),
						'type' => 'upload',
					),
				),
			),
			'layoutmanage-box' => array(
				'title' =>  esc_attr__('Layout Management', 'edugrade'),
				'type' => 'tab',
				'options' => array(
					'website_layout' => array(
						'type'  => 'multi-picker',
						'label' => false,
						'desc'  => false,
						'value' => array(
							'full-style' => array(),
							'boxed-style' => array(),
						),
						'picker' => array(
							'gadget' => array(
								'label' => esc_attr__('Website Layout', 'edugrade'),
								'type'  => 'select',
								'choices' => array(
									'full-style' => esc_attr__('Full Width', 'edugrade'),
									'boxed-style' => esc_attr__('Boxed Layout', 'edugrade'),
								),
								'desc' => esc_attr__('Description', 'edugrade'),
							)
						),
						'choices' => array(
							'full-style' => array(
								'body_background_color' => array(
									'type'  => 'color-picker',
									'value' => '',
									'label' => esc_attr__('Body Background Color', 'edugrade'),
									'desc'  => esc_attr__('Select Body Background Color', 'edugrade'),
								),
							),
							'boxed-style' => array(
								'body_background_color' => array(
									'type'  => 'color-picker',
									'value' => '',
									'label' => esc_attr__('Body Background Color', 'edugrade'),
									'desc'  => esc_attr__('Select Body Background Color', 'edugrade'),
								),
								'body_background_image' => array(
									'label' => esc_attr__('Body Background Image', 'edugrade'),
									'desc' => esc_attr__('Upload Body Background Image from here.', 'edugrade'),
									'type' => 'upload',
									'images_only' => true,
								),
							),
						),
						'show_borders' => false,
					),
				),
			),
		)
    ),
	'color-scheme' => array(
        'title' =>  esc_attr__('Color Scheme', 'edugrade'),
        'type' => 'tab',
        'options' => array(
			'colormanage-box' => array(
				'title' =>  esc_attr__('Color Management', 'edugrade'),
				'type' => 'tab',
				'options' => array(
					'main_color_scheme' => array(
						'type'  => 'color-picker',
						'value' => '',
						'label' => esc_attr__('Main ColorScheme', 'edugrade'),
						'desc'  => esc_attr__('Select Main Color Scheme Color. Default is(#fa394a)', 'edugrade'),
					),
					'secondary_color_scheme' => array(
						'type'  => 'color-picker',
						'value' => '',
						'label' => esc_attr__('Secondary ColorScheme', 'edugrade'),
						'desc'  => esc_attr__('Select Secondary Color Scheme Color.Default is (#18254a)', 'edugrade'),
					),
				),
			),
		)
    ),
	'blog-settings' => array(
        'title' =>  esc_attr__('Blog', 'edugrade'),
        'type' => 'tab',
        'options' => array(
			'post-detail-single' => array(
				'title' =>  esc_attr__('Post Detail Page Setting', 'edugrade'),
				'type'  => 'box',
				'options' => array(
					'post_detail_post_btn' => array(
						'type'  => 'switch',
                        'value' => 'enable',
						'label' => esc_attr__('Post Detail Recommended Post Button', 'edugrade'),
						'desc'  => esc_attr__( 'Using this option you can turn on/off the Recommended Posts on the blog single page.', 'edugrade' ),
                        'left-choice' => array(
                            'value' => 'enable',
                            'label' => esc_attr__('Enable', 'edugrade'),
                        ),
						'right-choice' => array(
                            'value' => 'enable',
                            'label' => esc_attr__('Disable', 'edugrade'),
                        ),
					),
				),
			),
		)
    ),
	'social-settings' => array(
        'title' =>  esc_attr__('Social', 'edugrade'),
        'type' => 'tab',
        'options' => array(
			'social-box' => array(
				'title' =>  esc_attr__('Social Profiles', 'edugrade'),
				'type' => 'tab',
				'options' => array(
					'facebook_social' => array(
						'type'  => 'text',
						'value' => '',
						'label' => esc_attr__('Facebook Social', 'edugrade'),
						'desc'  => esc_attr__('Enter URL of your social profile here.', 'edugrade'),
					),
					'gplus_social' => array(
						'type'  => 'text',
						'value' => '',
						'label' => esc_attr__('Google Plus Social', 'edugrade'),
						'desc'  => esc_attr__('Enter URL of your social profile here.', 'edugrade'),
					),
					'twitter_social' => array(
						'type'  => 'text',
						'value' => '',
						'label' => esc_attr__('Twitter Social', 'edugrade'),
						'desc'  => esc_attr__('Enter URL of your social profile here.', 'edugrade'),
					),
					'linkedin_social' => array(
						'type'  => 'text',
						'value' => '',
						'label' => esc_attr__('Linkedin Social', 'edugrade'),
						'desc'  => esc_attr__('Enter URL of your Linkedin profile here.', 'edugrade'),
					),
				),
			),
			'social-shares-box' => array(
				'title' =>  esc_attr__('Social Shares', 'edugrade'),
				'type' => 'tab',
				'options' => array(
					'enable_social_share' => array(
						'type'  => 'switch',
						'value' => 'disable',
						'label' => esc_attr__('Enable Social Share', 'edugrade'),
						'desc'  => esc_attr__('Enable this option to show the social shares below each post', 'edugrade'),
						'left-choice' => array(
                            'value' => 'enable',
                            'label' => esc_attr__('Enable', 'edugrade'),
                        ),
						'right-choice' => array(
                            'value' => 'disable',
                            'label' => esc_attr__('Disable', 'edugrade'),
                        ),
					),
					'enable_facebook' => array(
						'type'  => 'switch',
						'value' => 'enable',
						'label' => esc_attr__('Facebook', 'edugrade'),
						'desc'  => esc_attr__('Enable this option to show the social Icon under post.', 'edugrade'),
						'left-choice' => array(
                            'value' => 'enable',
                            'label' => esc_attr__('Enable', 'edugrade'),
                        ),
						'right-choice' => array(
                            'value' => 'disable',
                            'label' => esc_attr__('Disable', 'edugrade'),
                        ),
					),
					'enable_twitter' => array(
						'type'  => 'switch',
						'value' => 'enable',
						'label' => esc_attr__('Twitter', 'edugrade'),
						'desc'  => esc_attr__('Enable this option to show the social Icon under post.', 'edugrade'),
						'left-choice' => array(
                            'value' => 'enable',
                            'label' => esc_attr__('Enable', 'edugrade'),
                        ),
						'right-choice' => array(
                            'value' => 'disable',
                            'label' => esc_attr__('Disable', 'edugrade'),
                        ),
					),
					'enable_gplus' => array(
						'type'  => 'switch',
						'value' => 'enable',
						'label' => esc_attr__('Google Plus', 'edugrade'),
						'desc'  => esc_attr__('Enable this option to show the social Icon under post.', 'edugrade'),
						'left-choice' => array(
                            'value' => 'enable',
                            'label' => esc_attr__('Enable', 'edugrade'),
                        ),
						'right-choice' => array(
                            'value' => 'disable',
                            'label' => esc_attr__('Disable', 'edugrade'),
                        ),
					),
					'enable_linkedin' => array(
						'type'  => 'switch',
						'value' => 'enable',
						'label' => esc_attr__('Linkedin', 'edugrade'),
						'desc'  => esc_attr__('Enable this option to show the social Icon under post.', 'edugrade'),
						'left-choice' => array(
                            'value' => 'enable',
                            'label' => esc_attr__('Enable', 'edugrade'),
                        ),
						'right-choice' => array(
                            'value' => 'disable',
                            'label' => esc_attr__('Disable', 'edugrade'),
                        ),
					),
				),
			),
		)
    ),
	'typo' => array(
        'title'   => esc_attr__( 'Typography', 'edugrade' ),
        'type'    => 'tab',
        'options' => array(
            'typo-box' => array(
                'title'   => esc_attr__( 'Typography Settings', 'edugrade' ),
                'type'    => 'box',
                'options' => array(
                    'body_font' => array(
                        'type'  => 'typography',
                        'value' => array(
                            'family' => '',
                            'size' => '',
                        ),
                        'components' => array(
                            'family' => true,
                            'size'   => true,
                        ),
                        'label' => esc_attr__('Regular Font', 'edugrade'),
                        'desc'  => esc_attr__('Default Font for body p ul li', 'edugrade'),
                    ),
                    'h1_font' => array(
                        'type'  => 'typography',
                        'value' => array(
                            'family' => '',
                            'size' => ''
                        ),
                        'components' => array(
                            'family' => true,
                            'size'   => true,
                        ),
                        'label' => esc_attr__('H1 Heading', 'edugrade'),
                        'desc'  => esc_attr__('Choose Your H1 Heading font-family, font-size, color, font-weight.', 'edugrade'),
                    ),
                    'h2_font' => array(
                        'type'  => 'typography',
                        'value' => array(
                            'family' => '',
                            'size' => ''
                        ),
                        'components' => array(
                            'family' => true,
                            'size'   => true
                        ),
                        'label' => esc_attr__('H2 Heading', 'edugrade'),
                        'desc'  => esc_attr__('Choose Your H2 Heading font-family, font-size, color, font-weight.', 'edugrade'),
                    ),
                    'h3_font' => array(
                        'type'  => 'typography',
                        'value' => array(
                            'family' => '',
                            'size' => ''
                        ),
                        'components' => array(
                            'family' => true,
                            'size'   => true
                        ),
                        'label' => esc_attr__('H3 Heading', 'edugrade'),
                        'desc'  => esc_attr__('Choose Your H3 Heading font-family, font-size, color, font-weight.', 'edugrade'),
                    ),
                    'h4_font' => array(
                        'type'  => 'typography',
                        'value' => array(
                            'family' => '',
                            'size' => ''
                        ),
                        'components' => array(
                            'family' => true,
                            'size'   => true
                        ),
                        'label' => esc_attr__('H4 Heading', 'edugrade'),
                        'desc'  => esc_attr__('Choose Your H4 Heading font-family, font-size, color, font-weight.', 'edugrade'),
                    ),
                    'h5_font' => array(
                        'type'  => 'typography',
                        'value' => array(
                           'family' => '',
                            'size' => ''
                        ),
                        'components' => array(
                            'family' => true,
                            'size'   => true
                        ),
                        'label' => esc_attr__('H5 Heading', 'edugrade'),
                        'desc'  => esc_attr__('Choose Your H5 Heading font-family, font-size, color, font-weight.', 'edugrade'),
                    ),
                    'h6_font' => array(
                        'type'  => 'typography',
                        'value' => array(
                            'family' => '',
                            'size' => ''
                        ),
                        'components' => array(
                            'family' => true,
                            'size'   => true
                        ),
                        'label' => esc_attr__('H6 Heading', 'edugrade'),
                        'desc'  => esc_attr__('Choose Your H6 Heading font-family, font-size, color, font-weight.', 'edugrade'),
                    ),
					'nav_font' => array(
                        'type'  => 'typography',
                        'value' => array(
                            'family' => '',
                            'size' => ''
                        ),
                        'components' => array(
                            'family' => true,
                            'size'   => true
                        ),
                        'label' => esc_attr__('Navigation Font', 'edugrade'),
                        'desc'  => esc_attr__('Default Font for navigation', 'edugrade'),
                    ),
                )
            ),
        ),
    ),
	'api_settings' => array(
        'type' => 'tab',
        'title' => esc_attr__('Api Settings', 'edugrade'),
        'options' => array(
			'mailchimp' => array(
                'title' => esc_attr__('Mail Chimp', 'edugrade'),
                'type' => 'tab',
                'options' => array(
                    'mail-chimp-api' => array(
                        'type' => 'text',
                        'value' => '',
                        'label' => esc_attr__('MailChimp Api', 'edugrade'),
                        'desc' => esc_attr__('Enter your MailChimp Key Here.', 'edugrade'),
                    ),
                    'mail-chimp-listid' => array(
                        'type' => 'text',
                        'label' => esc_attr__('MailChimp List ID', 'edugrade'),
                        'value' => '',
                    )
                )
            ),
        ),
    ),
);