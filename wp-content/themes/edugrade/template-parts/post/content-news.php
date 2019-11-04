<?php
/**
 * Template part for displaying posts
 */
	global $post, $post_counter;
	global $post_builder_options;
	$comment_count = wp_count_comments( $post->ID );
	$comment_count = $comment_count->total_comments;

	$post_categories = wp_get_post_categories( $post->ID );
	$cats = array();
	if($post_counter == 0){
		$col_class = 'col-md-12';
	}else{
		$col_class = 'col-md-6 col-sm-6';
	}
?>

	<div class="<?php echo esc_attr($col_class); ?>">
		<article <?php post_class(); ?>>
			<div class="news-box">
				<div class="news-thumb"> 
					<a class="link" href="<?php echo esc_url(get_permalink()); ?>">
						<i class="fas fa-link"></i>
					</a> 
					<?php 
					if($post_counter == 0){
						the_post_thumbnail('gramotech-featured-image' ); 
					}else{
						the_post_thumbnail('gramotech-blog-grid' ); 
					}?> 
				</div>
				<div class="news-excerpt">
					<h5><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo substr(get_the_title(),0,$post_builder_options['blog_titles']); ?></a></h5>
					<ul class="news-meta">
						<li><?php echo esc_attr__('Posted: ','edugrade');  echo get_the_date('d F, Y'); ?></li>
						<li><i class="far fa-comment"></i> <?php echo esc_attr($comment_count); ?></li>
						<?php 
						if(function_exists('gramotech_get_simple_likes_button')){ ?>
							<li><?php echo gramotech_get_simple_likes_button( get_the_ID() ); ?></li>
							<?php
						} ?>
					</ul>
				</div>
			</div>
		</article>
	</div>