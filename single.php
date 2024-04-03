<?php get_header(); ?>

<?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
<?php $category = get_the_category(); ?>


<div>

    <div class="d_with-sidebar_container">
        <div class="d_with-sidebar_content d_single-article-h1-container">
            <img src="<?php echo get_field('post-image') ?>" alt="<?php the_title() ?>">
            <h1>
                <?php the_title() ?>
            </h1>
        </div>
        <div class="d_with-sidebar_sidebar">
            <div class="d_doc-with-tags">
                <div class="d_articles-item-author">
                    <div class="d_articles-item-author-photo" style="background-image: url(<?php the_field('doctor_photo', get_field('post_doctor')); ?>)">
                    </div>
                    <a href="<?php the_permalink(get_field('post_doctor')); ?>">
                        <?= get_the_title(get_field('post_doctor')); ?>
                    </a>
                </div>
                <div class="d_doc-with-tags-desc">
                    <?php the_field('doctor_position', get_field('post_doctor')); ?>
                </div>
                <div class="d_tags">
                    <a href="/stati/?topic=<?= $category[0]->term_id; ?>#filter_doctor" class="d_tag d_tag-filled">
                        <?php echo $category[0]->name; ?>
                    </a>
                    <div class="d_tag"><i class="icon icon-time"></i> <?php the_date(); ?></div>
                    <div class="d_tag"><i class="icon icon-views"></i>
                        <?php $views = get_field('view_counter');
                        echo $views++;
                        update_field('view_counter', $views); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="d_with-sidebar_container mobile-sidebar-top">
        <div class="d_with-sidebar_content">
            <div class="gr-sign">
                <span class="gr-sign-text"><?php pll_e('✍️ написано стоматологом D.Ante 👇'); ?></span>
            </div>
            <?php the_content(); ?>





            <?php if (have_rows('faq')) : ?>
                <div class="faq-block" itemscope itemtype="https://schema.org/FAQPage">

                    <?php if (get_field('faq-block-title')) : ?>
                        <h3 class="faq-block-title"><?php the_field('faq-block-title'); ?></h3>
                    <?php endif; ?>

                    <?php while (have_rows('faq')) : the_row(); ?>
                        <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h4 itemprop="name" class="faq-title"><?php the_sub_field('faq-title'); ?></h4>
                            <div class="faq-text" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div itemprop="text"><?php the_sub_field('answer-text'); ?></div>
                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>
            <?php endif; ?>


        </div>




        <div class="d_with-sidebar_sidebar inner-in-top">



            <div class="d_side-element d_spoiler-content">
                <div class="d_spoiler-content-title"><?php pll_e('Содержание статьи'); ?></div>
                <div class="d_spoiler-content-body">
                    <?php echo do_shortcode('[lwptoc]'); ?>
                </div>
                <a class="d_link d_spoiler-show"><?php pll_e('Показать все содержание'); ?></a>
            </div>
            <?php get_template_part('template-parts/content', 'subscription'); ?>

        </div>

    </div>

    <h2><?php pll_e('Автор этой статьи'); ?></h2>
    <?php $doctor_ID = get_field('post_doctor'); ?>
    <div class="d_inner-component d_doctor-component">
        <div class="d_doctor-component-img-wrapper">
            <img src="<?= get_field('doctor_photo', $doctor_ID); ?>" alt="doctor" class="d_doctor-component-img">
        </div>
        <div class="d_doctor-component-body">
            <div class="d_doctor-component-info">
                <div class="d_doctor-component-title">
                    <?= get_the_title($doctor_ID) ?>
                </div>
                <div class="d_doctor-component-text">
                    <?= get_field('doctor_position', $doctor_ID); ?>
                </div>
                <?php
                $doctor_citation = get_field('doctor_citation', $doctor_ID);

                if (!empty($doctor_citation)) {
                    echo '<div class="d_doctor-component-qoute">💬 ' . $doctor_citation . '</div>';
                }
                ?>

                <div class="d_doctor-component-links">
                    <a class="d_link" href="<?php the_permalink($doctor_ID); ?>"><?php pll_e('Персональная страница доктора'); ?></a><br>
                    <a class="d_link" href="<?php if (pll_current_language() == 'uk') echo '/statti/';
                                            else echo '/ru/stati/'; ?>?doctor=<?= $doctor_ID->ID; ?>#filter_doctor"><?php pll_e('Все статьи доктора'); ?></a>
                </div>
            </div>
            <div class="d_doctor-component-diplom-imgs">

                <?php $certs = get_field('doctor_cert');
                foreach ($certs as $cert) : ?>
                    <div class="swiper-slide">
                        <div class="d_doctor-component-diplom-img" style="background-image: url(<?= $cert['url']; ?>)">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


    <!-- последние статьи из той-же категории -->

    <div class="d_inner-component d_articles-component">
        <div class="d_articles-component-row">
            <div class="d_articles-component-col">
                <h2>
                    <?php pll_e('Последние статьи<br> с тегом'); ?>
                    <a href="<?php if (pll_current_language() == 'uk') echo '/statti/';
                                else echo '/ru/stati/'; ?>?topic=<?= $category[0]->term_id; ?>#filter_doctor" class="d_tag d_tag-filled">
                        <?= preg_replace('/\s+/', '&nbsp', $category[0]->name); ?>
                    </a>
                    <span class="d_articles-component-col-fix"><?php pll_e('в блоге D.Ante'); ?></span>
                </h2>
            </div>
            <div class="d_articles-component-col">
                <div class="d_articles-slider-wrapper">
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper">

                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'cat' => $category[0]->term_id,
                                'posts_per_page' => 10,
                                'post__not_in' => array($post->ID),
                                'orderby'   => array(
                                    'date' => 'DESC',
                                    'menu_order' => 'ASC',
                                ),
                            );
                            $query = new WP_Query($args);


                            while ($query->have_posts()) {
                                $query->the_post();

                            ?>

                                <!-- Блок превью -->
                                <div class="swiper-slide">
                                    <div class="d_articles-slide-text">
                                        <?php the_title(); ?>
                                    </div>
                                    <a class="d_link" href="<?php the_permalink(); ?>"><?php pll_e('Читать статью полностью >'); ?></a>
                                </div>

                            <?php }
                            wp_reset_postdata(); ?>

                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination mycustom"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>