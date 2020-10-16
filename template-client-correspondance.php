<?php
// Do not delete these lines

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ( 'Please do not load this page directly. Thanks!' );

if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'genesis' ); ?></p>

<?php return; } ?>

<?php $comments_by_type = &separate_comments( $comments ); ?>    

<!-- You can start editing here. -->
<!-- Begin Comment Tabs -->

	<?php if ('open' == $post->comment_status) : ?>
	 

		 
		<h3 class="secureh3">Account Messaging</h3>
		 
		<div class="cancel-comment-reply">
		    <small><?php cancel_comment_reply_link(); ?></small>
		</div>
	 
			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
				<!-- <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p> -->
			<?php else : ?>
			 
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="submit">
	 
			<?php if ( $user_ID ) : ?>
	 
				<!-- <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p> -->
	 
			<?php else : ?>
	 
				<!-- <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
				<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>
	 
				<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
				<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>
				 
				<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
				<label for="url"><small>Website</small></label></p> -->
	 
			<?php endif; ?>
	 
		<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
	 
		<p><textarea name="comment" id="comment" placeholder="fire away..." cols="100%" tabindex="4"></textarea></p>
		<input type='hidden' name='action' value='comment'> 
		<p><input type="submit" id="submit" tabindex="5" value="Send My Thought" />
		<?php comment_id_fields(); ?>
		</p>
		<?php do_action('comment_form', $post->ID); ?>
		 
		</form>
	 
		<?php endif; // If registration required and not logged in ?>
	
<?php endif; // if you delete this the sky will fall on your head ?>



<br/>

<div id="comment-form-tabs">

<?php if ( have_comments() ) { ?>

<div id="comments">

	<?php if ( ! empty( $comments_by_type['comment'] ) ) { ?>

		<ul class="commentlist">

			<!--<h3 class="secureh3"><?php //comments_number( 'no thoughts yet', 'one thought on this project', '% thoughts on this project' ); ?></h3>-->

			<?php

				echo '<menu id="contentBlog">';
				paginate_comments_links();
				echo '</menu>';
		
				wp_list_comments(array(
					'avatar_size' => '40',
					'reverse_top_level' => '1'
				));

			?>
		
		</ul>   

		<?php 

		echo '<menu id="contentBlog">';
		paginate_comments_links();
		echo '</menu>';

	} ?>		    
    	
</div> <!-- /#comments_wrap -->



<?php } else { // this is displayed if there are no comments so far ?>

<div id="comments">

	<?php 
		// If there are no comments and comments are closed, let's leave a little note, shall we?
		if ( ! comments_open() && is_singular() ) { ?><h5 class="nocomments"><?php _e( 'Comments are closed.', 'genesis' ); ?></h5><?php }
		else { ?><h5 class="nocomments"><?php _e( 'Nobody\'s jumped in yet... what a boring project.', 'genesis' ); ?></h5><?php }
	?>

</div> <!-- /#comments_wrap -->

<?php } ?>

</div><!--/#comment-form-tabs-->
