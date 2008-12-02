<?php get_header(); ?>

	<div id="content" class="hfeed">

		<?php if (have_posts()) : the_post();rewind_posts() //to make work get_the_author() in the header?>
		<div class="archive-header">
		 	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
			<h4><?php printf(__('View posts for %1$s %2$s'), '&raquo; '.__('Category'), '&quot;'.single_cat_title('',false).'&quot;'); ?></h4>
			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h4><?php printf(__('View posts for %1$s %2$s'), '&raquo; '.__('Tag:'), '&quot;'.single_tag_title('',false).'&quot;'); ?></h4>
	 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h4><?php printf(__('View posts for %1$s %2$s'), '&raquo; '.get_the_time(__('F jS, Y')),''); ?></h4>

		 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h4><?php printf(__('View posts for %1$s %2$s'), '&raquo; '.get_the_time(__('F, Y')),''); ?></h4>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h4><?php printf(__('View posts for %1$s %2$s'), '&raquo; '.get_the_time('Y'),''); ?></h4>

		  <?php /* If this is a search */ } elseif (is_search()) { ?>
			<h4><?php _e('Search Results'); ?></h4>

		  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h4><?php printf(__('View posts for %1$s %2$s'), '&raquo; '.__('Author'), get_the_author() ); ?></h4>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h4><?php _e('Archives'); ?></h4>
			<?php } ?>
    	</div>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post hentry" id="post-<?php the_ID(); ?>">
                <h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo __('View').' &quot;'.the_title('', '', false).'&quot;'; ?>"><?php the_title(); ?></a></h1>
                <div class="post-datetime"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php the_time('l, j F Y, G:i'); ?></abbr></div>
                <div class="post-author author vcard">
                    <?php printf(__('By %s'),'') ?> 
                    <?php 
                        if (get_the_author_url() != '') { ?>
                            <a class="fn" href="<?php echo get_author_link(false, $authordata->ID, $authordata->user_nicename) ?>" title="<?php echo __('View posts').' '. __('by').' '. $authordata->display_name ?>"><?php echo get_the_author()?></a> <span class="post-author-web">(<a class="fn url" href="<?php the_author_url(); ?>" title="<?php echo __('Visit author homepage') ?>"><?php echo __('Visit author homepage') ?></a>)</span>
                        <?php }else{ ?>
							<a class="fn" href="<?php echo get_author_link(false, $authordata->ID, $authordata->user_nicename) ?>" title="<?php echo __('View posts').' '. __('by').' '. $authordata->display_name ?>"><?php echo get_the_author()?></a>
                    <?php } ?>
				</div>
                <div class="post-category"><?php _e('Category:') ?> <?php the_category(', '); ?></div>
				<div class="post-tags"><?php the_tags(_e('Tags:').' ', ', ', ' '); ?></div>
                <?php edit_post_link(__('Edit'),'[',']'); ?>
                <div class="post-entry entry-content"><?php the_content('<span class="post-entry-more">'.__('(more...)').'</span>') ?></div>
                <div class="post-comments"><?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'), '', __('Sorry, comments are closed for this item.')); ?></div>
                <!--
				<?php trackback_rdf(); ?>
				-->
            </div>

		<?php endwhile; ?>
        
        <div class="previous-post-link"><?php next_posts_link(__('&laquo; Previous Entries')) ?></div>
        <div class="next-post-link"><?php previous_posts_link(__('Next Entries &raquo;')) ?></div>
        
	<?php else : ?>

		<h4><?php _e('Oops, no such file exists! Double check the name and try again, merci.'); ?></h4>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>