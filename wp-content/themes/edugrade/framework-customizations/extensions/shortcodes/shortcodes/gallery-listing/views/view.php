<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();
	
	$page_custom_class = isset( $atts['page_custom_class'] ) ? $atts['page_custom_class'] : '';
	$gallery_style = isset( $atts['gallery_style'] ) ? $atts['gallery_style'] : '';
	$gallery_category = isset( $atts['gallery_category'] ) ? $atts['gallery_category'] : '';
	$gallery_fetch = isset( $atts['gallery_fetch'] ) ? $atts['gallery_fetch'] : '';
	$gallery_order_by = isset( $atts['gallery_order_by'] ) ? $atts['gallery_order_by'] : '';
	$gallery_order = isset( $atts['gallery_order'] ) ? $atts['gallery_order'] : '';
	$gallery_pagination = isset( $atts['gallery_pagination'] ) ? $atts['gallery_pagination'] : '';
		
	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

	$args = array(
		'post_type' => 'gallery',
		'posts_per_page' => $gallery_fetch,
		'orderby' => $gallery_order_by,
		'order' => $gallery_order,
		'paged' => $paged,
		'tax_query' => array(
			array(
				'taxonomy' => 'gallery_category',
				'field'    => 'post_id',
				'terms'    => $gallery_category,
			),
		)
	);
		
	$the_query = new WP_Query( $args );
	
	if($gallery_style == 'grid_view'){ ?>
		<div class="gallery">
			<div class="row">
				<?php 
				$custom_counter = 0;
				while($the_query->have_posts()){ 
					$the_query->the_post();
					global $post; 
					
					$thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
					?>
					<!--Gallery Img Start-->
					<div class="col-md-4 col-sm-4 col-xs-6">
						<div class="gallery-thumb"> 
							<a href="<?php echo esc_url($thumbnail_url[0]); ?>" data-rel="prettyPhoto[gallery1]"><i class="fas fa-search"></i></a>
							<?php  the_post_thumbnail('full' );  ?>
						</div>
					</div>
					<!--Gallery Img End-->
					<?php
					$custom_counter++;
				} ?>
			</div>
		</div>	
		<?php
	}else{
		
		$category_count = count($gallery_category);
		
		?>
		<div class="main-content gallery">
            <div class="img-gallery style-2">
				<div class="row">
					<div class="portfolio filter-gallery">
                        <div id="filters" class="button-group">
							<button class="button is-checked" data-filter="*"><?php echo esc_attr__('All','edugrade'); ?></button>
							<?php
							for($i = 0; $i<$category_count; $i++){
								$cat_object = get_term_by( 'id', $gallery_category[$i], 'gallery_category' ); ?>
								<button class="button" data-filter=".gallery-filter-<?php echo esc_attr($gallery_category[$i]); ?>"><?php echo esc_attr($cat_object->name); ?></button>
								<?php	
							} ?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="isotope items">
							<?php 
							$custom_counter = 0;
							while($the_query->have_posts()){ 
								$the_query->the_post();
								global $post; 
								$cat_string = '';
								$post_categories = get_the_terms( $post->ID, 'gallery_category' );
							
								if($custom_counter == 2){
									$gallery_img_class = 'height2';
								}else if($custom_counter == 3){
									$gallery_img_class = 'width2';
								}else{
									$gallery_img_class = '';
								}
							
								foreach($post_categories as $post_category){
									$cat_string .= 'gallery-filter-'.esc_attr($post_category->term_id) . ' ';
								}
								$gallery_img_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
								?>
								<div class="item <?php echo esc_attr($cat_string); ?> <?php echo esc_attr($gallery_img_class); ?>">
									<div class="gallery-thumb"> 
										<a href="<?php echo esc_url($gallery_img_src[0]); ?>" data-rel="prettyPhoto[gallery]"><i class="fas fa-search"></i></a> 
										<?php  the_post_thumbnail('full' );  ?>  
									</div>
								</div>
								<?php 
								$custom_counter++;
							} ?>
                        </div>
					</div>
				</div>
            </div>
            <!-- Gallery Page Start -->
		</div>
		<?php
	} 
	
	wp_reset_postdata();
	?>