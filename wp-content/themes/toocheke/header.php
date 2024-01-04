<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Toocheke
 */
$home_layout = get_theme_mod('home_layout_setting', 'default');
?>
<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head();?>
</head>

<body <?php body_class();?>>
<?php wp_body_open();?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'toocheke');?></a>


<?php

if ('alt-4' === $home_layout || 'alt-5' === $home_layout) {
	// set nav variable
	set_query_var('fix_nav', 0);
    get_template_part('template-parts/content', 'jumbotron');   
    get_template_part('template-parts/content', 'nav');

} else {
    set_query_var('fix_nav', 1);
    get_template_part('template-parts/content', 'nav');
    get_template_part('template-parts/content', 'jumbotron');
}
?>

	<main role="main" class="site-main" id="main">

         <!-- START MAIN CONTENT -->
         <div id="content" class="site-content">

