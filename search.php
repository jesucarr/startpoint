<?php get_header(); ?>

	<div id="content" class="hfeed">

	<?php if (have_posts()) : ?>

		<h4><?php _e('Search Results'); ?></h4>


		<?php while (have_posts()) : the_post(); ?>

			<div class="post hentry" id="post-<?php the_ID(); ?>">
			<h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo __('View').' &quot;'.the_title('', '', false).'&quot;'; ?>"><?php the_title(); ?></a></h1>
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
            <div class="post-entry entry-content"><?php the_content('<span class="post-entry-more">'.__('(more...)').'</span>') ?></div>
			<div class="post-comments"><?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'), '', __('Sorry, comments are closed for this item.')); ?></div>
            
        </div>

		<?php endwhile; ?>

		<div class="previous-post-link"><?php next_posts_link(__('&laquo; Previous Entries')) ?></div>
        <div class="next-post-link"><?php previous_posts_link(__('Next Entries &raquo;')) ?></div>

	<?php else : ?>

		<h4><?php _e('Sorry, no posts matched your criteria.'); ?></h4>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>