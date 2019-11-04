<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();
	global $post_builder_options;
	
	$page_custom_class = isset( $atts['page_custom_class'] ) ? $atts['page_custom_class'] : '';
	$course_category = isset( $atts['course_category'] ) ? $atts['course_category'] : '';
	$course_style = isset( $atts['course_style'] ) ? $atts['course_style'] : '';
	$courses_titles = isset( $atts['courses_titles'] ) ? $atts['courses_titles'] : '';
	$courses_descrp = isset( $atts['courses_descrp'] ) ? $atts['courses_descrp'] : '';
	$courses_fetch = isset( $atts['courses_fetch'] ) ? $atts['courses_fetch'] : '';
	$courses_order_by = isset( $atts['courses_order_by'] ) ? $atts['courses_order_by'] : '';
	$courses_order = isset( $atts['courses_order'] ) ? $atts['courses_order'] : '';
	$courses_pagination = isset( $atts['courses_pagination'] ) ? $atts['courses_pagination'] : '';
	
	if($atts['course_style']['gadget'] == 'courses-grid' ||
		$atts['course_style']['gadget'] == 'courses-grid-modern' ||
		$atts['course_style']['gadget'] == 'courses-list'){
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

		$args = array(
			'post_type' => 'lp_course',
			'posts_per_page' => $courses_fetch,
			'orderby' => $courses_order_by,
			'order' => $courses_order,
			'paged' => $paged,
			'tax_query' => array(
				array(
					'taxonomy' => 'course_category',
					'field'    => 'post_id',
					'terms'    => $course_category,
				),
			)
		);
		
		$the_query = new WP_Query( $args );	
	}
		
	if($atts['course_style']['gadget'] == 'courses-grid'){
		$courses_grid = $atts['course_style']['courses-grid'];
		
		?>
		<div class="courses course-grid">
            <div class="row">
				<?php
				while($the_query->have_posts()){
					$the_query->the_post();
					global $post;
					$post_cats = get_the_terms($post->ID, 'course_category' );
					
					if(function_exists('learn_press_get_course_rate')){
						$course_rate = learn_press_get_course_rate( $post->ID, false );
						$percent = ( ! $course_rate['rated'] ) ? 0 : min( 100, ( round( $course_rate['rated'] * 2 ) / 2 ) * 20 );
					}
					$course = LP_Global::course();
					$lessons_count = $course->get_curriculum_items('lp_lesson') ? count( $course->get_curriculum_items('lp_lesson') ) : 0; 
					$user_count = $course->get_users_enrolled() ? $course->get_users_enrolled() : 0;
					$course_duration    = get_post_meta( $post->ID, '_lp_duration', true );
					?>
					<div class="<?php echo esc_attr($courses_grid['columns_layout']); ?> col-sm-6">
						<div class="course-grid-box">
							<div class="course-thumb"> 
								<?php 
								if(isset($post_cats) && !empty($post_cats)){ 
									foreach($post_cats as $c){
										$cat = get_category( $c ); ?>
										<strong class="cdeprt"><?php echo esc_attr($cat->name); ?></strong> 
										<?php
										break;
									}  
								} ?>
								<a href="<?php echo esc_url(get_permalink()); ?>"><i class="fas fa-link"></i></a> 
								<?php the_post_thumbnail('gramotech-course-list'); ?> 
							</div>
							<div class="course-excerpt">
								<?php 
								if(function_exists('learn_press_get_course_rate')){ ?>
									<div class="review-stars-rated fc-rating"> <?php echo esc_attr($course_rate['rated']); ?>
										<div class="review-stars empty"></div>
										<div class="review-stars filled" style="width:<?php echo esc_attr($percent); ?>%;"></div>
									</div>
									<?php 
								} ?>
								<div class="ctxt">
									<h4><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo substr(get_the_title(),0,$courses_titles); ?></a></h4>
									<p><?php echo substr(get_the_content(),0,$courses_descrp); ?>...</p>
								</div>
							</div>
							<ul class="course-meta">
								<li><i class="fas fa-book"></i> <?php echo esc_attr($lessons_count); ?> <?php echo esc_attr__('Lessons','edugrade'); ?></li>
								<li><i class="fas fa-clock"></i> <?php echo esc_attr($course_duration); ?></li>
							</ul>
						</div>
					</div>
					<?php
				}
				if($courses_pagination == 'enable'){
					echo gramotech_pagination($the_query);
				} ?>
			</div>
		</div>
		<?php
	}else if($atts['course_style']['gadget'] == 'courses-grid-modern'){ ?>
		<div class="courses course-grid">
			<div class="row">
				<?php
				
				while($the_query->have_posts()){
					$the_query->the_post();
					global $post;
					$post_cats = get_the_terms($post->ID, 'course_category' );
					
					if(function_exists('learn_press_get_course_rate')){
						$course_rate = learn_press_get_course_rate( $post->ID, false );
						$percent = ( ! $course_rate['rated'] ) ? 0 : min( 100, ( round( $course_rate['rated'] * 2 ) / 2 ) * 20 );
					}
					$course = LP_Global::course();
					?>
					
					<div class="col-md-4 col-sm-4">
						<div class="course-grid-box cgb-2">
							<div class="course-thumb"> 
								<?php 
								if(isset($post_cats) && !empty($post_cats)){ 
									foreach($post_cats as $c){
										$cat = get_category( $c ); ?>
										<strong class="cdeprt"><?php echo esc_attr($cat->name); ?></strong> 
										<?php
										break;
									}  
								} ?>
								<a href="<?php echo esc_url(get_permalink()); ?>"><i class="fas fa-link"></i></a> 
								<?php the_post_thumbnail('gramotech-post-featured'); ?> 
							</div>
							<div class="course-excerpt">
								<h4><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo substr(get_the_title(),0,$courses_titles); ?></a></h4>
								<strong class="cprice  pull-left"><?php echo esc_attr($course->get_price_html()); ?></strong>
								<?php 
								if(function_exists('learn_press_get_course_rate')){ ?>
									<div class="review-stars-rated fc-rating pull-right">
										<span>(<?php echo esc_attr($course_rate['total']); ?> <?php echo esc_attr__('Reviews','edugrade'); ?>)</span> 
										<div class="review-stars empty"></div>
										<div class="review-stars filled" style="width:<?php echo esc_attr($percent); ?>%;"></div>
									</div>
									<?php
								} ?>
						   </div>
						</div>
					</div>
					<?php
				}
				if($courses_pagination == 'enable'){
					echo gramotech_pagination($the_query);
				} ?>
			</div>
		</div>
		<?php
	}else if($atts['course_style']['gadget'] == 'courses-list'){
		$courses_list = $atts['course_style']['courses-list'];
		
		if($courses_list['columns_layout'] == 'col-md-6'){
			$layout_class = "full";
		}else{
			$layout_class = "";
		}
		?>
		<div class="course-listing  <?php echo esc_attr($layout_class); ?>">
            <?php 
			if($courses_list['columns_layout'] == 'col-md-6'){ ?> <div class="row"> <?php } ?>
			
				<?php
				while($the_query->have_posts()){
					$the_query->the_post();
					global $post;
					$post_cats = get_the_terms($post->ID, 'course_category' );
					
					if(function_exists('learn_press_get_course_rate')){
						$course_rate = learn_press_get_course_rate( $post->ID, false );
						$percent = ( ! $course_rate['rated'] ) ? 0 : min( 100, ( round( $course_rate['rated'] * 2 ) / 2 ) * 20 );
					}
					$course = LP_Global::course();
					$lessons_count = $course->get_curriculum_items('lp_lesson') ? count( $course->get_curriculum_items('lp_lesson') ) : 0; 
					$user_count = $course->get_users_enrolled() ? $course->get_users_enrolled() : 0;
					$course_duration    = get_post_meta( $post->ID, '_lp_duration', true );
					
					
					if($courses_list['columns_layout'] == 'col-md-6'){ ?> <div class="col-md-6 col-sm-6"> <?php } ?>
					<div class="course-grid-box">
						<div class="course-thumb"> 
							<?php 
							if(isset($post_cats) && !empty($post_cats)){ 
								foreach($post_cats as $c){
									$cat = get_category( $c ); ?>
									<strong class="cdeprt"><?php echo esc_attr($cat->name); ?></strong> 
									<?php
									break;
								}  
							} ?>
							<a href="<?php echo esc_url(get_permalink()); ?>"><i class="fas fa-link"></i></a> 
							<?php
							if($courses_list['columns_layout'] == 'col-md-6'){
								the_post_thumbnail('gramotech-course-list-grid');
							}else{
								the_post_thumbnail('gramotech-course-list');
							} ?> 
						</div>
						<div class="course-excerpt">
							<?php 
							if(function_exists('learn_press_get_course_rate')){ ?>
								<div class="review-stars-rated fc-rating"> <?php echo esc_attr($course_rate['rated']); ?>
									<div class="review-stars empty"></div>
									<div class="review-stars filled" style="width:<?php echo esc_attr($percent); ?>%;"></div>
								</div>
								<?php
							} ?>
							<div class="ctxt">
								<h4><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo substr(get_the_title(),0,$courses_titles); ?></a></h4>
								<p><?php echo substr(get_the_content(),0,$courses_descrp); ?>...</p>
								<a href="<?php echo esc_url(get_permalink()); ?>" class="cdetail"><?php echo esc_attr__('Read More','edugrade'); ?></a>
							</div>
							<ul class="course-meta">
								<li><i class="fas fa-book"></i> <?php echo esc_attr($lessons_count); ?> <?php echo esc_attr__('Lessons','edugrade'); ?></li>
								<?php 
								if($courses_list['columns_layout'] == 'col-md-6'){ ?>
									
									<?php
								}else{ ?>
									<li><i class="fas fa-users"></i> <?php echo esc_attr($user_count); ?> <?php echo esc_attr__('Students','edugrade'); ?></li>
									<?php
								} ?>
								<li><i class="fas fa-clock"></i> <?php echo esc_attr($course_duration); ?></li>
							</ul>
						</div>
					</div>
					<?php
					if($courses_list['columns_layout'] == 'col-md-6'){ ?> </div> <?php }
				}
				if($courses_pagination == 'enable'){
					echo gramotech_pagination($the_query);
				} ?>
				<?php 
				if($courses_list['columns_layout'] == 'col-md-6'){ ?> </div> <?php } ?>
			
		</div>
		<?php
	}else if($atts['course_style']['gadget'] == 'featured-courses'){
		$courses_featured = $atts['course_style']['featured-courses'];
		?>
		<div class="featured-courses">
            <div class="row">
                <div class="col-md-5">
                    <div class="title3">
                        <h2><?php echo esc_attr($courses_featured['heading']); ?></h2>
                    </div>
                </div>
                <div class="col-md-7">
                    <ul class="course-tabs-nav" role="tablist">
                        <?php
						$cat_counter = 0;
						for($i=0; $i<count($course_category); $i++){
							$cat_counter++;
							if($cat_counter == 1){
								$active_class = 'active';
							}else{
								$active_class = '';
							} 
							?>
							<li role="presentation" class="<?php echo esc_attr($active_class); ?>">
								<a href="#<?php echo esc_attr($course_category[$i]); ?>" aria-controls="<?php echo esc_attr($course_category[$i]); ?>" role="tab" data-toggle="tab"><?php echo get_the_category_by_ID($course_category[$i]); ?></a>
							</li>
							<?php
						} ?>
                    </ul>
                </div>
            </div>
			<div class="tab-content">
				<?php
				$cat_counter = 0;
				for($i=0; $i<count($course_category); $i++){
					$cat_counter++;
					if($cat_counter == 1){
						$active_class = 'active';
					}else{
						$active_class = '';
					} 
					?>
					<div role="tabpanel" class="tab-pane <?php echo esc_attr($active_class); ?>" id="<?php echo esc_attr($course_category[$i]); ?>">
						<div class="row">
							<?php
							$args = array(
								'post_type' => 'lp_course',
								'posts_per_page' => $courses_fetch,
								'orderby' => $courses_order_by,
								'order' => $courses_order,
								'paged' => $paged,
								'tax_query' => array(
									array(
										'taxonomy' => 'course_category',
										'field'    => 'post_id',
										'terms'    => $course_category[$i],
									),
								)
							);
							
							$the_query = new WP_Query( $args );	
							
							while($the_query->have_posts()){
								$the_query->the_post();
								global $post;
								$post_cats = get_the_terms($post->ID, 'course_category' );
								
								if(function_exists('learn_press_get_course_rate')){
									$course_rate = learn_press_get_course_rate( $post->ID, false );
									$percent = ( ! $course_rate['rated'] ) ? 0 : min( 100, ( round( $course_rate['rated'] * 2 ) / 2 ) * 20 );
								} ?>
								<div class="col-md-3 col-sm-6">
									<div class="course-box">
										<div class="fc-hover">
											<p><?php echo substr(get_the_content(),0,$courses_descrp); ?> </p>
											<a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_attr__('Read More','edugrade'); ?></a> 
										</div>
										<div class="course-thumb"> 
											<?php the_post_thumbnail('gramotech-course-list'); ?>
										</div>
										<div class="course-excerpt">
											<span class="plus"> <a  class="qvc" target="1"><?php echo esc_attr__('Quick View','edugrade'); ?></a> <i class="fas fa-plus"></i> </span>
											<h5> <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo substr(get_the_title(),0,$courses_titles); ?></a> </h5>
										</div>
										<div class="course-footer"> 
											<a class="detail" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_attr__('Read More','edugrade'); ?></a> 
											<?php 
											if(function_exists('learn_press_get_course_rate')){ ?>
												<div class="review-stars-rated crating">
													<div class="review-stars empty"></div>
													<div class="review-stars filled" style="width:<?php echo esc_attr($percent); ?>%;"></div>
												</div>
											<?php 
											} ?>
											
										</div>
									</div>
								</div>
								<?php 
							} ?>	
						</div>
					</div>
					<?php
				} ?>
			</div>
        </div>
		<?php
	}
	wp_reset_postdata(); ?>