    <div class="d_inner-component d_inner-component-fixsuka d_reviews-component m-t-50">
        <h2><?php pll_e('Отзывы о клинике<br> и врачах'); ?></h2>
        <div class="d_reviews-slider-wrapper">
            <div class="swiper swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    $args = array(
                        'post_type' => 'review',
                        'posts_per_page' => -1,
                    );
                    $query = new WP_Query($args);

                    while ($query->have_posts()) :
                        $query->the_post();
                    ?>
                        <div class="swiper-slide">
                            <div class="d_reviews-stars">
                                <?php $rate = get_field('review-rate');
                                for ($i = 0; $i < $rate; $i++) :
                                ?>
                                    <i class="icon icon-star"></i>
                                <?php endfor; ?>
                            </div>
                            <div class="d_side-element-text">
                                <?php the_field('review-text'); ?>
                                <div class="d_reviews-author"><?php the_title(); ?></div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                    
                </div>
                <div class="swiper-pagination"></div>
                
            </div>
        </div>
        <div class="d_reviews-bottom">
            <?php pll_e('Больше отзывов —'); ?> <a class="d_link" href="https://g.page/DentistAnte?share" target="_blank"><?php pll_e('на картах Google'); ?></a>
        </div>
    </div>

