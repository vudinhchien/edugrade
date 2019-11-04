<?php
/**
 * The template for displaying all pages
 */

	get_header(); 
	if(is_single() && get_post_type() == 'lp_course'){ ?>
		<div class="edugrade-course-detail">
			<div class="container">
				<?php
				while ( have_posts() ) : the_post();
						the_content();
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . esc_attr__( 'Pages:', 'edugrade' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span class="page-number">',
							'link_after'  => '</span>',
							'pagelink'    => '%',
							'separator'   => '',
						) );
				endwhile; // End of the loop.
				?>
			</div>
		</div>
		<?php
	}else{ ?>

		<div class="gramotech-content-area">
			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/page/content', 'page' );

				endwhile; // End of the loop.
			?>
		</div>
		<?php
	}
	
	get_footer(); ?>