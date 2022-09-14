<?php
defined('ABSPATH') OR exit('No direct script access allowed');
?>
<section id="portfolio" class="portfolio section-bg">
    <div class="container">
        <div class="section-title">
            <h2 data-aos="fade-in"><?php the_sub_field('title'); ?></h2>
            <p data-aos="fade-in"><?php the_sub_field('main_text'); ?></p>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                    <?php
                    $filters = get_sub_field('filters');
                    if ( $filters ) {
                        foreach ($filters as $item) {
                            if ( $item['class'] === true ) {
                                ?>
                                <li data-filter="*" class="<?php echo $item['class']; ?>"><?php echo $item['name']; ?></li>
                                <?php

                            } else {
                                ?>
                                <li data-filter="<?php echo $item['filter_text']; ?>"><?php echo $item['name']; ?></li>
                                <?php
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="row portfolio-container" data-aos="fade-up">
            <?php
            $portfolio = get_sub_field('portfolio');
            if ( $portfolio ) {
                foreach ($portfolio as $item) {
                    ?>
                    <div class="col-lg-4 col-md-6 portfolio-item <?php echo $item['key']; ?>">
                        <div class="portfolio-wrap">
                            <img src="<?php echo $item['image']['url']; ?>" class="img-fluid" alt="">
                            <div class="portfolio-links">
                                <a href="<?php echo $item['main_link']['url']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $item['main_link']['title']; ?>"><i class="bi bi-plus"></i></a>
                                <a href="<?php echo $item['link']['url']; ?>" title="<?php echo $item['link']['title']; ?>"><i class="bi bi-link"></i></a>
                            </div>
                            <div class="portfolio-info">
                                <h4><?php echo $item['portfolio_info'][0]['first_text']; ?></h4>
                                <p><?php echo $item['portfolio_info'][0]['second_text']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<?php
