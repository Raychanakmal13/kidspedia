<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Toocheke
 */

?>
</div> <!--./End Row-->
</div><!--./End #content-->
         <!-- END MAIN CONTENT -->
      </main>

	<footer class="footer">
		<div class="footer-info site-info">
			
		<?php if( get_theme_mod( 'footer_setting') != "" ): ?>
		<?php echo esc_html(get_theme_mod( 'footer_setting')); ?>
<?php else: ?>

				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'toocheke' ), 'Toocheke', '<a href="'. esc_url( __( 'https://leetoo.net/', 'toocheke' ) ) . '">LeeToo</a>' );
				?>
				<?php endif ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
	<div id="home-scroll-container">
               <a href="#" title="Scroll Top" class="ScrollTop">
               <i class="fas fa-lg fa-angle-double-up"></i>
               </a>
  </div>
  </div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
