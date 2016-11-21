<?php
/**
 * Template part for displaying adventure posts on the home page.
 *
 * @package RED_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'large' ); ?>
        <?php endif; ?>

        <div class="read-article">
            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            <a href="<?php the_permalink(); ?>" class="readMore">Read more</a>
            <div>



</article><!-- #post-## -->
