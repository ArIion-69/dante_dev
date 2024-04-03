 <?php
    /*

Template Name: Home

*/

    get_header();
    ?>
 <div class="d_main-page">
     <?php get_template_part('template-parts/content', 'slider'); ?>
     <?php get_template_part('template-parts/content', 'stats'); ?>
     <?php get_template_part('template-parts/content', 'services'); ?>
     <?php get_template_part('template-parts/content', 'doctors'); ?>
     <?php get_template_part('template-parts/content', 'actions'); ?>
     <?php get_template_part('template-parts/content', 'reviews'); ?>
     <?php get_template_part('template-parts/content', 'articles'); ?>
 </div>

 <?php get_footer(); ?>