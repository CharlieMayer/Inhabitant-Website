<?php
/**
 * Template part for displaying single product posts.
 *
 * @package RED_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header-product">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'large' ); ?>
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-content-product">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <p>Price: <?php echo get_field('price'); ?></p>
        <?php the_content(); ?>

        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php red_starter_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
