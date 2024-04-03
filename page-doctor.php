<?php

/*

Template Name: Doctor
Template Post Type: doctor
*/

?>


<?php get_header(); ?>

<?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
<div>

    <div class="d_with-sidebar_container">
        <div class="d_with-sidebar_content">
            <div class="d_doctor">
                <div class="d_doctor-img">
                    <img src="<?php the_field('doctor_photo'); ?>" alt="doctor" class="doctor_photo">
                </div>
                <div class="d_doctor-info">
                    <h1><?php the_title(); ?></h1>
                    <div class="d_doctor-info-desc">
                        <?php the_field('doctor_position'); ?>
                    </div>
                    <?php the_field('doctor_about'); ?>
                    <div class="d_doctor-quote">
                        💬 <?php the_field('doctor_citation'); ?>
                    </div>
                </div>
            </div>

            <div class="d_doctor-education-container">
                <h2 class="d_doctor-education-title">
                    <?php pll_e('Образование'); ?>
                </h2>
                <div class="d_doctor-education-list">
                    <?php the_field('doctor_education'); ?>
                </div>
            </div>


            <?php
            $certs = get_field('doctor_cert');
            if ($certs) :
            ?>
                <div class="d_diplom-slider-wrapper">
                    <h2 class="d_diplom-slider-title"><?php pll_e('Сертификаты'); ?></h2>
                    <div class="swiper-container-wrapper">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php foreach ($certs as $cert) : ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo $cert['url']; ?>" alt="<?php echo $cert['alt']; ?>" />
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="d_with-sidebar_sidebar">
            <div class="d_side-element d_question">
                <h2><?php pll_e('Спросите стоматолога'); ?></h2>
                <div class="d_question-text">
                    <?php pll_e('Если вы нашли нужной информации в этом материале, задайте свой вопрос — и наши стоматологи ответят на него, администратор перезвонит и озвучит ответ.  Обычно отвечаем в течение 24 часов.'); ?>
                    <br><br>
                    <?php pll_e('И «нет» — ваш вопрос не будет виден другим посетителям сайта.'); ?>
                </div>
                <?php if (pll_current_language() == 'ru') {
                    echo do_shortcode('[contact-form-7 id="9328" title="Спросите доктора (Доктор)" html_class="d_form"]');
                } else {
                    echo do_shortcode('[contact-form-7 id="11668" title="Спросите доктора (Доктор) UA" html_class="d_form"]');
                } ?>
            </div>
        </div>
    </div>

    <div class="d_inner-component d_articles-component">
        <div class="d_articles-component-row">
            <div class="d_articles-component-col">
                <h2>
                    <?php pll_e('Последние статьи'); ?><br>
                    <span class="d_articles-component-doctor">
                        <div class="d_articles-component-doctor-img" style="background-image: url(<?php the_field('doctor_photo'); ?>)"></div>
                        <?php pll_e('доктора'); ?>
                    </span>
                    <?php pll_e('в блоге D.Ante'); ?>
                </h2>
            </div>
            <div class="d_articles-component-col">
                <div class="d_articles-slider-wrapper">
                    <div class="swiper swiper-container">
                        <div class="swiper-wrapper">

                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'meta_key' => 'post_doctor',
                                'meta_value' => get_the_ID(),
                                'posts_per_page' => 10,
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
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>