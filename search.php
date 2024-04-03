<?php get_header(); ?>


<?php
    $s = get_search_query();
    $args = array(
        's' => $s,
        'orderby'   => array(
            'date' => 'DESC',
            'menu_order' => 'ASC',
        ),
    );
    // The Query
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        _e("<div><h2 style='font-weight:bold;color:#000'>Результаты поиска по запросу: " . get_query_var('s') . "</h2></div>"); ?>
        <div class="d_with-sidebar_container">
            <div class="d_with-sidebar_content">
                <div class="d_articles-item-list">
                    <?php while ($the_query->have_posts()) {
                        $the_query->the_post();
                    ?>
                        <div class="d_articles-item">
                            <a href="<?php the_permalink(); ?>" class="d_articles-item-img" style="background-image: url(<?php the_post_thumbnail_url(); ?>)"></a>
                            <a class="d_articles-item-title" href="<?php the_permalink(); ?>">
                                <h3>
                                    <?php
                                    the_title();
                                    $cats = get_the_category(get_the_ID());
                                    ?>
                                </h3>
                            </a>
                            <div class="d_tags">
                                <div class="d_tag"><i class="icon icon-time"></i><?php the_date(); ?></div>
                                <div class="d_tag"><i class="icon icon-views"></i> <?php the_field('view_counter'); ?></div>
                            </div>
                        </div>
                    <?php }
                    wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="d_with-sidebar_sidebar inner-in-top">
                <?php get_template_part('template-parts/content', 'subscribe'); ?>
            </div>
        </div>
    <?php    } else {
        _e("<h2 style='font-weight:bold;color:#000'>Ничего не найдено по запросу: " . get_query_var('s') . "</h2>");
    }


 get_footer(); ?>