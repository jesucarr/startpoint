<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('This script was not meant to be called directly.'));

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>

				<div class="protected-comments"><?php _e('Protected Comments: Please enter your password to view comments.'); ?><div>

				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = ' odd';
?>

<?php if ($comments) : ?>
    <div id="comments">
        <h4><?php echo comments_number(__('No Comments'), __('1 Comment'), __('% Comments')); ?></h4>
        <ul>
        <?php $i=0; foreach ($comments as $comment) : ?>
    
            <li class="comment<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
                <div class="comment-number"><a href="#comment-<?php comment_ID() ?>" title="<?php _e('Comment')?> <?php echo $i+1 ?>"><?php echo $i+1 ?></a></div>
                <div class="comment-datetime"><?php echo comment_date(__('l, j F Y, G:i')); ?></div>
                <div class="comment-author"><?php _e('By') ?> <?php comment_author_link() ?></div>
                <?php edit_comment_link(__('Edit'),'[',']'); ?>
                <?php if ($comment->comment_approved == '0') : ?>
                <div class="comment-moderated"><?php echo __('Comment').' '.__('Moderated'); ?></div>
                <?php endif; ?>
                
                <?php comment_text() ?>
    
            </li>
    
        <?php /* Changes every other comment to a different class */
            if (' odd' == $oddcomment) $oddcomment = '';
            else $oddcomment = ' odd';
        ?>
    
        <?php $i++; endforeach; /* end for each comment */ ?>
        </ul>
        <div class="comments-feed"><?php comments_rss_link(__('<abbr title="Really Simple Syndication">RSS</abbr> feed for comments on this post.')); ?></div>
    </div>
    
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
	<div class="respond">
		<h4 id="respond"><?php _e('Leave a comment'); ?></h4>

			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
				<div><?php $redirect_url = get_option('siteurl').'/wp-login.php?redirect_to='.get_permalink(); _e('Sorry, you must be logged in to post a comment.')?> <a href="<?php echo $redirect_url ?>" title="<?php _e('Click here to login!') ?>"><?php _e('Click here to login!') ?></a></div>
			<?php else : ?>

				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

					<?php if ( $user_ID ) : ?>

						<div><?php _e('Login name:') ?> <a href="<?php echo get_option('siteurl') . '/wp-admin/profile.php' ?>" title="<?php _e('Your Profile and Personal Options') ?>"><?php echo $user_identity ?></a> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Logout') ?>"><?php _e('Logout'); ?></a></div>

					<?php else : ?>

						<div><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" />
			    			<label for="author"><?php if ($req) { ?>
			                                		<?php _e('Name'); ?> <span class="commentform-required"><?php _e('(required)');?></span>
			                            		<?php }else{ ?>
			                                		<?php _e('Name'); }?>
							</label>
						</div>

						<div>
							<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" />
			    			<label for="email"><?php if ($req) { ?>
			                            <?php  _e('E-mail'); ?> (<?php _e('Private'); ?>) <span class="commentform-required"><?php _e('(required)'); ?></span>
			                            <?php }else{ ?>
			                                <?php _e('E-mail'); ?> (<?php _e('Private'); ?>) 
			                        <?php } ?>
							</label>
						</div>

						<div>
							<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />
			    			<label for="url"><?php _e('Website'); ?></label></div>
    
					<?php endif; ?>

					<div><textarea name="comment" id="comment" tabindex="4" cols="20" rows="3"></textarea></div>

					<div><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit'); ?>" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></div>
					<?php do_action('comment_form', $post->ID); ?>

				</form>

			<?php endif; // if ( get_option('comment_registration') && !$user_ID ) ?>
	</div>
<?php else : // if comments are closed ?>

<?php endif; // if ( 'open' == $post->comment_status ) ?>