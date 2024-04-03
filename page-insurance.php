<?php

/*
Template Name: insurance-page
*/

get_header(); ?>

<?php get_template_part('template-parts/content', 'breadcrumbs'); ?>

<div>
    <div class="d_single-info-block insurance-header-padding">
        <div class="d_single-info-block-data insurance-header-center">
            <div class="insurance-header">
                <?php the_post_thumbnail('full', ['alt' => esc_html(get_the_title())]); ?>
                <h1 class="insurance-header-title">
                    <?php the_title(); ?>
                </h1>
                <span class="insurance-header-desc"><?php the_field('title'); ?></span>
            </div>


        </div>
    </div>

    <div class="insurance-page">

        <div class="insurance-company-list">
            <?php
            // Получите значения поля ACF "insurance_gallery"
            $insurance_gallery = get_field('insurance_gallery');

            // Проверьте, есть ли изображения в галерее
            if ($insurance_gallery) {
                // Цикл по изображениям в галерее
                foreach ($insurance_gallery as $image) {
            ?>
                    <div class="insurance-company-item">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </div>
            <?php
                }
            }
            ?>
        </div>


        <div class="insurance-text">
            <?php the_content(); ?>
        </div>


        <div class="insurance-block">
            <?php if (pll_current_language() == 'uk') : ?>
                <div class="insurance-block-item">
                    <h3 class="insurance-block-item-title">Якщо страхова компанія <br><span>є в списку </span>партнерів <br>
                        D.Ante</h3>
                    <ol class="insurance-block-item-list">
                        <li>Зателефонуйте в страхову компанію, назвіть деталі свого полісу і попросіть записати вас в клініку D.Ante; узгодьте дату та час.</li>
                    </ol>
                    <p><span class="insurance-block-item-list-hr">або</span></p>
                    <ol class="insurance-block-item-list">
                        <li>Зателефонуйте в D.Ante, щоб узгодити час і дату візиту, а після зв’яжіться зі страховою.</li>
                        <li>Під час відвідування клініки візьміть з собою документ, що підтверджує особу та оригінал страхового поліса.</li>
                    </ol>
                    <div class="insurance-block-btn">
                        <button class="book-button d_primary-button static">Запишіться на прийом</button>
                    </div>
                </div>

                <div class="insurance-block-item">
                    <h3 class="insurance-block-item-title">Якщо страхової компанії <span>немає</span> в списку партнерів <br>
                        D.Ante</h3>
                    <p>Але ви маєте покриття необхідного стоматологічного лікування в страховому полісі.</p>
                    <ol class="insurance-block-item-list">
                        <li>Запишіться на прийом до нас в клініку. Під час запису повідомте про поліс страхової компанії, якої немає в списку.</li>
                        <li>Ми підготуємо всі необхідні для отримання компенсації документи, з якими ви зможете звернутися в страхову і отримати відшкодування витрат.</li>
                    </ol>
                    <div class="insurance-block-btn">
                        <button class="book-button d_primary-button static margin-fix-uk">Запишіться на прийом</button>
                    </div>
                </div>
            <?php else : ?>
                <div class="insurance-block-item">
                    <h3 class="insurance-block-item-title">Если страховая компания <span>есть</span> в списке партнеров <br>
                        D.Ante</h3>
                    <ol class="insurance-block-item-list">
                        <li>Позвоните в страховую компанию, озвучьте проблему и попросите записать вас в клинику D.Ante;
                            согласуйте дату и время.</li>
                    </ol>
                    <p><span class="insurance-block-item-list-hr">или</span></p>
                    <ol class="insurance-block-item-list">
                        <li>Позвоните в D.Ante, чтобы согласовать время и дату визита, а после свяжитесь со страховой.</li>
                        <li>Во время посещения клиники возьмите с собой документ, подтверждающий личность и оригинал
                            страхового полиса.</li>
                    </ol>
                    <div class="insurance-block-btn">
                        <button class="book-button d_primary-button static">Запишитесь на прием</button>
                    </div>
                </div>

                <div class="insurance-block-item">
                    <h3 class="insurance-block-item-title">Если страховой компании <span>нет</span> в списке партнеров <br>
                        D.Ante</h3>
                    <p>Но при этом у вас в страховом полисе есть покрытие необходимого стоматологического лечения.</p>
                    <ol class="insurance-block-item-list">
                        <li>Запишитесь на прием к нам в стоматологию. Озвучьте, что у вас есть полис страховой компании,
                            которой нет в списке.</li>
                        <li>Мы подготовим все необходимые для получения компенсации документы, с которыми вы сможете
                            обратиться в страховую и получить возмещение расходов.</li>
                    </ol>
                    <div class="insurance-block-btn">
                        <button class="book-button d_primary-button static margin-fix-ru">Запишитесь на прием</button>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="insurance-desc">
            <?php the_field('insurance_notice'); ?>
        </div>
        <div class="insurance-notice">
            <?php the_field('insurance_important'); ?>
        </div>
    </div>

</div>


<?php get_footer(); ?>