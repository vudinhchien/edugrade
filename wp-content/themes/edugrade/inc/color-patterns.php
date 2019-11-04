<?php
/**
 * GramoTech: Color Schemes
 *
 * @package WordPress
 * @subpackage GramoTech
 * @since 1.0
 */

/**
 * Generate the CSS for the current custom color scheme.
 */

	if (!function_exists('gramotech_google_font_arrays')) {
		function gramotech_google_font_arrays($gramotech_google_font) {
			$fonts_url = '';
			/**
			 * Get remote fonts
			 * @param array $gramotech_google_font
			 */
			if ( ! sizeof( $gramotech_google_font ) ) {
				return '';
			}

			$font_families	= array();
			foreach ( $gramotech_google_font as $font_family ) {
				
				$variants_string = implode( ',', $font_family['variants'] );
				
				$font_families[] = $font_family['family'].':'.$variants_string	;
			}
			
			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => '',
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
			
			return esc_url_raw( $fonts_url );
		}
	}


	if ( ! function_exists( 'dynamic_style_file_write' ) ) {
		function dynamic_style_file_write() {
			
			$dynamic_color_css = '';
	
			$logo_width = fw_get_db_settings_option('logo_width');
			$logo_height = fw_get_db_settings_option('logo_height');
			$logo_margin_top = fw_get_db_settings_option('logo_margin_top');
			$logo_margin_bottom = fw_get_db_settings_option('logo_margin_bottom');
			$body_background_color = fw_get_db_settings_option('body_background_color');
			$body_font = fw_get_db_settings_option('body_font');
			$h1_font = fw_get_db_settings_option('h1_font');
			$h2_font = fw_get_db_settings_option('h2_font');
			$h3_font = fw_get_db_settings_option('h3_font');
			$h4_font = fw_get_db_settings_option('h4_font');
			$h5_font = fw_get_db_settings_option('h5_font');
			$h6_font = fw_get_db_settings_option('h6_font');
			$nav_font = fw_get_db_settings_option('nav_font');
			$main_color_scheme = fw_get_db_settings_option('main_color_scheme');
			$secondary_color_scheme = fw_get_db_settings_option('secondary_color_scheme');
			
			if(isset($logo_width) && $logo_width <> ''){
				$dynamic_color_css .= 'a.navbar-brand img{width:'.esc_attr($logo_width) .'px;}';
			}
			
			if(isset($logo_height) && $logo_height <> ''){
				$dynamic_color_css .= 'a.navbar-brand img{height:'.esc_attr($logo_height) .'px;}';	
			}			
						
			if(isset($logo_margin_top) && $logo_margin_top <> ''){
				$dynamic_color_css .= 'a.navbar-brand img{margin-top:'.esc_attr($logo_margin_top) .'px;}';	
			}
			
			if(isset($logo_margin_bottom) && $logo_margin_bottom <> ''){
				$dynamic_color_css .= 'a.navbar-brand img{margin-bottom:'.esc_attr($logo_margin_bottom) .'px;}';	
			}	
			if(isset($body_background_color) && $body_background_color <> ''){
				$dynamic_color_css .= 'body{background-color:'.esc_attr($body_background_color) .';}';	
			}
			
			if(isset($body_font['family']) && $body_font['family'] <> ''){
				$dynamic_color_css .= 'body, p,ul,li{font-family:'.esc_attr($body_font['family']) .';}';	
			}
			
			if(isset($body_font['size']) && $body_font['size'] <> ''){
				$dynamic_color_css .= 'body p , p{font-size:'.esc_attr($body_font['size']) .'px;}';	
			}
			
			if(isset($h1_font['family']) && $h1_font['family'] <> ''){
				$dynamic_color_css .= 'body h1, h1{font-family:'.esc_attr($h1_font['family']) .';}';	
			}
			
			if(isset($h1_font['size']) && $h1_font['size'] <> ''){
				$dynamic_color_css .= 'body h1, h1{font-size:'.esc_attr($h1_font['size']) .'px;}';	
			}
			
			if(isset($h2_font['family']) && $h2_font['family'] <> ''){
				$dynamic_color_css .= 'body h2, h2{font-family:'.esc_attr($h2_font['family']) .';}';	
			}
			
			if(isset($h2_font['size']) && $h2_font['size'] <> ''){
				$dynamic_color_css .= 'body h2, h2{font-size:'.esc_attr($h2_font['size']) .'px;}';	
			}
			
			if(isset($h3_font['family']) && $h3_font['family'] <> ''){
				$dynamic_color_css .= 'body h3, h3{font-family:'.esc_attr($h3_font['family']) .';}';	
			}
			
			if(isset($h3_font['size']) && $h3_font['size'] <> ''){
				$dynamic_color_css .= 'body h3, h3{font-size:'.esc_attr($h3_font['size']) .'px;}';	
			}
			
			if(isset($h4_font['family']) && $h4_font['family'] <> ''){
				$dynamic_color_css .= 'body h4, h4{font-family:'.esc_attr($h4_font['family']) .';}';	
			}
			
			if(isset($h4_font['size']) && $h4_font['size'] <> ''){
				$dynamic_color_css .= 'body h4, h4{font-size:'.esc_attr($h4_font['size']) .'px;}';	
			}	

			if(isset($h5_font['family']) && $h5_font['family'] <> ''){
				$dynamic_color_css .= 'body h5, h5{font-family:'.esc_attr($h5_font['family']) .';}';	
			}
			
			if(isset($h5_font['size']) && $h5_font['size'] <> ''){
				$dynamic_color_css .= 'body h5, h5{font-size:'.esc_attr($h5_font['size']) .'px;}';	
			}	

			if(isset($h6_font['family']) && $h6_font['family'] <> ''){
				$dynamic_color_css .= 'body h6, h6{font-family:'.esc_attr($h6_font['family']) .';}';	
			}
			
			if(isset($h6_font['size']) && $h6_font['size'] <> ''){
				$dynamic_color_css .= 'body h6, h6{font-size:'.esc_attr($h6_font['size']) .'px;}';	
			}
			
			if(isset($nav_font['family']) && $nav_font['family'] <> ''){
				$dynamic_color_css .= '.header-style-1 .navbar-nav>li>a, .header-style-2 .navbar-nav>li>a, .header-style-3 .navbar-nav>li a{font-family:'.esc_attr($nav_font['size']['family']) .';}';	
			}
			
			if(isset($nav_font['size']) && $nav_font['size'] <> ''){
				$dynamic_color_css .= '.header-style-1 .navbar-nav>li>a, .header-style-2 .navbar-nav>li>a, .header-style-3 .navbar-nav>li a{font-size:'.esc_attr($nav_font['size']['size']) .'px;}';	
			}
			
			if(isset($main_color_scheme) && $main_color_scheme <> ''){
				$dynamic_color_css .= '
				.header-style-1 .navbar-nav>li>a:hover,
				.header-style-1 .navbar-nav>li>a:focus,
				.cart-box .item a,
				.welcome-title strong,
				.campus-box:hover a,
				ul.achievements li:hover strong,
				ul.achievements li:hover i,
				.header-style-1 .navbar-nav>li>a:hover,
				.header-style-1 .navbar-nav>li>a:focus,
				span.etime i,
				.event-box .event-excerpt span i,
				.event-thumb a,
				.team-name strong,
				.other-members a:before,
				.other-members a:hover,
				.ci-box.c2:hover .hcp-icon,
				.team-style-1.team-page .team-box ul.team-social a,
				.team-style-1.team-page .team-box .team-cap strong,
				.team-details-text strong.team-title,
				.team-details-text ul.check-list li:before,
				.team-details-text .taddress li i,
				ul.header-left a:hover,
				.header-right a:hover,
				.header-style-3 .navbar a:hover,
				.h3-banner-cap .search-form li i,
				.who-we-are a:hover,
				.course-box-2 .course-meta li i,
				.course-box-2 .ctxt strong,
				.course-box-2:hover .course-excerpt h4 a,
				.course-grid-box:hover h4 a,
				.h3-testimonials .tbox strong,
				ul.social-links a:hover,
				.sidebar .textwidget .name,
				.side-quick-link li:hover a,
				span.sb-date i,
				.latest-posts h6 a:hover,
				.details-col .title-area span i,
				.blog-grid-post .post-excerpt .date,
				.blog-grid-post .post-excerpt a.bd:hover,
				.blog-grid-post .post-excerpt h4 a:hover,
				ul.course-details-meta .fc-rating,
				ul.course-details-meta h4,
				.gramotech-page-content ul.learn-press-courses .course a:hover,
				ul.learn-press-courses .course .course-info .course-price .price,
				.course-text .check-list li:before,
				ul.learn-press-nav-tabs .course-nav.active a, 
				.course-detail ul.learn-press-nav-tabs .course-nav a:hover,
				body .nav>li>a:focus, 
				body .nav>li>a:hover,
				.course-listing .course-grid-box .course-excerpt .cdetail:hover,
				.page-404-wrap .not-found{
					color: '. esc_attr($main_color_scheme) .';
				}';
			
				$dynamic_color_css .= '
				.my-account .acc-btn i,
				.sicon-btn:hover,
				.btn-group.open .sicon-btn,
				.home1-slider .slide-caption a,
				.cart-box .view-link a,
				.welcome-title h1:after,
				a.btn-style-1:after,
				.more-news,
				.news-box a.news-details,
				.load-more a:hover,
				.edate,
				.my-account .acc-btn i,
				ul.team-social a:hover,
				.stitle2:after,
				.gramotech-pagination .pagination>li.active a,
				.gramotech-pagination .pagination>li>a:hover,
				.gramotech-pagination .pagination>li>span:hover,
				.ci-box.c2 .hcp-icon,
				.ci-box.c2:hover strong,
				.newsletter .container,
				.team-page .team-box .team-cap .plusc,
				.team-style-1.team-page .team-box ul.team-social a:hover,
				.team-contact button:hover,
				.header-right li.apply a,
				.h3-banner-cap .search-form .sbtn:hover,
				.h3-title:after,
				#h3-dprt.owl-theme .owl-nav button:hover,
				.h3-featured-courses ul.nav li.active a,
				.h3-featured-courses ul.nav li a:hover,
				.course-thumb a:hover,
				.course-box-2:hover .cdetail,
				.course-grid-box:hover a.cdetail,
				.h3-newsletter .input-group .subscribe,
				.home3-faq .panel-title a,
				.search-widget .sbtn,
				.sidebar .textwidget .social a:hover,
				.side-quick-link li:hover i,
				ul.upcoming-events li:hover,
				.tagcloud a:hover,
				.event-gallery .owl-theme .owl-nav [class*="owl-"]:hover,
				.event-counter,
				.post-thumb a:hover,
				span.note,
				.course-table td span,
				.time-table th,
				.search-404 button,
				a.back2home,
				.em-pagination .page-numbers:hover, 
				.em-pagination .page-numbers.current, 
				.gramotech-pagination .pagination>li>span.current, 
				.gramotech-pagination .pagination>li>a:hover, 
				.gramotech-pagination .pagination>li>span:hover, 
				.gramotech-pagination .pagination>li.active a, 
				.gramotech-pagination .pagination>li>a:hover, 
				.gramotech-pagination .pagination>li>span:hover,
				.sidebar .gramotech-widget .tagcloud a:hover,
				ul#menu-quick-links li:hover:before,
				.learnpress-page .lp-button:hover, 
				.em-booking-form-details .em-booking-submit:hover, 
				div.em-booking-login input#em_wp-submit:hover,
				.course-detail ul.learn-press-nav-tabs .course-nav a:hover:after,
				ul.learn-press-nav-tabs .course-nav.active a:after,
				.blog-full-new .blog-grid-post .post-excerpt a.bd:hover,
				.comment-respond input#submit:hover,
				.home1-slider .slide-caption a{
					background-color: '. esc_attr($main_color_scheme) .';
				}';
				
				$dynamic_color_css .= '
				.sidebar .gramotech-widget .tagcloud a:hover,
				.sicon-btn:hover,
				.btn-group.open .sicon-btn,
				ul.team-social a:hover,
				.team-style-1.team-page .team-box ul.team-social a,
				#h3-dprt.owl-theme .owl-nav button:hover,
				.h3-featured-courses ul.nav li.active a,
				.h3-featured-courses ul.nav li a:hover,
				.course-thumb a:hover,
				.course-box-2:hover .cdetail,
				.em-pagination .page-numbers:hover, 
				.em-pagination .page-numbers.current, 
				.gramotech-pagination .pagination>li>span.current, 
				.gramotech-pagination .pagination>li>a:hover, 
				.gramotech-pagination .pagination>li>span:hover, 
				.gramotech-pagination .pagination>li.active a, 
				.gramotech-pagination .pagination>li>a:hover, 
				.gramotech-pagination .pagination>li>span:hover,
				.sidebar .textwidget .social a:hover,
				.tagcloud a:hover{
					border-color: '. esc_attr($main_color_scheme) . ';  
				}';
			}
			
			if(isset($secondary_color_scheme) && $secondary_color_scheme <> ''){
				$dynamic_color_css .= '
				a.btn-style-1,
				.news-box.active h4 a, 
				.news-box:hover h4 a,
				.event-box:hover h4 a,
				.course-thumb a,
				.course-listing .course-grid-box .course-excerpt .cdetail,
				.who-we-are a .course-thumb a .cdetail .course-grid-box h4 a:hover{
					color: '. esc_attr($secondary_color_scheme) .';
				}';
			
				$dynamic_color_css .= '
				a.more-news:hover,
				.other-members ul .footer,
				.footer-social a:hover,
				.newsletter .input-group .subscribe,
				.team-details-text ul.team-social a:hover,
				.team-contact button,
				.team-faq .panel.panel-default,
				.header-style-3 .header-top,
				.h3-banner-cap .search-form .sbtn,
				.course-grid-box a.cdetail,
				.footer-map:after,
				.side-quick-link li i,
				.share button,
				.details-col blockquote,
				.blog-details blockquote,
				ul.course-details-meta a.enroll,
				.header-style-1.relative,
				.logo-nav-row,
				.header-news strong,
				.news-box.active a.news-details, 
				.news-box:hover a.news-details,
				.event-box:hover .edate,
				ul.sub-menu a:hover,
				.newsletter-wrap input[type="submit"]:hover, 
				.sidebar form.search-form button.btn.btn-default:hover,
				.sidebar .widget h4,
				.sidebar .gramotech-widget .other-members ul,
				.footer,
				.learnpress-page .lp-button, 
				ul.course-details-meta a.enroll,
				ul#menu-quick-links li:before,
				.course-thumb .cdeprt,
				.blog-full-new .blog-grid-post .post-excerpt .date,
				.blog-full-new .blog-grid-post .post-excerpt a.bd,
				.dropdown-menu>li>a:hover,
				.team-contact input[type=submit], 
				.comment-respond input#submit, 
				.team-contact button,
				.cart-box .view-link a:hover{
					background-color: '. esc_attr($secondary_color_scheme) .'; 
				}';
				
				$dynamic_color_css .= '
				.header-news strong,
				a.btn-style-1 .footer-social a:hover .team-details-text ul.team-social a:hover{
					border-color: '. esc_attr($secondary_color_scheme) . ';  
				}';
			}
			
			$gramotech_google_font = array();
			$fw_google_fonts = fw_get_google_fonts();
			
			if( !empty($body_font['family']) && isset($fw_google_fonts[$body_font['family']] ) ){
				$gramotech_google_font[$body_font['family']] = $fw_google_fonts[$body_font['family']];
			}
			
			if( !empty($h1_font['family']) && isset($fw_google_fonts[$h1_font['family']] ) ){
				$gramotech_google_font[$h1_font['family']] = $fw_google_fonts[$h1_font['family']];
			}
			
			if( !empty($h2_font['family']) && isset($fw_google_fonts[$h2_font['family']] ) ){
				$gramotech_google_font[$h2_font['family']] = $fw_google_fonts[$h2_font['family']];
			}
			
			if( !empty($h3_font['family']) && isset($fw_google_fonts[$h3_font['family']] ) ){
				$gramotech_google_font[$h3_font['family']] = $fw_google_fonts[$h3_font['family']];
			}
			
			if( !empty($h4_font['family']) && isset($fw_google_fonts[$h4_font['family']] ) ){
				$gramotech_google_font[$h4_font['family']] = $fw_google_fonts[$h4_font['family']];
			}
			
			if( !empty($h5_font['family']) && isset($fw_google_fonts[$h5_font['family']] ) ){
				$gramotech_google_font[$h5_font['family']] = $fw_google_fonts[$h5_font['family']];
			}
			
			if( !empty($h6_font['family']) && isset($fw_google_fonts[$h6_font['family']] ) ){
				$gramotech_google_font[$h6_font['family']] = $fw_google_fonts[$h6_font['family']];
			}
			
			if( !empty($nav_font['family']) && isset($fw_google_fonts[$nav_font['family']] ) ){
				$gramotech_google_font[$nav_font['family']] = $fw_google_fonts[$nav_font['family']];
			}
				
			$gramotech_google_font_arrays = gramotech_google_font_arrays($gramotech_google_font);
			update_option( 'fw_theme_google_fonts_link', $gramotech_google_font_arrays );

			FW_WP_Filesystem::init_file_system();

			$upload_dir = wp_upload_dir();
			$file_path = ABSPATH . 'wp-content/plugins/gramotech-core/dynamic-styles.css';
			$insert_result = FW_WP_Filesystem::put( $file_path, $dynamic_color_css );

			if ( is_wp_error( $insert_result ) ) {
				FW_Flash_Messages::add( $insert_result->get_error_code(), $insert_result->get_error_message(), 'error' );
			}
		}
		add_action( 'fw_settings_form_saved', 'dynamic_style_file_write' );
	}