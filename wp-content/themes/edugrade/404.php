<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * The 404 file
 */

get_header('404'); ?> 
		
	<div class="page-404-wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-6 pull-right">
					<div class="text-404">
						<strong class="title-404"><?php echo esc_attr__('404','edugrade');?></strong>
						<h2><?php echo esc_attr__('Ooops!','edugrade');?></h2>
						<strong class="not-found"> <?php echo esc_attr__('Page Not Found.','edugrade');?></strong>
						<p><?php echo esc_attr__('The Requested Page Can’t be Found','edugrade');?></p>
						<div class="search-404">
							<form method="get" id="searchform" action="<?php  echo esc_url(home_url('/')); ?>">
								<?php
									$search_val = get_search_query();
									if( empty($search_val) ){
										$search_val = '';
									}
								?>
								<input type="text" class="form-control" name="s" id="s" placeholder="<?php echo esc_attr__('Enter Search','edugrade'); ?>" value="<?php echo esc_attr($search_val); ?>" />
								<button type="submit"><?php echo esc_attr__('Search Now','edugrade'); ?></button>
							</form>
						</div>
						<a href="<?php  echo esc_url(home_url('/')); ?>" class="back2home"><i class="fas fa-home"></i>  <?php echo esc_attr__('back to Home','edugrade'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer();