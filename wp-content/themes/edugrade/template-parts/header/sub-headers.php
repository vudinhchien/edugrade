<?php
// Sub headers

	if( is_home() ){ $page_id = ''; } else{ $page_id = get_the_ID();}
	
	if( is_page()){
		if(function_exists('fw_get_db_post_option')){
			$sub_header_status = fw_get_db_post_option($page_id, 'sub_header_status', true);
			if(!empty($sub_header_status['gadget']) && $sub_header_status['gadget'] == 'enable'){
				
				$theme_option_page_bg_image = '';
				$page_bg_image = '';	
				$page_caption = '';
				$sub_header_bottom_space = '';
				
				$bg_from_theme_option = fw_get_db_settings_option('theme_option_page_bg_image');
				if(isset($bg_from_theme_option) && $bg_from_theme_option <> ''){
					$theme_option_page_bg_image = $bg_from_theme_option['url'];
				}
				
				$page_bg = $sub_header_status['enable']['sub_header_image'];
				if(isset($sub_header_status['enable']['page_caption'])){
					$page_caption = $sub_header_status['enable']['page_caption'];
				}
				
				if(isset($sub_header_status['enable']['sub_header_bottom_space'])){
					$sub_header_bottom_space = $sub_header_status['enable']['sub_header_bottom_space'];
				}
				
				if($sub_header_bottom_space == 'disable'){
					$subheader_remove_margin = 'subheader_remove_margin';
				}else{
					$subheader_remove_margin = '';
				}
				
				if(isset($page_bg) && !empty($page_bg)){ $page_bg_image = $page_bg['url']; }
				
				if($page_bg_image <> ''){
					$theme_option_page_bg_image = $page_bg_image;
				}else if($theme_option_page_bg_image <> ''){
					
				}else{
					$theme_option_page_bg_image = get_template_directory_uri().'/assets/images/innerheader.jpg';
				}
				
				$page_title = get_the_title();  ?>
				
				<div class="inner-header <?php echo esc_attr($subheader_remove_margin); ?>">
					<div class="inner-header-caption">
						<h1><?php echo esc_attr($page_title); ?></h1>
						<?php
						if(function_exists('fw_ext_breadcrumbs')){
							fw_ext_breadcrumbs();
						}else{
							gramotech_breadcrumbs(); 
						} ?>	
					</div>
					<img src="<?php echo esc_url($theme_option_page_bg_image); ?>" alt="<?php echo esc_attr__('img','edugrade'); ?>"> 
				</div>
				<?php	
			}
		} else{
			$page_title = get_the_title(); 
			$page_theme_option_background_img = get_template_directory_uri().'/assets/images/innerheader.jpg';
			
			?>
			<div class="inner-header">
				<div class="inner-header-caption">
					<h1><?php echo esc_attr($page_title); ?></h1>
					<?php
					if(function_exists('fw_ext_breadcrumbs')){
						fw_ext_breadcrumbs();
					}else{
						gramotech_breadcrumbs(); 
					} ?>	
				</div>
				<img src="<?php echo esc_url($page_theme_option_background_img); ?>" alt="<?php echo esc_attr__('img','edugrade'); ?>"> 
			</div> 
			<?php 
		}
	}else if( is_single() && $post->post_type == 'post' ){
		
		$post_theme_option_background_img = '';
		$post_caption = '';
		
		if(function_exists('fw_get_db_post_option')){
			
			$post_default_bg = fw_get_db_settings_option('post_theme_option_background_img');
			if(isset($post_default_bg) && $post_default_bg <> ''){
				$post_theme_option_background_img = $post_default_bg['url'];
			}
			$post_caption = fw_get_db_post_option($page_id, 'post-caption', true);
		}
			
		$custom_css = '';
		if($post_theme_option_background_img <> ''){
			
		}else{
			$post_theme_option_background_img = get_template_directory_uri().'/assets/images/innerheader.jpg';
		}
		
		$page_title = get_the_title();
		?>
		<div class="inner-header">
			<div class="inner-header-caption">
				<h1><?php echo esc_attr__("What's New",'edugrade'); ?></h1>
				<?php
				if(function_exists('fw_ext_breadcrumbs')){
					fw_ext_breadcrumbs();
				}else{
					gramotech_breadcrumbs(); 
				} ?>	
			</div>
			<img src="<?php echo esc_url($post_theme_option_background_img); ?>" alt="<?php echo esc_attr__('img','edugrade'); ?>"> 
		</div> 
		
		<?php 
	}else if( is_single()){
		
		$post_theme_option_background_img = '';
		$page_caption = '';
		
		if(function_exists('fw_get_db_post_option')){
			
			$post_default_bg = fw_get_db_settings_option('post_theme_option_background_img');
			if(isset($post_default_bg) && $post_default_bg <> ''){
				$post_theme_option_background_img = $post_default_bg['url'];
			}
		}
		
		if($post_theme_option_background_img <> ''){
			
		}else{
			$post_theme_option_background_img = get_template_directory_uri().'/assets/images/innerheader.jpg';
		}
		
		$page_title = get_the_title();
		?>

		<div class="inner-header">
			<div class="inner-header-caption">
				<h1><?php echo esc_attr($page_title); ?></h1>
				<?php
				if(function_exists('fw_ext_breadcrumbs')){
					fw_ext_breadcrumbs();
				}else{
					gramotech_breadcrumbs(); 
				} ?>	
			</div>
			<img src="<?php echo esc_url($post_theme_option_background_img); ?>" alt="<?php echo esc_attr__('img','edugrade'); ?>"> 
		</div>
		<?php 
	}else if( is_archive() || is_search() || is_author() ){
		
		if( is_search() ){$page_title = esc_attr__('Search Results', 'edugrade');}
		else if( is_category()){$page_title = esc_attr__('Category','edugrade'); } //single_cat_title('', false)
		else if( is_tag() ){$page_title = esc_attr__('Tag','edugrade');}
		else if( is_day() ){ $page_title = get_the_archive_title(); }
		else if( is_month() ){ $page_title = get_the_archive_title(); }
		else if( is_year() ){$page_title = get_the_archive_title();}
		else if( is_author() ){ $page_title = esc_attr__('By','edugrade'); $author_id = get_query_var('author');
			$author = get_user_by('id', $author_id); $page_title = $page_title .' '. $author->display_name; }
		else if( is_post_type_archive('product') ){ $page_title = esc_attr__('Shop', 'edugrade'); }
		else{ $page_title = esc_attr__('Archives','edugrade'); }
		$search_theme_option_background_img = '';
		$page_caption = '';
		
		if(function_exists('fw_get_db_post_option')){
			
			$post_default_bg = fw_get_db_settings_option('search_theme_option_background_img');
			if(isset($post_default_bg) && $post_default_bg <> ''){
				$search_theme_option_background_img = $post_default_bg['url'];
			}
			
			$post_caption = fw_get_db_post_option($page_id, 'post-caption', true);
		}
		
		if($search_theme_option_background_img <> ''){
			$search_theme_option_background_img = $search_theme_option_background_img;
		}else{
			$search_theme_option_background_img = get_template_directory_uri().'/assets/images/innerheader.jpg';
		}
		?>
		
		<div class="inner-header testunit-subheader">
			<div class="inner-header-caption">
				<h1><?php echo esc_attr($page_title); ?></h1>
				<?php gramotech_breadcrumbs(); ?>	
			</div>
			<img src="<?php echo esc_url($search_theme_option_background_img); ?>" alt="<?php echo esc_attr__('img','edugrade'); ?>"> 
		</div>
		<?php 
	} else{ ?>

		<div class="inner-header testunit-subheader">
			<div class="inner-header-caption">
				<h1><?php echo esc_attr__('Blog Posts','edugrade'); ?></h1>
				<?php gramotech_breadcrumbs(); ?>	
			</div>
			<img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/innerheader.jpg'); ?>" alt="<?php echo esc_attr__('img','edugrade'); ?>"> 
		</div>
		<?php 
	} ?>