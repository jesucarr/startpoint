<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div id="content">

<h4><?php _e('Links'); ?></h4>
<ul>
<?php
            $link_cats = $wpdb->get_results("SELECT cat_id, cat_name FROM $wpdb->linkcategories");
            foreach ($link_cats as $link_cat) {
                $have_links = $wpdb->query("SELECT link_id FROM $wpdb->links where link_category = $link_cat->cat_id and link_visible = 'Y'");
                if ($have_links){
                ?>
                <li>
                  <h1><?php echo $link_cat->cat_name; ?></h1>
                   <ul>
                    <?php wp_get_links($link_cat->cat_id); ?>
                   </ul>
                </li>
                <?php } 
                }
                ?>
</ul>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
