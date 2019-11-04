<?php
/**
 * The template for displaying the footer
 */
 
?>
	<?php 
	if(!is_404()){ ?>
		</div><!-- #content -->
		<?php get_template_part( 'template-parts/footer/footer', 'styles' ); ?>
		
		</div><!-- #body wrapper -->
		<?php
		if(function_exists('gramotech_header_login_from')){ echo gramotech_header_login_from(); } 
		if(function_exists('gramotech_header_register_from')){ echo gramotech_header_register_from(); } 
	} ?>
	
	<?php wp_footer(); ?>
</body>
</html>