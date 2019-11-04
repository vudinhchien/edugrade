<?php
/**
 * The template for displaying all single posts
 */

	get_header();
	
	if (function_exists('fw_get_db_settings_option')) {
		$enable_social_share = fw_get_db_settings_option('enable_social_share');	
		$footer_style = fw_get_db_settings_option('footer_style');
	} else{
		$enable_social_share = '';
		$footer_style = '';
	}
	
	if(isset($footer_style) && $footer_style == 'footer-1'){
		$inner_padding = 'inner-padding';
	}else{
		$inner_padding = 'inner-padding-default';
	}
	
	$gramotech_sidebar = '';
	$content_col = 'col-md-9 col-xs-12';
	if (function_exists('fw_ext_sidebars_get_current_position')) {
		$current_position = fw_ext_sidebars_get_current_position();
		if ($current_position != 'full' && ( $current_position == 'left' || $current_position == 'right' )) {
			$gramotech_sidebar = $current_position;
			$content_col = 'col-md-9 col-xs-12';
		}else if($current_position == 'full'){
			$gramotech_sidebar = $current_position;
			$content_col = 'col-md-12 col-xs-12';
		}
	}

	if (isset($gramotech_sidebar) && $gramotech_sidebar == 'right') {
		$sidebar_position = 'pull-right';
		$content_position = 'pull-left';
	} else if (isset($gramotech_sidebar) && $gramotech_sidebar == 'left') {
		$sidebar_position = 'pull-left';
		$content_position = 'pull-right';
	}else if (isset($gramotech_sidebar) && $gramotech_sidebar == 'full') {
		$sidebar_position = '';
		$content_position = '';
	}else{
		$sidebar_position = 'pull-right';
		$content_position = 'pull-left';
	}

 ?>
	<div class="main-content">
		<!--Event Grid Page Start-->
		<div class="blog-details">
			<div class="container">
				<div class="row">
					<div class="<?php echo esc_attr($content_col); echo ' '; echo esc_attr($content_position); ?>">
						<?php 
						while ( have_posts() ){ the_post();
							global $post;
							
							$comment_count = wp_count_comments( $post->ID );
							$comment_count = $comment_count->total_comments;
							$terms = get_the_term_list($post->ID,'category');
							$post_tags = wp_get_post_tags( $post->ID );
							$post_format = '';
							
							if(function_exists('fw_get_db_post_option')){
								$post_meta = fw_get_db_post_option($post->ID);
								$post_format = $post_meta['post-settings']['gadget'];
								
								if($post_format == 'youtube-video'){
									$media = $post_meta['post-settings']['youtube-video'];
									$media_length = $media['media_length'];
									$format_value = $media['youtube_video_link'];
									
								}else if($post_format == 'vimeo-video'){
									$media = $post_meta['post-settings']['vimeo-video'];
									$media_length = $media['media_length'];
									$format_value = $media['vimeo_video_link'];
									
								}else if($post_format == 'gallery'){
									$media = $post_meta['post-settings']['gallery'];
									$format_value = $media['post_post_gallery'];
									
								}else if($post_format == 'soundcloud-audio'){
									$media = $post_meta['post-settings']['soundcloud-audio'];
									$format_value = $media['soundcloud_audio_embed'];
									
								}else{
									$image_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full' );
									$media_length = '';
									$format_value = '';
								}
							}
							?>
							<div class="blog-detail">
								<?php
								if(has_post_thumbnail()){ ?>
									<div class="post-thumb"> 
										<?php the_post_thumbnail('full' ); ?>
									</div>
									<?php
								} ?>
								
								<div class="post-meta">
									<ul class="meta">
										<li><i class="far fa-user"></i> <?php echo get_the_author();?></li>
										<li><i class="fas fa-calendar-alt"></i> <?php echo esc_attr(get_the_date('M d, Y')); ?></li>
										<?php 
										if(function_exists('gramotech_get_simple_likes_button')){ ?>
											<li><?php echo gramotech_get_simple_likes_button( get_the_ID() ); ?> <?php echo esc_attr__('Likes','edugrade'); ?></li>
											<?php
										} ?>
										<li><i class="far fa-comment"></i> <?php echo esc_attr($comment_count);?> <?php echo esc_attr__('Comments','edugrade'); ?></li>
										<?php
										if(has_tag()){
											if(isset($post_tags) && !empty($post_tags)){ ?>
												<li class="post-tags">
												<i class="far fa-folder"></i>
													<?php
														foreach($post_tags as $t){
															$tag = get_tag( $t ); ?>
															<a href="<?php echo get_tag_link($t); ?>"><?php echo esc_attr($tag->name); ?></a><?php echo ' '; ?>
															<?php
														}
													?>
												</li>
												<?php 
											}
										} ?>
									</ul>
									<?php 
									if(function_exists('gramotech_get_social_shares')){
										if(function_exists('fw_get_db_settings_option')){
											$enable_social_share = fw_get_db_settings_option('enable_social_share');
											if($enable_social_share == 'enable'){ ?>
												<div class="share">
													<div class="dropdown">
														<button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-share-alt"></i> </button>
														<?php echo gramotech_get_social_shares($post->ID); ?>
													</div>
												</div>	
												<?php
											}
										}
									}
									?>
									
								</div>
								<div class="post-texts">
									<h3><?php the_title(); ?></h3>
									<?php 
									the_content();
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . esc_attr__( 'Pages:', 'edugrade' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span class="page-number">',
										'link_after'  => '</span>',
										'pagelink'    => '%',
										'separator'   => '',
									) ); 
									?>
								</div>
								<?php
								$prevPost = get_previous_post(); 
								if(!empty($prevPost)){
									$prev_thumbnail_id = get_post_thumbnail_id( $prevPost->ID );
									if(!empty($prev_thumbnail_id)){
										$prev_image = wp_get_attachment_image($prev_thumbnail_id, 'gramotech-post-thumb');
										$img_class_prev = 'gramotech-image-show-prev';
									}else{
										$prev_image = '<img src="" alt="'.esc_attr__('img','edugrade').'" class="no-img">';
										$img_class_prev = 'gramotech-image-hide-prev';
									}
									
									$prev_title = get_the_title($prevPost->ID); 
								}
								
								$nextPost = get_next_post(); 
								if(!empty($nextPost)){
									$next_thumbnail_id = get_post_thumbnail_id( $nextPost->ID );
									if(!empty($next_thumbnail_id)){
										$next_image = wp_get_attachment_image($next_thumbnail_id, 'gramotech-post-thumb');
										$img_class_next = 'gramotech-image-show-next';
									}else{
										$next_image = '<img src="" alt="'.esc_attr__('img','edugrade').'" class="no-img">';
										$img_class_next = 'gramotech-image-hide-next';
									}
									
									$next_title = get_the_title($nextPost->ID);
								}
								
								$allowed_html = array(
									'img'=>array(
										'src'=>array(),
										'alt'=>array(),
										'class'=>array(),
										'id'=>array()
									),
									'em'=>array(
										'class'=>array(),
										'id'=>array()
									),
									'span'=>array(
										'class'=>array(),
										'id'=>array()
									),
									'b'=>array(
										'class'=>array(),
										'id'=>array()
									)
								);
								
								if(get_previous_post() || get_next_post()) { ?>	
									<div class="next-prev-option">
										<?php if(!empty($prevPost)){ previous_post_link('<div class="prev-blog pull-left '.esc_attr($img_class_prev).'">%link</div>', ''.wp_kses($prev_image,$allowed_html).'<div class="prev-blog-custom"><span>Previous</span><h6>'.wp_kses($prev_title,$allowed_html).'</h6></div>', true); } ?>
										<?php if(!empty($nextPost)){ next_post_link('<div class="next-blog pull-right '.esc_attr($img_class_next).'">%link</div>', ''.wp_kses($next_image,$allowed_html).'<div class="prev-blog-custom"><span>Next</span><h6>'.wp_kses($next_title,$allowed_html).'</h6></div>', true); } ?>				
									</div>
									<?php 
								}  
								
								if(get_the_author_meta('description') <> ''){ ?>
									<div class="author-detail">
										<span class="aurthor-img"><?php echo get_avatar( get_the_author_meta('ID'), 90); ?></span>
										<h6><?php echo get_the_author();?></h6>
										<p><?php echo (get_the_author_meta('description')); ?></p>
									</div>
									<?php 
								} ?>
								
								<?php comments_template( '', true ); ?>
							</div>
							<?php
						} ?>
					</div> 
					<?php 
					if(function_exists('fw_ext_sidebars_get_current_position') && !empty($gramotech_sidebar)) { ?>
						<div class="col-md-3 col-xs-12 <?php echo esc_attr($sidebar_position); ?>">
							<div class="sidebar">
								<?php echo fw_ext_sidebars_show('blue'); ?>
							</div>
						</div>
						<?php 
					}else{ ?>
						<div class="col-md-3 <?php echo esc_attr($sidebar_position); ?>">
							<div class="sidebar">
								<?php dynamic_sidebar('Blog Sidebar'); ?>
							</div>
						</div>	
						<?php
					} ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>