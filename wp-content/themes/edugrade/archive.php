<?php
/**
 * The archives file
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
		else :
			get_template_part( 'template-parts/post/content', get_post_format() );
		endif;
		?>
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>