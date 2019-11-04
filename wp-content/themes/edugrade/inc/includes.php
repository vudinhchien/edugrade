<?php
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	
	/**
	 * Register custom fonts.
	 */
 
	function gramotech_fonts_url() {
		$fonts_url = '';
		$font_families = array();
		
		$font_families[] = 'Poppins:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
		$font_families[] = 'Roboto:300,400,400i,500,500i,700,700i,900,900i';
		$font_families[] = 'Great Vibes';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => '',
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		

		return esc_url_raw( $fonts_url );
	}
	
	/**
	 * @Enque Google Font
	 * @return 
	 */
	if(defined('FW')){
		if (!function_exists('gramotech_enqueue_google_fonts')) {
			function gramotech_enqueue_google_fonts() {
				
				if ( !is_admin() ) {
					$fonts_url = get_option('fw_theme_google_fonts_link', '');
					wp_enqueue_style( 'gramotech-google-fonts', esc_url_raw($fonts_url), array(), null );
				}
			}
			add_action( 'wp_enqueue_scripts', 'gramotech_enqueue_google_fonts' );
		}
	}
	
	
	function gramotech_setup() {
		/*
		 * Make theme available for translation.
		 * If you're building a theme based on GramoTech, use a find and replace
		 * to change 'edugrade' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'edugrade' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		
		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		) );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'gramotech-post-full', 850, 400, true );
		add_image_size( 'gramotech-post-thumb', 293, 210, true );
		add_image_size( 'gramotech-post-featured', 360, 230, true );
		add_image_size( 'gramotech-news-featured', 570, 347, true );
		add_image_size( 'gramotech-post-grid', 390, 260, true );
		add_image_size( 'gramotech-post-list', 366, 315, true );
		add_image_size( 'gramotech-course-list', 360, 295, true );
		add_image_size( 'gramotech-course-list-grid', 263, 295, true );
		add_image_size( 'gramotech-events-grid', 360, 210, true );
		

		// Set the default content width.
		$GLOBALS['content_width'] = 525;

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'header_menu'    => esc_attr__( 'Header Menu', 'edugrade' ),
			'footer_menu'    => esc_attr__( 'Footer Menu', 'edugrade' ),
			'top_menu'    => esc_attr__( 'Top Menu', 'edugrade' ),
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
		 */
		add_editor_style( array( 'assets/css/editor-style.css', gramotech_fonts_url() ) );
		
	}
	add_action( 'after_setup_theme', 'gramotech_setup' );
	
	//Framework Files
	require_once get_template_directory() . '/inc/sidebars-register.php'; 
	require_once get_template_directory() . '/inc/template-functions.php';
	require_once get_template_directory() . '/inc/scripts-register.php';
	require_once get_template_directory() . '/inc/plugins/tgm_library.php';
	
	// Options CSS
	require_once get_template_directory() . '/inc/color-patterns.php'; //Dynamic Colors
	
	//include widgets
	
	require_once get_template_directory() .'/inc/widgets/about-info/class-widget-about-info.php';
	require_once get_template_directory() .'/inc/widgets/contact/class-widget-contact.php';
	require_once get_template_directory() .'/inc/widgets/instructors/class-widget-instructors.php';
	require_once get_template_directory() .'/inc/widgets/recent-posts/class-widget-recent-posts.php';
	require_once get_template_directory() .'/inc/widgets/events/class-widget-events.php';

	/**
	 * @param FW_Ext_Backups_Demo[] $demos
	 * @return FW_Ext_Backups_Demo[]
	 */
	function gramotech_filter_theme_fw_ext_backups_demos($demos) {
		$demos_array = array(
			'dummy-edugrade' => array(
				'title' => esc_attr__('Edugrade Demo', 'edugrade'),
				'screenshot' => get_template_directory_uri() . '/screenshot.png',
				'preview_link' => 'http://gramotech.com/wp/edugrade'
			),
			// ...
		);

		$download_url = 'http://gramotech.com/edugrade_importer/';

		foreach ($demos_array as $id => $data) {
			$demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
				'url' => $download_url,
				'file_id' => $id,
			));
			$demo->set_title($data['title']);
			$demo->set_screenshot($data['screenshot']);
			$demo->set_preview_link($data['preview_link']);

			$demos[ $demo->get_id() ] = $demo;

			unset($demo);
		}

		return $demos;
	}
	add_filter('fw:ext:backups-demo:demos', 'gramotech_filter_theme_fw_ext_backups_demos');