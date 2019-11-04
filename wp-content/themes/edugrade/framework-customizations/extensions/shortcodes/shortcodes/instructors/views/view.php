<?php
if (!defined('FW')) {
    die('Forbidden');
}
/**
 * @var $atts
 */
	$uni_flag = fw_unique_increment();
	$instructor_style = empty($atts['instructor_style']) ? '' : $atts['instructor_style'];
	$columns_layout = empty($atts['columns_layout']) ? '' : $atts['columns_layout'];
	$instructors_fetch = empty($atts['instructors_fetch']) ? '' : $atts['instructors_fetch'];
	$instructors_order = empty($atts['instructors_order']) ? '' : $atts['instructors_order'];
	$instructors_pagination = empty($atts['instructors_pagination']) ? '' : $atts['instructors_pagination'];
	
	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	
	$args = array(
		'role' => 'lp_teacher',
		'number' => $instructors_fetch,
		'order' => $instructors_order,
		'fields' => 'all'
	);
	
	$instructors = get_users( $args );
	
	if($instructor_style == 'style-1'){ ?>
		<div class="meet-professors team-page">
			<?php
			foreach($instructors as $instructor){
				$instructor_meta = get_user_meta( $instructor->ID);
				?>
				<div class="<?php echo esc_attr($columns_layout); ?> col-sm-4">
					<div class="team-box">
						<div class="team-img">
							<div class="team-caption">
								<p><?php echo esc_attr($instructor_meta['description'][0]); ?></p>
								<ul class="team-social">
									<?php 
									if(!empty($instructor_meta['facebook'][0])){ ?>
										<li><a href="<?php echo esc_url($instructor_meta['facebook'][0]); ?>"><i class="fab fa-facebook-f"></i></a></li>
										<?php
									}
									if(!empty($instructor_meta['twitter'][0])){ ?>
										<li><a href="<?php echo esc_url($instructor_meta['twitter'][0]); ?>"><i class="fab fa-twitter"></i></a></li>
										<?php
									}
									if(!empty($instructor_meta['gplus'][0])){ ?>
										<li><a href="<?php echo esc_url($instructor_meta['gplus'][0]); ?>"><i class="fab fa-google-plus-g"></i></a></li>
										<?php
									}
									if(!empty($instructor_meta['linkedin'][0])){ ?>
										<li><a href="<?php echo esc_url($instructor_meta['linkedin'][0]); ?>"><i class="fab fa-linkedin-in"></i></a></li>
										<?php
									}
									?>
								</ul>
							</div>
							<span class="plus"> <i class="fas fa-plus"></i> <i class="fas fa-minus"></i> </span> 
							<?php $upload_dir   = wp_upload_dir(); ?>
							<img src="<?php echo esc_url($upload_dir['baseurl'] .'/'. $instructor_meta['_lp_profile_picture'][0]); ?>" alt="<?php echo esc_attr__('img','edugrade'); ?>">
						</div>
						<div class="team-name">
							<h5><?php echo esc_attr($instructor_meta['first_name'][0] .' '. $instructor_meta['last_name'][0]); ?></h5>
							<strong><?php echo esc_attr($instructor_meta['designation'][0]); ?></strong> 
						</div>
					</div>
				</div>
				<?php
			} ?>
		</div>
		<?php
	}else if($instructor_style == 'style-2'){ ?>
		<div class="team-style-1 team-page">
			<div class="row">
				<?php
				foreach($instructors as $instructor){
					$instructor_meta = get_user_meta( $instructor->ID);
					?>
					<div class="col-md-3 col-sm-6">
						<div class="team-box">
							<?php $upload_dir   = wp_upload_dir(); ?>
							<img src="<?php echo esc_url($upload_dir['baseurl'] .'/'. $instructor_meta['_lp_profile_picture'][0]); ?>" alt="<?php echo esc_attr__('img','edugrade'); ?>">
							<div class="team-cap">
								<span class="plusc"><i class="fas fa-plus"></i></span>
								<h5><?php echo esc_attr($instructor_meta['first_name'][0] .' '. $instructor_meta['last_name'][0]); ?></h5>
								<strong><?php echo esc_attr($instructor_meta['designation'][0]); ?></strong>
								<ul class="team-social">
									<?php 
									if(!empty($instructor_meta['facebook'][0])){ ?>
										<li><a href="<?php echo esc_url($instructor_meta['facebook'][0]); ?>"><i class="fab fa-facebook-f"></i></a></li>
										<?php
									}
									if(!empty($instructor_meta['twitter'][0])){ ?>
										<li><a href="<?php echo esc_url($instructor_meta['twitter'][0]); ?>"><i class="fab fa-twitter"></i></a></li>
										<?php
									}
									if(!empty($instructor_meta['gplus'][0])){ ?>
										<li><a href="<?php echo esc_url($instructor_meta['gplus'][0]); ?>"><i class="fab fa-google-plus-g"></i></a></li>
										<?php
									}
									if(!empty($instructor_meta['linkedin'][0])){ ?>
										<li><a href="<?php echo esc_url($instructor_meta['linkedin'][0]); ?>"><i class="fab fa-linkedin-in"></i></a></li>
										<?php
									}
									?>
								</ul>
							</div>
						</div>
					</div>
					<?php
				} ?>
			</div>
		</div>	
		<?php
	}else if($instructor_style == 'style-3'){ ?>
		<div class="team-page-3">
			<div class="row">
				<?php
				foreach($instructors as $instructor){
					$instructor_meta = get_user_meta( $instructor->ID);
					?>
					<div class="col-md-3 col-sm-6 np">
						<div class="team-box">
							<div class="team-cap">
								<h4><?php echo esc_attr($instructor_meta['first_name'][0] .' '. $instructor_meta['last_name'][0]); ?></h4>
								<strong><?php echo esc_attr($instructor_meta['designation'][0]); ?></strong>
								<ul class="team-social">
									<?php 
									if(!empty($instructor_meta['facebook'][0])){ ?>
										<li><a href="<?php echo esc_url($instructor_meta['facebook'][0]); ?>"><i class="fab fa-facebook-f"></i></a></li>
										<?php
									}
									if(!empty($instructor_meta['twitter'][0])){ ?>
										<li><a href="<?php echo esc_url($instructor_meta['twitter'][0]); ?>"><i class="fab fa-twitter"></i></a></li>
										<?php
									}
									if(!empty($instructor_meta['gplus'][0])){ ?>
										<li><a href="<?php echo esc_url($instructor_meta['gplus'][0]); ?>"><i class="fab fa-google-plus-g"></i></a></li>
										<?php
									}
									if(!empty($instructor_meta['linkedin'][0])){ ?>
										<li><a href="<?php echo esc_url($instructor_meta['linkedin'][0]); ?>"><i class="fab fa-linkedin-in"></i></a></li>
										<?php
									}
									?>
								</ul>
							</div>
							<?php $upload_dir   = wp_upload_dir(); ?>
							<img src="<?php echo esc_url($upload_dir['baseurl'] .'/'. $instructor_meta['_lp_profile_picture'][0]); ?>" alt="<?php echo esc_attr__('img','edugrade'); ?>">
						</div>
					</div>
					<?php
				} ?>
			</div>
		</div>	
		<?php
	}
	?>
	
	<?php wp_reset_postdata(); ?>