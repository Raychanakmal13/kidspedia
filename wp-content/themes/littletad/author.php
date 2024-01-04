<?php get_header(); ?>

	<div id='container'>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( smt_translate( 'authorarchive' ), get_the_author(  ) ); ?></h1>
			</header><!-- .page-header -->

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>

				<?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() ); 

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			get_template_part('navigation');

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</div>

<?php get_sidebar(); ?>
	
<?php get_footer(); ?>