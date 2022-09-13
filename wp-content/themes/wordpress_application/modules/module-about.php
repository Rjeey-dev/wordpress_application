<?php
defined('ABSPATH') OR exit('No direct script access allowed');
?>
<section id="about" class="about section-bg">
    <div class="container">
        <div class="row gy-4">
            <div class="image col-xl-5">
            </div>
            <div class="col-xl-7">
                <div class="content d-flex flex-column justify-content-center ps-0 ps-xl-4">
                    <h3 data-aos="fade-in" data-aos-delay="100"><?php the_sub_field('main_text'); ?></h3>
                    <p data-aos="fade-in">
                        <?php the_sub_field('description'); ?>
                    </p>
                    <div class="row gy-4 mt-3">
                        <?php
                        $infografica = get_sub_field('infografika');
                        if ( $infografica ) {
                            foreach ($infografica as $item) {
                                ?>
                                <div class="col-md-6 icon-box" data-aos="fade-up" <?php echo $item['key']; ?>>
                                    <i class="<?php echo $item['icon']; ?>"></i>
                                    <h4><a href="<?php echo $item['link']['url']; ?>"><?php echo $item['link']['title']; ?></a></h4>
                                    <p></p><?php echo $item['text']; ?></p>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
