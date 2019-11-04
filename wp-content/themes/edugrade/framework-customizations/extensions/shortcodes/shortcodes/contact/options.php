<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'page_custom_class' => array(
        'type' => 'text',
        'label' => esc_attr__('Page Custom Class', 'edugrade'),
        'desc' => esc_attr__('Please add the page custom class.', 'edugrade'),
    ),
	'element_title' => array(
		'label' => esc_attr__('Element Title', 'edugrade'),
		'type'  => 'text',
		'value' => '',
		'desc' => esc_attr__('Add Element title from here.', 'edugrade'),
	),
	'office_address' => array(
		'label' => esc_attr__('Office Address', 'edugrade'),
		'type'  => 'text',
		'value' => '',
		'desc' => esc_attr__('Add office Address from here.', 'edugrade'),
	),
	'office_address_icon' => array(
		'type'  => 'icon-v2',
		'preview_size' => 'medium',
		'modal_size' => 'medium',
		'label' => esc_attr__('Office Address Font awesome icon', 'edugrade'),
		'desc'  => esc_attr__('Please select Font awesome icon only from the list.', 'edugrade'),
		'help'  => esc_attr__('Help tip', 'edugrade'),
	),
	'office_phone' => array(
		'label' => esc_attr__('Office Phone', 'edugrade'),
		'type'  => 'text',
		'value' => '',
		'desc' => esc_attr__('Add office Phone from here.', 'edugrade'),
	),
	'office_phone_icon' => array(
		'type'  => 'icon-v2',
		'preview_size' => 'medium',
		'modal_size' => 'medium',
		'label' => esc_attr__('Office Phone Font awesome icon', 'edugrade'),
		'desc'  => esc_attr__('Please select Font awesome icon only from the list.', 'edugrade'),
		'help'  => esc_attr__('Help tip', 'edugrade'),
	),
	'office_email' => array(
		'label' => esc_attr__('Office Email', 'edugrade'),
		'type'  => 'text',
		'value' => '',
		'desc' => esc_attr__('Add office Email from here.', 'edugrade'),
	),
	'office_email_icon' => array(
		'type'  => 'icon-v2',
		'preview_size' => 'medium',
		'modal_size' => 'medium',
		'label' => esc_attr__('Office Email Font awesome icon', 'edugrade'),
		'desc'  => esc_attr__('Please select Font awesome icon only from the list.', 'edugrade'),
		'help'  => esc_attr__('Help tip', 'edugrade'),
	),	
	'office_description' => array(
		'label' => esc_attr__('Office Description', 'edugrade'),
		'type'  => 'text',
		'value' => '',
		'desc' => esc_attr__('Add office Description from here.', 'edugrade'),
	),
	'facebook_social_profile' => array(
		'label' => esc_attr__('Facebook Profile', 'edugrade'),
		'type'  => 'text',
		'value' => '',
		'desc' => esc_attr__('Add Facebook Profile from here.', 'edugrade'),
	),
	'twitter_social_profile' => array(
		'label' => esc_attr__('Twitter Profile', 'edugrade'),
		'type'  => 'text',
		'value' => '',
		'desc' => esc_attr__('Add Twitter Profile from here.', 'edugrade'),
	),
	'gplus_social_profile' => array(
		'label' => esc_attr__('Google Plus Profile', 'edugrade'),
		'type'  => 'text',
		'value' => '',
		'desc' => esc_attr__('Add Google Plus Profile from here.', 'edugrade'),
	),
	'linkedin_social_profile' => array(
		'label' => esc_attr__('Linkedin Profile', 'edugrade'),
		'type'  => 'text',
		'value' => '',
		'desc' => esc_attr__('Add Linkedin Profile from here.', 'edugrade'),
	),	
	'contact_from_shortcode' => array(
		'label' => esc_attr__('Contact Form 7 Shortcode', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('Please add the Contact Form 7 Shortcode here.', 'edugrade'),
	),
);
