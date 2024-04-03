</div>
</div>
<footer class="d_footer">
    <div class="d_footer-row">
        <div class="d_footer-col d_footer-col-1">
            <p class="d_footer-gray" style="font-size:14px;">© 2017-<?php echo date("Y"); ?></p>
            <div class="d_footer-bold license">
                <?php pll_e('Стоматологическая клиника D.Ante <br> Лицензия №****** от **.**.2020'); ?>
            </div>
            <div class="d_footer-logo"></div>
            <div class="d_footer-gray">
                <?php pll_e('Чтобы узнать больше об услугах или записаться на прием, позвоните по одному из номеров'); ?>
            </div>
            <div class="d_footer-bold">
                <a href="tel:+380442877707" style="color: black; text-decoration: none;">​+ 38 (044)
                    287-77-07</a><br>
                <a href="tel:+380682877707" style="color: black; text-decoration: none;">+ 38 (068)
                    287-77-07</a>
            </div>
            <div class="d_footer-gray or"><?php pll_e('или'); ?></div>
            <button class="book-button footer__btn d_primary-button static"><?php pll_e('Запишитесь на прием онлайн'); ?></button>
            <div class="d_footer-social-container">
                <div class="d_footer-gray social"><?php pll_e('Клиника в социальных сетях'); ?></div>
                <div class="d_footer-social-links">
                    <a aria-label="facebook" href="https://www.facebook.com/DentistAnte/" target="_blank" rel="noopener noreferrer" class="d_footer-social-link fb"></a>
                    <a aria-label="instagram" href="https://www.instagram.com/dentistante/" target="_blank" rel="noopener noreferrer" class="d_footer-social-link inst"></a>
                    <a aria-label="tiktok" href="https://www.tiktok.com/@dentistante" target="_blank" rel="noopener noreferrer" class="d_footer-social-link tiktok"></a>
                    <a aria-label="youtube" href="https://www.youtube.com/channel/UCpBPqxllqHLbJ-zk21No-Zg" target="_blank" rel="noopener noreferrer" class="d_footer-social-link youtube"></a>

                </div>
            </div>
        </div>
        <div class="d_footer-col d_footer-col-2">
            <div class="d_footer-gray">
                <?php pll_e('Адрес стоматологии D.ANTE <br> на Олимпийской'); ?>
            </div>
            <div class="d_footer-bold">
                <?php pll_e('г. Киев, ул. Антоновича (Горького) 47, <br> 2-й этаж (код парадного "68" — нажать одновременно)'); ?>
            </div>
            <div class="d_footer-map-container">
                <div class="d_footer-map">
                    <iframe loading="lazy" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6044.544296626449!2d30.51289151503944!3d50.43331777409641!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6c0e3a5a29016222!2sD.ANTE!5e0!3m2!1sru!2s!4v1627902442364!5m2!1sru!2s" width="100%" height="166" style="border:0;" allowfullscreen="" loading="lazy" rel="noopener noreferrer"></iframe>
                </div>

            </div>

            <div class="footer-links-block">
                <?php if (pll_current_language() == 'uk') : ?>
                    <a href="https://dante.com.ua/polityka-konfidenciynosti/">Політика конфіденційності</a>
                    <a href="https://dante.com.ua/pravyla-ta-umovy/">Правила та умови</a>
                    <a href="https://dante.com.ua/cookies/">Використання Cookies</a>
                <?php else : ?>
                    <a href="https://dante.com.ua/ru/politika-konfidencialnosti/">Политика конфиденциальности</a>
                    <a href="https://dante.com.ua/ru/pravila-i-usloviya/">Правила и условия</a>
                    <a href="https://dante.com.ua/ru/cookies-2/">Использование Cookies</a>
                <?php endif; ?>
            </div>
            <style>

            </style>
        </div>
    </div>
</footer>
</div>
</div>
</div>
<?php get_template_part('template-parts/content', 'modal'); ?>


<script>
    // Новое меню
    window.onload = function() {
        var mobileMenu = document.querySelector('.mobile-menu-btn');
        var sidebarWrap = document.querySelector('.sidebar-wrap');
        var Hbody = document.querySelector('body');

        mobileMenu.addEventListener('click', function() {
            sidebarWrap.classList.toggle('active-sidebar');
            mobileMenu.classList.toggle('mobile-menu-btn--active');
            Hbody.classList.toggle('hidden-o');
        });
    };

    document.addEventListener('DOMContentLoaded', function() {
        var headerBtn = document.querySelector('.header__btn');
        var bookModal = document.getElementById('book-modal');

        headerBtn.addEventListener('click', function() {
            bookModal.style.display = 'block';
        });
    });
</script>

<script type="text/javascript">
    (function(d, w, s) {
        var widgetHash = 'D0DIQ6mSHr21hjRSLHEO',
            bch = d.createElement(s);
        bch.type = 'text/javascript';
        bch.async = true;
        bch.src = '//widgets.binotel.com/chat/widgets/' + widgetHash + '.js';
        var sn = d.getElementsByTagName(s)[0];
        sn.parentNode.insertBefore(bch, sn);
    })(document, window, 'script');


    document.addEventListener('wpcf7submit', function(event) {
        var status = event.detail.status;
        jQuery('.wpcf7-submit').val("Надіслати");
    }, false);

    jQuery('.wpcf7-submit').on('click', function() {
        jQuery(this).val("Триває відправка...");
    });
</script>

<?php wp_footer(); ?>
</body>
</html>