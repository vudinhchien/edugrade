<?php
/**
 * Enqueue scripts and styles.
 */
	function gramotech_scripts() {
		// Add custom fonts, used in the main stylesheet.
		wp_enqueue_style( 'gramotech-fonts', gramotech_fonts_url(), array(), null );

		// Theme stylesheet.
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'gramotech-style', get_stylesheet_uri() );
		wp_enqueue_style( 'dashicons' );
		wp_enqueue_style( 'gramotech-color', get_template_directory_uri() . '/assets/css/color.css' );  //Color CSS
		if(class_exists('_Fw')){
			wp_enqueue_style( 'gramotech-dynamic-color', plugins_url().'/gramotech-core/dynamic-styles.css', array(), null );  //Dynamic Color CSS
		}
		wp_enqueue_style( 'gramotech-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );  //Responsive CSS
		
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.css' );  //Owl Carousel CSS
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/fontawesome-all.min.css' );  //Fontawesome
		wp_enqueue_style( 'icon-fonts', get_template_directory_uri() . '/assets/css/icon-fonts.css' );  //Icon Fonts File
		wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() . '/assets/css/prettyPhoto.css' );  //Prettyphoto File
		wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css' );  //Prettyphoto File
		wp_enqueue_style( 'fontawesome-4.7', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );  //Prettyphoto File
		
		// Load the html5 shiv.
		wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array('jquery'), '3.7.3' );
		wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), '1.0', true);
		wp_enqueue_script('owl-carousel', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('jquery'), '1.0', true);
		wp_enqueue_script('masonry', get_template_directory_uri().'/assets/js/jquery.masonry.min.js', array('jquery'), '1.0', true);
		wp_enqueue_script('countdown', get_template_directory_uri().'/assets/js/jquery.countdown.min.js', array('jquery'), '1.0', true);
		wp_enqueue_script('isotope', get_template_directory_uri().'/assets/js/isotope.pkgd.min.js', array('jquery'), '1.0', true);
		wp_enqueue_script('slick', get_template_directory_uri().'/assets/js/slick.min.js', array('jquery'), '1.0', true);
		wp_enqueue_script('prettyPhoto', get_template_directory_uri().'/assets/js/jquery.prettyPhoto.js', array('jquery'), '1.0', true);
		
		wp_enqueue_script('gramotech-functions', get_template_directory_uri().'/assets/js/functions.js', array('jquery'), '1.0', true);
		wp_localize_script( 'gramotech-functions', 'login_object', array( 
			'loading' => esc_attr__('Sending info...','edugrade'),
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'like' => esc_attr__( 'Like', 'edugrade' ),
			'unlike' => esc_attr__( 'Unlike', 'edugrade' )
		));
		
	}
	add_action( 'wp_enqueue_scripts', 'gramotech_scripts' );
?>