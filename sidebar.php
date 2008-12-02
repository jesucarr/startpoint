	<div id="sidebar">
		<ul>
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

			<li>
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</li>

            <li>
                <h2><?php _e('Pages:'); ?></h2>
                <ul>
                <?php if ( !is_home() || is_paged() ) { // DISPLAYS EVERYWHERE EXCEPT ON HOME PAGES ?>
                    <li><a href="<?php bloginfo('home') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?>"><?php _e('Home') ?></a></li>
                <?php } ?>
                <?php  wp_list_pages('title_li='  ); ?>
                </ul>
            </li>
			

			<li><h2><?php _e('Categories:'); ?></h2>
				<ul>
				<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
				</ul>
			</li>
            
            <li><h2><?php _e('Archives:'); ?></h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>
            
			<?php wp_list_bookmarks('category_before=<li>&category_after=</li>&title_before=<h2>&title_after=</h2>&category_orderby=name&category_order=ASC&orderby=name&order=ASC'); ?>
                
            
            <li><h2><?php _e('Meta:'); ?></h2>
            <ul>
                <li><?php _e('Syndication Feeds'); ?>: <a href="<?php echo get_bloginfo('rss2_url') ?>" title="<?php _e('Posts'); ?> (RSS 2.0)"><?php _e('Posts'); ?></a>, <a href="<?php echo get_bloginfo('comments_rss2_url') ?>" title="<?php _e('Comments'); ?> (RSS 2.0)"><?php _e('Comments'); ?></a></li>
                <li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional'); ?>"><?php _e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>'); ?></a></li>
                <li><a href="http://gmpg.org/xfn/"><?php _e('<abbr title="XHTML Friends Network">XFN</abbr>'); ?></a></li>
                <li><?php printf(__("Powered by <a href='http://wordpress.org/' title='%s'><strong>WordPress</strong></a>"),__('Powered by WordPress, state-of-the-art semantic personal publishing platform.')) ?></li>
                <li><?php echo __('Current Theme').': StartPoint '.__('by').' <a href="http://www.jesuscarrera.info">Jes&uacute;s Carrera</a>'  ; ?></li>
                <?php wp_meta(); ?>
            </ul>
            </li>
			

		
         <?php endif; ?>
		</ul>
	</div>