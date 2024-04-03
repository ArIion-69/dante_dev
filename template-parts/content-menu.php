<div class="d_header-tablet-menu-overlay">
    <div class="d_header-tablet-menu-container">
        <div class="d_header-tablet-menu-wrapper">
            <?php bem_menu('main', 'tablet-menu') ?>
        </div>

        <div class="d_header-tablet-menu-bottom">
            <div class="d_header-tablet-menu-bottom-flex">
                <div class="d_header-tablet-menu-bottom-col blue">
                    <strong><?php pll_e('Стоматологическая клиника D.Ante.'); ?></strong><br> <?php pll_e('Лучшая версия твоей улыбки'); ?>

                </div>
                <div class="d_header-tablet-menu-bottom-col">
                    <strong><?php pll_e('Режим работы клиники:'); ?></strong><?php pll_e('<br>Пон-Сб: с 9:00 до 21:00<br> Вс: с 9:00 до 15:00<br>'); ?>

                </div>
                <div class="d_header-tablet-menu-bottom-col">
                    <strong><?php pll_e('Контактные телефоны:'); ?></strong><br>
                    <a aria-label="+38 068 287 77 07" href="tel:+380682877707">+38 068 287 77 07</a><br>
                    <a aria-label="+38 044 287 77 07" href="tel:+380442877707">+38 044 287 77 07</a><br>
                </div>
                <div class="d_header-tablet-menu-bottom-col">
                    <?php pll_e('<strong>Адрес:</strong><br> Киев, ул. Антоновича 47<br> метро «Олимпийская»<br>'); ?>

                </div>
                <div class="d_header-tablet-menu-bottom-col">
                    <strong><?php pll_e('Социальные сети:'); ?></strong><br>
                    <a aria-label="Facebook" href="https://www.facebook.com/DentistAnte/" target="_blank">Facebook</a><br>
                    <a aria-label="Instagram" href="https://www.instagram.com/dentistante/" target="_blank">Instagram</a><br>
                </div>
                <div class="d_header-tablet-menu-bottom-col" style="padding-left:0;">
                    <strong><?php pll_e('Изменить язык сайта:'); ?></strong><br>
                    <ul><?php pll_the_languages(); ?></ul>
                </div>
            </div>

        </div>

    </div>
</div>


<div class="main-menu">
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
</div>


<div class="d_header-bottom">

    <a aria-label="+380682877707" href="tel:+380682877707" class="d_header-bottom-phones">
        <div class="dropdown-container" id="headerPhone" data-role="container">
            <div class="dropdown-button" data-role="button"></div>
        </div>
    </a>




    <div class="d_header-bottom-phones d_header-bottom-phones--desctop">
        <div class="dropdown-container" id="headerPhone" data-role="container">
            <div class="dropdown-button" data-role="button"></div>
            <div class="dropdown-body" data-role="body" onclick="showAllPhones()">
                <div class="d_header-bottom-phone">
                    <div class="d_header-bottom-phone-hidden">+38 (068) ХХХ-ХХ-ХХ</div>
                    <a href="tel:+380682877707" class="d_header-bottom-phone-real">+38 (068) 287-77-07</a>
                    <div class="d_header-bottom-phones-show"><span><?php pll_e('Показать номер'); ?></span></div>
                </div>

                <div class="d_header-bottom-phone">
                    <div class="d_header-bottom-phone-hidden">+38 (044) ХХХ-ХХ-ХХ</div>
                    <a href="tel:+380442877707" class="d_header-bottom-phone-real">+38 (044) 287-77-07</a>
                    <div class="d_header-bottom-phones-show"><span><?php pll_e('Показать номер'); ?></span></div>
                </div>
                <div class="d_header-bottom-phones-show-all"><span id="showAllPhones"><?php pll_e('Показать номера'); ?></span></div>
            </div>
        </div>
    </div>
    <script>
        function showAllPhones() {
            document.getElementById("showAllPhones").click();
        }
    </script>
    <button class="w202 book-button d_primary-button d_reception-button"><?php pll_e('Запись на прием'); ?></button>
    <div class="d_header-bottom-info">
        <div class="switch-box-container">
            <div class="switch-box-title"><?php pll_e('Язык сайта'); ?></div>
            <div class="switch-box">
                <?php if (pll_current_language() == 'uk') : ?>
                    <input id="lang" class="switch-box-input" type="checkbox" checked onclick="translate_ru()" />
                    <label for="lang" class="switch-box-slider"></label>
                    <span class="d_lang ru">RU</span>
                    <span class="d_lang ua">UA</span>
                    <script>
                        function translate_ru() {
                            window.location = '<?= pll_the_languages(array('raw' => 1))['ru']['url']; ?>';
                        }
                    </script>
                <?php else : ?>
                    <input id="lang" class="switch-box-input" type="checkbox" onclick="translate_uk()" />
                    <label for="lang" class="switch-box-slider"></label>
                    <span class="d_lang ru">RU</span>
                    <span class="d_lang ua">UA</span>

                    <script>
                        function translate_uk() {
                            window.location = '<?= pll_the_languages(array('raw' => 1))['uk']['url']; ?>';
                        }
                    </script>

                <?php endif; ?>
            </div>

        </div>
        <?php echo do_shortcode('[reviews_rating theme="light center tiny fonts" icon="false" name="false" vicinity="false" animate="false" count="false" review_word="Рейтинг клиники в Google" color_scheme="mustard"]'); ?>
        <div class="d_header-bottom-rating">
            <div class="d_header-bottom-rating-logo"></div>
            <div class="d_header-bottom-rating-text"><?php pll_e('Рейтинг клиники в Google'); ?></div>
            <div class="d_header-bottom-rating-stars">
                <script>
                    document.write(document.querySelector(".number").innerHTML)
                </script>&nbsp;
                <i class="icon icon-star"></i>
                <i class="icon icon-star"></i>
                <i class="icon icon-star"></i>
                <i class="icon icon-star"></i>
                <i class="icon icon-star"></i>
            </div>
        </div>
    </div>
</div>