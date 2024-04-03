<div class="d_side-element d_subscription">
    <div class="d_subscription-title">
        <?php pll_e('Подпишитесь на рассылку, чтобы не пропускать'); ?>
        <a class="d_link" href="#12"><?php pll_e('#полезностоматологические'); ?></a>
        <?php pll_e('материалы от врачей D.Ante'); ?>
    </div>

    
    <?php if (pll_current_language() == 'ru') {
        echo do_shortcode('[contact-form-7 id="13960" title="рассылка"]');
    } else {
        echo do_shortcode('[contact-form-7 id="13961" title="рассылка uk"]');
    } ?>
    <div class="d_subscription-info">
        <?php pll_e('Мы не передаем ваши данные третьим лицам и не присылаем больше одного письма в месяц'); ?>
    </div>
</div>