<?php get_header(); ?>

	<div id="content" class="hfeed">

<?php
if (have_posts()) : while (have_posts()) : the_post(); 
    $attachment_link = get_the_attachment_link($post->ID, true, array(450, 800)); // This also populates the iconsize for the next line 
    $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; // This lets us style narrow icons specially 
?>
		<div class="post hentry" id="post-<?php the_ID(); ?>">
			<h1 class="entry-title"><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?></h1>
			<div class="post-datetime"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php the_time('l, j F Y, G:i'); ?></abbr></div>
            <div class="post-author author vcard">
                <?php printf(__('By %s'),'') ?> 
                <?php 
                    if (get_the_author_url() != 'http://') { ?>
                        <a class="fn url" href="<?php the_author_url(); ?>" title="<?php echo __('Visit author homepage') ?>"><?php echo get_the_author()?></a> 
                    <?php }else{ ?>
                        <span class="fn"><?php the_author();?></span>
                    <?php } ?> <span class="post-author-posts">(<a href="<?php echo get_author_link(false, $authordata->ID, $authordata->user_nicename) ?>" title="<?php echo __('View posts').' '. __('by').' '. $authordata->display_name ?>"><?php _e('View posts')?></a>)</span></div>
            <div class="post-category"><?php _e('Category:') ?> <?php the_category(', '); ?></div>
            <?php edit_post_link(__('Edit'),'[',']'); ?>
            <div class="post-entry entry-content">
				<div class="<?php echo $classname; ?>">
                    <div class="attachment-link"><?php echo $attachment_link; ?></div>
                    <div class="attachment-filename"><?php echo basename($post->guid); ?></div>
                </div>

				<?php the_content(); //the_content('<p>' . __('(more...)') . '</p>'); ?>

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<h4><?php _e('Oops, no such file exists! Double check the name and try again, merci.'); ?></h4>

<?php endif; ?>

	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
