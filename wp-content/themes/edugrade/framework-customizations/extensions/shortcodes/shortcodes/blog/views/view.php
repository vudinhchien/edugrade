<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();
	global $post_builder_options;
	
	$page_custom_class = isset( $atts['page_custom_class'] ) ? $atts['page_custom_class'] : '';
	$blog_category = isset( $atts['blog_category'] ) ? $atts['blog_category'] : '';
	$blog_style = isset( $atts['blog_style'] ) ? $atts['blog_style'] : '';
	$blogs_fetch = isset( $atts['blogs_fetch'] ) ? $atts['blogs_fetch'] : '';
	$blog_order_by = isset( $atts['blog_order_by'] ) ? $atts['blog_order_by'] : '';
	$blog_order = isset( $atts['blog_order'] ) ? $atts['blog_order'] : '';
	$blog_pagination = isset( $atts['blog_pagination'] ) ? $atts['blog_pagination'] : '';
	
	$post_builder_options['blog_titles'] = isset( $atts['blog_titles'] ) ? $atts['blog_titles'] : '30';
	$post_builder_options['blog_descrp'] = isset( $atts['blog_descrp'] ) ? $atts['blog_descrp'] : '100';
	
	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $blogs_fetch,
		'orderby' => $blog_order_by,
		'order' => $blog_order,
		'paged' => $paged,
		'tax_query' => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'category',
				'field'    => 'post_id',
				'terms'    => $blog_category,
			),
			array(
				'taxonomy' => 'post_tag',
				'field'    => '  post_id',
				'terms'    => '',
			),
		)
	);
	
	$the_query = new WP_Query( $args );	
	if($atts['blog_style']['gadget'] == 'blog-grid'){ ?>
		<div class="blog-grid">
			<div class="row">
				<?php
				$grid_layout = $atts['blog_style']['blog-grid'];
				while($the_query->have_posts()){
					$the_query->the_post();
					global $post; ?>
					<div class="<?php echo esc_attr($grid_layout['blog_columns']); ?> col-sm-6">
						<?php get_template_part( 'template-parts/post/content', 'grid' ); ?>
					</div>
					<?php
				} ?>
			</div>
			<?php
			if($blog_pagination == 'enable'){
				echo gramotech_pagination($the_query);
			} ?>
		</div>
		<?php
	}else if($atts['blog_style']['gadget'] == 'blog-Full'){ ?>
		<div class="blog-posts">
			<?php
			while($the_query->have_posts()){ 
				$the_query->the_post();
				global $post;
				
				get_template_part( 'template-parts/post/content', 'full' );
				
			} 
			if($blog_pagination == 'enable'){
				echo gramotech_pagination($the_query);
			}?>
		</div>
		
		<?php
	}else if($atts['blog_style']['gadget'] == 'blog-modern'){ 

		$modern_layout = $atts['blog_style']['blog-modern'];
		$blog_category = implode(" ",$blog_category);
		
		if(gramotech_is_last_page($the_query) == 'false'){
			$extra_padding = 'extra-padding';
		}else{
			$extra_padding = '';
		}
		
		?>
		<input type="hidden" name="blog-cat" class="blog-cat" value="<?php echo esc_attr($blog_category); ?>">
		<input type="hidden" name="blog-descrp" class="blog-descrp" value="<?php echo esc_attr($post_builder_options['blog_descrp']); ?>">
		<input type="hidden" name="blog-titles" class="blog-titles" value="<?php echo esc_attr($post_builder_options['blog_titles']); ?>">
		<div class="home1-news portfolio filter-news   <?php echo esc_attr($extra_padding); ?>">
			<h2 class="stitle"><?php echo esc_attr($modern_layout['heading']); ?></h2>
			<a class="more-news" href="<?php echo esc_url($modern_layout['external-link-url']); ?>"><?php echo esc_attr($modern_layout['external-link-txt']); ?></a>
			<div class="isotope items">
				<!--Item Start-->
				<?php
				$post_counter = 0;
				
				while($the_query->have_posts()){
					$the_query->the_post();
					global $post;
					if($post_counter == 4){
						$active_class = 'active';
					}else{
						$active_class = '';
					}
					if($post_counter == 0 || $post_counter == 6){ ?>
						<div class="item">
							<div class="news-box img-post">
								<div class="news-thumb">
									<div class="img-caption">
										<span class="post-date"><i class="far fa-calendar-alt"></i> <?php echo esc_attr(get_the_date('F d, Y')); ?></span>
										<h4> <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo substr(get_the_title(),0,$post_builder_options['blog_titles']); ?></a> </h4>
									</div>
									<?php the_post_thumbnail('gramotech-post-featured'); ?>
								</div>
							</div>
						</div>	
						<?php
					}else{ ?>
						<div class="item">
							<div class="news-box <?php echo esc_attr($active_class); ?>">
								<?php 
								if(has_post_thumbnail()){ ?>
									<div class="news-thumb"> 
										<?php the_post_thumbnail('gramotech-post-grid'); ?>
									</div>
									<?php
								}
								?>
								<div class="news-excerpt">
									<span class="post-date"><i class="far fa-calendar-alt"></i> <?php echo esc_attr(get_the_date('F d, Y')); ?></span>
									<h4> <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo substr(get_the_title(),0,$post_builder_options['blog_titles']); ?></a> </h4>
									<p><?php echo substr(get_the_content(),0,$post_builder_options['blog_descrp']); ?></p>
								</div>
							   <a class="news-details" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_attr__('Read More','edugrade'); ?></a> 
							</div>
						</div>	
						<?php
					}
					$post_counter++;
				}
				?>	
			</div>
		</div>
		<?php
	}else if($atts['blog_style']['gadget'] == 'blog-list'){ ?>
		<div class="blog-list">
			<?php

			while($the_query->have_posts()){
				$the_query->the_post();
				global $post; 
				get_template_part( 'template-parts/post/content', 'list' );
			} 
			if($blog_pagination == 'enable'){
				echo gramotech_pagination($the_query);
			}
			?>
        </div>
		<?php
	}else if($atts['blog_style']['gadget'] == 'blog-videos'){
		$blog_cols = $atts['blog_style']['blog-videos'];
		$post_builder_options['blog_cols'] = isset( $blog_cols['blog_columns'] ) ? $blog_cols['blog_columns'] : 'col-md-4';
		?>
		<div class="campus-tour">
			<div class="row">
				<!--Campus Tour Box Start--> 
				<?php
				
				while($the_query->have_posts()){
					$the_query->the_post();
					global $post; ?>
					<div class="<?php echo esc_attr($blog_cols['blog_columns']); ?> col-sm-4">
						<?php get_template_part( 'template-parts/post/content', 'videos' ); ?>
					</div>
					<?php
				} ?>
			</div>
		</div>
		<?php
	}else if($atts['blog_style']['gadget'] == 'blog-grid2'){ ?>
		
		<div class="about-mission-vision">
			<div class="row">
				<?php
				while($the_query->have_posts()){
					$the_query->the_post();
					global $post; ?>
					<div class="col-md-4 col-sm-4">
						<div class="vm-box"> <?php the_post_thumbnail('gramotech-post-featured'); ?> 
							<div class="abtxt">
								<h6><?php echo substr(get_the_title(),0,$post_builder_options['blog_titles']); ?></h6>
								<p> <?php echo substr(get_the_content(),0,$post_builder_options['blog_descrp']); ?> </p>
							</div>
						</div>
					</div>
					<?php
				} ?>
			</div>
		</div>
		<?php
	}
	wp_reset_postdata(); ?>