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
	'twitter_username' => array(
		'label' => esc_attr__('Twitter Username', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('Enter User Name (without twitter url for example: http://www.twitter.com/Envato write only Envato):', 'edugrade'),
	),
	'consumer_key' => array(
		'label' => esc_attr__('Consumer Key', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('Enter Consumer Key Here', 'edugrade'),
	),
	'consumer_secret' => array(
		'label' => esc_attr__('Consumer Secret', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('Enter Consumer Secret Here', 'edugrade'),
	),
	'user_token' => array(
		'label' => esc_attr__('User Token', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('Enter User Token Here', 'edugrade'),
	),
	'user_secret' => array(
		'label' => esc_attr__('User Secret', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('Enter User Secret Here', 'edugrade'),
	),
	'num_of_tweets' => array(
		'label' => esc_attr__('Number of Tweets', 'edugrade'),
		'type'  => 'text',
		'desc' => esc_attr__('Enter Number of Tweets to fetch', 'edugrade'),
	),
);
