<?php
/**
 * Template part for displaying comic
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Toocheke
 */

?>
<?php
$series_id = null;
$series_id = isset($_GET['sid']) ? (int) $_GET['sid'] : null;
$current_post_id = get_the_ID();
$carousel_order = get_option('toocheke-comics-slider-order') ? get_option('toocheke-comics-slider-order') : 'DESC';
$args = array(
    'post_parent' => $series_id,
    'post_type' => 'comic',
    'post_status' => 'publish',
    'nopaging' => true,
    //'posts_per_page' => 90,
    'orderby' => 'post_date',
    'order' => $carousel_order,
);
if ($collection_id > 0) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'collections',
            'field' => 'term_id',
            'terms' => $collection_id,
        ),
    );
}

$comics_loop = new WP_Query($args);
?>
<!-- Carousel Comics -->

<div col="row">
<div id="comics-carousel" class="owl-carousel">
  <?php $counter = 0;?>
  <?php while ($comics_loop->have_posts()): $comics_loop->the_post();?>

	<div title="<?php esc_attr(the_title());?>" id="comic-<?php esc_attr(the_ID());?>" data-index="<?php echo wp_kses_data($counter) ?>" <?php echo (get_the_ID() == $current_post_id) ? 'class=current-comic' : ''; ?>>

    <?php
    $comic_url = get_permalink($post);
    if ($collection_id > 0) {
        $comic_url = add_query_arg('col', $collection_id, $comic_url);
    }
    if ($series_id > 0) {
        $comic_url = add_query_arg('sid', $series_id, $comic_url);
    }
    ?>

	    <a href="<?php echo esc_url($comic_url); ?>">

											<?php
    if (has_post_thumbnail()) {
        the_post_thumbnail('thumbnail');
    } else {
        ?>
       <img src="<?php echo esc_attr(get_stylesheet_directory_uri()) . '/dist/img/default-thumbnail-image.png'; ?>" />
       <?php
    }
    ?>
	<span class="mask"></span>

	                              </a>

	                           </div>
	                           <?php $counter++;?>
	  <?php endwhile;?>
  <?php wp_reset_postdata();?>
</div>
</div>