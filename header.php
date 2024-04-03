<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5">
    <link rel="preconnect" href="https://www.gstatic.com/">
    <?php wp_head(); ?>

    <meta name="google-site-verification" content="M_BM1rkF5hTmDCDxgmbdy1DFxs39Gtw0uW9cetdIBQQ" />
</head>

<script>
    var ModalVar;
</script>
<script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1811032489188089');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1811032489188089&ev=PageView&noscript=1" /></noscript>

<?php if (function_exists('gtm4wp_the_gtm_tag')) {
    gtm4wp_the_gtm_tag();
} ?>


<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="bg-wrap">

    
    <div class="d_main-container">
        <header class="header">
            <div class="header-wrap">
                <div class="mobile-menu-btn">
                    <span class="mobile-menu"></span>
                </div>
                <a class="header__logo" href="/">
                    <img class="header__logo-img" src="/wp-content/themes/dante/assets/img/logo.svg" alt="dante">
                    <span class="header__logo-text"><?php pll_e('Стоматологічна клініка <br> Краща версія твоєї усмішки'); ?></span>
                </a>
                <div class="header__item">
                    <span class="header__item-text"><?php pll_e('м. Київ, вул. Антоновича, 47'); ?></span>
                    <span class="header__item--metro"><?php pll_e('«Олімпійська»'); ?></span>
                </div>
                <div class="header__item">
                    <span class="header__item-text"><?php pll_e('Рейтинг клініки в Google'); ?></span>
                    <span class="header__item--stars"><?php echo do_shortcode('[google_maps_rating]'); ?></span>
                </div>
                <div class="header__item header__item--phones">
                    <a class="header__item--phone" href="tel:+380442877707">+38 (044) 287-77-07</a>
                    <a class="header__item--phone header__item--phone-main" href="tel:+380682877707">+38 (068) 287-77-07</a>
                </div>
                <div class="header__lang">
                    <span class="header__item-text"><?php pll_e('Змінити мову'); ?></span>
                    <div class="header__lang-group">
                        <?php
                        $translations = pll_the_languages(array('raw' => 1));
                        $current_language = pll_current_language();

                        foreach ($translations as $lang_code => $lang_info) {
                            $is_active = ($lang_code === $current_language) ? 'header__lang-link--active' : '';
                        ?>
                            <a href="<?php echo esc_url($lang_info['url']); ?>" class="header__lang-link <?php echo esc_attr($is_active); ?>">
                                <?php echo esc_html($lang_info['name']); ?>
                            </a>
                        <?php } ?>
                    </div>

                </div>
                <span class="header__btn"><?php pll_e('Запис на прийом'); ?></span>
            </div>
        </header>


        <div class="main">
            <div class="main-content">
                <div class="sidebar-wrap">
                    <div class="sidebar-content">
                        <div class="sidebar-header">
                            <div class="header__item">
                                <span class="header__item-text"><?php pll_e('Рейтинг в Google'); ?></span>
                                <span class="header__item--stars"><?php echo do_shortcode('[google_maps_rating]'); ?></span>
                            </div>
                            <div class="header__lang">
                                <span class="header__item-text"><?php pll_e('Змінити мову'); ?></span>
                                <div class="header__lang-group">
                                    <?php
                                    foreach ($translations as $lang_code => $lang_info) {
                                        $is_active = ($lang_code === $current_language) ? 'header__lang-link--active' : '';
                                    ?>
                                        <a href="<?php echo esc_url($lang_info['url']); ?>" class="header__lang-link <?php echo esc_attr($is_active); ?>">
                                            <?php echo esc_html($lang_info['name']); ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php echo do_shortcode('[search_live placeholder="Пошук послуг, статей, лікарів" floating="yes" order_by="title" excerpt="no" content="no"]'); ?>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'main',
                            'menu'            => '',
                            'container'       => null,
                            'menu_class'      => 'desktop-menu',
                            'menu_id'         => null,
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => '',
                        )); ?>

                        <div class="sidebar-footer">
                            <a href="tel:+380442877707" class="sidebar-footer__phone">+38 (044) 287-77-07</a>
                            <a href="tel:+380682877707" class="sidebar-footer__phone">+38 (068) 287-77-07</a>
                            <span class="sidebar-footer__addr"><?php pll_e('м. Київ, <br> вул. Антоновича 47 (м. «Олімпійська»)'); ?></span>
                            <a class="sidebar-footer__link" href="#"><?php pll_e('Відкрити адресу в Google-мапах'); ?></a>
                            <span class="mob-copy"><?php pll_e('Стоматологічна клініка D.Ante, Київ <br> — Краща версія твоєї усмішки! (c) 2017-2024'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="main-wrap">
