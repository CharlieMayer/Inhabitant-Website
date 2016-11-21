<?php
/**
 * The template for displaying product archive page.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">

                <h1 style="text-align:center">SHOP STUFF</h1>

                <?php /* Secondary menu */ ?>
                <div class="product-menu">
                    <?php
                    $categories = get_terms('productcategory');
                    foreach ($categories as $cat){
                        //print_r($cat);
                        $name = $cat -> name;
                        $link = get_term_link($cat -> term_id);
                        echo "<a href='$link'>$name</a>";

                    }
                        //print_r (get_terms('productcategory')) ;

                    ?>
                </div>

            </header><!-- .page-header -->

            <?php /* Start the Loop */ ?>
            <div class="shop-items">
                <?php query_posts(array("post_type"=>"product", "posts_per_page"=>16)) ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                    get_template_part( 'template-parts/content', 'shop' );
                    ?>

                <?php endwhile; ?>
            </div>

            <?php the_posts_navigation(); ?>

        <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
