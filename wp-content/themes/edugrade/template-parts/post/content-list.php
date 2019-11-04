<?php
/**
 * Template part for displaying posts with excerpts
 */
	global $post,$post_builder_options;
	
	$comment_count = wp_count_comments( $post->ID );
	$comment_count = $comment_count->total_comments;
	
?>
	<article <?php post_class(); ?>>
        <div class="blog-grid-post">
            <div class="row">
				<div class="col-md-5 np">
					<div class="post-thumb"> <a href="<?php echo esc_url(get_permalink()); ?>"><i class="fas fa-link"></i></a> 
						<?php the_post_thumbnail('gramotech-post-list'); ?>
					</div>
				</div>
				<div class="col-md-7 mr0">
					<div class="post-excerpt"> 
						<strong class="date"><?php echo get_the_author(); ?> / <?php echo esc_attr(get_the_date('M d, Y')); ?></strong>
						<h4> <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title()?></a> </h4>
						<p> <?php echo substr(get_the_content(),0,$post_builder_options['blog_descrp']); ?> </p>
						<a class="bd" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_attr__('Read More','edugrade'); ?> <i class="fas fa-arrow-right"></i></a> 
					</div>
					<ul class="post-meta">
						<?php 
						if(function_exists('gramotech_get_simple_likes_button')){ ?>
							<li<?php echo gramotech_get_simple_likes_button( get_the_ID() ); ?> <?php echo esc_attr__('Likes','edugrade'); ?></li>
							<?php
						} ?>
						<li><i class="far fa-comment"></i> <?php echo esc_attr($comment_count);?> <?php echo esc_attr__('Comments','edugrade'); ?></li>
						<?php 
						if(isset($post_tags) && !empty($post_tags)){ ?>
							<li><i class="far fa-folder"></i> 
								<?php
								foreach($post_tags as $t){
									$tag = get_tag( $t ); ?>
									<a href="<?php echo get_tag_link($t); ?>" rel=""><?php echo esc_attr($tag->name); ?></a><?php echo ' '; ?>
									<?php
								} ?>
							</li>
							<?php 
						} ?>
					</ul>
				</div>
            </div>
        </div>
	</article>