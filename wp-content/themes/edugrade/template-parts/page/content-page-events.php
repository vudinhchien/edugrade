<?php
/**
 * Template part for displaying page content in page.php
 */
 ?>
	<div class="container">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="gramotech-page-content gramotech-default-content">
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
			</div><!-- .gramotech-page-content -->
		</article><!-- #post-## -->
		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		if(is_user_logged_in()){ ?>
			<div class="edit-link">
				<?php gramotech_edit_link( get_the_ID() ); ?>
			</div>	
			<?php
		} ?>
	</div>	
	<?php 
?>
