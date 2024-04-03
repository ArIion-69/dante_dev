<?php

/*

Template Name: about
Template Post Type: page

*/

?>

<?php get_header(); ?>
<?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
<div id="about-page">
    <div>
        <div class="d_single-info-block about-pading">
            <div class="d_single-info-block-data about-center">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>
            <div class="d_single-info-block-img">
                <img src="<?php the_post_thumbnail_url(); ?>">
            </div>
        </div>

        <div class="about-text">
            <?php the_content(); ?>
        </div>

    </div>
    <?php the_field('about_list'); ?>

    <? get_template_part('template-parts/content', 'doctors'); ?>

    <? get_template_part('template-parts/content', 'reviews'); ?>

    <? get_template_part('template-parts/content', 'articles'); ?>

    <div class="d_h1 d_main-page-heading"><?php pll_e('Наши фотографии'); ?></div>
    <div>
        <?php
        $images = get_field('galery');
        $size = 'medium';
        if ($images) : ?>
            <div id="gallery">
                <?php foreach ($images as $image) : ?>
                    <a href="<?php echo $image['url']; ?>">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
            <?php the_field('about_footer_text'); ?>


    </div>

    <?php get_footer(); ?>