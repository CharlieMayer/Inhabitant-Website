<?php
/**
 * Template part for displaying product posts.
 *
 * @package RED_Starter_Theme
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<a href="<?php echo home_url() ?>/product/<?php the_title(); ?>">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'large' ); ?>
        <?php endif; ?>
<p> <?php echo get_field('price'); ?></p>


</article><!-- #post-## -->
