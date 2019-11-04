<?php
	
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	
	if(!function_exists('gramotech_booking_form_event_manager')){
		function gramotech_booking_form_event_manager(){
			global $EM_Notices,$EM_Event,$gramotech_allowed_html;
			$EM_Tickets = $EM_Event->get_bookings()->get_tickets();
			$EM_Ticket = $EM_Tickets->get_first();
			$can_book = is_user_logged_in() || (get_option('dbem_bookings_anonymous') && !is_user_logged_in());
			?>
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div id="em-booking">
							<a name="em-booking"></a>
							<?php 
								// We are firstly checking if the user has already booked a ticket at this event, if so offer a link to view their bookings.
								$EM_Booking = $EM_Event->get_bookings()->has_booking();
							?>
							<?php if( is_object($EM_Booking) && !get_option('dbem_bookings_double') ): //Double bookings not allowed ?>
								<p>
									<?php echo get_option('dbem_bookings_form_msg_attending'); ?>
									<a href="<?php echo em_get_my_bookings_url(); ?>"><?php echo get_option('dbem_bookings_form_msg_bookings_link'); ?></a>
								</p>
							<?php elseif( !$EM_Event->rsvp ): //bookings not enabled ?>
								<p><?php echo get_option('dbem_bookings_form_msg_disabled'); ?></p>
							<?php elseif( !$EM_Event->get_bookings()->is_open() ): //event has started ?>
								<p><?php echo get_option('dbem_bookings_form_msg_closed');  ?></p>
							<?php elseif( $EM_Event->get_bookings()->get_available_spaces() <= 0 ): ?>
								<p><?php echo get_option('dbem_bookings_form_msg_full'); ?></p>
							<?php else: ?>
								<?php echo wp_kses($EM_Notices,$gramotech_allowed_html); ?>
								<?php if( count($EM_Tickets->tickets) > 0) : ?>
									<?php //Tickets exist, so we show a booking form.
									global $wp;
									$current_url = esc_url(home_url( add_query_arg( array(), $wp->request)));
									?>
									<form id='em-booking-form' name='booking-form' method='post' action='<?php echo apply_filters('em_booking_form_action_url',$current_url); ?>'>
										<input type='hidden' name='action' value='booking_add'/>
										<input type='hidden' name='event_id' value='<?php echo esc_attr($EM_Event->event_id); ?>'/>
										<input type='hidden' name='_wpnonce' value='<?php echo wp_create_nonce('booking_add'); ?>'/>
										<?php do_action('em_booking_form_before_tickets'); //do not delete ?>
										<?php 
											// Tickets Form
											if( ($can_book || get_option('dbem_bookings_tickets_show_loggedout')) && (count($EM_Tickets->tickets) > 1 || get_option('dbem_bookings_tickets_single_form')) ){ //show if more than 1 ticket, or if in forced ticket list view mode
												//Show multiple tickets form to user, or single ticket list if settings enable this
												//If logged out, can be allowed to see this in settings witout the register form 
												em_locate_template('forms/bookingform/tickets-list.php',true, array('EM_Event'=>$EM_Event));
											}
										?>
										<?php if( $can_book ): ?>
											<?php do_action('em_booking_form_after_tickets'); ?>
											<div class='em-booking-form-details'>
												<?php 
													if( is_object($EM_Ticket) && count($EM_Tickets->tickets) == 1 && !get_option('dbem_bookings_tickets_single_form') ){
														//show single ticket form, only necessary to show to users able to book (or guests if enabled)
														em_locate_template('forms/bookingform/ticket-single.php',true, array('EM_Event'=>$EM_Event, 'EM_Ticket'=>$EM_Ticket));
													} 
												?>	
												<?php 
													do_action('em_booking_form_before_user_details');
													if( get_option('em_booking_form_custom') && has_action('em_booking_form_custom') ){ 
														//Pro Custom Booking Form. You can create your own custom form by hooking into this action and setting the option above to true
														do_action('em_booking_form_custom'); //do not delete
													}else{
														//If you just want to modify booking form fields, you could do so here
														em_locate_template('forms/bookingform/booking-fields.php',true, array('EM_Event'=>$EM_Event, 'EM_Ticket'=>$EM_Ticket));
													}
													do_action('em_booking_form_after_user_details');
												?>
												<?php do_action('em_booking_form_footer', $EM_Event); //do not delete ?>
												<div class="em-booking-buttons">
													<?php if( preg_match('/https?:\/\//',get_option('dbem_bookings_submit_button')) ): //Settings have an image url (we assume). Use it here as the button.?>
													<input type="image" src="<?php echo get_option('dbem_bookings_submit_button'); ?>" class="em-booking-submit" id="em-booking-submit" />
													<?php else: //Display normal submit button ?>
													<input type="submit" class="em-booking-submit" id="em-booking-submit" value="<?php echo get_option('dbem_bookings_submit_button'); ?>" />
													<?php endif; ?>
												</div>
											</div>
										<?php else: ?>
											<p class="em-booking-form-details"><?php echo get_option('dbem_booking_feedback_log_in'); ?></p>
										<?php endif; ?>
									</form>	
									<?php 
									if( !is_user_logged_in() && get_option('dbem_bookings_login_form') ){
										//User is not logged in, show login form (enabled on settings page)
										em_locate_template('forms/bookingform/login.php',true, array('EM_Event'=>$EM_Event));
									}
									?>
									<br class="clear" style="clear:left;" />
								<?php endif; ?>  
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php
		}	
	}
	
		// creating the class for outputing the custom navigation menu
	if( !class_exists('gramotech_menu_walker') ){
		
		// from wp-includes/nav-menu-template.php file
		class gramotech_menu_walker extends Walker_Nav_Menu{	
		
			function start_el(&$output, $item, $depth = 0, $args = array(),  $id = 0) {
				global $wp_query,$gramotech_allowed_html;
				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
				$class_names = $value = '';
				$menu_counter = rand();
				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
				$class_names = ' class="' . ( $class_names ) . '"';
		 
				$output .= $indent . '<li id="menu-item-'. esc_attr($item->ID).esc_attr($menu_counter) . '"' . esc_attr($value) . esc_attr($class_names) .'>';
		 
				$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
				$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
				$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
				$item_output = $args->before;
				$item_output .= '<a'. wp_kses($attributes,$gramotech_allowed_html) .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', esc_attr($item->title), esc_attr($item->ID) ) . $args->link_after;
				if($item->post_content <> ''){
					$item_output .= '<span>'.esc_attr($item->post_content).'</span>';
				}
				$item_output .= '</a>';
				$item_output .= $args->after;
		 
				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
		}
	}
	
	function gramotech_fetch_posts_dropdown($post_type){
		
		$choices = array();
		
		$args = array(
		  'numberposts' => -1,
		  'post_type'   => $post_type
		);

		$members = get_posts($args);
		$choices = array( '' => esc_attr__( 'All', 'edugrade' ) );
		foreach ( $members as $post ){
			setup_postdata( $post ); 
			
			$choices[$post->ID] = get_the_title($post->ID);
			
		}
		return $choices;
	}
	function gramotech_fetch_posts_dropdown_noall($post_type){
		
		$choices = array();
		
		$args = array(
		  'numberposts' => -1,
		  'post_type'   => $post_type
		);

		$members = get_posts($args);
		foreach ( $members as $post ){
			setup_postdata( $post ); 
			
			$choices[$post->ID] = get_the_title($post->ID);
			
		}
		return $choices;
	}
	 
	function gramotech_content_width() {

		$content_width = $GLOBALS['content_width'];

		// Get layout.
		$page_layout = get_theme_mod( 'page_layout' );

		// Check if layout is one column.
		if ( 'one-column' === $page_layout ) {
			if ( gramotech_is_frontpage() ) {
				$content_width = 644;
			} elseif ( is_page() ) {
				$content_width = 740;
			}
		}

		// Check if is single post and there is no sidebar.
		if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
			$content_width = 740;
		}

		/**
		 * Filter GramoTech content width of the theme.
		 *
		 * @since GramoTech 1.0
		 *
		 * @param int $content_width Content width in pixels.
		 */
		$GLOBALS['content_width'] = apply_filters( 'gramotech_content_width', $content_width );
	}
	add_action( 'template_redirect', 'gramotech_content_width', 0 );
	
	if ( ! function_exists( 'gramotech_edit_link' ) ) :
	/**
	 * Returns an accessibility-friendly link to edit a post or page.
	 *
	 * This also gives us a little context about what exactly we're editing
	 * (post or page?) so that users understand a bit more where they are in terms
	 * of the template hierarchy and their content. Helpful when/if the single-page
	 * layout with multiple posts/pages shown gets confusing.
	 */
	function gramotech_edit_link() {
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_attr__('Edit','edugrade') . '<span class="screen-reader-text"> "%s"</span>',
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
	endif;
	
	/**
	 * Modifies tag cloud widget arguments to display all tags in the same font size
	 * and use list format for better accessibility.
	 *
	 * @since GramoTech
	 *
	 * @param array $args Arguments for tag cloud widget.
	 * @return array The filtered arguments for tag cloud widget.
	 */
	function gramotech_widget_tag_cloud_args( $args ) {
		$args['largest']  = 1;
		$args['smallest'] = 1;
		$args['unit']     = 'em';
		$args['format']   = 'list';

		return $args;
	}
	add_filter( 'widget_tag_cloud_args', 'gramotech_widget_tag_cloud_args' );
	
	/**
	 * Additional features to allow styling of the templates
	 */
		/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
	 * a 'Continue reading' link.
	 *
	 * @since GramoTech 1.0
	 *
	 * @param string $link Link to single post/page.
	 * @return string 'Continue reading' link prepended with an ellipsis.
	 */
	function gramotech_excerpt_more( $link ) {
		if ( is_admin() ) {
			return $link;
		}

		return ' &hellip; ';
	}
	add_filter( 'excerpt_more', 'gramotech_excerpt_more' );

	/**
	 * Handles JavaScript detection.
	 *
	 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
	 *
	 * @since GramoTech 1.0
	 */
	function gramotech_javascript_detection() {
		echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
	}
	add_action( 'wp_head', 'gramotech_javascript_detection', 0 );

	/**
	 * Add a pingback url auto-discovery header for singularly identifiable articles.
	 */
	function gramotech_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
		}
	}
	add_action( 'wp_head', 'gramotech_pingback_header' );
	
	function gramotech_breadcrumbs() {	
		$showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter = ''; // delimiter between crumbs
		$home = esc_attr__('Home','edugrade'); // text for the 'Home' link
		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$before = '<li class="current">'; // tag before the current crumb
		$after = '</li>'; // tag after the current crumb
	
		global $post;
		$homeLink = home_url('/');
	 
		if (is_home() || is_front_page()) {	  
			if ($showOnHome == 1) echo '<ul class="breadcrumb"><li class=""><a href="' . esc_url($homeLink) . '"><i class="fas fa-home"></i> '.esc_attr($home).'</a></li></ul>';
	 
		} else {
		
			echo '<ul class="breadcrumb"><li class=""><a href="' . esc_url($homeLink) . '"><i class="fas fa-home"></i> '.esc_attr($home).'</a> ' . esc_attr($delimiter) . '</li> ';
	 
			if ( is_category() ) {
				$thisCat = get_category(get_query_var('cat'), false);
				if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . esc_attr($delimiter) . ' ');
				echo html_entity_decode($before) . esc_attr__('Archive by category ','edugrade') . esc_attr(single_cat_title('', false)) . '' . $after;
	 
			} elseif ( is_search() ) {
				echo html_entity_decode($before) . esc_attr__('Search results for','edugrade') . esc_attr(get_search_query()) . '' . $after;
			} elseif ( is_day() ) {
				echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_attr(get_the_time('Y')) . '</a> ' . esc_attr($delimiter) . '</li> ';
				echo '<li><a href="' . esc_url(get_month_link(get_the_time('Y'),get_the_time('m'))) . '">' . esc_attr(get_the_time('F')) . '</a> ' . esc_attr($delimiter) . '</li> ';
				echo html_entity_decode($before) . esc_attr(get_the_time('d')) . $after;
			} elseif ( is_month() ) {
				echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_attr(get_the_time('Y')) . '</a> ' . esc_attr($delimiter) . ' </li>';
				echo html_entity_decode($before) . esc_attr(get_the_time('F')) . $after;
			} elseif ( is_year() ) {
				echo html_entity_decode($before) . esc_attr(get_the_time('Y')) . $after;
			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$cat = array();
					if($post_type->name == 'event'){
						$categories = get_the_terms( $post->ID, 'event-categories' );
						if($categories <> ''){
							foreach ( $categories as $category ) {
								$cat[] = $category;
							}
						}
						if(isset($cat[0])){$cat = $cat[0];}
				
						if ($showCurrent == 1) echo html_entity_decode($before) . esc_attr(get_the_title()) . $after;	
					}else if($post_type->name == 'testimonial'){
						$categories = get_the_terms( $post->ID, 'testimonial-category' );
						if($categories <> ''){
							foreach ( $categories as $category ) {
								$cat[] = $category;
							}
						}
						if(isset($cat[0])){$cat = $cat[0];}
						if(!is_object($cat) ){
							echo '<li><a href="'.esc_url(get_term_link($cat->term_id,'testimonial-category')).'">'.esc_attr($cat->name).'</a></li>';
						}
						if ($showCurrent == 1) echo html_entity_decode($before) . esc_attr(get_the_title()) . $after;	
					}else{
						global $wp_query,$post;
				
						$post_type = get_post_type_object(get_post_type());
						$slug = $post_type->rewrite;
						echo '<li><a href="' . esc_url($homeLink . '/' . $slug['slug']) . '/">' . esc_attr($post_type->labels->name) . '</a>';
						if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' </li>' . html_entity_decode($before) . esc_attr(get_the_title()) . $after;
					}
				} else {
					$cat = get_the_category(); 
			
					$cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, ' ' . esc_attr($delimiter) . ' ');
					if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
					$allowed_html = array(
						'a' => array(
							'href' => array(),
							'title' => array()
						)
					);
					echo '<li>'.(wp_kses($cats,$allowed_html)).'</li>';
					if ($showCurrent == 1) echo html_entity_decode($before) . esc_attr(get_the_title()) . $after;
				}
	 
			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				echo html_entity_decode($before) . esc_attr__('Archive by category','edugrade') . esc_attr(single_cat_title('', false)) . '' . $after;
			} elseif ( is_attachment() ) {
				$parent = get_post($post->post_parent);
		  
				echo '<li><a href="' . esc_url(get_permalink($parent)) . '">' . esc_attr($parent->post_title) . '</a>';
				if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' </li>' . html_entity_decode($before) . esc_attr(get_the_title()) . $after;
			} elseif ( is_page() && !$post->post_parent ) {
				if ($showCurrent == 1) echo html_entity_decode($before) . esc_attr(get_the_title()) . $after;
	 
			} elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<li><a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_attr(get_the_title()) . '</a></li>';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo html_entity_decode($breadcrumbs[$i]);
					if ($i != count($breadcrumbs)-1) echo ' ' . esc_attr($delimiter) . ' ';
				}
				if ($showCurrent == 1) echo ' ' . esc_attr($delimiter) . ' ' . html_entity_decode($before) . esc_attr(get_the_title()) . $after;
	 
			} elseif ( is_tag() ) {
				echo html_entity_decode($before) . esc_attr__('Posts tagged','edugrade') . esc_attr(single_tag_title('', false)) . '' . $after;
			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata($author);
				echo html_entity_decode($before) . esc_attr__('Articles posted by','edugrade') . esc_attr($userdata->display_name) . $after;
			} elseif ( is_404() ) {
				echo html_entity_decode($before) . esc_attr__('Error 404','edugrade') . $after;
			}
			if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
			}
			echo '</ul>';
		}
	}

	function gramotech_pagination($the_query, $range = 4){
		/* Don't print empty markup if there's only one page. */
		
		if ( $the_query->max_num_pages < 2 ) {
			return;
		}
		
		$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
					
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
		
		/* Set up paginated links.*/
		$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $the_query->max_num_pages,
			'current'  => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="fa fa-angle-left"></i>  '.esc_attr__('Previous','edugrade').'',
			'next_text' => ''.esc_attr__('Next','edugrade').' <i class="fa fa-angle-right"></i>',
			'before_page_number' => '',
			'after_page_number'  => ''
		) );

		html_entity_decode($links);

		if ( $links ) :
			return '<div class="gramotech-pagination text-center"><ul class="pagination"><li>'. $links . '</li></ul></div>';
		endif;
	}
	
	global $gramotech_allowed_html;
	$gramotech_allowed_html = 
		array(
		'a' => array(
			'href' => array(),
			'title' => array()
		),
		'div' => array(
			'id' => array(),
			'class' => array()
		),
		'br' => array(),
		'em' => array(),
		'p' => array('id' => array(),'class' => array()),
		'strong' => array(),
		'h1' => array('id' => array(),'class' => array()),
		'h2' => array('id' => array(),'class' => array()),
		'h3' => array('id' => array(),'class' => array()),
		'h4' => array('id' => array(),'class' => array()),
		'h5' => array('id' => array(),'class' => array()),
		'h6' => array('id' => array(),'class' => array()),
		'span' => array('id' => array(),'class' => array()),
		'i' => array('id' => array(),'class' => array()),
		'ul' => array('id' => array(),'class' => array()),
		'li' => array('id' => array(),'class' => array()),
		'iframe' => array('id' => array(),'class' => array(), 'style' => array(),'frameborder' => array()),
		'img' => array('id' => array(),'class' => array(), 'alt' => array(),'src' => array(),'height' => array(),'width' => array()),
		'blockquote' => array('id' => array(),'class' => array()),
	);
	
	// a comment callback function to create comment list
	if ( !function_exists('gramotech_comment_list') ){
		function gramotech_comment_list( $comment, $args, $depth ){

			if ( 'div' === $args['style'] ) {
				$tag       = 'div';
				$add_below = 'comment';
			} else {
				$tag       = 'li';
				$add_below = 'div-comment';
			}
			
			$GLOBALS['comment'] = $comment;
			switch ( $comment->comment_type ){
				case 'pingback' :
				case 'trackback' :
				?>	
				<li <?php comment_class('pingbacks-custom'); ?> id="comment-<?php comment_ID(); ?>">
					<p>
						<?php echo esc_attr__( 'Pingback :', 'edugrade' ); ?> 
						<?php comment_author_link(); ?>
					</p>
				<?php break; ?>

				<?php default : global $post; ?>
				<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
					<div id="div-comment-<?php comment_ID() ?>" class="comm-post comment-body">
						<div class="user-thumb"><?php echo get_avatar( $comment, 70); ?></div>
						<div class="user-comments"> 
							<h6 class="aname"><?php echo get_comment_author_link(); ?></h6> 
							<ul class="post-time">
								<li><?php echo esc_attr(get_comment_date('F d, Y')); ?> <?php echo esc_attr__('at','edugrade'); ?>  <?php echo esc_attr(get_comment_date('H : i a')); ?></li> 
								<li>
									<?php
									if( '0' == $comment->comment_approved ){ ?>
										<p class="comment-awaiting-moderation"><?php echo esc_attr__( 'Your comment is awaiting moderation.', 'edugrade' ); ?></p>
										<?php
									} 
									if( $edit_link = get_edit_comment_link() ){ ?>
										<a href="<?php echo esc_url($edit_link); ?>"><i class="fa fa-edit"></i> <?php echo esc_attr__('Edit','edugrade'); ?></a>
										<?php
									}	
									$reply_defaults = array(
										'add_below'     => 'div-comment',
										'respond_id'    => 'respond',
										'reply_text'    => esc_attr__( 'Reply','edugrade' ),
										/* translators: Comment reply button text. 1: Comment author name */
										'reply_to_text' => esc_attr__( 'Reply to %s','edugrade' ),
										'login_text'    => esc_attr__( 'Log in to Reply','edugrade' ),
										'max_depth'     => $args['max_depth'],
										'depth'         => $depth,
										'before'        => '<span class="reply-link"><i class="fa fa-reply"></i>',
										'after'         => '</span>'
									); ?>
								</li>
							</ul>	
							<?php comment_text();  ?>
							<div class="gramotech-reply"> 
								<?php echo get_comment_reply_link($reply_defaults); ?>
							</div>
						</div>
					</div>
					<?php
					break;
			}
		}
	}
	
	//Define SSL
	
	if(is_ssl()){
		define('GRAMOTECH_HTTP', 'https://');
	}else{
		define('GRAMOTECH_HTTP', 'http://');
	}
	
	//Header Background function
	if (!function_exists('gramotech_header_background')){	
		function gramotech_header_background(){
			//Custom background Support	
			$args = array(
				'color-scheme'          => '',
				'default-image'          => '',
				'wp-head-callback'       => '_custom_background_cb',
				'admin-head-callback'    => '',
				'admin-preview-callback' => ''
			);

			//Custom Header Support	
			$defaults = array(
				'default-image'          => '',
				'random-default'         => false,
				'width'                  => 950,
				'height'                 => 200,
				'flex-height'            => false,
				'flex-width'             => false,
				'default-text-color'     => '',
				'header-text'            => true,
				'uploads'                => true,
				'wp-head-callback'       => '',
				'admin-head-callback'    => '',
				'admin-preview-callback' => '',
			);
			global $wp_version;
			if ( version_compare( $wp_version, '3.4', '>=' ) ){ 
				add_theme_support( 'custom-background', $args );
				add_theme_support( 'custom-header', $defaults );
			}
		}
	}
	gramotech_header_background();
	
	// modify a WordPress gallery style
	add_filter('gallery_style', 'gramotech_gallery_style');
	if( !function_exists('gramotech_gallery_style') ){
		function gramotech_gallery_style( $style ){
			return str_replace('border: 2px solid #cfcfcf;', 'border-width: 1px; border-style: solid;', $style);
		}
	}
	
	// turn the page comment off by default
	add_filter( 'wp_insert_post_data', 'gramotech_page_default_comments_off' );
	if( !function_exists('gramotech_page_default_comments_off') ){
		function gramotech_page_default_comments_off( $data ) {
			if( $data['post_type'] == 'page' && $data['post_status'] == 'auto-draft' ) {
				$data['comment_status'] = 0;
			} 

			return $data;
		}
	}
	
	function gramotech_video_controls( $settings ) {
		$settings['l10n']['play'] = '<span class="screen-reader-text">' . esc_attr__( 'Play background video', 'edugrade' ) . '</span>' . gramotech_get_svg( array( 'icon' => 'play' ) );
		$settings['l10n']['pause'] = '<span class="screen-reader-text">' . esc_attr__( 'Pause background video', 'edugrade' ) . '</span>' . gramotech_get_svg( array( 'icon' => 'pause' ) );
		return $settings;
	}
	add_filter( 'header_video_settings', 'gramotech_video_controls' );
	
	// rewrite permalink rule upon theme activation
	add_action( 'after_switch_theme', 'gramotech_flush_rewrite_rules' );
	if( !function_exists('gramotech_flush_rewrite_rules') ){
		function gramotech_flush_rewrite_rules() {
			global $pagenow, $wp_rewrite;
			if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ){
				$wp_rewrite->flush_rules();
			}
		}
	}
	
	/* Ajaxify Comments */
	add_action( 'wp_ajax_ajaxcomments', 'gramotech_submit_ajax_comment' );
	add_action( 'wp_ajax_nopriv_ajaxcomments', 'gramotech_submit_ajax_comment' );
 
	function gramotech_submit_ajax_comment(){
		global $gramotech_allowed_html;
		$comment = wp_handle_comment_submission( wp_unslash( $_POST ) );
		if ( is_wp_error( $comment ) ) {
			$error_data = intval( $comment->get_error_data() );
			if ( ! empty( $error_data ) ) {
				wp_die( '<p>' . $comment->get_error_message() . '</p>', esc_attr__( 'Comment Submission Failure','edugrade' ), array( 'response' => $error_data, 'back_link' => true ) );
			} else {
				wp_die( 'Unknown error' );
			}
		}
	 
		/*
		 * Set Cookies
		 */
		$user = wp_get_current_user();
		do_action('set_comment_cookies', $comment, $user);
	 
		/*
		 * If you do not like this loop, pass the comment depth from JavaScript code
		 */
		$comment_depth = 1;
		$comment_parent = $comment->comment_parent;
		while( $comment_parent ){
			$comment_depth++;
			$parent_comment = get_comment( $comment_parent );
			$comment_parent = $parent_comment->comment_parent;
		}
	 
		/*
		 * Set the globals, so our comment functions below will work correctly
		 */
		$GLOBALS['comment'] = $comment;
		$GLOBALS['comment_depth'] = $comment_depth;
	 
		/*
		 * Here is the comment template, you can configure it for your website
		 * or you can try to find a ready function in your theme files
		 */
		$comment_html = '
		<li ' . comment_class('', null, null, false ) . ' id="comment-' . get_comment_ID().'">
			<div id="div-comment-' . get_comment_ID() . '" class="comm-post comment-body">
				<div class="user-thumb"> '. get_avatar( $comment, 70).' </div>
				<div class="user-comments"> <h6 class="aname">'. get_comment_author_link().'</h6> 
					<ul class="post-time">
						<li>'. esc_attr(get_comment_date('F d, Y')).' '.esc_attr__('at','edugrade').' '.get_comment_date('H i : a').'</li>
						<li>';
							if( '0' == $comment->comment_approved ){
								$comment_html .= '<p class="comment-awaiting-moderation">'. esc_attr__( 'Your comment is awaiting moderation.', 'edugrade' ).'</p>';
							} 
							if( $edit_link = get_edit_comment_link() ){
								$comment_html .= '<a href="'. esc_url($edit_link).'">'. esc_attr__('Edit','edugrade').'</a>';
							}
							$comment_html .= '
						</li>
					</ul>
					' . apply_filters( 'comment_text', get_comment_text( $comment ), $comment ) . '';
					
					$comment_html .= '
				</div>
			</div>
		</li>';
		echo wp_kses($comment_html,$gramotech_allowed_html);
		die();
	}
	
	if(!function_exists('gramotech_get_related_posts')){
		function gramotech_get_related_posts($post_id){
			$cats = wp_get_post_terms($post_id, 'category', array("fields" => "all"));
			
			$cat_arr = '';
			$post_html = '';
			if($cats) {
				$cat_array = array();
				foreach( $cats as $cat ) {
					$cat_arr .= $cat->slug . ',';			
				}
				
				if( !empty($cat_arr)){
					$args['tax_query'] = array('relation' => 'OR');
					
					array_push($args['tax_query'], 
						array(
							'terms'=>explode(',', $cat_arr), 
							'taxonomy'=>'category', 
							'field'=>'slug'
						)
					);
				}
				
				$args['post_type'] = 'post';
				$args['numberposts'] = 3;
				$args['post__not_in'] = array($post_id);
				
				$related_posts = get_posts( $args );			
				if($related_posts) {
					$post_html .= '
					<div class="related-posts">
						<h3 class="stitle">'. esc_attr__('Related Posts','edugrade').'</h3>
						<div class="row">
							<ul>';
								foreach ( $related_posts as $post ){ 
									setup_postdata( $post );
									
									$comment_count = wp_count_comments( $post->ID );
									$comment_count = $comment_count->total_comments;
									$post_html .= '
									<li class="col-md-4">
										<div class="rel-box">
											<h6><a href="'.esc_url(get_permalink($post->ID)).'">'.substr(esc_attr(get_the_title($post->ID)),0,62).' </a></h6>
											<ul class="news-meta">
												<li>'.esc_attr__('Posted:','edugrade').' '.esc_attr(get_the_date('M d, y')).'</li>
												<li><i class="far fa-comment"></i> '.esc_attr($comment_count).'</li>';
												if(function_exists('gramotech_get_simple_likes_button')){ 
													$post_html .= '<li>'.gramotech_get_simple_likes_button($post->ID).'</li>';
												}
												$post_html .= '
											</ul>
										</div>
									</li>';
								}
								$post_html .= '
							</ul>
						</div>
					</div>';
				}
				return $post_html;
				wp_reset_postdata();
			}	
		}		
	}

	if(!function_exists('gramotech_get_post_thumbnail')){
		function gramotech_get_post_thumbnail($post_id,$post_format,$format_value,$thumbnail_size){
			
			$return = '';
			
			if($post_format == 'gallery'){
				$gallery_count = count($format_value);
				if($gallery_count >= 5){
					$gallery_image_id = array();
					foreach($format_value as $gallery){
						$gallery_image_id[] = $gallery['attachment_id'];
					}	
					echo '
					<div class="blog-post blog-thumb gallery-post-images">
						<div class="col-md-4">
							'.wp_get_attachment_image( $gallery_image_id[0], 'full').'
							'.wp_get_attachment_image( $gallery_image_id[1], 'full').'
						</div>';
						echo '
						<div class="col-md-4">
							'.wp_get_attachment_image( $gallery_image_id[2], 'full').'
						</div>';
						echo '
						<div class="col-md-4">
							'.wp_get_attachment_image( $gallery_image_id[3], 'full').'
							'.wp_get_attachment_image( $gallery_image_id[4], 'full').'
						</div>';
						if($gallery_count > 5){
							for($i = 5; $i < $gallery_count; $i++){
								echo '
								<div class="col-md-4">
									'.wp_get_attachment_image( $gallery_image_id[$i], 'full').'
								</div>';
							}	
						}
						echo '
					</div>	';
				}else{
					echo '
					<div class="col-md-4">';
						foreach($format_value as $gallery){
							echo wp_get_attachment_image( $gallery['attachment_id'], 'full');
						}
						echo '
					</div> ';
				} 
				
						
						$return .= ' ';
				
			}else if($post_format == 'youtube-video'){
				$return = '<div class="blog-post blog-video"><iframe src="'.esc_url('https://www.youtube.com/embed/') . esc_attr($format_value).'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>';
			}else if($post_format == 'vimeo-video'){
				$return = '<div class="blog-post blog-video"><iframe src="'.esc_url('https://player.vimeo.com/video/') . esc_attr($format_value).'"></iframe></div>';
			}else if($post_format == 'soundcloud-audio'){
				$return = '<div class="blog-post blog-audio">' . esc_attr($format_value) .'</div>';
			}else{
				$return = get_the_post_thumbnail($post_id,$thumbnail_size );
			}
			return $return;
		}
	}
	
	// add script and style to header area
	add_action( 'wp_head', 'gramotech_favicon' );
	if( !function_exists('gramotech_favicon') ){
		function gramotech_favicon() {	
			if(function_exists('fw_get_db_settings_option')){
				$favicon = fw_get_db_settings_option('favicon');
				if(isset($favicon) && !empty($favicon)){
					echo '<link rel="icon" href="' . esc_url($favicon['url']) . '" type="image/png">';
				}
			}	
		}
	}

	/* Get Popular posts */
	function gramotech_popular_set_post_views($postID) {
		$count_key = 'popular_post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
	
	function gramotech_popular_track_post_views ($post_id) {
		if ( !is_single() ) return;
		if ( empty ( $post_id) ) {
			global $post;
			$post_id = $post->ID;    
		}
		gramotech_popular_set_post_views($post_id);
	}
	add_action( 'wp_head', 'gramotech_popular_track_post_views');


	function gramotech_wpb_get_post_views($postID){
		$count_key = 'popular_post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0" . esc_attr__('View','edugrade') ;
		}
		return $count. esc_attr__('Views','edugrade');
	}
	
	add_action( 'wp_ajax_nopriv_load_more_pagination', 'gramotech_load_more_pagination' );
	add_action( 'wp_ajax_load_more_pagination', 'gramotech_load_more_pagination' );
	
	function gramotech_load_more_pagination() {
	
		$blog_cat = $_POST['blog_cat'];
		$blog_titles = $_POST['blog_titles'];
		$blog_descrp = $_POST['blog_descrp'];
		$page = $_POST['page'] + 1;
		
		$blog_cat = (explode(" ",$blog_cat));
		
		$news_args = array(
			'post_type' => 'post',
			'posts_per_page' => 3,
			'orderby' => 'post_date',
			'order' => 'desc',
			'paged' => $page,
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'field'    => 'post_id',
					'terms'    => $blog_cat,
				),
			)
		);
		
		$query = new WP_Query( $news_args );
		
		query_posts($news_args);
		global $wp_query;
		$left = 0;
		while( $query->have_posts() ){
			$query->the_post();
			global $post;
			$post_tags = wp_get_post_tags( $post->ID );
			
			
			echo '
			<div class="item" style="position: relative; left: '.esc_attr($left).'px; top: 580px;">
				<div class="news-box">';
					
					if(has_post_thumbnail()){
						echo '
						<div class="news-thumb"> 
							'. the_post_thumbnail('gramotech-post-grid').'
						</div>';
					}echo '
					<div class="news-excerpt">
						<span class="post-date"><i class="far fa-calendar-alt"></i> '. esc_attr(get_the_date('F d, Y')).'</span>
						<h4> <a href="'. esc_url(get_permalink()).'">'. substr(get_the_title($post->ID),0,$blog_titles).'</a> </h4>
						<p>'. substr(get_the_content($post->ID),0,$blog_descrp).'</p>
					</div>
				   <a class="news-details" href="'. esc_url(get_permalink()).'">'. esc_attr__('Read More','edugrade').'</a> 
				</div>
			</div>';
			$left+=380;
		}
		
		$current_page = $wp_query->get( 'paged' );
		if ( ! $current_page ) {
			$current_page = 1;
		}
		if ( $current_page == $wp_query->max_num_pages ) {
			$is_last_page = 'true';
		}else{
			$is_last_page = 'false';
		}
		
		if($wp_query->max_num_pages > 1){
			if($is_last_page == 'false'){
				echo'<a class="load-more load-more-news" href="#">'.esc_attr__('Load More','edugrade').'</a>
				<input type="hidden" name="page-number" class="page-number" value="'.esc_attr($page).'">';
			}		
		}
		die();
	}
	
	function gramotech_is_last_page($wp_query) {
		
		$current_page = $wp_query->get( 'paged' );
		if ( ! $current_page ) {
			$current_page = 1;
		}
		if ( $current_page == $wp_query->max_num_pages ) {
			return 'true';
		}else{
			return 'false';
		}
	}
	
	remove_action( 'learn-press/before-main-content', 'learn_press_breadcrumb', 10 );
	remove_action( 'learn-press/course-buttons', 'learn_press_course_external_button', 5 );
	remove_action( 'learn-press/course-buttons', 'learn_press_course_purchase_button', 10 );
	remove_action( 'learn-press/course-buttons', 'learn_press_course_enroll_button', 15 );
	remove_action( 'learn-press/course-buttons', 'learn_press_course_continue_button', 25 );
	
	add_action('gramotech_single_course_meta', 'learn_press_course_instructor', 5);
	add_action('gramotech_single_course_meta', 'learn_press_course_categories', 15);
	add_action('gramotech_single_course_payment', 'learn_press_course_price', 5);
	add_action('gramotech_single_course_payment', 'learn_press_course_enroll_button', 20);
	add_action('gramotech_single_course_payment', 'learn_press_course_continue_button', 25);
	add_action('gramotech_single_course_payment', 'learn_press_course_purchase_button', 15);
	
	remove_action( 'learn-press/content-landing-summary', 'learn_press_course_price', 25 );
	remove_action( 'learn-press/content-landing-summary', 'learn_press_course_buttons', 30 );