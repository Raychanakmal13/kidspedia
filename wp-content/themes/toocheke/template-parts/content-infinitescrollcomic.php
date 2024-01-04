<?php
/**
 * Template part for displaying infinite scroll comic item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Toocheke
 */

?>

<?php

$comic_layout = get_option('toocheke-comic-layout-devices');
$wrapper_id = $comic_layout === '1' ? 'two-comic-options' : 'one-comic-option';
$display_likes = get_option('toocheke-comic-likes') && 1 == get_option('toocheke-comic-likes');
$display_no_views = get_option('toocheke-comic-no-of-views') && 1 == get_option('toocheke-comic-no-of-views');
$display_no_of_comments = get_option('toocheke-comic-no-of-comments') && 1 == get_option('toocheke-comic-no-of-comments');

$allowed_tags = array(
    'img' => array(
        'src' => array(),
        'alt' => array(),
        'width' => array(),
        'height' => array(),
        'class' => array(),
    ),
);
//widget above comic

echo '<div id="' . esc_attr($wrapper_id) . '">';
echo '<div id="spliced-comic">';
echo '<span class="default-lang">';

the_content();

echo '</span>';
echo '<span class="alt-lang">';

echo wp_kses(get_post_meta($post->ID, 'mobile_comic_2nd_language_editor', true), $allowed_tags);

echo '</span>';
echo '</div>';
echo '<div id="unspliced-comic">';
echo '<span class="default-lang">';

echo wp_kses(get_post_meta($post->ID, 'desktop_comic_editor', true), $allowed_tags);

echo '</span>';
echo '<span class="alt-lang">';

echo wp_kses(get_post_meta($post->ID, 'desktop_comic_2nd_language_editor', true), $allowed_tags);

echo '</span>';
echo '</div>';
echo '</div>';
// social and analytics
?>
    <div class="comic-title"><?php echo esc_html(get_the_title()); ?></div>
 <div id="comic-social">
			                    <?php
//check if plugin/post type has been activated
if (post_type_exists('comic')):
    do_action('toocheke_get_sharing_buttons');
endif;
?>


			                </div>
		                    <div id="comic-analytics">
                            <?php
if ($display_no_of_comments) {
    ?>
<span class="single-comic-total-comments">
               <a href="<?php echo esc_url(get_permalink() . '#comments'); ?>" title="View comments"><i class="far fa-lg fa-comment-dots" aria-hidden="true"></i><?php comments_number('0', '1', '%');?></a>
</span>
<?php
}
?>    
     <?php
if ($display_no_views) {
    ?>
<span class="single-comic-total-views">
               <i class="far fa-lg fa-eye" aria-hidden="true"></i><?php echo wp_kses_data(toocheke_get_post_views(get_the_ID()));?>
</span>
<?php
}
?>
		                  <?php
if ($display_likes):
?>
		            <span class="single-comic-total-likes">
		               <?php echo do_shortcode("[toocheke-like-button]"); ?>
		</span>
		<?php
endif;
?>
          

	                  </div>
<footer class="entry-footer">

        <?php
//comic tags
$comic_tags = get_the_terms(get_the_ID(), 'comic_tags');
$tags_array = array();
if (is_array($comic_tags)) {
    foreach ($comic_tags as $comic_tag) {
        $url = add_query_arg('sid', $series_id, get_term_link($comic_tag->slug, 'comic_tags'));
        $tags_array[] = "<a href='{$url}'>{$comic_tag->name}</a>";

    }
}

if (!empty($tags_array)) {
    $tags_list = implode(', ', $tags_array);
    print_r('<b>Tags</b>: ' . $tags_list);
    echo '<br/>';
}
//comic characters
$comic_characters = get_the_terms(get_the_ID(), 'comic_characters');
$characters_array = array();
if (is_array($comic_characters)) {
    foreach ($comic_characters as $comic_character) {
        $url = add_query_arg('sid', $series_id, get_term_link($comic_character->slug, 'comic_characters'));
        $characters_array[] = "<a href='{$url}'>{$comic_character->name}</a>";

    }
}
if (!empty($characters_array)) {
    $characters_list = implode(', ', $characters_array);
    print_r('<b>Characters</b>: ' . $characters_list);
    echo '<br/>';
}

//comic locations
$comic_locations = get_the_terms(get_the_ID(), 'comic_locations');
$locations_array = array();
if (is_array($comic_locations)) {
    foreach ($comic_locations as $comic_location) {
        $url = add_query_arg('sid', $series_id, get_term_link($comic_location->slug, 'comic_locations'));
        $locations_array[] = "<a href='{$url}'>{$comic_location->name}</a>";

    }
}

if (!empty($locations_array)) {
    $locations_list = implode(', ', $locations_array);
    print_r('<b>Locations</b>: ' . $locations_list);
    echo '<br/>';
}

?>
</footer>
<hr />
