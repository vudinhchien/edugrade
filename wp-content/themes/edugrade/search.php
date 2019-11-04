<?php
/**
 * The search results file
 */

get_header(); ?> 


<div class="content" id="test-unit">
	<div class="container">
		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) { the_post();
				get_template_part( 'template-parts/post/content', 'excerpt');	
			}
			echo gramotech_pagination($wp_query);
		else : ?>
			
			<div class="search-result">
				<div class="inner">
					<span><?php echo esc_attr__('Need a new search?','edugrade');?></span> 
					<strong class="title"><?php echo esc_attr__('If you did not find what you were looking for, try a new search!','edugrade');?></strong>
					<form method="get" action="<?php  echo esc_url(home_url('/')); ?>">
						<input type="text" placeholder="<?php echo esc_attr__('Enter your words for search again','edugrade');?>" value="<?php the_search_query(); ?>" name="s"  autocomplete="off" />
						<button type="submit" value="<?php echo esc_attr__('Search','edugrade'); ?>"><i class="fa fa-search"></i></button>
					</form>
				</div>
			</div>
			
			<?php
		endif;
		?>
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();