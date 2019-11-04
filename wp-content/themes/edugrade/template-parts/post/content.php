<?php
/**
 * Template part for displaying posts
 */
	global $post;
	$comment_count = wp_count_comments( $post->ID );
	$comment_count = $comment_count->total_comments;

	$post_categories = wp_get_post_categories( $post->ID );
	$cats = array();
?>
	<div class="blogfullwidth">
		<article id="post-<?php the_ID(); ?>" <?php post_class('type-post'); ?>>
			<?php 
			if(has_post_thumbnail()){ ?>
				<div class="entry-cover">
					<a href="<?php echo esc_url(get_permalink()); ?>">
						<?php the_post_thumbnail('full' ); ?>
					</a>
				</div>
				<?php 
			} ?>
			<div class="gramotech-page-content">
				<h3 class="entry-title">
					<a href="<?php echo esc_url(get_permalink()); ?>">
						<?php the_title()?>
					</a>
				</h3>
				<div class="entry-meta">
					<div class="byline">
						<i class="fa fa-user"></i>
						<?php echo the_author_posts_link(); ?>
					</div>
					<div class="post-comment">
						<i class="fa fa-comment-o"></i>
						<a href="<?php echo esc_url(get_permalink()); ?>#respond">
							<?php echo esc_attr($comment_count);?> 
							<?php echo esc_attr__('Comments','edugrade'); ?>
						</a>
					</div>
					<div class="post-like">
						<i class="fa fa-list"></i>
						<?php 
						if(isset($post_categories) && $post_categories <> ''){
							foreach($post_categories as $c){
								$cat = get_category( $c ); ?>
								<a href="<?php echo get_category_link($c); ?>" rel=""><?php echo esc_attr($cat->name); ?></a><?php echo ' '; ?>
								<?php
							}	
						}
						?>
					</div>
				</div>
				<div class="gramotech-blog-content">
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
				<a href="<?php echo esc_url(get_permalink());?>" title="<?php echo esc_attr__('Read More','edugrade'); ?>"><?php echo esc_attr__('Read More','edugrade'); ?> <i class="fa fa-long-arrow-right"></i></a>
			</div>
		</article>
	</div>