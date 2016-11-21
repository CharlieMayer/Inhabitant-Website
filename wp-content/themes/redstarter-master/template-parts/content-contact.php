<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @package RED_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

	</header>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11548.836159980416!2d-79.39779!3d43.643819!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x648b029428613f49!2sRED+Academy+Toronto!5e0!3m2!1sen!2sca!4v1478897838664" width="600" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
	<div class="entry-content">

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
