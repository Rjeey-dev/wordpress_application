<?php
defined('ABSPATH') OR exit('No direct script access allowed');
?>
<?php
$query = [
    'posts_per_page' => 10,
    'post_type' => 'faq',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => souvel_paged(),
];
$query = new WP_Query($query);
if ( $query->have_posts() ) {
    ?>
    <section id="faq" class="faq section-bg">
        <div class="container">
            <div class="section-title">
                <h2 data-aos="fade-in"><?php the_sub_field('title'); ?></h2>
                <p data-aos="fade-in"><?php the_sub_field('main_text'); ?></p>
            </div>
            <?php
            while ( $query->have_posts() ) {
                $query->the_post();
                $post_id = get_the_ID();
                    ?>
                    <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up">
                        <div class="col-lg-5">
                            <i class="bx bx-help-circle"></i>
                            <h4><?php $titleQua = get_field('title'); echo $titleQua ?></h4>
                        </div>
                        <div class="col-lg-7">
                            <p><?php $descriptionQua = get_field('description'); echo $descriptionQua ?></p>
                        </div>
                    </div>
                    <?php
            }
}
?>
        </div>
    </section>
<?php