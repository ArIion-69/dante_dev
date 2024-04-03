<?php

/*

Template Name: Doctor v2
Template Post Type: doctor
*/



?>


<?php get_header(); ?>

<?php

$date1 = get_field('exp');
$date2 = date("j.n.Y");
$time1 = strtotime($date1);
$time2 = strtotime($date2);
$v  = abs($time1 - $time2);

?>



<?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
<div class="sigle-doctor-page">

    <div class="n_doctor">
        <div class="n_doctor__desc">
            <h1 class="n_doctor__title"><?php the_title(); ?></h1>
            <span class="n_doctor__exp"><?php pll_e('опыт работы'); ?> <?php echo date('y', $v) - 70; ?> <?php pll_e('лет'); ?> </span>
            <div class="n_doctor__info">
                <?php the_field('doctor_position'); ?>
            </div>
        </div>
        <div class="n_doctor__photo">
            <img src="<?php the_field('doctor_photo'); ?>" alt="<?php the_title(); ?>">
        </div>
    </div>

    <div class="n_with-sidebar_container d_with-sidebar_container">
        <div class="d_with-sidebar_content">
            <div class="d_doctor-education-container">
                <h2 class="n_doctor-education-title">
                    <?php pll_e('Образование'); ?>
                </h2>
                <div class="n_doctor-education-list d_doctor-education-list">
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

        <div class="n_with-sidebar_sidebar d_with-sidebar_sidebar">
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


</div>

<?php if (have_rows('reviews')) : ?>

    <div class="d_inner-component d_inner-component-fixsuka d_reviews-component m-t-50">
        <h2><?php pll_e('Отзывы о работе доктора'); ?></h2>
        <div class="d_reviews-slider-wrapper">
            <div class="swiper swiper-container">
                <div class="swiper-wrapper">
                    <?php while (have_rows('reviews')) : the_row(); ?>

                        <div class="swiper-slide">
                            <div class="d_reviews-stars">
                                <?php $rate = get_sub_field('rating');;
                                for ($i = 0; $i < $rate; $i++) :
                                ?>
                                    <i class="icon icon-star"></i>
                                <?php endfor; ?>
                            </div>
                            <div class="d_side-element-text">
                                <?php echo get_sub_field('text'); ?>
                                <div class="d_reviews-author"><?php echo get_sub_field('name'); ?></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="d_reviews-bottom">
            <?php pll_e('Больше отзывов —'); ?> <a class="d_link" href="https://g.page/DentistAnte?share" target="_blank"><?php pll_e('на картах Google'); ?></a>
        </div>
    </div>
<?php endif; ?>



<div class="n-doctor-article">
    <h2 class="n-doctor-article__title"><?php pll_e('Статьи доктора'); ?></h2>
    <div class="n-doctor-article__wrapper">
        <?php
        $args = [
            'post_type' => 'post',
            'meta_key' => 'post_doctor',
            'meta_value' => get_the_ID(),
            'posts_per_page' => 4,
            'orderby'   => [
                'date' => 'DESC',
                'menu_order' => 'ASC',
            ]
        ];
        $query = new WP_Query($args);
        while ($query->have_posts()) {
            $query->the_post();
        ?>
            <div class="n-doctor-article__item">
                <img class="n-doctor-article__img" src="<?php the_post_thumbnail_url(); ?>" alt="">
                <div class="n-doctor-article__desc">
                    <a href="<?php the_permalink(); ?>" class="n-doctor-article__link"><?php the_title(); ?></a>
                    <div class="d_tags">
                        <?php $cats = get_the_category(get_the_ID()); ?>
                        <?php if (pll_current_language() == 'ru') : ?>
                            <a href="/ru/stati/?topic=<?= $cats[0]->term_id; ?>#filter_doctor" class="d_tag d_tag-filled"><?= $cats[0]->name; ?></a>
                        <?php else : ?>
                            <a href="/stati/?topic=<?= $cats[0]->term_id; ?>#filter_doctor" class="d_tag d_tag-filled"><?= $cats[0]->name; ?></a>
                        <?php endif; ?>
                        <div class="d_tag"><i class="icon icon-time"></i><?php the_date(); ?></div>
                        <div class="d_tag"><i class="icon icon-views"></i> <?php the_field('view_counter'); ?></div>
                    </div>
                </div>

            </div>
        <?php
        }
        wp_reset_postdata();
        ?>
        <?php if (pll_current_language() == 'uk') : ?>
            <a class="n-doctor-article__all-link" href="/stati/?doctor=<?php echo get_the_ID() ?>#filter_doctor"><?php pll_e('Перейти ко всем статьям доктора'); ?></a>
        <?php else : ?>
            <a class="n-doctor-article__all-link" href="/ru/stati/?doctor=<?php echo get_the_ID() ?>#filter_doctor"><?php pll_e('Перейти ко всем статьям доктора'); ?></a>
        <?php endif; ?>
    </div>
</div>




<?php if (have_rows('videos')) : ?>
    <div class="n-doctor-video">
        <h2 class="n-doctor-video__title"><?php pll_e('Видео доктора'); ?></h2>
        <div class="n-doctor-video__wrapper">
            <?php while (have_rows('videos')) : the_row(); ?>
                <div class="n-doctor-video__item">
                    <iframe width="312" height="176" src="https://www.youtube.com/embed/<?php echo get_sub_field('video'); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php endwhile; ?>
        </div>
        <?php if (get_field('videos_link')) { ?>
            <a class="n-doctor-video__all-link" href="<?php the_field('videos_link'); ?>" target="blank"><?php pll_e('Перейти на Youtube-канал с видео доктора'); ?></a>
        <?php } ?>
    </div>
<?php endif; ?>


<div class="d_inner-component d_question-component n_question-component">
    <div class="d_question-component-row">

        <div class="d_question-component-col">
            <h2>
                <?php pll_e('Запишитесь на прием <br> в удобный для вас день'); ?>
            </h2>
            <div class="d_question-component-text">
                <?php pll_e('Мы перезвоним, чтобы уточнить время приема'); ?>
            </div>
        </div>

        <div class="d_question-component-col" style="margin-top: 50px;">
            <?php if (pll_current_language() == 'ru') {
                echo do_shortcode('[contact-form-7 id="9975" title="Запись на прием" html_class="d_form"]');
            } else {
                echo do_shortcode('[contact-form-7 id="11666" title="Запись на прием UA" html_class="d_form"]');
            } ?>
        </div>

    </div>

</div>

<script>
    var link = document.querySelector('.read-link');

    <?php if (pll_current_language() == 'ru') { ?>

    <?php } else {  ?>
        link.text = "Показати освіту лікаря повністю";
    <?php } ?>

    link.parentNode.classList.add("link-wrap");

    link.addEventListener("click", function() {
        link.parentNode.classList.add("hidden");
    });
</script>
<style>
    .hidden {
        display: none;
    }
</style>

<?php get_footer(); ?>