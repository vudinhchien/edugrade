<?php
/*
Plugin Name: GramoTech Core
Plugin URI: 
Description: A Custom Post Type Plugin To Use With GramoTech
Version: 1.0.0
Author: GramoTech
Author URI: http://www.gramotech.com
License: 
*/	
	
	/* Processes like/unlike */
	add_action( 'wp_ajax_nopriv_gramotech_process_simple_like', 'gramotech_process_simple_like' );
	add_action( 'wp_ajax_gramotech_process_simple_like', 'gramotech_process_simple_like' );
	
	function gramotech_process_simple_like() {
		
		$nonce = isset( $_REQUEST['nonce'] ) ? sanitize_text_field( $_REQUEST['nonce'] ) : 0;
		if ( !wp_verify_nonce( $nonce, 'simple-likes-nonce' ) ) {
			exit( __( 'Not permitted', 'edugrade' ) );
		}
		// Test if javascript is disabled
		$disabled = ( isset( $_REQUEST['disabled'] ) && $_REQUEST['disabled'] == true ) ? true : false;
		// Test if this is a comment
		$is_comment = ( isset( $_REQUEST['is_comment'] ) && $_REQUEST['is_comment'] == 1 ) ? 1 : 0;
		
		$post_id = ( isset( $_REQUEST['post_id'] ) && is_numeric( $_REQUEST['post_id'] ) ) ? $_REQUEST['post_id'] : '';
		$result = array();
		$post_users = NULL;
		$like_count = 0;
		
		if ( $post_id != '' ) {
			$count = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_comment_like_count", true ) : get_post_meta( $post_id, "_post_like_count", true ); // like count
			$count = ( isset( $count ) && is_numeric( $count ) ) ? $count : 0;
			if ( !gramotech_already_liked( $post_id, $is_comment ) ) { // Like the post
				if ( is_user_logged_in() ) { // user is logged in
					$user_id = get_current_user_id();
					$post_users = gramotech_post_user_likes( $user_id, $post_id, $is_comment );
					if ( $is_comment == 1 ) {
						// Update User & Comment
						$user_like_count = get_user_option( "_comment_like_count", $user_id );
						$user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
						update_user_option( $user_id, "_comment_like_count", ++$user_like_count );
						if ( $post_users ) {
							update_comment_meta( $post_id, "_user_comment_liked", $post_users );
						}
					} else {
						// Update User & Post
						$user_like_count = get_user_option( "_user_like_count", $user_id );
						$user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
						update_user_option( $user_id, "_user_like_count", ++$user_like_count );
						if ( $post_users ) {
							update_post_meta( $post_id, "_user_liked", $post_users );
						}
					}
				} else { // user is anonymous
					$user_ip = gramotech_get_ip();
					$post_users = gramotech_post_ip_likes( $user_ip, $post_id, $is_comment );
					// Update Post
					if ( $post_users ) {
						if ( $is_comment == 1 ) {
							update_comment_meta( $post_id, "_user_comment_IP", $post_users );
						} else { 
							update_post_meta( $post_id, "_user_IP", $post_users );
						}
					}
				}
				$like_count = ++$count;
				$response['status'] = "liked";
				$response['icon'] = gramotech_get_liked_icon();
			} else { // Unlike the post
				if ( is_user_logged_in() ) { // user is logged in
					$user_id = get_current_user_id();
					$post_users = gramotech_post_user_likes( $user_id, $post_id, $is_comment );
					// Update User
					if ( $is_comment == 1 ) {
						$user_like_count = get_user_option( "_comment_like_count", $user_id );
						$user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
						if ( $user_like_count > 0 ) {
							update_user_option( $user_id, "_comment_like_count", --$user_like_count );
						}
					} else {
						$user_like_count = get_user_option( "_user_like_count", $user_id );
						$user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
						if ( $user_like_count > 0 ) {
							update_user_option( $user_id, '_user_like_count', --$user_like_count );
						}
					}
					// Update Post
					if ( $post_users ) {	
						$uid_key = array_search( $user_id, $post_users );
						unset( $post_users[$uid_key] );
						if ( $is_comment == 1 ) {
							update_comment_meta( $post_id, "_user_comment_liked", $post_users );
						} else { 
							update_post_meta( $post_id, "_user_liked", $post_users );
						}
					}
				} else { // user is anonymous
					$user_ip = gramotech_get_ip();
					$post_users = gramotech_post_ip_likes( $user_ip, $post_id, $is_comment );
					// Update Post
					if ( $post_users ) {
						$uip_key = array_search( $user_ip, $post_users );
						unset( $post_users[$uip_key] );
						if ( $is_comment == 1 ) {
							update_comment_meta( $post_id, "_user_comment_IP", $post_users );
						} else { 
							update_post_meta( $post_id, "_user_IP", $post_users );
						}
					}
				}
				$like_count = ( $count > 0 ) ? --$count : 0; // Prevent negative number
				$response['status'] = "unliked";
				$response['icon'] = gramotech_get_unliked_icon();
			}
			if ( $is_comment == 1 ) {
				update_comment_meta( $post_id, "_comment_like_count", $like_count );
				update_comment_meta( $post_id, "_comment_like_modified", date( 'Y-m-d H:i:s' ) );
			} else { 
				update_post_meta( $post_id, "_post_like_count", $like_count );
				update_post_meta( $post_id, "_post_like_modified", date( 'Y-m-d H:i:s' ) );
			}
			$response['count'] = gramotech_get_like_count( $like_count );
			$response['testing'] = $is_comment;
			if ( $disabled == true ) {
				if ( $is_comment == 1 ) {
					wp_redirect( get_permalink( get_the_ID() ) );
					exit();
				} else {
					wp_redirect( get_permalink( $post_id ) );
					exit();
				}
			} else {
				wp_send_json( $response );
			}
		}
	}
	
	function gramotech_new_contactmethods( $contactmethods ) {

		$contactmethods['designation'] = 'Designation';
		$contactmethods['facebook'] = 'Facebook Profile Url';
		$contactmethods['twitter'] = 'Twitter Profile Url';
		$contactmethods['linkedin'] = 'Linkedin Profile Url';
		$contactmethods['gplus'] = 'Google Plus Profile Url';

		return $contactmethods;

	}
	
	add_filter('user_contactmethods','gramotech_new_contactmethods',10,1);

	function gramotech_already_liked( $post_id, $is_comment ) {
		$post_users = NULL;
		$user_id = NULL;
		if ( is_user_logged_in() ) { // user is logged in
			$user_id = get_current_user_id();
			$post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_liked" ) : get_post_meta( $post_id, "_user_liked" );
			if ( count( $post_meta_users ) != 0 ) {
				$post_users = $post_meta_users[0];
			}
		} else { // user is anonymous
			$user_id = gramotech_get_ip();
			$post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_IP" ) : get_post_meta( $post_id, "_user_IP" ); 
			if ( count( $post_meta_users ) != 0 ) { // meta exists, set up values
				$post_users = $post_meta_users[0];
			}
		}
		if ( is_array( $post_users ) && in_array( $user_id, $post_users ) ) {
			return true;
		} else {
			return false;
		}
	}

	function gramotech_get_simple_likes_button( $post_id, $is_comment = NULL ) {
		global $gramotech_allowed_html;
		
		$is_comment = ( NULL == $is_comment ) ? 0 : 1;
		$output = '';
		$nonce = wp_create_nonce( 'simple-likes-nonce' ); // Security
		if ( $is_comment == 1 ) {
			$post_id_class = esc_attr( ' gramotech-comment-button-' . $post_id );
			$comment_class = esc_attr( ' gramotech-comment' );
			$like_count = get_comment_meta( $post_id, "_comment_like_count", true );
			$like_count = ( isset( $like_count ) && is_numeric( $like_count ) ) ? $like_count : 0;
		} else {
			$post_id_class = esc_attr( ' gramotech-button-' . $post_id );
			$comment_class = esc_attr( '' );
			$like_count = get_post_meta( $post_id, "_post_like_count", true );
			$like_count = ( isset( $like_count ) && is_numeric( $like_count ) ) ? $like_count : 0;
		}
		$count = gramotech_get_like_count( $like_count );
		$icon_empty = gramotech_get_unliked_icon();
		$icon_full = gramotech_get_liked_icon();
		// Loader
		$loader = '<span class="gramotech-loader"></span>';
		// Liked/Unliked Variables
		if ( gramotech_already_liked( $post_id, $is_comment ) ) {
			$class = esc_attr( ' liked' );
			$title = __( 'Unlike', 'edugrade' );
			$icon = $icon_full;
		} else {
			$class = '';
			$title = __( 'Like', 'edugrade' );
			$icon = $icon_empty;
		}
		$output = '
			<span class="gramotech-wrapper">
				<a href="' . admin_url( 'admin-ajax.php?action=gramotech_process_simple_like' . '&post_id=' . esc_attr($post_id) . '&nonce=' . esc_attr($nonce) . '&is_comment=' . esc_attr($is_comment) . '&disabled=true' ) . '" class="gramotech-button' . esc_attr($post_id_class) . esc_attr($class) . esc_attr($comment_class) . '" data-nonce="' . esc_attr($nonce) . '" data-post-id="' . esc_attr($post_id) . '" data-iscomment="' . esc_attr($is_comment) . '" title="' . esc_attr($title) . '">
					' . wp_kses($icon,$gramotech_allowed_html) . wp_kses($count,$gramotech_allowed_html) . '
				</a>
				' . wp_kses($loader,$gramotech_allowed_html) . '
			</span>';
		return $output;
	}

	function gramotech_post_user_likes( $user_id, $post_id, $is_comment ) {
		$post_users = '';
		$post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_liked" ) : get_post_meta( $post_id, "_user_liked" );
		if ( count( $post_meta_users ) != 0 ) {
			$post_users = $post_meta_users[0];
		}
		if ( !is_array( $post_users ) ) {
			$post_users = array();
		}
		if ( !in_array( $user_id, $post_users ) ) {
			$post_users['user-' . $user_id] = $user_id;
		}
		return $post_users;
	}

	function gramotech_post_ip_likes( $user_ip, $post_id, $is_comment ) {
		$post_users = '';
		$post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_IP" ) : get_post_meta( $post_id, "_user_IP" );
		// Retrieve post information
		if ( count( $post_meta_users ) != 0 ) {
			$post_users = $post_meta_users[0];
		}
		if ( !is_array( $post_users ) ) {
			$post_users = array();
		}
		if ( !in_array( $user_ip, $post_users ) ) {
			$post_users['ip-' . $user_ip] = $user_ip;
		}
		return $post_users;
	}

	function gramotech_get_ip() {
		if ( isset( $_SERVER['HTTP_CLIENT_IP'] ) && ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) && ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = ( isset( $_SERVER['REMOTE_ADDR'] ) ) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
		}
		$ip = filter_var( $ip, FILTER_VALIDATE_IP );
		$ip = ( $ip === false ) ? '0.0.0.0' : $ip;
		return $ip;
	}

	function gramotech_get_liked_icon() {
		$icon = '<span class="gramotech-icon"><i class="fas fa-heart"></i></span> ';
		return $icon;
	} 

	function gramotech_get_unliked_icon() {
		$icon = '<span class="gramotech-icon"><i class="far fa-heart"></i></span> ';
		return $icon;
	} 

	function gramotech_format_count( $number ) {
		$precision = 2;
		if ( $number >= 1000 && $number < 1000000 ) {
			$formatted = number_format( $number/1000, $precision ).'K';
		} else if ( $number >= 1000000 && $number < 1000000000 ) {
			$formatted = number_format( $number/1000000, $precision ).'M';
		} else if ( $number >= 1000000000 ) {
			$formatted = number_format( $number/1000000000, $precision ).'B';
		} else {
			$formatted = $number; // Number is less than 1000
		}
		$formatted = str_replace( '.00', '', $formatted );
		return $formatted;
	}

	function gramotech_get_like_count( $like_count ) {
		$like_text = __( 'Like', 'edugrade' );
		if ( is_numeric( $like_count ) && $like_count > 0 ) { 
			$number = gramotech_format_count( $like_count );
		} else {
			$number = '0';
		}
		$count = '<span class="gramotech-count">' . esc_attr($number) . '</span>';
		return $count;
	}

	// User Profile List
	add_action( 'show_user_profile', 'gramotech_show_user_likes' );
	add_action( 'edit_user_profile', 'gramotech_show_user_likes' );
	function gramotech_show_user_likes( $user ) { ?>        
		<table class="form-table">
			<tr>
				<th><label for="user_likes"><?php _e( 'You Like:', 'edugrade' ); ?></label></th>
				<td>
				<?php
				$types = get_post_types( array( 'public' => true ) );
				
				$args = array(
					'numberposts' => -1,
					'post_type' => $types,
					'meta_query' => array (
						array (
						  'key' => '_user_liked',
						  'value' => $user->ID,
						  'compare' => 'LIKE'
						)
					)
				);		
				$sep = '';
				
				$like_query = new WP_Query( $args );
				if ( $like_query->have_posts() ) : ?>
				<p>
				<?php while ( $like_query->have_posts() ) : $like_query->the_post(); 
				echo esc_attr($sep); ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				<?php
				$sep = ' &middot; ';
				endwhile; 
				?>
				</p>
				<?php else : ?>
				<p><?php _e( 'You do not like anything yet.', 'edugrade' ); ?></p>
				<?php 
				endif; 
				wp_reset_postdata(); 
				?>
				</td>
			</tr>
		</table>
		<?php 
	}
	
	function gramotech_ajax_login_init(){

		wp_register_script('ajax-login-script', get_template_directory_uri() . '/assets/js/ajax-login-script.js', array('jquery') ); 
		wp_enqueue_script('ajax-login-script');

		wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'redirecturl' => home_url(),
			'loadingmessage' => __('Sending user info, please wait...','edugrade')
		));

		// Enable the user with no privileges to run ajax_login() in AJAX
		add_action( 'wp_ajax_nopriv_gramotech_ajaxlogin', 'gramotech_ajax_login' );
	}

	// Execute the action only if the user isn't logged in
	add_action('init', 'gramotech_ajax_login_init');
	
	function gramotech_ajax_login(){

		// First check the nonce, if it fails the function will break
		check_ajax_referer( 'ajax-login-nonce', 'security' );

		// Nonce is checked, get the POST data and sign user on
		$info = array();
		$info['user_login'] = $_POST['username'];
		$info['user_password'] = $_POST['password'];
		$info['remember'] = $_POST['remember'];

		$user_signon = wp_signon( $info, false );
		if ( is_wp_error($user_signon) ){
			echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.','edugrade')));
		} else {
			echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...','edugrade')));
		}
		die();
	}
	
	function gramotech_register_user_scripts() {
	  // Enqueue script
	  wp_register_script('gramotech_reg_script', get_template_directory_uri() . '/assets/js/ajax-registration.js', array('jquery'), null, false);
	  wp_enqueue_script('gramotech_reg_script');
	 
	  wp_localize_script( 'gramotech_reg_script', 'gramotech_reg_vars', array(
			'gramotech_ajax_url' => admin_url( 'admin-ajax.php' ),
		  )
	  );
	}
	add_action('wp_enqueue_scripts', 'gramotech_register_user_scripts', 100);
	
	/**
	 * New User registration
	 *
	 */
	function gramotech_reg_new_user() {
		global $gramotech_allowed_html;
	  // Verify nonce
	  if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'register_new_user' ) )
		die( 'Ooops, something went wrong, please try again later.' );
	 
	  // Post values
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$username    = $_POST['username'];
		$user_email     = $_POST['user_email'];
		$user_url     = $_POST['user_url'];
		$user_pass     = $_POST['user_pass'];
	 
		/**
		 * IMPORTANT: You should make server side validation here!
		 *
		 */
	 
		$userdata = array(
			'first_name' => $first_name,
			'last_name'  => $last_name,
			'user_login' => $username,
			'user_email' => $user_email,
			'user_url'   => $user_url,
			'user_pass'   => $user_pass,
		);
	 
		$user_id = wp_insert_user( $userdata ) ;
	 
		// Return
		if( !is_wp_error($user_id) ) {
			echo '1';
		} else {
			echo wp_kses($user_id->get_error_message(),$gramotech_allowed_html);
		}
	  die(); 
	}
	 
	add_action('wp_ajax_register_user', 'gramotech_reg_new_user');
	add_action('wp_ajax_nopriv_register_user', 'gramotech_reg_new_user');
	
	function gramotech_header_login_from(){
		?>
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="login-page">
				<div class="login-wrap">
					<div class="login-box">
						<h4><?php echo esc_attr__('Login Your Account','edugrade'); ?></h4>
						<p><?php echo esc_attr__('Enter your e-mail address and your password.','edugrade'); ?> </p>
						<form id="gramotech-ajax-login-header" action="login" method="post">
							<ul>
								<li>
									<input id="username_top" type="text" name="username_top" placeholder="<?php echo esc_attr__('Enter Username','edugrade'); ?>" class="linput">
								</li>
								<li>
									<input id="password_top" type="password" name="password_top"  placeholder="<?php echo esc_attr__('Enter Password','edugrade'); ?>" class="linput">
								</li>
								<li>
									<input id="remember_top" name="remember_top" type="checkbox" value="true"> <?php echo esc_attr__('Remember Me','edugrade'); ?> 
									<a class="pull-right" href="<?php echo wp_lostpassword_url(); ?>"><?php echo esc_attr__('Forgot Password?','edugrade'); ?></a> </li>
								<li>
								  <input class="submit_button" name="submit" value="<?php echo esc_attr__('Login Account','edugrade'); ?>" type="submit">
								</li>
							</ul>
							<p class="status"></p>
							<?php wp_nonce_field( 'ajax-login-nonce', 'security_top' ); ?>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	
	function gramotech_header_register_from(){ ?>
		<!-- Page 404 Start -->
		<div class="modal fade" id="exampleModalRegister" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="login-page register-page">
				<div class="login-wrap">
					<div class="login-box">
						<h4><?php echo esc_attr__('Register Your Account','edugrade'); ?></h4>
						<p><?php echo esc_attr__('Create your account. It will take less then a minute','edugrade'); ?></p>
						<form method="post" action="register" id="gramotech-ajax-register-header">
							<ul>
								<li>
									<input type="text" id="first_name_top_reg" name="first_name_top_reg" placeholder="<?php echo esc_attr__('First Name','edugrade'); ?>" class="linput">
								</li>
								<li>
									<input type="text" id="last_name_top_reg" name="last_name_top_reg" placeholder="<?php echo esc_attr__('Last Name','edugrade'); ?>" class="linput">
								</li>
								<li>
									<input type="text" id="username_top_reg" name="username_top_reg" placeholder="<?php echo esc_attr__('Username','edugrade'); ?>" class="linput">
								</li>
								<li>
									<input type="text" id="user_email_top_reg" name="user_email_top_reg" placeholder="<?php echo esc_attr__('Email','edugrade'); ?>" class="linput">
								</li>
								<li>
									<input type="text" id="user_url_top_reg" name="user_url_top_reg" placeholder="<?php echo esc_attr__('Website','edugrade'); ?>" class="linput">
								</li>
								<li>
									<input type="text" id="user_pass_top_reg" name="user_pass_top_reg" placeholder="<?php echo esc_attr__('Password','edugrade'); ?>" class="linput">
								</li>
								<li>
									<input name="terms" type="checkbox" value="">
									<?php echo esc_attr__('I agree to the Terms of','edugrade'); ?> <a href="#"><?php echo esc_attr__('Service &amp; Privacy Policy','edugrade'); ?></a> 
								</li>
								<li>
									<input id="gramotech-register-form-header" value="<?php echo esc_attr__('Register Now','edugrade'); ?>" type="submit">
								</li>
							</ul>
							<?php wp_nonce_field('register_new_user','register_new_user_nonce_top', true, true ); ?>
						
						</form>
						<div class="indicator-header"><?php echo esc_attr__('Please wait...','edugrade'); ?></div>
						<div class="alert result-message-header"></div>
					</div>
				</div>
			</div>
		</div>
		<?php	
	}

	if( !function_exists('gramotech_get_social_shares') ){
		function gramotech_get_social_shares($post_id){	
			
			if (function_exists('fw_get_db_settings_option')) {
				$enable_facebook = fw_get_db_settings_option('enable_facebook');
				$enable_twitter = fw_get_db_settings_option('enable_twitter');
				$enable_gplus = fw_get_db_settings_option('enable_gplus');
				$enable_linkedin = fw_get_db_settings_option('enable_linkedin');
			} 
			
			$post_url = get_permalink($post_id);?>
			<ul class="dropdown-menu">
				<?php 
				if($enable_facebook == 'enable'){ ?>
					<li class="">
						<a title="<?php echo esc_attr__('Facebook','edugrade'); ?>" href="http://www.facebook.com/share.php?u=<?php echo esc_url($post_url); ?>"><i class="fab fa-facebook-f"></i></a>
					</li><?php 
				} 
				if($enable_twitter == 'enable'){ ?>
					<li class="less-sharing-icon">
						<a title="<?php echo esc_attr__('Twitter','edugrade'); ?>" href="http://twitter.com/home?status=<?php echo esc_url($post_url); ?>"><i class="fab fa-twitter"></i></a>
					</li>
					<?php 
				}
				if($enable_gplus == 'enable'){ ?>
					<li class="">
						<a title="<?php echo esc_attr__('Google Plus','edugrade'); ?>" href="https://plus.google.com/share?url=<?php echo esc_url($post_url); ?>"><i class="fab fa-google-plus-g"></i></a>
					</li>
					<?php 
				}
				if($enable_linkedin == 'enable'){ ?>
					<li class="">
						<a title="<?php echo esc_attr__('Linkedin','edugrade'); ?>" href="http://www.linkedin.com/shareArticle?mini=true&#038;url=<?php echo esc_url($post_url); ?>"><i class="fab fa-linkedin-in"></i></a>
					</li>
					<?php 
				} 
				 ?>
			</ul>
			<?php 
		}
	}	
	
	// Related Courses Function
	function gramotech_related_courses($post_id) {
		$course_category = get_the_terms( $post_id, 'course_category' );
		$cat_arr = array();
		foreach($course_category as $course_cat){
			$cat_arr[] = $course_cat->term_id;
		}
		$args = array(
			'post_type' => 'lp_course',
			'posts_per_page' => '2',
			'post__not_in' => array($post_id),
			'tax_query' => array(
				array(
					'taxonomy' => 'course_category',
					'field'    => 'post_id',
					'terms'    => $cat_arr,
				),
			)
		);
		
		$related_posts = get_posts( $args );			
		if(isset($related_posts) && !empty($related_posts) && $related_posts <> '') { ?>
			
			<div class="related-courses">
				<h3><?php echo esc_attr__('Related Courses','edugrade'); ?></h3>
				<div class="row">
					<!--Course Box Start-->
					
					<?php
					foreach ( $related_posts as $post ) { setup_postdata( $post );
					
					$post_cats = get_the_terms($post->ID, 'course_category' );
					if(function_exists('learn_press_get_course_rate')){
						$course_rate = learn_press_get_course_rate( $post->ID, false );
						$percent = ( ! $course_rate['rated'] ) ? 0 : min( 100, ( round( $course_rate['rated'] * 2 ) / 2 ) * 20 );
					}
					
					$course = LP_Global::course();
					$lessons_count = $course->get_curriculum_items('lp_lesson') ? count( $course->get_curriculum_items('lp_lesson') ) : 0; 
					$user_count = $course->get_users_enrolled() ? $course->get_users_enrolled() : 0;
					$course_duration    = get_post_meta( $post->ID, '_lp_duration', true );
					
					?>  
						
						<div class="col-md-6">
							<div class="course-grid-box">
								<div class="course-thumb"> 
									<?php 
									if(isset($post_cats) && !empty($post_cats)){ 
										foreach($post_cats as $c){
											$cat = get_category( $c ); ?>
											<strong class="cdeprt"><?php echo esc_attr($cat->name); ?></strong> 
											<?php
											break;
										}  
									} ?>
									<a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><i class="fas fa-link"></i></a> 
									<?php echo get_the_post_thumbnail( $post->ID, 'gramotech-post-grid' );  ?> 
								</div>
								<div class="course-excerpt">
									<?php 
									if(function_exists('learn_press_get_course_rate')){ ?>
										<div class="review-stars-rated fc-rating"> <?php echo esc_attr($course_rate['rated']); ?>
											<div class="review-stars empty"></div>
											<div class="review-stars filled" style="width:<?php echo esc_attr($percent); ?>%;"></div>
										</div>
										<?php 
									} ?>
									<div class="ctxt">
										<h4><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo substr(get_the_title($post->ID),0,34); ?></a></h4>
										<p><?php echo substr(get_the_content(),0,120); ?>...</p>
									</div>
								</div>
								<ul class="course-meta">
									<li><i class="fas fa-book"></i> <?php echo esc_attr($lessons_count); ?> <?php echo esc_attr__('Les','edugrade'); ?></li>
									<li><i class="fas fa-users"></i> <?php echo esc_attr($user_count); ?> <?php echo esc_attr__('Students','edugrade'); ?></li>
									<li><i class="fas fa-clock"></i> <?php echo esc_attr($course_duration); ?></li>
								</ul>
							</div>
						</div>
						<?php 
					} ?>
				</div>
			</div>
			<?php
		} wp_reset_postdata();
	}
	
	include_once( 'custom-posts/gallery/gallery.php');	
	require_once( 'mailchimp/gramotech_mailchimp.php' );
?>