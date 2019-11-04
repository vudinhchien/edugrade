<?php
/**
 * The header for our theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php  wp_head(); ?>
		<?php
		if(function_exists('fw_get_db_post_option')){
			$sub_header_status = fw_get_db_post_option($page_id, 'sub_header_status', true);
			if(!empty($sub_header_status['gadget']) && $sub_header_status['gadget'] == 'enable'){
				$page_extra_class = $sub_header_status['enable']['page_extra_class'];
			}else{
				$page_extra_class = '';
			}
		}else{
			$page_extra_class = '';
		}
		?>
	</head>
	<body <?php body_class(); ?>>

			<div class="wrapper <?php echo esc_attr($page_extra_class); ?>">
				<?php get_template_part( 'template-parts/header/gramotech', 'headers' ); ?>
				<?php get_template_part( 'template-parts/header/sub', 'headers' ); ?>
				<div class="gramotech-content">