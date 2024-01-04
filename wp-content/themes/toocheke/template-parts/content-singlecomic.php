<?php
/**
 * Template part for displaying list of comics
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Toocheke
 */
$is_bilingual =  get_option('toocheke-bilingual-display') && 1 == get_option('toocheke-bilingual-display');
$display_comic_nav_above_comic = get_option('toocheke-comic-nav-above-comic') && 1 == get_option('toocheke-comic-nav-above-comic');
$latest_collection_id = null !== get_query_var('latest_collection_id') ? (int)get_query_var('latest_collection_id') : 0;
$series_id = get_query_var('series_id');
$click_to_next_comic = get_option('toocheke-click-comic-next') && 1 == get_option('toocheke-click-comic-next');
$next_link= toocheke_get_next_comic_link($post->ID, 0, $series_id);
?>
 <div id="language-switch-container" style="<?php echo esc_attr(($is_bilingual ? "" : "display: none")) ?>">
               <a id="switch-language" href="javascript:;" title="Switch Languages" class="SwitchLang">
               <i class="fas fa-3x fa-language"></i>
               </a>
  </div>
<div id="comic" class="single-comic-wrapper">

<?php
if($display_comic_nav_above_comic ){
    set_query_var('latest_collection_id', $latest_collection_id);
    if (!$series_id) {
        set_query_var('series_id', null);
    } else {
        set_query_var('series_id', $series_id);
    }
    set_query_var('below_comic', 0);
    get_template_part('template-parts/content', 'traditionalcomicnavigation');
}
$comic_layout = get_option('toocheke-comic-layout-devices');
$wrapper_id = $comic_layout === '1' ? 'two-comic-options' : 'one-comic-option';
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
echo (strlen($next_link[0]) > 0 && $click_to_next_comic) ? '<a href="'. esc_attr($next_link[0]). '" title="'. esc_attr($next_link[1]) . '">' : '';
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
set_query_var('latest_collection_id', $latest_collection_id);
if (!$series_id) {
    set_query_var('series_id', null);
} else {
    set_query_var('series_id', $series_id);
}
set_query_var('below_comic', 1);
get_template_part('template-parts/content', 'traditionalcomicnavigation');
?>
</div>