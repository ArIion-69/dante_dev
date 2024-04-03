<?php

/*

Template Name: Service
Template Post Type: page

*/
get_header();
get_template_part('template-parts/content', 'breadcrumbs');
$service_sphere_id = get_field('sphere');
?>

<div>
    <!-- hero -->
    <div class="ak-hero">
        <div class="ak-hero__content">
            <div class="ak-hero__text">
                <?php
                $badgeData = get_field('badge');
                $socImg = get_field('social_img');

                if ($badgeData) { ?>
                    <div class="ak-hero__header">
                        <?php
                        $counter = 1;
                        foreach ($badgeData as $badge) {
                            $class_suffix = $counter % 3 + 1;
                        ?>
                            <div class="ak-hero__badge">
                                <span class="ak-hero__badge-title ak-hero__badge-title--color-<?php echo $class_suffix; ?>"><?php echo esc_html($badge['title']); ?></span>
                                <?php if (!empty($badge['sub_title'])) { ?>
                                    <span class="ak-hero__badge-sub-title"><?php echo esc_html($badge['sub_title']); ?></span>
                                <?php } ?>
                                <?php if (!empty($badge['icon'])) { ?>
                                    <img class="ak-hero__badge-icon" src="<?php echo esc_html($badge['icon']); ?>" alt="<?php echo esc_html($badge['title']); ?>">
                                <?php } ?>
                                <span class="ak-hero__badge-text"><?php echo esc_html($badge['text']); ?></span>
                            </div>
                        <?php
                            $counter++;
                        } ?>
                    </div>
                <?php } ?>

                <h1 class="ak-hero__title"><?php the_title(); ?></h1>
                <div class="ak-hero__desc">
                    <?php if (has_excerpt()) {
                        the_excerpt();
                    } ?>
                </div>

                <?php if ($socImg) { ?>
                    <div class="ak-hero__info">
                        <img src="<?php echo $socImg ?>" alt="">
                        <div class="ak-hero__info-wrap">
                            <span class="ak-hero__info-title"><?php echo get_field('info_title'); ?></span>
                            <span class="ak-hero__info-desc"><?php echo get_field('info_text'); ?></span>
                        </div>
                    </div>
                <?php } ?>
                <span class="ak-hero__sign"><?php pll_e('✍️ Контент цієї сторінки створено стоматологами D.Ante'); ?></span>
            </div>
            <div class="ak-hero__img">
                <?php the_post_thumbnail('full', ['alt' => esc_html($badge['title'])]); ?>
                <?php
                $imgBadgeData = get_field('image_badge');
                if ($imgBadgeData) { ?>
                    <div class="ak-hero__img-info">
                        <?php foreach ($imgBadgeData as $badge) { ?>
                            <div class="ak-hero__img-info-item" style="background-image:url('<?php echo esc_html($badge['icon']); ?>');"><?php echo esc_html($badge['text']); ?></div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- hero -->

    <div class="d_with-sidebar_container">

        <div class="d_with-sidebar_content">
            <div class="d_side-element d_spoiler-content spoiler_mobile">
                <div class="d_spoiler-content-title"><?php pll_e('Содержание статьи'); ?></div>
                <div class="d_spoiler-content-body">
                    <?php echo do_shortcode('[lwptoc]'); ?>
                </div>
                <a class="d_link d_spoiler-show"><?php pll_e('Показать все содержание'); ?></a>
            </div>

            <?php the_content(); ?>
        </div>
        <div class="d_with-sidebar_sidebar inner-in-top">
            <div class="d_side-element d_spoiler-content spoiler_desktop d_side-mb">
                <div class="d_spoiler-content-title"><?php pll_e('Содержание статьи'); ?></div>
                <div class="d_spoiler-content-body">
                    <?php echo do_shortcode('[lwptoc]'); ?>
                </div>
                <a class="d_link d_spoiler-show"><?php pll_e('Показать все содержание'); ?></a>
            </div>


            <?php dynamic_sidebar('price_side'); ?>
            <?php dynamic_sidebar('true_side'); ?>



            <div class="d_side-element d_related-topics">

                <div class="d_related-topics-title d_side-element-text"><?php pll_e('Еще услуги по сфере'); ?> "
                    <?php echo get_category($service_sphere_id)->name; ?>":
                </div>
                <ul>
                    <?php
                    $args = array(
                        'post_type' => 'page',
                        'meta_key' => 'sphere',
                        'meta_value' => $service_sphere_id,
                        'posts_per_page' => 5,
                        'post__not_in' => array(get_the_ID()),
                        'orderby'   => array(
                            'date' => 'DESC',
                            'menu_order' => 'ASC',
                        ),
                    );
                    $query = new WP_Query($args);


                    while ($query->have_posts()) {
                        $query->the_post();

                    ?>
                        <li>
                            <a class="d_link" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </li>
                    <?php }
                    wp_reset_postdata(); ?>
                </ul>
            </div>
        </div>
    </div>
    <?php if (get_field('price_shortcode')) : ?>
        <h2 class="d_accordion-btn_clickable active"><?php the_field('price_title'); ?></h2>
        <?php echo do_shortcode(the_field('price_shortcode')); ?>
    <?php endif; ?>




    <!-- <p>old</p> -->
    <?php // get_template_part('template-parts/content', 'prices'); 
    ?>



    <div class="d_inner-component d_question-component">
        <div class="d_question-component-row">
            <div class="d_question-component-col">
                <h2>
                    <?php the_title(); ?><?php pll_e(': <br>спросите стоматолога'); ?>
                </h2>
                <div class="d_question-component-text">
                    <?php pll_e('Если вы не нашли нужной информации в этом материале, задайте свой вопрос — и наши стоматологи ответят на него, администратор перезвонит и озвучит ответ. Обычно отвечаем в течение 24 часов.'); ?>
                    <br><br>
                    <?php pll_e('И «нет» — ваш вопрос не будет виден другим посетителям сайта.'); ?>
                </div>
            </div>
            <div class="d_question-component-col" style="margin-top: 50px;">
                <?php if (pll_current_language() == 'ru') {
                    echo do_shortcode('[contact-form-7 id="9977" title="Спросите доктора (Услуга)" html_class="d_form"]');
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
                    <?php pll_e('Последние статьи<br> с тегом'); ?>
                    <a href="<?php if (pll_current_language() == 'uk') echo '/uk/statti/';
                                else echo '/stati/'; ?>?topic=<?= $service_sphere_id; ?>#filter_doctor" class="d_tag d_tag-filled">
                        <?php echo preg_replace('/\s+/', '&nbsp', get_category($service_sphere_id)->name); ?>
                    </a>
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
                                'cat' => $service_sphere_id,
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
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
    $args = array(
        'post_type' => 'doctor',
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);


    while ($query->have_posts()) :
        $query->the_post();
        $check = false;
        foreach (get_field('sphere') as $sphere) {
            if ($service_sphere_id == $sphere) {
                $check = true;
                break;
            }
        }

        if ($check) :
            $doctor_ID = get_field('post_doctor');
    ?>

            <h2>
                <?php the_field('title_doctor_prof'); ?>
            </h2>

            <div class="d_inner-component d_doctor-component">
                <div class="d_doctor-component-img-wrapper">
                    <img src="<?php echo get_field('doctor_photo'); ?>" alt="doctor" class="d_doctor-component-img">
                </div>
                <div class="d_doctor-component-body">
                    <div class="d_doctor-component-info">
                        <div class="d_doctor-component-title">
                            <?php echo get_the_title($doctor_ID) ?>
                        </div>
                        <div class="d_doctor-component-text">
                            <?php echo get_field('doctor_position', $doctor_ID); ?>
                        </div>

                        <?php
                        $doctor_citation = get_field('doctor_citation', $doctor_ID);

                        if (!empty($doctor_citation)) {
                            echo '<div class="d_doctor-component-qoute">💬 ' . $doctor_citation . '</div>';
                        }
                        ?>


                        <div class="d_doctor-component-links">
                            <a class="d_link" href="<?php the_permalink(); ?>"><?php pll_e('Персональная страница доктора'); ?></a><br>
                            <a class="d_link" href="<?php if (pll_current_language() == 'uk') echo '/statti/';
                                                    else echo '/ru/stati/'; ?>?doctor=<?php the_ID(); ?>#filter_doctor"><?php pll_e('Все статьи доктора'); ?></a>
                        </div>
                    </div>



                    <div class="d_doctor-component-diplom-imgs swiper">
                        <?php
                        $i = 0;
                        $certs = get_field('doctor_cert');


                        if (count($certs) < 8) {
                            foreach ($certs as $cert) :  ?>
                                <?php $i++; ?>
                                <div class="d_doctor-component-diplom-img" style="background-image: url(<?php echo $cert['url']; ?>)">
                                </div>
                                <?php if ($i > 3) break; ?>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            <?php foreach ($certs as $cert) :  ?>
                                <?php $i++; ?>
                                <div class="d_doctor-component-diplom-img" style="background-image: url(<?php echo $cert['url']; ?>)">
                                </div>
                                <?php if ($i > 7) break; ?>
                        <?php endforeach;
                        } ?>
                    </div>

                </div>
            </div>

    <?php
        endif;
    endwhile;
    wp_reset_postdata();
    get_template_part('template-parts/content', 'reviews');
    ?>

</div>
<style>
    @media only screen and (min-width: 769px) {

        .d_related-topics,
        .d_additional-info {
            margin-top: 800px;
        }
    }
</style>

<?php get_footer(); ?>