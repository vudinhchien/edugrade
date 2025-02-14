<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage GramoTech
 * @since 1.0
 * @version 1.0
 */

?>
<article <?php post_class( 'gramotech-panel ' ); ?> >

	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'gramotech-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>

	<div class="panel-content">
		<div class="wrap">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

				<?php gramotech_edit_link( get_the_ID() ); ?>

			</header><!-- .entry-header -->

			<div class="gramotech-page-content">
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						esc_attr__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'edugrade' ),
						get_the_title()
					) );
				?>
			</div><!-- .gramotech-page-content -->

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->
