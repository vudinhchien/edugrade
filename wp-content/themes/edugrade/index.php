<?php
/**
 * The main template file
 */

get_header(); ?> 

<div class="blog-posts" id="test-unit">
    <div class="container">
		<div class="row">
			<div class="col-md-12">
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
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>