<?php
if (!defined('FW')) {
    die('Forbidden');
}

	$gramotech_sidebar = 'full';
	$content_col = 'col-md-12';
	$content_position = '';
	$sidebar_position = '';
	if (function_exists('fw_ext_sidebars_get_current_position')) {
		$current_position = fw_ext_sidebars_get_current_position();
		if ($current_position != 'full' && ( $current_position == 'left' || $current_position == 'right' )) {
			$gramotech_sidebar = $current_position;
			$content_col = 'col-md-9';
		}
	}
	
	if (isset($gramotech_sidebar) && $gramotech_sidebar == 'right') {
		$sidebar_position = 'pull-right';
		$content_position = 'pull-left';
	} else if (isset($gramotech_sidebar) && $gramotech_sidebar == 'left') {
		$sidebar_position = 'pull-left';
		$content_position = 'pull-right';
	}

	/**
	 * @var $atts
	 */
	$bg_video_data_attr  = '';
	$custom_classes = '';
	$custom_id = '';
	
	$custom_css = '';
	$gramotech_unique_inc = fw_unique_increment();
	
	/*Section Background Color*/
	if(isset($atts['background_option']['gadget']) && $atts['background_option']['gadget'] == 'background-color' ){
		
		$background_color = $atts['background_option']['background-color'];
		if (!empty($background_color['bg_color'])) {
			$custom_css.= '.gramotech-builder.this-section-css-'. esc_attr($gramotech_unique_inc).'{background-color:' . esc_attr($background_color['bg_color']) . ';}';
		}
	}
	
	/*Section Background Image*/
	if(isset($atts['background_option']['gadget']) && $atts['background_option']['gadget'] == 'background-image' ){
		
		$background_image = $atts['background_option']['background-image'];
		
		if (!empty($background_image['bg_image']['data']['icon'])) {
			$custom_css.= '.gramotech-builder.this-section-css-'. esc_attr($gramotech_unique_inc).'{background-image:url(' . esc_url($background_image['bg_image']['data']['icon']) . '); position:relative;}';
		}
		if (!empty($background_image['bg_repeat'])){
			$custom_css.= '.gramotech-builder.this-section-css-'. esc_attr($gramotech_unique_inc).'{background-repeat:' . esc_attr($background_image['bg_repeat']) . ';}';
		}
		if (!empty($background_image['bg_size'])){
			$custom_css.= '.gramotech-builder.this-section-css-'. esc_attr($gramotech_unique_inc).'{background-size:' . esc_attr($background_image['bg_size']) . ';}';
		}
		if (!empty($background_image['bg_color'])) {
			$custom_css.= '.gramotech-builder.this-section-css-'. esc_attr($gramotech_unique_inc).'{background-color:' . esc_attr($background_image['bg_color']) . ';}';
		}
		if (!empty($background_image['bg_opacity']) && !empty($background_image['bg_color']) ){
			$custom_css.= '.gramotech-builder.this-section-css-'. esc_attr($gramotech_unique_inc).':before{
					background-color: '. esc_attr($background_image['bg_color']) .';
					opacity: '. esc_attr($background_image['bg_opacity']) .';
					content: "";
					position: absolute;
					left: 0;
					top: 0;
					right:0;
					bottom:0;
				}';
		} 
	}
	
	/*Section Padding*/
	if(isset($atts['padding_left']) && $atts['padding_left'] != ''){
		$custom_css.= '.gramotech-builder.this-section-css-'. esc_attr($gramotech_unique_inc).'{padding-left:' . esc_attr($atts['padding_left']) . 'px;}';
	}
	
	if(isset($atts['padding_top']) && $atts['padding_top'] != ''){
		$custom_css.= '.gramotech-builder.this-section-css-'. esc_attr($gramotech_unique_inc).'{padding-top:' . esc_attr($atts['padding_top']) . 'px;}';
	}
	
	if(isset($atts['padding_right']) && $atts['padding_right'] != ''){
		$custom_css.= '.gramotech-builder.this-section-css-'. esc_attr($gramotech_unique_inc).'{padding-right:' . esc_attr($atts['padding_right']) . 'px;}';
	}
	
	if (isset($atts['padding_bottom']) && $atts['padding_bottom'] != ''){
		$custom_css.= '.gramotech-builder.this-section-css-'. esc_attr($gramotech_unique_inc).'{padding-bottom:' . esc_attr($atts['padding_bottom']) . 'px;}';
	}

	/*Section Margin*/
	if(isset($atts['margin_left']) && $atts['margin_left'] != ''){
		$custom_css.= '.gramotech-builder.this-section-css-'. esc_attr($gramotech_unique_inc).'{margin-left:' . esc_attr($atts['margin_left']) . 'px;}';
	}
	
	if(isset($atts['margin_top']) && $atts['margin_top'] != ''){
		$custom_css.= '.gramotech-builder.this-section-css-'. esc_attr($gramotech_unique_inc).'{margin-top:' . esc_attr($atts['margin_top']) . 'px;}';
	}
	
	if(isset($atts['margin_right']) && $atts['margin_right'] != ''){
		$custom_css.= '.gramotech-builder.this-section-css-'. esc_attr($gramotech_unique_inc).'{margin-right:' . esc_attr($atts['margin_right']) . 'px;}';
	}
	
	if (isset($atts['margin_bottom']) && $atts['margin_bottom'] != ''){
		$custom_css.= '.gramotech-builder.this-section-css-'. esc_attr($gramotech_unique_inc).'{margin-bottom:' . esc_attr($atts['margin_bottom']) . 'px;}';
	}

	/*Section Custom Id*/
	if (isset($atts['custom_id']) && $atts['custom_id'] <> '' ){
		$custom_id = 'id = '. $atts['custom_id'];
	} 
	
	/*Section Custom Class*/
	if (isset($atts['custom_classes'])){
		$custom_classes .= $atts['custom_classes'];
	} 
	
	if(isset($atts['background_option']['gadget']) && $atts['background_option']['gadget'] == 'background-video' ){
		
		if ($atts['background_option']['background-video']['video-settings']['gadget'] == 'uploaded'){
			$video_url = $atts['background_option']['background-video']['video-settings']['uploaded']['video']['url'];
		}else if ($atts['background_option']['background-video']['video-settings']['gadget'] == 'youtube'){
			$video_url = $atts['background_option']['background-video']['video-settings']['youtube']['video'];
		}
	
		$filetype           = wp_check_filetype( $video_url );
		$filetypes          = array( 'mp4' => 'mp4', 'ogv' => 'ogg', 'webm' => 'webm', 'jpg' => 'poster' );
		$filetype           = array_key_exists( (string) $filetype['ext'], $filetypes ) ? $filetypes[ $filetype['ext'] ] : 'video';
		$bg_video_data_attr = 'data-wallpaper-options="' . fw_htmlspecialchars( json_encode( array( 'source' => array( $filetype => $video_url ) ) ) ) . '"';
		$custom_classes .= ' background-video';
		
	}
	
	wp_enqueue_style('gramotech-internal-style',get_template_directory_uri() . '/assets/css/internal-style.css');
	wp_add_inline_style( 'gramotech-internal-style', $custom_css);
	
	$container_class = ( isset( $atts['fullwidth'] ) && $atts['fullwidth'] == 'yes' ) ? 'container-fluid' : 'container';

	?>
	<section class=" <?php echo ' '; ?> gramotech-builder this-section-css-<?php echo esc_attr($gramotech_unique_inc); echo ' '; ?>  <?php echo esc_attr($custom_classes); ?>" <?php echo esc_attr($bg_video_data_attr); ?>>
		<div class="<?php echo esc_attr($container_class); ?>">		
			<div class="row">
				<div class="<?php echo esc_attr($content_col); echo ' '; echo esc_attr($content_position); ?>">
					<?php echo do_shortcode( $content ); ?>
				</div>
				<?php 
				if(function_exists('fw_ext_sidebars_get_current_position')) {
					if(isset($sidebar_position) && $sidebar_position <> ''){ ?>
						<div class="col-md-3 <?php echo esc_attr($sidebar_position); ?>">
							<?php echo fw_ext_sidebars_show('blue'); ?>
						</div>
						<?php 
					}
				} ?>
			</div>
		</div>	
	</section>