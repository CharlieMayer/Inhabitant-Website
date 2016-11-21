<?php
/**
 * The template for displaying the footer.
 *
 * @package RED_Starter_Theme
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
					<?php dynamic_sidebar('footer-sidebar') ?>
				</div><!-- .site-info -->
				<div class="footer-logo">
					<img src="<?php bloginfo('template_directory'); ?>/images/logos/inhabitent-logo-text.svg" alt="logo" title="logo">
				</div>
				<div class="copyright">
					<p>COPYRIGHT &copy; 2016 INHABITENT</p>
				</div>
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
