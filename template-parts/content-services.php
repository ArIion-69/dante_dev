<h2 class="d_h1 d_main-page-heading"><?php pll_e('Услуги стоматологии'); ?></h2>
<?php $i = 0; ?>
<?php if( have_rows('services') ): ?>
<div class="d_tabs-container first-tab-active">

    <div class="d_tabs">
        <?php while( have_rows('services') ): the_row(); 
            $name = get_sub_field('name');
            $i++;
        ?>
        <div class="d_tab <?php if($i == 1) { echo "active"; } ?> " data-index="<?php echo $i ?>"><?php echo $name ?></div>
        <?php endwhile; ?>
    </div>
    <?php $i = 0; ?>
    <div class="d_contents">
        <?php while( have_rows('services') ): the_row(); 
            $name = get_sub_field('name');
            $img = get_sub_field('img');
            $desc = get_sub_field('desc');
            $i++;
        ?>
        <div class="d_content <?php if($i == 1) { echo "active"; } ?>" data-index="<?php echo $i ?>">

            <div class="d_content-flex service-content-flex">
                <div class="service-content-img">
                    <img class="service-content-img-<?php echo $i ?>" src="<?php echo $img ?>"
                        alt="<?php echo $name ?>">
                </div>
                <div class="d_content-body">
                    <h3><?php echo $name ?></h3>
                    <p class="m-t-0"><?php echo $desc ?></p>
                </div>
            </div>

            <div class="d_content-row">
                <div class="d_content-col">
                    <?php 
                        $service = get_sub_field( 'uslugi' );
                        foreach( $service as $item ) {
                            $name = $item['name'];
                            $link = $item['link'];
                            $price = $item['price'];
                    ?>
                    <div class="d_content-link-price">
                        <div class="d_content-link">
                            <a class="d_link" href="<?php echo $link ?>"><?php echo $name ?></a>
                        </div>
                        <div class="d_content-price"><?php echo $price ?></div>
                    </div>
                    <?php } ?>
                </div>
                <div class="d_content-col">
                    <?php 
                        $service = get_sub_field( 'uslugi_two' );
                        foreach( $service as $item ) {
                            $name = $item['name'];
                            $link = $item['link'];
                            $price = $item['price'];
                    ?>
                    <div class="d_content-link-price">
                        <div class="d_content-link">
                            <a class="d_link" href="<?php echo $link ?>"><?php echo $name ?></a>
                        </div>
                        <div class="d_content-price"><?php echo $price ?></div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php endif; ?>