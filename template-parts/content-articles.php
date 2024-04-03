<div class="article-head-with-link">
    <h2 class="d_h1 d_main-page-heading article-all-head"><?php pll_e('Свежие статьи наших врачей'); ?></h2>
</div>

<div class="d_articles-item-list">
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 6,
        'orderby'   => array(
            'date' => 'DESC',
            'menu_order' => 'ASC',
        ),
    );
    $query = new WP_Query($args);

    while ($query->have_posts()) {
        $query->the_post();
    ?>

        <div class="d_articles-item">
            <a href="<?php the_permalink(); ?>" class="d_articles-item-img" >
                <img width="313px" height="209px" src="<?php the_post_thumbnail_url(); ?>" alt="">
            </a>
            <div class="d_articles-item-author">
                <div class="d_articles-item-author-photo" style="background-image: url(<?php the_field('doctor_photo', get_field('post_doctor')); ?>)"></div>
                <a aria-label="<?php echo get_field('post_doctor')->post_title; ?>" href="<?php the_permalink(get_field('post_doctor')); ?>"><?php echo get_field('post_doctor')->post_title; ?></a>
            </div>
            <a class="d_articles-item-title" href="<?php the_permalink(); ?>">
                <h3>
                    <?php
                    the_title();
                    $cats = get_the_category(get_the_ID());
                    ?>
                </h3>
            </a>
            <div class="d_tags">
                <a aria-label="<?= $cats[0]->name; ?>" href="/stati/?topic=<?= $cats[0]->term_id; ?>#filter_doctor" class="d_tag d_tag-filled"><?= $cats[0]->name; ?></a>
                <div class="d_tag"><i class="icon icon-time"></i> <?php the_date(); ?></div>
                <div class="d_tag"><i class="icon icon-views"></i> <?php the_field('view_counter'); ?></div>
            </div>
        </div>


    <?php }
    wp_reset_postdata(); ?>
</div>
    <?php if( is_front_page() ) { ?>
        <a class="d_link d_link-article" href="<?php echo get_permalink(pll_get_post(3179)); ?>"><?php pll_e('Все статьи'); ?></a>
    <?php } ?>
