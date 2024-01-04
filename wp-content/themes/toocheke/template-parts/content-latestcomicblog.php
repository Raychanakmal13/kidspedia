<?php
/**
 * Template part for displaying single comic collection
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Toocheke
 */
$comic_order = get_option('toocheke-comics-order') ? get_option('toocheke-comics-order') : 'DESC';
$series_id = null;
$is_bilingual = get_option('toocheke-bilingual-display') && 1 == get_option('toocheke-bilingual-display');
if ('series' === get_post_type()) {
    $series_id = get_the_ID();
}

?>

<!-- START LATEST COMIC BLOG POST-->
<div class="blog-wrapper">
                  <?php
$single_comics_args = array(
    'post_parent' => $series_id,
    'post_type' => 'comic',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'orderby' => 'post_date',
    'order' => $comic_order,
);
$single_comic_query = new WP_Query($single_comics_args);
/* Start the Loop */
while ($single_comic_query->have_posts()): $single_comic_query->the_post();

    ?>
					    	<header class="entry-header">
							<?php
    if (is_singular('comic')):
        echo '<span class="default-lang">';
        the_title('<h1 class="entry-title">', '</h1>');
        echo '</span>';
        echo '<span class="alt-lang"><h1>';
        echo esc_html(get_post_meta($post->ID, 'comic-title-2nd-language-display', true));
        echo '</h1></span>';
    else:
        echo '<span class="default-lang">';
        the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        echo '</span>';
        echo '<span class="alt-lang"><h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">';
        echo esc_html(get_post_meta($post->ID, 'comic-title-2nd-language-display', true));
        echo '</a></h2></span>';

    endif;

    ?>
								<div class="entry-meta">
									<?php
    toocheke_posted_on();
    toocheke_posted_by();
    ?>
								</div><!-- .entry-meta -->

						</header><!-- .entry-header -->
					              <article class="post type-post ">

					                       <?php
    echo '<span class="default-lang">';
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo get_post_meta($post->ID, 'comic_blog_post_editor', true);
    echo '</span>';
    echo '<span class="alt-lang">';
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo get_post_meta($post->ID, 'comic_2nd_language_blog_post_editor', true);
    echo '</span>';
    ?>
					                     </article>

						                <?php

endwhile;

wp_reset_postdata();
?>
</div>

                   <!-- END LATEST COMIC BLOG POST-->



