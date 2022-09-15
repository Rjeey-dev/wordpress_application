<?php
defined('ABSPATH') OR exit('No direct script access allowed');
?>
<section id="faq" class="faq section-bg">
    <div class="container">
        <div class="section-title">
            <h2 data-aos="fade-in"><?php the_sub_field('title'); ?></h2>
            <p data-aos="fade-in"><?php the_sub_field('main_text'); ?></p>
        </div>
        <?php
        $faq = get_sub_field('faq');
        if ( $faq ) {
            foreach ($faq as $item) {
                ?>
                <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up">
                    <div class="col-lg-5">
                        <i class="bx bx-help-circle"></i>
                        <h4><?php echo $item['text']; ?></h4>
                    </div>
                    <div class="col-lg-7">
                        <p><?php echo $item['description']; ?></p>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</section>
<?php