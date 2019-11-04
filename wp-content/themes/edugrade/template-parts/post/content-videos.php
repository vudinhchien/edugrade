<?php
/**
 * Template part for displaying posts with excerpts
 */
	global $post,$post_builder_options;
	
	$post_meta = fw_get_db_post_option($post->ID);
	
	$post_type = $post_meta['post-settings']['gadget'];
	if($post_type == 'youtube-video'){
		
		$media = $post_meta['post-settings']['youtube-video'];
		$media_url = $media['youtube_video_link'];	
	}else{
		$image_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full' );
		$icon_class = "fa-image";
		$media_url = '';
	}

	if($post_builder_options['blog_cols'] == 'col-md-4'){
		$img_size = 'gramotech-post-featured';
	}else{
		$img_size = 'gramotech-post-thumb';
	}
?>
	<article <?php post_class(); ?>>
		<div class="campus-box">
			<div class="cb-cap gallery">
				<a href="<?php echo esc_url($media_url); ?>" data-rel="prettyPhoto[gallery1]"><span class="icon-play"></span></a>
				<h4><?php the_title()?></h4>
				<em><?php echo esc_attr($post_meta['post-caption']); ?></em> 
			</div>
			<?php the_post_thumbnail($img_size); ?> 
		</div>
	</article>