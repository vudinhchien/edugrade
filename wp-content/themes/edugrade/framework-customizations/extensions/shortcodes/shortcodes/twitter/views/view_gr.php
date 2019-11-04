<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();	
	$twitter_username = (isset( $atts['twitter_username'] ) && $atts['twitter_username'] !='') ? $atts['twitter_username'] : '';
	$consumer_key = (isset( $atts['consumer_key'] ) && $atts['consumer_key'] !='') ? $atts['consumer_key'] : '';
	$consumer_secret = (isset( $atts['consumer_secret'] ) && $atts['consumer_secret'] !='') ? $atts['consumer_secret'] : '';
	$user_token = (isset( $atts['user_token'] ) && $atts['user_token'] !='') ? $atts['user_token'] : '';
	$user_secret = (isset( $atts['user_secret'] ) && $atts['user_secret'] !='') ? $atts['user_secret'] : '';
	$num_of_tweets = (isset( $atts['num_of_tweets'] ) && $atts['num_of_tweets'] !='') ? $atts['num_of_tweets'] : '';

	?>

	<div id="tweets-bg" class="tweets-bg owl-carousel owl-theme">
		<div class="item">
			<div class="tweets">
				<span class="tw-meta"> <a href="https://t.co/b5Oyx1k1ye"><i class="fa fa-reply"></i></a></span>
				<h4><?php echo esc_attr__('TechCrunch','edugrade'); ?></h4>
				<p><?php echo esc_attr__('What if voting didn’t have to mean lost wages and parting with PTO time? https://t.co/StldoUm3h7','edugrade'); ?></p>
				<span><?php echo esc_attr__('Nov 02 04:42 am','edugrade'); ?></span> 
			</div>
		</div>	
    </div>