<?php
defined('ABSPATH') OR exit('No direct script access allowed');
get_header();
the_post();

?>
<section id="portfolio-details" class="portfolio-details">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <?php
                        $images = get_field('images');
                        if ( $images ) {
                            ?>
                            <img src="<?php echo $images['url']; ?>" alt="">
                            <?php
                        }
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="portfolio-info">
                    <h3><?php echo $page_h1 = get_the_title();?></h3>
                    <ul>
                        <?php
                        $information = get_field('information');
                        if ( $information ) {
                            foreach ($information as $item) {
                                ?>
                                <li><strong><?php echo $item['category']; ?></strong>:
                                    <?php
                                    if ($item['link'] == true) {
                                        ?>
                                        <a href="<?php echo $item['link']['url']; ?>"><?php echo $item['link']['title']; ?></a>
                                        <?php
                                    } else {
                                        echo $item['info'];
                                    }
                                    ?></li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="portfolio-description">
                    <h2><?php echo $page_h1 = get_the_title();?></h2>
                    <p><?php $description = get_field('description'); echo $description; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php


if ( have_rows('page_builder') ) {
    while ( have_rows('page_builder') ) {
        the_row();

        get_template_part('modules/'.get_row_layout());
    }
}

get_footer();

