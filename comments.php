<div id="comments">
<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
	echo __('This post is password protected. Enter the password to view comments','cwp').'</div>';
	return;
}
?>

<?php if ( have_comments() ) : ?>
    <h2 class="commentsection"><?php comments_number(__('No Comments','cwp'), __('1 Comment','cwp'), __('% Comments','cwp') );?></h2>
     
    <ul class="commentlist">
		<?php wp_list_comments('avatar_size=40'); ?>
	</ul>

    <div class="navigation">
        <div class="alignleft"><?php previous_comments_link() ?></div>
        <div class="alignright"><?php next_comments_link() ?></div>
    </div>
    
<?php else : // this is displayed if there are no comments so far ?>

	<?php if ($post->comment_status == 'open') : ?>
        <p><?php _e('There are no comments yet, add one below.','cwp'); ?></p>
    <?php else : ?>
        
    <?php endif; ?>

<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

     <div id="respond">   
        <div class="separator"></div>
    
        <h2 class="commentsection"><?php comment_form_title( __('Leave a Reply','cwp'), 'Leave a Reply to %s' ); ?></h2>
        <br />
        <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
        <p><?php _e('You must be','cwp'); ?><a href="<?php echo home_url(); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('logged in','cwp'); ?></a> <?php _e('to post a comment.','cwp'); ?></p>
    
        <?php else : ?>
		
		<?php
				if ($req) 
					$name_req = "(required)";
				else
					$name_req = "";
				$comments_args = array(
						'title_reply' => '',
						'title_reply_to' => '',
						// change the title of send button 
						'label_submit'=>'Submit',
						'comment_notes_before' => '',
						// remove "Text or HTML to be displayed after the set of comment fields"
						
						// redefine your own textarea (the comment body)
						'comment_field' => '<textarea id="comment" name="comment" class="textarea"></textarea>',
					
						'fields' => array(
						
						
						
						'author' => '<p><input type="text" name="author" id="author" value="'.$comment_author.'" size="50" class="textfield" /> <span class="commentslabel">'.__('Name ','cwp').$name_req.'</small></span> </p>',
						'email' => '<p><input type="text" name="email" id="email" value="'.$comment_author_email.'" size="50" class="textfield" /> <span class="commentslabel">'.__('Email ','cwp').$name_req.'</small></span> </p>',
						'url' => '<p><input type="text" name="url" id="url" value="'.$comment_author_url.'" size="50"  class="textfield"/> <span class="commentslabel">'.__('Website','cwp').' </span> </p>',
					),
				);
				 
				comment_form($comments_args);
		?>
        
        <div id="cancel-comment-reply">
			<small><?php cancel_comment_reply_link() ?></small>
    	</div>
		
		<?php endif; ?>

	</div>

<?php endif; ?>
</div>