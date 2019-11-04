<?php
/**
 *@ headers
 */
	if(!function_exists('gramotech_social_icons')){
		function gramotech_social_icons(){ 
			
			$facebook_social = fw_get_db_settings_option('facebook_social');
			$gplus_social = fw_get_db_settings_option('gplus_social');
			$twitter_social = fw_get_db_settings_option('twitter_social');
			$linkedin_social = fw_get_db_settings_option('linkedin_social');
			
			if(isset($twitter_social) && $twitter_social <> ''){ ?>
				<li><a href="<?php echo esc_url($twitter_social); ?>"><i class="fab fa-twitter"></i></a></li>
				<?php
			}
			
			if(isset($facebook_social) && $facebook_social <> ''){ ?>
				<li><a href="<?php echo esc_url($facebook_social); ?>"><i class="fab fa-facebook-f"></i></a></li>
				<?php	
			}
			
			if(isset($gplus_social) && $gplus_social <> ''){ ?>
				<li><a href="<?php echo esc_url($gplus_social); ?>"><i class="fab fa-google-plus-g"></i></a></li>
				<?php	
			}
			
			if(isset($linkedin_social) && $linkedin_social <> ''){ ?>	
				<li><a href="<?php echo esc_url($linkedin_social); ?>"><i class="fab fa-linkedin-in"></i></a></li>
				<?php	
			}
		}
	}

	if(function_exists('fw_get_db_settings_option')){
		$header_style = fw_get_db_settings_option('header_style');
		$apply_button_text = fw_get_db_settings_option('apply_button_text');
		$apply_button_url = fw_get_db_settings_option('apply_button_url');
		$blog_post_top = fw_get_db_settings_option('blog_post_top');
		$gramotech_logo = fw_get_db_settings_option('logo');
		$logo_width = fw_get_db_settings_option('logo_width');
		$logo_height = fw_get_db_settings_option('logo_height');
		$blog_category_top = fw_get_db_settings_option('blog_category_top');
		
		$content_post = get_post($blog_post_top);
		$content = $content_post->post_content;
		
	} else {
		$header_style = '';
		$apply_button_text = '';
		$apply_button_url = '';
		$gramotech_logo = '';
		$blog_post_top = '';
		$logo_width = '';
		$logo_height = '';
	}
	
	if(is_front_page() || is_home() ){
		$relative_class = '';
	}else{
		$relative_class = 'relative';
	}
	if(isset($header_style) && $header_style == 'header-1'){ ?>
		<header class="header-style-4 <?php echo esc_attr($relative_class); ?>">
			<div class="topbar">
				<div class="container">
					<div class="col-md-6">
						<div class="header-news"> <strong><?php echo esc_attr(get_the_title($blog_post_top)); ?></strong>
							<span><a href="<?php echo esc_url(get_permalink($blog_post_top)); ?>"><?php echo esc_attr(substr($content,0,78)); ?></a> </span> 
						</div>
					</div>
					<div class="col-md-6">
						<ul class="topbar-links">
							<li>
								<?php
								if( has_nav_menu('top_menu') ){
									$args = array(
										'menu'=>'',
										'menu_class'=> ' ',
										'menu_id'=> '',
										'container'=> 'ul',
										'container_class'=> '',
										'container_id'=> '',
										'fallback_cb'=> '',
										'before'=> '',
										'after'=> '',
										'link_before'=> '',
										'link_after'=> '',
										'echo'=> 'true',
										'depth'=> '0',
										'theme_location'=>'top_menu', 
										'items_wrap'=>'<ul>%3$s</ul>', 	
										'item_spacing'=>'preserve'	 
									);
									wp_nav_menu( $args);
								} ?>
							</li>
							<?php /* Language Dropdown */
							if ( function_exists( 'pll_the_languages' ) ) { ?>
								<li class="select-lang">
									<div class="dropdown">
										<button class="lang dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> 
											<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/en.jpg" alt="<?php echo esc_attr__('img','edugrade'); ?>">
											<?php echo esc_attr__('English','edugrade'); ?><span class="caret"></span> 
										</button>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
											<?php pll_the_languages();?>
										</ul>
									</div>
								</li>
								<?php 
							} /* endif */ ?>
							<li> 
								<!--My Account Button Start-->
								<div class="accbtn">
									<div class="btn-group">
										<button type="button" class="acc-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user"></i> <?php echo esc_attr__('My Account','edugrade'); ?> <span class="caret"></span> </button>
										<ul class="dropdown-menu">
											<li><a href="#" data-toggle="modal" data-target="#exampleModalCenter" ><?php echo esc_attr__('Login Account','edugrade'); ?></a></li>
											<li><a href="#" data-toggle="modal" data-target="#exampleModalRegister" ><?php echo esc_attr__('Register Account','edugrade'); ?></a></li>
										</ul>
									</div>
								</div>
								<!--My Account Button End--> 
							</li>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="logo-nav-row">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<nav class="navbar">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only"><?php echo esc_attr__('Toggle navigation','edugrade'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
									<?php 
									if (isset($gramotech_logo['url']) && !empty($gramotech_logo['url'])) {
										$logo_url = $gramotech_logo['url'];
									} else {
										$logo_url = get_template_directory_uri() . '/assets/images/newlogo.png';
									} ?>
									<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
										<img width = "<?php echo esc_attr($logo_width); ?>" height = "<?php echo esc_attr($logo_height); ?>" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>">
									</a>
								</div>
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<?php get_template_part( 'template-parts/navigation/navigation', 'header' ); ?>
									<ul class="search-cart">
										<li class="search-icon">
											<div class="btn-group"> <a class="sicon-btn" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-times"></i> <i class="fas fa-search"></i></a>
												<div class="dropdown-menu">
													<?php get_search_form(); ?>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
		<?php
	}else if(isset($header_style) && $header_style == 'header-2'){ ?>
		<!-- Header Start -->
		<?php 
		if(is_front_page() || is_home() ){
		    $custom_class = "";
		}else{
		   $custom_class = "header-2-inner";
		}
		   ?>
		<header class="header-style-2 <?php echo esc_attr($custom_class); ?>">
			<!--Topbar Start-->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<?php /* Language Dropdown */
							if ( function_exists( 'pll_the_languages' ) ) { ?>
								<div class="btn-group">
									<div class="dropdown">
										<button class="lang dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-flag-checkered" aria-hidden="true"></i> <?php echo esc_attr__('Select Language','edugrade'); ?><span class="caret"></span> </button>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
											<?php pll_the_languages();?>
										</ul>
									</div>
								</div>	
								<?php 
							} /* endif */ ?>
						</div>
						<div class="col-md-6">
							<?php get_search_form(); ?>
						</div>
						<div class="col-md-3">
							<ul class="topsocial">
								<?php echo gramotech_social_icons(); ?>
							</ul>
							<a class="signin" href="#" data-toggle="modal" data-target="#exampleModalCenter"><?php echo esc_attr__('Sign in','edugrade'); ?></a> 
						</div>
					</div>
				</div>
			</div>
			<!--Topbar End--> 
			<!--Navbar + Logo Start-->
			<div class="logo-navbar">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<nav class="navbar">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> 
										<span class="sr-only"><?php echo esc_attr__('Toggle navigation','edugrade'); ?></span> 
										<span class="icon-bar"></span> 
										<span class="icon-bar"></span> 
										<span class="icon-bar"></span> 
									</button>
									<?php 
									if (isset($gramotech_logo['url']) && !empty($gramotech_logo['url'])) {
										$logo_url = $gramotech_logo['url'];
									} else {
										$logo_url = get_template_directory_uri() . '/assets/images/logo.png';
									} ?>
									<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
										<img width = "<?php echo esc_attr($logo_width); ?>" height = "<?php echo esc_attr($logo_height); ?>" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>">
									</a>
								</div>
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<?php get_template_part( 'template-parts/navigation/navigation', 'header' ); ?>
									<ul class="nav navbar-nav navbar-right">
										<li class="apply"><a href="<?php echo esc_url($apply_button_url); ?>"><i class="fas fa-pencil-alt"></i> <?php echo esc_attr($apply_button_text); ?></a></li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!--Navbar + Logo End--> 
		</header>
	<?php
	}else{ ?>
		<!-- Header Start -->
        <header class="header-style-1 relative default-header">
			<div class="header-wrap">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<nav class="navbar">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only"><?php echo esc_attr__('Toggle navigation','edugrade'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
									<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
										<?php $logo_url = get_template_directory_uri() . '/assets/images/logo.png'; ?>
										<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>">
									</a>
								</div>

								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<?php get_template_part( 'template-parts/navigation/navigation', 'header' ); ?>
								</div>
								<!-- /.navbar-collapse -->
								<!--Nav End-->
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
		<?php 
	}