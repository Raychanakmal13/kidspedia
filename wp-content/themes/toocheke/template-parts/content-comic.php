<?php
/**
 * Template part for displaying list of comics
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Toocheke
 */

?>

<?php
$series_id = null;
$series_id = isset($_GET['sid']) ? (int) $_GET['sid'] : null;

$comic_layout = get_option('toocheke-comic-layout-devices');
$wrapper_id = $comic_layout === '1' ? 'two-comic-options' : 'one-comic-option';
$click_to_next_comic = get_option('toocheke-click-comic-next') && 1 == get_option('toocheke-click-comic-next');
$next_link= toocheke_get_next_comic_link($post->ID, 0, $series_id);
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
dynamic_sidebar('above-comic');
echo '<div id="' . esc_attr($wrapper_id) . '">';
echo '<div id="spliced-comic">';
echo '<span class="default-lang">';
echo (strlen($next_link[0]) > 0 && $click_to_next_comic) ? '<a href="'. esc_attr($next_link[0]) . '" title="'. esc_attr($next_link[1]) . '">' : '';
the_content();
echo (strlen($next_link[0]) > 0 && $click_to_next_comic) ? '</a>' : '';
echo '</span>';
echo '<span class="alt-lang">';
echo (strlen($next_link[0]) > 0 && $click_to_next_comic) ? '<a href="'. esc_attr($next_link[0]) . '" title="'. esc_attr($next_link[1]) . '">' : '';
echo wp_kses(get_post_meta($post->ID, 'mobile_comic_2nd_language_editor', true), $allowed_tags);
echo (strlen($next_link[0]) > 0 && $click_to_next_comic) ? '</a>' : '';
echo '</span>';
echo '</div>';
echo '<div id="unspliced-comic">';
echo '<span class="default-lang">';
echo (strlen($next_link[0]) > 0 && $click_to_next_comic) ? '<a href="'. esc_attr($next_link[0]) . '" title="'. esc_attr($next_link[1]) . '">' : '';
echo wp_kses(get_post_meta($post->ID, 'desktop_comic_editor', true), $allowed_tags);
echo (strlen($next_link[0]) > 0 && $click_to_next_comic) ? '</a>' : '';
echo '</span>';
echo '<span class="alt-lang">';
echo (strlen($next_link[0]) > 0 && $click_to_next_comic) ? '<a href="'. esc_attr($next_link[0]) . '" title="'. esc_attr($next_link[1]) . '">' : '';
echo wp_kses(get_post_meta($post->ID, 'desktop_comic_2nd_language_editor', true), $allowed_tags);
echo (strlen($next_link[0]) > 0 && $click_to_next_comic) ? '</a>' : '';
echo '</span>';
echo '</div>';
echo '</div>';
//widget below comic
dynamic_sidebar('below-comic');
?>

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
