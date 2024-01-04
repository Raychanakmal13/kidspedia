<?php
/**
 * Template part for displaying jumbotron
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Toocheke
 */
$fix_nav = get_query_var('fix_nav');
$series_id = 0;
$series_id = isset($_GET['sid']) ? (int) $_GET['sid'] : 0;
$series_hero_url = null;
if ('series' === get_post_type() && !is_archive()) {
    $series_id = get_the_ID();
}

?>
<!-- START JUMBOTRON -->
<?php
if(has_header_image()){
	$headerUrl = get_header_image();
}
if(!isset($headerUrl)){
	if(get_theme_support('custom-header', 'default-image')){
		$headerUrl = get_theme_support('custom-header', 'default-image');
	}

}


if ($series_id > 0 && get_post_meta($series_id, 'series_hero_image_id', true)) {
    $series_hero_id = get_post_meta($series_id, 'series_hero_image_id', true);
    $headerUrl = wp_get_attachment_image_url($series_hero_id, 'full', false);
}

?>


         <div id="page-header" class="jumbotron jumbotron-fluid <?php echo $fix_nav ? "" : "jumbotron-top" ?>" <?php echo (isset($headerUrl) && !empty($headerUrl)) ? "style='background-image: url(" . esc_url($headerUrl) . ")'": "style='min-height: 320px'"; ?>>
		 <?php echo (isset($headerUrl)) ? "<img class='jumbotron-img' src='" . esc_url($headerUrl) . "' />": ""; ?>
		 <?php
if (display_header_text() == true):
?>

               <div id="comic-info" class="col-md-12">
			   <?php
if (is_front_page() && is_home()):
?>
				<h1 class="site-title" ><?php esc_html(bloginfo('name'));?></h1>
				<?php
else:
?>
				<p class="site-title"><?php esc_html(bloginfo('name'));?></p>
				<?php
endif;
$toocheke_description = get_bloginfo('description', 'display');
if ($toocheke_description || is_customize_preview()):
?>
				<p class="site-description">
				<?php echo wp_kses_data($toocheke_description); ?>
				</p>
			<?php endif;?>

               </div>

			<?php endif;?>
         </div>
         <!-- END JUMBOTRON -->