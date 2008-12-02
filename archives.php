<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content">

	<h4><?php  echo __('Archives').' '.__('by').' '.__('Date:'); ?></h4>
  <ul>
    <?php wp_get_archives('type=monthly'); ?>
  </ul>

	<h4><?php echo __('Archives').' '.__('by').' '.__('Category:'); ?></h4>
  <ul>
     <?php wp_list_cats(); ?>
  </ul>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
