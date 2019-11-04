<?php
/**
 * Template for displaying search forms in GramoTech
 */

?>

<form class="search-form" method="get" action="<?php  echo esc_url(home_url('/')); ?>">
	<?php
		$search_val = get_search_query();
		if( empty($search_val) ){
			$search_val = '';
		}
	?>
	<input type="text" class="form-control" name="s" placeholder="<?php echo esc_attr__('Search Keyword....' , 'edugrade'); ?>">
	<button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
</form>