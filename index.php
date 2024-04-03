<?php 
get_header();
get_template_part('template-parts/content', 'breadcrumbs');
?>



<div>
    <div class="page-mete">
        <?php if (pll_current_language() == 'uk') : ?>
        <h1 class="cat-title"><?php echo get_field('title', 3541) ?></h1>
        <p class="cat-desc"><?php the_field('desc', 3541) ?></p>
        <?php else : ?>
        <h1 class="cat-title"><?php echo get_field('title', 3179) ?></h1>
        <p class="cat-desc"><?php the_field('desc', 3179) ?></p>
        <?php endif; ?>
    </div>

    <div class="d_articles-row d_articles-mob-fix">
        <span id="filter_doctor"></span>
    </div>

    <!-- FILTER -->
    <form action="" method="POST" id="filter" onsubmit="return false">
        <div class="d_articles-filters-container">
            <div class="dropdown-wrapper">
                <div class="dropdown-title"><?php pll_e('Фильтр:'); ?></div>
                <div>
                    <div class="dropdown-container" id="byThemes" data-role="container">
                        <select class="js-example-basic-single dropdown-button dropdown-body filter-select"
                            name="category" id="topic" data-type="category" data-role="button">
                            <option value="" selected><?php pll_e('Все темы'); ?></option>
                            <?php
                                $categories = get_terms(array('taxonomy' => 'category'));
                                foreach ($categories as $category) :
                                ?>
                            <option class="js-filter-item" value="<?= $category->term_id ?>" data-role="item">
                                <?= $category->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="dropdown-container" id="byAuthors" data-role="container">
                        <select class="js-example-basic-single dropdown-button dropdown-body filter-select"
                            name="doctor"  data-type="doctor" id="doctor" data-role="button">
                            <option value="" selected><?php pll_e('Все авторы'); ?></option>
                            <?php
                                $doc_args = array(
                                    'post_type' => 'doctor',
                                    'option_all' => 'All'
                                );
                                $query = new WP_Query($doc_args);
                                $doc_count = 0;
                                while ($query->have_posts()) :
                                    $doc_count++;
                                    $query->the_post();
                                ?>
                            <option class="js-filter-item" value="<?php the_ID() ?>" id="<?php the_ID() ?>"
                                data-role="item"><?php the_title(); ?></option>
                            <?php endwhile;
                                wp_reset_postdata(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" name="action" value="filterfilter">
            <button id="ajax_posts_button" type="submit" class="ajax_posts_button"><?php pll_e('Фильтровать'); ?></button>
        </div>
    </form>


    <?php
        if (!empty($_GET['doctor']) && $_GET['doctor'] || !empty($_GET['topic']) && $_GET['topic']) { ?>
    <script>
    function formFill_doctor(get_param) {
        for (var i = 0; i < document.getElementById("doctor").length; i++) {
            if (document.getElementById("doctor").options[i].value == get_param) {
                document.getElementById("doctor").selectedIndex = i;
            }
        }
    }
    formFill_doctor(<?= $_GET['doctor']; ?>);

    function formFill_topic(get_param) {
        for (var i = 0; i < document.getElementById("topic").length; i++) {
            if (document.getElementById("topic").options[i].value == get_param) {
                document.getElementById("topic").selectedIndex = i;
            }
        }
    }
    formFill_topic(<?= $_GET['topic']; ?>);
    </script>


    <?php } ?>

    <div class="d_with-sidebar_container">
        <div class="d_with-sidebar_content">
            <div id="response" class="d_articles-item-list">

                <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => -1,
                        'orderby'   => array(
                            'date' => 'DESC',
                            'menu_order' => 'ASC',
                        ),
                    );
                    if (!empty($_GET['doctor']) && $_GET['doctor']) {
                        $args['meta_value'] = $_GET['doctor'];
                    } // берем из GET параметры доктора (при переходе по ссылке Все статьи доктора)
                    if (!empty($_GET['topic']) && $_GET['topic']) {
                        $args['cat'] = $_GET['topic'];
                    }  // берем из GET параметры категория (при переходе по ссылке Тематика статьи)
                    $query = new WP_Query($args);
                    $counter = 0;

                    while ($query->have_posts()) {
                        $query->the_post();
                    ?>

                <div class="d_articles-item">
                    <a href="<?php the_permalink(); ?>" class="d_articles-item-img" >
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo get_field('post_doctor')->post_title; ?>">
                    </a>
                    <div class="d_articles-item-author">
                        <div class="d_articles-item-author-photo"
                            style="background-image: url(<?php the_field('doctor_photo', get_field('post_doctor')); ?>)">
                        </div>
                        <a
                            href="<?php the_permalink(get_field('post_doctor')); ?>"><?php echo get_field('post_doctor')->post_title; ?></a>
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
                        <a href="/stati/?topic=<?= $cats[0]->term_id; ?>#filter_doctor"
                            class="d_tag d_tag-filled"><?= $cats[0]->name; ?></a>
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
</div>

<?php get_footer(); ?>