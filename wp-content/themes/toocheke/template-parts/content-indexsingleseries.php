<?php
/**
 * Template part for displaying single series home page as well as the series page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Toocheke
 */
$home_layout = get_theme_mod('home_layout_setting', 'default');
set_query_var('home_layout', $home_layout);
$blog_paged = isset($_GET['blog_paged']) ? (int) $_GET['blog_paged'] : 1;
$comics_paged = isset($_GET['comics_paged']) ? (int) $_GET['comics_paged'] : 1;
$show_blog_posts = get_option('toocheke-series-landing-blog') && 1 == get_option('toocheke-series-landing-blog');
set_query_var('comics_paged', $comics_paged);
set_query_var('blog_paged', $blog_paged);
$home_layout = get_theme_mod('home_layout_setting', 'default');
$series_id = null;
if ('series' === get_post_type()) {
    $series_id = get_the_ID();
}
//get number of posts in collections
$collections_args = array(
    'post_parent' => $series_id,
    'post_type' => 'comic', //post type, I used 'product'
    'post_status' => 'publish', // just tried to find all published post
    'nopaging' => true,
    'tax_query' => array(
        array(
            'taxonomy' => 'collections',
            'field' => 'id',
            'terms' => 'collections',
        ),
    ),
);
$collections_query = new WP_Query($collections_args);
$collections_post_count = (int) $collections_query->post_count;

?>
				 <?php
if ($collections_post_count > 0):
?>
<!--DISPLAY MULTIPLE COMIC COLLECTION-->
<?php
get_template_part('template-parts/content', 'multiplecollections');
if ($show_blog_posts ) {
    get_template_part('template-parts/content', 'indexblogs');
}
?>
<!--./DISPLAY MULTIPLE COMIC COLLECTION-->
<?php
else:
?>
<!--DISPLAY SINGLE COMIC COLLECTION-->
<?php
get_template_part('template-parts/content', 'singlecollection');
?>
<!--./DISPLAY SINGLE COMIC COLLECTION-->
<?php
endif;
?>
<?php

if ($home_layout == 'alt-1' || $home_layout == 'alt-4') {
    get_template_part('template-parts/content', 'latestcomicblog');
}

?>
                 <?php
                 
if (!is_singular('series') || $show_blog_posts ) {
    get_template_part('template-parts/content', 'indexblogs');
}
?>
                        <!--END CONTENT-->
                          <!--HOME BOTTOM WIDGET START-->
                <?php dynamic_sidebar('home-left-bottom');?>
                <!--HOME BOTTOM WIDGET END-->
                     </div><!--./ left-content-->
                  </div><!--./ left-col-->
               </div><!--./ col-lg-8-->
               <!--END LEFT COL-->