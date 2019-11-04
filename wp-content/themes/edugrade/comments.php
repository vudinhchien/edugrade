<?php
/**
 * The template for displaying Comments.
 */
if ( post_password_required() )
	return;

	if(have_comments()){ ?>		

		<div class="post-comments">
			<?php 
			if( get_comments_number() <= 1 ){
				echo '<h3 class="stitle">' . esc_attr__('Comments on Post', 'edugrade').' ('.esc_attr(get_comments_number()) . ')</h3>'; 
			}else{
				echo '<h3 class="stitle">' . esc_attr__('Comments on Post', 'edugrade').' ('.esc_attr(get_comments_number()) . ')</h3>'; 
			}
			?>
			<ul id="gramotech-comment" class="comments">
				<?php wp_list_comments(array('callback' => 'gramotech_comment_list', 'style' => 'ul')); ?>
			</ul>	
			<?php 
			if (get_comment_pages_count() > 1 && get_option('page_comments')){ ?>
				<nav id="comment-nav-below" class="navigation">
					<div class="nav-previous"><?php previous_comments_link( esc_attr__( '&larr; Older Comments', 'edugrade' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_attr__( 'Newer Comments &rarr;', 'edugrade' ) ); ?></div>
				</nav>
				<?php 
			} ?>
		</div>
		<?php
	} 

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ($req ? " aria-required='true'" : '');
	
	$args = array(
		'id_form'				=> 'commentform',
		'id_submit'  			=> 'submit',
		'title_reply'			=> 'Leave a Comment',
		'title_reply_before'	=> '<h3 class="stitle">',
		'title_reply_after'		=> '</h3>',
		'class_form' 			=> 'review-form leave-comment team-contact',
		'submit_field'			=> '<div class="row"><div class="col-md-12">%1$s %2$s</div></div>',
		'title_reply_to'    	=> esc_attr__('Leave a Reply to %s', 'edugrade'),
		'cancel_reply_link' 	=> esc_attr__('Cancel Reply', 'edugrade'),
		'label_submit'      	=> esc_attr__('Submit', 'edugrade'),
		'comment_notes_before' 	=> '',
		'comment_notes_after' 	=> '',

		'fields' => apply_filters('comment_form_default_fields', array(
			'author' =>
				'<div class="row"><div class="col-md-6"><div class="input-group"><i class="far fa-user"></i><input id="author" class="form-control" placeholder="' . esc_attr__('Name', 'edugrade') . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" /></div></div>',
			'email' => 
				'<div class="col-md-6"><div class="input-group"><i class="far fa-envelope-open"></i><input id="email" class="form-control" placeholder="' . esc_attr__('Email', 'edugrade') . '" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .'"/></div></div></div>',
		)),
		'comment_field' =>  
			'<div class="row"><div class="col-md-12"><div class="input-group"><i class="fas fa-pen-square"></i>' .
			'<textarea id="comment" class="form-control" placeholder="' . esc_attr__('Comments', 'edugrade') . '" name="comment">' .
			'</textarea></div></div></div>'
		
	);
	comment_form($args,$post->ID); 
?>