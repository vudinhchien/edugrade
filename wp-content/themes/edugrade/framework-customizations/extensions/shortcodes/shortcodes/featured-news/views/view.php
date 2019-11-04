<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();
	$page_custom_class = isset( $atts['page_custom_class'] ) ? $atts['page_custom_class'] : '';
	$blog_post = isset( $atts['blog_post'] ) ? $atts['blog_post'] : '';
	$comment_count = wp_count_comments( $blog_post );
	$comment_count = $comment_count->total_comments;
	$post_tags = wp_get_post_tags( $blog_post );

	$content_post = get_post($blog_post);
	$content = $content_post->post_content;
	
	?>
	<div class="row">
		<div class="h2-event-style-2">
			<div class="col-md-6 pr0">
				<div class="event-txt-col">
					<div class="event-date-col"> 
						<span class="ecomments"><i class="fas fa-comment"></i> <?php echo esc_attr($comment_count); ?></span> 
						<span class="evdate"><?php echo esc_attr(get_the_date('M',$blog_post)); ?> <strong><?php echo esc_attr(get_the_date('d',$blog_post)); ?></strong></span> 
						<a class="more-comments" href="<?php echo esc_url(get_permalink($blog_post)); ?>"><i class="fas fa-arrow-down"></i> <?php echo esc_attr__('More News','edugrade'); ?></a> 
					</div>
					<?php 
					if(isset($post_tags) && !empty($post_tags)){ ?>
						<ul class="etags"> 
							<?php
							$tag_counter = 0;
							foreach($post_tags as $t){
								if($tag_counter % 2 == 0){
									$tag_class = '';
								}else{
									$tag_class = 'color-2';
								}
								$tag = get_tag( $t ); ?>
								<li class="<?php echo esc_attr($tag_class); ?>"><a class="c1" href="<?php echo get_tag_link($t); ?>"><?php echo esc_attr($tag->name); ?></a></li>
								<?php
								$tag_counter++;
							} ?>
						</ul>
						<?php 
					} ?>
					<h4><a href="<?php echo esc_url(get_permalink($blog_post)); ?>"><?php echo esc_attr(get_the_title($blog_post)); ?> </a></h4>
					<p><?php echo substr($content,0,224); ?></p>
					<a class="nd" href="<?php echo esc_url(get_permalink($blog_post)); ?>"><?php echo esc_attr__('Read More','edugrade'); ?></a> 
				</div>
			</div>
			<div class="col-md-6 pl0">
				<div class="event-thumb"> 
					<?php echo get_the_post_thumbnail( $blog_post, 'gramotech-news-featured' ); ?>
				</div>
			</div>
		</div>
	</div>
	<?php
	wp_reset_postdata(); ?>