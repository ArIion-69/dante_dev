<h2 class="d_h1 d_main-page-heading"><?php pll_e('Врачи D.Ante'); ?></h2>
<div class="d_small-doctors-mobile-check"></div>
<div class="d_small-doctors-slider-wrapper">
    <div class="swiper-container-wrapper">
        <div class="swiper-container">
            <div class="swiper-wrapper d_small-doctor-list">
                <?php
                $args = array(
                    'post_type' => 'doctor',
                    'posts_per_page' => -1,
                    'orderby'   => array(
                        'date' => 'ASC',
                        'menu_order' => 'ASC',
                    ),
                );
                $query = new WP_Query($args);

                while ($query->have_posts()) {
                    $query->the_post();
                ?>

                    <a href="<?php the_permalink(); ?>" class="d_small-doctor-item swiper-slide">
                        <span class="d_small-doctor-img">
                            <img src="<?php the_field('doctor_photo'); ?>" width="94px" height="94px" alt="doctor">
                        </span>
                        <span class="d_small-doctor-info">
                            <span class="d_small-doctor-name"><?php the_title(); ?></span>
                            <span class="d_small-doctor-text">
                                <?php the_field('doctor_position'); ?>
                            </span>
                        </span>
                    </a>

                <?php }
                wp_reset_postdata(); ?>

            </div>
        </div>
    </div>
</div>