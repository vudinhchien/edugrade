<?php
/**
 * Template part for displaying page content in page.php
 */
	if (defined('FW')){
		$is_pagebuilder_element = fw_get_db_post_option(get_the_ID(), 'page-builder/builder_active', false);
		
		if($is_pagebuilder_element == 'true'){
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="gramotech-page-content">
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
		}else{ 
			if(function_exists('fw_get_db_settings_option')){
				$website_layout = fw_get_db_settings_option('website_layout');
				if($website_layout['gadget'] == 'boxed-style'){
					$default_page_container = '';
				}else{
					$default_page_container = 'container';
				}	
			}else{
				$default_page_container = 'container';	
			} ?>
			
			<div class="<?php echo esc_attr($default_page_container); ?>">
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
		}
	}else{ ?>
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
	}
?>