<?php
/**
 * Template part for displaying posts with excerpts
 */
	global $post,$post_builder_options;
	$comment_count = wp_count_comments( $post->ID );
	$comment_count = $comment_count->total_comments;

	$post_tags = wp_get_post_tags( $post->ID );
	$post_cats = wp_get_post_categories( $post->ID );
	
	$post_format = '';
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
	if(has_post_thumbnail()){
		$noimg_class = '';
	}else{
		$noimg_class = 'text-post';
	}
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('blog-full-new'); ?>>
		<div class="blog-grid-post">
			<div class="post-thumb">
				<a href="<?php echo esc_url(get_permalink()); ?>"><i class="fas fa-link"></i></a> 
				<?php the_post_thumbnail('full'); ?>
			</div>
			<div class="post-excerpt"> 
				<div class="date"><?php echo esc_attr(get_the_date('d')); ?><span><?php echo esc_attr(get_the_date('M Y')); ?></span></div>
				<ul class="post-meta">
					<li><i class="fas fa-user"></i> <?php echo get_the_author_link(); ?></li>
					<?php 
					if(isset($post_tags) && !empty($post_tags)){ ?>
						<li class="post-tags"><i class="fas fa-tags"></i>
							<?php
							foreach($post_tags as $t){
								$tag = get_tag( $t ); ?>
								<a href="<?php echo get_tag_link($t); ?>" rel=""><?php echo esc_attr($tag->name); ?></a><?php echo ' '; ?>
								<?php
							} ?>
						</li>
						<?php 
					} ?>
					<?php 
					if(function_exists('gramotech_get_simple_likes_button')){ ?>
						<li><?php echo gramotech_get_simple_likes_button( get_the_ID() ); ?></li>
						<?php
					} ?>
					
					<li><i class="far fa-comment"></i> <?php echo esc_attr($comment_count);?> </li>
				</ul>
				<h4> <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title()?></a> </h4>
				<p> <?php echo substr(get_the_content(),0,$post_builder_options['blog_descrp']); ?> </p>
				<a class="bd" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_attr__('Read More','edugrade'); ?></a> 
			</div>
			
		</div>
	</article>