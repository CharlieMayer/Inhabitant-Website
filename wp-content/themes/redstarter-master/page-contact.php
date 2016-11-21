<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

<div class="bannerimage" style="background: url(' <?php echo $homeinfo ?>'); background-size: cover">

            <?php while ( have_posts() ) : the_post(); ?>
              <div class="contact-content">
                <?php get_template_part( 'template-parts/content', 'contact' ); ?>
              </div>
                <?php //the_post_navigation(); ?>

                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>

            <?php endwhile; // End of the loop. ?>
<?php get_sidebar(); ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
