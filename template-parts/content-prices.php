<?php
global $post;
$children = get_pages(array('child_of' => $post->ID));

if (is_page() && $post->post_parent && !count($children) > 0) : ?>
    <div class="d_accordion-component">
        <div class="d_accordion-list">
            <?php
            if (have_rows('prices_table_outer')) :
                while (have_rows('prices_table_outer')) : the_row();
            ?>
                    <div class="d_accordion-item">
                        <div class="d_accordion-btn_clickable active"><?php the_sub_field('prices_table_service_pack_name'); ?></div>
                        <!-- <div class="d_accordion-btn_clickable active"> -->
                        <!-- <div> -->
                        <div class="d_accordion-body" style="display: block;">
                            <?php if (have_rows('prices_table_service_pack')) :
                                while (have_rows('prices_table_service_pack')) : the_row();
                            ?>
                                    <div class="d_price-table">
                                        <div class="d_price-table-item">
                                            <?php if (get_sub_field('prices_table_service_single_date') > date("Ymd")) : ?>
                                                <div class="d_price-table-item-title">
                                                    <p><?php the_sub_field('prices_table_service_single_name'); ?></p>
                                                    <p style="color: #f36060; font-size: 0.8em;">
                                                        <?php if (pll_current_language() == 'uk') {
                                                            echo "Акцiя";
                                                        } else {
                                                            echo "Акция";
                                                        } ?> -<?php the_sub_field('prices_table_service_single_percent'); ?>% до <?php echo date("d.m.Y", strtotime(get_sub_field('prices_table_service_single_date'))) . " ";
                                                                                                                                                                                                                the_sub_field('prices_table_service_single_price_discount_condition'); ?></p>
                                                </div>
                                                <div class="d_price-table-item-price">
                                                    <p style="text-decoration: line-through;"><?php the_sub_field('prices_table_service_single_price'); ?></p>
                                                    <p style="color: #f36060;"><?php the_sub_field('prices_table_service_single_price_discount'); ?></p>
                                                </div>
                                            <?php else : ?>
                                                <div class="d_price-table-item-title">
                                                    <p><?php the_sub_field('prices_table_service_single_name'); ?></p>
                                                </div>
                                                <div class="d_price-table-item-price">
                                                    <p><?php the_sub_field('prices_table_service_single_price'); ?></p>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                            <?php
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>

<?php elseif (is_page() && count($children) > 0) : ?>
    <div class="d_accordion-component">
        <div class="d_accordion-list">
            <?php
            if (have_rows('prices_table_outer')) :
                while (have_rows('prices_table_outer')) : the_row();
            ?>
                    <div class="d_accordion-item">
                        <div class="d_accordion-btn_clickable active"><?php the_sub_field('prices_table_service_pack_name'); ?></div>
                        <div class="d_accordion-body" style="display: block;">
                            <?php if (have_rows('prices_table_service_pack')) :
                                while (have_rows('prices_table_service_pack')) : the_row();
                            ?>
                                    <div class="d_price-table">
                                        <div class="d_price-table-item">
                                            <?php if (get_sub_field('prices_table_service_single_date') > date("Ymd")) : ?>
                                                <div class="d_price-table-item-title">
                                                    <p><?php the_sub_field('prices_table_service_single_name'); ?></p>
                                                    <p style="color: #f36060; font-size: 0.8em;">
                                                        <?php if (pll_current_language() == 'uk') {
                                                            echo "Акцiя";
                                                        } else {
                                                            echo "Акция";
                                                        } ?> -<?php the_sub_field('prices_table_service_single_percent'); ?>% до <?php echo date("d.m.Y", strtotime(get_sub_field('prices_table_service_single_date'))) . " ";
                                                                                                                                                                                                                the_sub_field('prices_table_service_single_price_discount_condition'); ?></p>
                                                </div>
                                                <div class="d_price-table-item-price">
                                                    <p style="text-decoration: line-through;"><?php the_sub_field('prices_table_service_single_price'); ?></p>
                                                    <p style="color: #f36060;"><?php the_sub_field('prices_table_service_single_price_discount'); ?></p>
                                                </div>
                                            <?php else : ?>
                                                <div class="d_price-table-item-title">
                                                    <p><?php the_sub_field('prices_table_service_single_name'); ?></p>
                                                </div>
                                                <div class="d_price-table-item-price">
                                                    <p><?php the_sub_field('prices_table_service_single_price'); ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                            <?php
                                endwhile;
                            endif;
                            ?>
                            <?php
                            foreach ($children as $child) :

                                if (have_rows('prices_table_outer', $child->ID)) : /// loop around children
                                    while (have_rows('prices_table_outer', $child->ID)) : the_row();
                            ?>
                                        <?php if (!get_pages(array('child_of' => $child->ID)) > 0) { ?><h3 class="d_price-table-heading"><?php the_sub_field('prices_table_service_pack_name'); ?></h3> <?php } ?>
                                        <div class="d_price-table">
                                            <?php if (have_rows('prices_table_service_pack', $child->ID)) :
                                                while (have_rows('prices_table_service_pack', $child->ID)) : the_row();
                                            ?>
                                                    <div class="d_price-table-item">
                                                        <?php if (get_sub_field('prices_table_service_single_date') > date("Ymd")) : ?>
                                                            <div class="d_price-table-item-title">
                                                                <p><?php the_sub_field('prices_table_service_single_name'); ?></p>
                                                                <p style="color: #f36060; font-size: 0.8em;">
                                                                    <?php if (pll_current_language() == 'uk') {
                                                                        echo "Акцiя";
                                                                    } else {
                                                                        echo "Акция";
                                                                    } ?> -<?php the_sub_field('prices_table_service_single_percent'); ?>% до <?php echo date("d.m.Y", strtotime(get_sub_field('prices_table_service_single_date'))) . " ";
                                                                                                                                                                                                                            the_sub_field('prices_table_service_single_price_discount_condition'); ?></p>
                                                            </div>
                                                            <div class="d_price-table-item-price">
                                                                <p style="text-decoration: line-through;"><?php the_sub_field('prices_table_service_single_price'); ?></p>
                                                                <p style="color: #f36060;"><?php the_sub_field('prices_table_service_single_price_discount'); ?></p>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="d_price-table-item-title">
                                                                <p><?php the_sub_field('prices_table_service_single_name'); ?></p>
                                                            </div>
                                                            <div class="d_price-table-item-price">
                                                                <p><?php the_sub_field('prices_table_service_single_price'); ?></p>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php
                                                endwhile;
                                            endif;

                                            $sub_children = get_pages(array('child_of' => $child->ID));
                                            if (count($sub_children) > 0) : /// loop around subchildren
                                                foreach ($sub_children as $sub_child) :
                                                    if (have_rows('prices_table_service_pack', $sub_child->ID)) :
                                                        while (have_rows('prices_table_service_pack', $sub_child->ID)) : the_row();
                                                    ?>
                                                            <div class="d_price-table-item">
                                                                <?php if (get_sub_field('prices_table_service_single_date') > date("Ymd")) : ?>
                                                                    <div class="d_price-table-item-title">
                                                                        <p><?php the_sub_field('prices_table_service_single_name'); ?></p>
                                                                        <p style="color: #f36060; font-size: 0.8em;">
                                                                            <?php if (pll_current_language() == 'uk') {
                                                                                echo "Акцiя";
                                                                            } else {
                                                                                echo "Акция";
                                                                            } ?> -<?php the_sub_field('prices_table_service_single_percent'); ?>% до <?php echo date("d.m.Y", strtotime(get_sub_field('prices_table_service_single_date'))) . " ";
                                                                                                                                                                                                                                    the_sub_field('prices_table_service_single_price_discount_condition'); ?></p>
                                                                    </div>
                                                                    <div class="d_price-table-item-price">
                                                                        <p style="text-decoration: line-through;"><?php the_sub_field('prices_table_service_single_price'); ?></p>
                                                                        <p style="color: #f36060;"><?php the_sub_field('prices_table_service_single_price_discount'); ?></p>
                                                                    </div>
                                                                <?php else : ?>
                                                                    <div class="d_price-table-item-title">
                                                                        <p><?php the_sub_field('prices_table_service_single_name'); ?></p>
                                                                    </div>
                                                                    <div class="d_price-table-item-price">
                                                                        <p><?php the_sub_field('prices_table_service_single_price'); ?></p>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                            <?php
                                                        endwhile;
                                                    endif;
                                                endforeach;
                                            endif;
                                            ?>
                                        </div>
                            <?php
                                    endwhile;
                                endif;
                            endforeach;
                            ?>
                        </div>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>

<?php else : ?>
    <div class="d_accordion-component">
        <div class="d_accordion-list">
            <?php
            if (have_rows('prices_table_outer')) :
                while (have_rows('prices_table_outer')) : the_row();
            ?>
                    <div class="d_accordion-item">
                        <div class="d_accordion-btn_clickable active"><?php the_sub_field('prices_table_service_pack_name'); ?></div>
                        <div class="d_accordion-body"  style="display: block;" >
                            <?php if (have_rows('prices_table_service_pack')) :
                                while (have_rows('prices_table_service_pack')) : the_row();
                            ?>
                                    <div class="d_price-table">
                                        <div class="d_price-table-item">
                                            <?php if (get_sub_field('prices_table_service_single_date') > date("Ymd")) : ?>
                                                <div class="d_price-table-item-title">
                                                    <p><?php the_sub_field('prices_table_service_single_name'); ?></p>
                                                    <p style="color: #f36060; font-size: 0.8em;">
                                                        <?php if (pll_current_language() == 'uk') {
                                                            echo "Акцiя";
                                                        } else {
                                                            echo "Акция";
                                                        } ?> -<?php the_sub_field('prices_table_service_single_percent'); ?>% до <?php echo date("d.m.Y", strtotime(get_sub_field('prices_table_service_single_date'))) . " ";
                                                                                                                                                                                                                the_sub_field('prices_table_service_single_price_discount_condition'); ?></p>
                                                </div>
                                                <div class="d_price-table-item-price">
                                                    <p style="text-decoration: line-through;"><?php the_sub_field('prices_table_service_single_price'); ?></p>
                                                    <p style="color: #f36060;"><?php the_sub_field('prices_table_service_single_price_discount'); ?></p>
                                                </div>
                                            <?php else : ?>
                                                <div class="d_price-table-item-title">
                                                    <p><?php the_sub_field('prices_table_service_single_name'); ?></p>
                                                </div>
                                                <div class="d_price-table-item-price">
                                                    <p><?php the_sub_field('prices_table_service_single_price'); ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                            <?php
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>

<?php endif; ?>