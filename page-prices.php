<?php

/*

Template Name: Prices
Template Post Type: page

*/

?>


<?php get_header(); ?>

<?php get_template_part('template-parts/content', 'breadcrumbs'); ?>

<div class="d_prices-page">
    <div class="d_with-sidebar_container">
        <div class="d_with-sidebar_content">
            <?php the_content(); ?>
        </div>

        <div class="d_with-sidebar_sidebar">
            <?php dynamic_sidebar('price_side'); ?>
        </div>

    </div>
</div>
<?php get_footer(); ?>