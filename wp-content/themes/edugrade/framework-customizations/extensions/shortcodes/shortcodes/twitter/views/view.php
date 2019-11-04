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

	require( ABSPATH . '/wp-content/plugins/gramotech-core/twitteroauth/autoload.php' );
	
	use Abraham\TwitterOAuth\TwitterOAuth;
	
	$connection = new TwitterOAuth($consumer_key, $consumer_secret, $user_token, $user_secret);
	$content = $connection->get("account/verify_credentials");
	$statuses = $connection->get("statuses/home_timeline", ["count" => $num_of_tweets, "exclude_replies" => true]);
	?>

	<div id="tweets-bg" class="tweets-bg owl-carousel owl-theme">
		<?php
		foreach($statuses as $status){ ?>
			<div class="item">
				<div class="tweets">
					<span class="tw-meta"> <a href="<?php echo esc_url($status->user->url); ?>"><i class="fa fa-reply"></i></a></span>
					<h4><?php echo esc_attr($status->user->screen_name); ?></h4>
					<p><?php echo esc_attr($status->text); ?></p>
					<span><?php echo date("M d H:i a", strtotime($status->created_at)); ?></span> 
				</div>
			</div>	
			<?php
		} ?>
    </div>