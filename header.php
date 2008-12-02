<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta name="language" content="en" />
    
    <title><?php bloginfo('name') ?><?php if ( is_404() ) : ?> &raquo; <?php _e('File not found') ?><?php elseif ( is_home() ) : ?> &raquo; <?php bloginfo('description') ?><?php else : ?><?php wp_title() ?><?php endif ?></title>
    <link rel="icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed (RSS 2.0)" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name') ?> <?php _e('Comments'); ?> Feed (RSS 2.0)" href="<?php bloginfo('comments_rss2_url') ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <?php wp_head(); ?>
</head>
<body>
<div id="layout">

<div id="header">
    <a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a>
    <div><?php bloginfo('description'); ?></div>
</div>
<div id="menu-top">
    <ul>
      <?php wp_list_pages('depth=1&title_li=' ); ?>
    </ul>
</div>
