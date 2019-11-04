<?php
/**
 * Template part for excerpt
 */
	global $post;
	$comment_count = wp_count_comments( $post->ID );
	$comment_count = $comment_count->total_comments;

	$post_tags = wp_get_post_tags( $post->ID );
	$post_cats = wp_get_post_categories( $post->ID );
	
	if(has_post_thumbnail()){
		$blog_without_image = '';
	}else{
		$blog_without_image = 'blog_without_image';
	}
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('blog-full-new'); ?>>
		<div class="blog-grid-post <?php echo esc_attr($blog_without_image); ?>">
			<?php 
			if(has_post_thumbnail()){ ?>
				<div class="post-thumb"> 
					<a href="<?php echo esc_url(get_permalink()); ?>"><i class="fas fa-link"></i></a> 
					<?php the_post_thumbnail('full' );  ?>
				</div>
				<?php
			} ?>
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
				<?php the_excerpt(); ?>
				<a class="bd" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_attr__('Read More','edugrade'); ?></a> 
			</div>
		</div>
	</article>