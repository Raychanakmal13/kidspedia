<?php
/**
 * The template for displaying the footer for comics
 *
 * Contains the closing of the main and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Toocheke
 */
$series_id = null;
$series_id = isset($_GET['sid']) ? (int) $_GET['sid'] : null;
$series_name = null != $series_id ? get_the_title($series_id) : null;
$display_random_button = get_option('toocheke-random-navigation') && 1 == get_option('toocheke-random-navigation');
$display_bookmark_button = get_option('toocheke-comic-bookmark') && 1 == get_option('toocheke-comic-bookmark');
$display_likes = get_option('toocheke-comic-likes') && 1 == get_option('toocheke-comic-likes');
$display_no_views = get_option('toocheke-comic-no-of-views') && 1 == get_option('toocheke-comic-no-of-views');
$display_no_of_comments = get_option('toocheke-comic-no-of-comments') && 1 == get_option('toocheke-comic-no-of-comments');

?>
</main>
      <!--START FOOTER-->
      <div id="comic-nav-bottom">
      <div class="row">
               <div id="scroll-container" class="col-5 comic-navigation">
               <a href="#" title="Scroll Top" class="ScrollTop">
               <i class="fas fa-lg fa-angle-double-up"></i>
               </a>
               <?php
if ($display_bookmark_button) {
    ?>
<a id="comic-bookmark" class="webtoon-comic-bookmark" href="javascript:;">
<i class="far fa-lg fa-bookmark"></i>
</a>
<?php
}
?>
               <?php
if ($display_likes) {
    ?>
            <span class="comic-total-likes">
               <?php echo do_shortcode("[toocheke-like-button]"); ?>
</span>
<?php
}
?>
     <?php
if ($display_no_views) {
    ?>
<span class="comic-total-views">
               <i class="far fa-lg fa-eye" aria-hidden="true"></i><?php echo wp_kses_data(toocheke_get_post_views(get_the_ID()));?>
</span>
<?php
}
?>
     <?php
if ($display_no_of_comments) {
    ?>
<span class="comic-total-comments">
               <i class="far fa-lg fa-comment-dots" aria-hidden="true"></i><?php comments_number('0', '1', '%');?>
</span>
<?php
}
?>

               </div>
               <div class="col-7">

                  <span class="comic-navigation">
                     <?php
$allowed_tags = array(
    'a' => array(
        'class' => array(),
        'title' => array(),
        'href' => array(),
    ),
    'i' => array(
        'class' => array(),
    ),
    'img' => array(
        'class' => array(),
        'src' => array(),
    ),
);
$random_url = home_url() . '/?random&amp;nocache=1&amp;post_type=comic';
?>

                  <a style="<?php echo esc_attr($collection_id == 0 && null == $series_id && $display_random_button ? "" : "display:none") ?>" href="<?php echo esc_url($random_url); ?>" title="Random Comic"><i class="fas fa-lg fa-random"></i></a>
                  <?php echo wp_kses(toocheke_get_comic_link('ASC', 'backward', $collection_id, true, null, $series_id), $allowed_tags); ?>
                  <?php echo wp_kses(toocheke_adjacent_comic_link(get_the_ID(), $collection_id, 'previous', true, $series_id), $allowed_tags); ?>
                  <?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                  <?php echo $collection_id == 0 ? (null == $series_id ? wp_kses_data(toocheke_get_comic_number()) : wp_kses(toocheke_get_series_link($series_id), $allowed_tags)) : esc_html(""); ?>
                  <?php echo wp_kses(toocheke_adjacent_comic_link(get_the_ID(), $collection_id, 'next', true, $series_id), $allowed_tags); ?>
                  <?php echo wp_kses(toocheke_get_comic_link('DESC', 'forward', $collection_id, true, null, $series_id), $allowed_tags); ?>
				  </span>
               </div>
            </div>

      </div>


      <!--END FOOTER-->


<?php wp_footer();?>

</body>
</html>