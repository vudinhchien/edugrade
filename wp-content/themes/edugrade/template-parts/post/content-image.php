<?php
/**
 * Template part for displaying image posts
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'gramotech-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php 
	endif; ?>

	<div class="gramotech-page-content">

		<?php if ( is_single() || '' === get_the_post_thumbnail() ) {

			// Only show content if is a single post, or if there's no featured image.
			/* translators: %s: Name of current post */
			the_content( sprintf(
				esc_attr__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'edugrade' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_attr__( 'Pages:', 'edugrade' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );

		};
		?>
	</div><!-- .gramotech-page-content -->
</article><!-- #post-## -->