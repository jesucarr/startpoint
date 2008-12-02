<?php get_header(); ?>

	<div id="content">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h1><?php the_title(); ?></h1>
        <?php edit_post_link(__('Edit'),'[',']'); ?>
			<div class="post-entry"><?php the_content(__('(more...)')) ?></div>

				<?php link_pages('<p>' . __('Pages:'), '</p>', 'number'); ?>

			
		</div>
        <?php comments_template(); ?>
        
	    <?php endwhile; endif; ?>
	
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>