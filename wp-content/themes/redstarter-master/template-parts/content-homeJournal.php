<?php
/**
 * Template part for displaying journal posts on the home page.
 *
 * @package RED_Starter_Theme
 */

?>
<div class="boxy2">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <?php if ( has_post_thumbnail() ) : ?>

            <?php the_post_thumbnail( 'large' ); ?>
        <?php endif; ?>

        <div class="entry-meta">
            <?php red_starter_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?>
        </div><!-- .entry-meta -->

        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>


    </header><!-- .entry-header -->

    <div class="entry-content">

        <a href="<?php the_permalink(); ?>" class="readMore">Read Entry</a>
    </div><!-- .entry-content -->
</div>
</article><!-- #post-## -->
