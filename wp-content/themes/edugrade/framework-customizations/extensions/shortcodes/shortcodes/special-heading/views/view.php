<?php if (!defined('FW')) die( 'Forbidden' );
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();

	$custom_css = '.heading-css-'.esc_attr($uni_flag).'{color: '.esc_url($atts['heading_color']).';}';

	wp_enqueue_style('gramotech-inline-style',get_template_directory_uri() . '/assets/css/internal-style.css');
	wp_add_inline_style( 'gramotech-inline-style', $custom_css ); 
	if($atts['heading_style'] == 'style-1'){ ?>
		<h2 class="stitle heading-css-<?php echo esc_attr($uni_flag); ?>"><?php echo esc_attr($atts['title']); ?></h2>
		<?php
	}else if($atts['heading_style'] == 'style-2'){ ?>
		<div class="title3 heading-css-<?php echo esc_attr($uni_flag); ?>">
			<h2><?php echo esc_attr($atts['title']); ?></h2>
		</div>
		<?php
	}else if($atts['heading_style'] == 'style-3'){ ?>
			<h2 class="sub-title text-center heading-css-<?php echo esc_attr($uni_flag); ?>"><?php echo esc_attr($atts['title']); ?></h2>
		<?php
	}
?>

	