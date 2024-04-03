<?php get_header(); ?>

<?php get_template_part('template-parts/content', 'breadcrumbs'); ?>

<div>
    <div class="d_single-info-block">
        <div class="d_single-info-block-data">
            <h1>
                <?php the_title(); ?>
            </h1>
            <p>
                <?php if (has_excerpt()) {
                    the_excerpt();
                } ?>
            </p>
        </div>
        <div class="d_single-info-block-img">
            <?php the_post_thumbnail(); ?>
        </div>
    </div>

    <div class="d_with-sidebar_container">
        <div class="d_with-sidebar_content">
            <div class="d_side-element d_spoiler-content spoiler_mobile">
                <div class="d_spoiler-content-title"><?php pll_e('Содержание статьи'); ?></div>
                <div class="d_spoiler-content-body">
                    <?php echo do_shortcode('[lwptoc]'); ?>
                </div>
                <a class="d_link d_spoiler-show"><?php pll_e('Показать все содержание'); ?></a>
            </div>
            <?php the_content(); ?>
        </div>
        <div class="d_with-sidebar_sidebar inner-in-top">
            <div class="d_side-element d_spoiler-content spoiler_desktop">
                <div class="d_spoiler-content-title"><?php pll_e('Содержание статьи'); ?></div>
                <div class="d_spoiler-content-body">
                    <?php echo do_shortcode('[lwptoc]'); ?>
                </div>
                <a class="d_link d_spoiler-show"><?php pll_e('Показать все содержание'); ?></a>
            </div>
            <div class="d_side-element d_additional-info additional_desktop">
                <div class="d_side-element-text"><?php pll_e('❗️Пожизненная гарантия на все импланты, установленные в D.Ante!'); ?></div>
            </div>
        </div>
    </div>

    <div class="d_inner-component d_question-component">
        <div class="d_question-component-row">
            <div class="d_question-component-col">
                <h2><?php the_title(); ?><br><?php pll_e(': спросите стоматолога'); ?></h2>
                <div class="d_question-component-text">
                    <?php pll_e('Если вы нашли нужной информации в этом материале, задайте свой вопрос — и наши стоматологи ответят на него, администратор перезвонит и озвучит ответ.  Обычно отвечаем в течение 24 часов.'); ?>
                    <br><br>
                    <?php pll_e('И «нет» — ваш вопрос не будет виден другим посетителям сайта.'); ?>
                </div>
            </div>
            <div class="d_question-component-col" style="margin-top: 50px;">
                <?= do_shortcode('[contact-form-7 id="9977" title="Спросите доктора (Услуга)" html_class="d_form"]'); ?>
            </div>
        </div>
    </div>

    <? get_template_part('template-parts/content', 'reviews'); ?>

</div>

<?php get_footer(); ?>