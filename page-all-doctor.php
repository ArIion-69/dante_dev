<?php

/*
Template Name: all-doctor
*/

get_header(); ?>

<?php get_template_part('template-parts/content', 'breadcrumbs'); ?>

<div>
    <div class="d_single-info-block all-doctors-header-padding">
        <div class="d_single-info-block-data all-doctors-header-center">
            <div class="all-doctors-header">
                <img src="/wp-content/uploads/2021/07/doctors.png">
                <h1 class="all-doctors-header-title">
                    <?php the_title(); ?>
                </h1>
                <span class="all-doctors-header-desc">
                    <?php pll_e('Трудимся, чтобы ваши зубы не болели'); ?>
                </span>
            </div>


        </div>
    </div>


    <div class="all-doctor">

        <?php

        $posts = get_posts(array(
            'numberposts' => 15,
            'orderby'     => 'date',
            'order'       => 'ASC',
            'post_type'   => 'doctor',
            'suppress_filters' => true,
        ));

        foreach ($posts as $post) {
            setup_postdata($post);
        ?>
            <div class="all-doctor-item">
                <div class="all-doctor-item-photo">
                    <a href="<?php the_permalink(); ?>"><img src="<?php the_field('doctor_photo'); ?>" class="all-doctor-item-img"></a>
                </div>
                <div class="all-doctor-item-info">
                    
                    <h3 class="all-doctor-item-name">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <?php
                    $terms = get_field('doctor_category');
                    if ($terms) : ?>
                        <div class="all-doctor-item-service">
                            <?php foreach ($terms as $term) : ?>
                                <a class="all-doctor-item-service-link book-button d_primary-button static" href="<?php echo esc_url(get_term_link($term)); ?>">
                                    <?php echo esc_html($term->name); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <span class="all-doctor-item-spec">
                        <?php pll_e('Специализация:'); ?>
                        <?php the_field('doctor_position'); ?>
                    </span>
                    <div class="all-doctor-item-text">
                        <?php the_field('doctor_full_text'); ?>
                    </div>
                </div>
            </div>

        <?php
        }
        wp_reset_postdata(); ?>

        <div class="all-doctor-item-footer">
            <span class="all-doctor-item-footer-desc">
                <?php pll_e('Есть вопросы по процедурам и вы хотите получить консультацию одного из наших врачей?'); ?>
            </span>
            <a href="tel:+380682877707" class="all-doctor-item-footer-callaback book-button d_primary-button static">
                <?php pll_e('Нажмите, чтобы позвонить <br> + 38 (068) 287-77-07'); ?>
            </a>
            <span class="all-doctor-item-footer-bottom">
                <?php pll_e('Отвечаем на звонки с 09:00 до 21:00'); ?>
            </span>
        </div>

    </div>
</div>

<?php get_footer(); ?>