<div class="d_main-slider-wrapper">
    <div class="swiper-container-wrapper">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php $counter = 0;
                foreach (get_field('home_slider') as $slide) : ?>
                    <div class="swiper-slide" onclick="location.href = '<?php echo $slide['caption']; ?>';">
                        <img src="<?php echo $slide['url']; ?>" alt="<?php echo $slide['alt']; ?>" width="522px" height="192px" />
                        <?php if ($counter == 0) : ?>
                            <h1 class="slide-text">
                                <?php the_title(); ?>
                            </h1>
                        <?php else : ?>
                            <div class="slide-text d_h1">
                                <?php echo $slide['alt']; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php $counter++;
                endforeach; ?>
            </div>
        </div>
        <?php if( count(get_field('home_slider')) > 1) : ?>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <?php endif; ?>
    </div>
</div>