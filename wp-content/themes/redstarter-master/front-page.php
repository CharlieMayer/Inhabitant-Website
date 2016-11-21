<?php
/**
 * The template for displaying the home page.
 *
 * @package RED_Starter_Theme
 */

?>
<div class="homePage">

<?php get_header(); ?>


<h1 style="text-align:center"> Shop Stuff</h1>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

</div>

<div class="box-area">
<div class="section-boxes">


<img src="<?php bloginfo('template_url'); ?>/images/product-type-icons/do.svg">
<p>Get back to nature with all the tools and toys you need to enjoy the great outdoors. </p>
<form action="<?php echo home_url() ?>/product-category/do/" method="get">

    <input type="submit" value="Do Stuff" />
</form>

</div>
<div class="section-boxes">
    <img src="<?php bloginfo('template_url'); ?>/images/product-type-icons/eat.svg">
    <p>Nothing beats food cooked over a fire.  We have all you need for a good camping eats. </p>
    <form action="<?php echo home_url() ?>/product-category/eat/" method="get">
        <input type="submit" value="Eat Stuff" />
    </form>


</div>
<div class="section-boxes">
    <img src="<?php bloginfo('template_url'); ?>/images/product-type-icons/sleep.svg">
    <p>Get a good night's rest in the wild in a home away from home that travels well.</p>
    <form action="<?php echo home_url() ?>/product-category/sleep/" method="get">
        <input type="submit" value="Sleep Stuff" />
    </form>


</div>
<div class="section-boxes">
    <img src="<?php bloginfo('template_url'); ?>/images/product-type-icons/wear.svg">
    <p>From flannel shirts to toques, look the part while roughing it in the great outdoors. </p>
    <form action="<?php echo home_url() ?>/product-category/wear/" method="get">
        <input type="submit" value="Wear Stuff" />
    </form>


</div>
</div>
 <h1 style="text-align:center"> inhabitent journal</h1>
<div>

        <?php if ( have_posts() ) : ?>


            <?php /* Start the Loop */ ?>
            <?php query_posts(array("post_type"=>"journal", "posts_per_page"=>3)) ?>
            <div class="journal-section">
            <?php while ( have_posts() ) : the_post(); ?>

                <?php
                get_template_part( 'template-parts/content', 'homeJournal' );
                ?>

            <?php endwhile; wp_reset_query(); ?>
            </div>

<h1 style="text-align:center"> Latest adventures</h1>
            <?php query_posts(array("post_type"=>"adventure", "posts_per_page"=>4)) ?>
            <div class="adventure-section">
                <?php $postCount = 1 ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php echo (($postCount ==2)? '<div class="small-images"><div class="img2">': '') ?>
                    <?php echo (($postCount ==3)? '<div class="smaller-images">': '') ?>


                    <?php
                    get_template_part( 'template-parts/content', 'homeAdventure' );
                    ?>
                    <?php echo (($postCount ==2)? '</div>': '') ?>
                    <?php $postCount ++ ?>
                <?php endwhile; wp_reset_query(); ?>
            </div>
            </div>
            </div>
            <form action="<?php echo home_url() ?>/adventure" method="get">
                <input type="submit" value="Home Adventures" />
            </form>
            <?php the_posts_navigation(); ?>

        <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>
</div>
