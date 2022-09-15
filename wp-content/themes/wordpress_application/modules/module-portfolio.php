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
        <?php
        $query = [
            'posts_per_page' => 9,
            'post_type' => 'portfolio',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
        ];
        $query = new WP_Query($query);
        if ( $query->have_posts() ) {
            ?>
            <div class="row portfolio-container" data-aos="fade-up">
                <?php
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $post_id = get_the_ID();

                    get_template_part('part', 'portfolio');
                }
                ?>
            </div>
            <?php
        }
        wp_reset_postdata();
        ?>
    </div>
</section>
<?php

