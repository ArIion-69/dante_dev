<div class="d_main-page-stats-container">
    <div class="d_main-page-stats-info">
        <?php the_excerpt(); ?>
    </div>
    <div class="d_main-page-stats-row">
        <div class="d_main-page-stats-col">
            <div class="d_main-page-stats-img" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/icons/stat-tooth.svg' ?>"></div>
            <div class="d_main-page-stats-title">
                <?php the_field('statistics_teeth_count'); ?>
            </div>
            <p>
                <?php the_field('statistics_teeth_text'); ?>
            </p>
        </div>
        <div class="d_main-page-stats-col">
            <div class="d_main-page-stats-img" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/icons/stat-list.svg' ?>"></div>
            <div class="d_main-page-stats-title">
                <?php the_field('statistics_services_count'); ?>
            </div>
            <p>
                <?php the_field('statistics_services_text'); ?>
            </p>
        </div>
        <div class="d_main-page-stats-col">
            <div class="d_main-page-stats-img" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/icons/stat-dude.svg' ?>"></div>
            <div class="d_main-page-stats-title">
                <?php the_field('statistics_patient_count'); ?>
            </div>
            <p>
                <?php the_field('statistics_patient_text'); ?>
            </p>
        </div>
        <div class="d_main-page-stats-col">
            <div class="d_main-page-stats-img" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/icons/stat-diplom.svg' ?>"></div>
            <div class="d_main-page-stats-title">
                <?php the_field('statistics_year_count'); ?>
            </div>
            <p>
                <?php the_field('statistics_year_text'); ?>
            </p>
        </div>
    </div>
</div>