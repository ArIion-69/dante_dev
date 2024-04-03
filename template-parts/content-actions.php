<h2 class="d_h1 d_main-page-heading"><?php pll_e('Акции стоматологии'); ?></h2>
<div class="d_promos-containers">
    <div class="d_promos-containers-text">
        <?php the_field('sale_desc'); ?>
    </div>

    <div class="d_promos-containers-table">
        <?php if( have_rows('sales') ): ?>
        <?php while( have_rows('sales') ): the_row(); 
            // переменные
            $name = get_sub_field('name');
            $price = get_sub_field('price');
            $sale_price = get_sub_field('sale_price');
            $sale_cond = get_sub_field('sale_cond');
        
        ?>
        <div class="d_promos-containers-table-row">
            <div class="d_promos-containers-table-col info">
                <div class="d_promos-item">
                    <div class="d_promos-item-title"><?php echo $name ?></div>
                    <div class="d_promos-item-price d_line-trough"><?php echo $price ?></div>
                </div>
                <div class="d_promos-item color-red">
                    <div class="d_promos-item-title"><?php echo $sale_cond ?></div>
                    <div class="d_promos-item-price"><?php echo $sale_price ?></div>
                </div>
            </div>
            <div class="d_promos-containers-table-col button">
                <button value="<?php echo $name ?>"
                    class="book-button2 d_primary-button">
                    <?php pll_e('Записаться на прием'); ?>
                </button>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>

        <div class="d_doctor-component-links">
            <a class="d_link" href="<?php echo get_permalink(pll_get_post(756)); ?>"><?php pll_e('Смотреть все акции'); ?></a>
        </div>
    </div>
</div>