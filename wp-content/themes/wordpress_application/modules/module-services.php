<?php
defined('ABSPATH') OR exit('No direct script access allowed');
?>
<section <?php if ( get_sub_field('block_id') ) { echo 'id="'.trim(esc_attr(get_sub_field('block_id'))).'"'; } ?> class="services section-bg">
    <div class="container">
        <div class="section-title">
            <h2 data-aos="fade-in"><?php the_sub_field('title'); ?></h2>
            <p data-aos="fade-in"><?php the_sub_field('description'); ?></p>
        </div>
        <div class="row">
            <?php
            $infografica = get_sub_field('services');
            if ( $infografica ) {
                foreach ( $infografica as $item ) {
                    ?>
                    <div class="col-md-6 d-flex" data-aos="fade-right">
                        <div class="card">
                            <div class="card-img">
                                <img src="<?php echo $item['image']['url']; ?>" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="<?php echo $item['link']['url']; ?>"><?php echo $item['title']['title']; ?></a></h5>
                                <p class="card-text"><?php echo $item['text']; ?></p>
                                <div class="read-more">
                                    <a href="<?php echo $item['link']['url']; ?>"><i class="bi bi-arrow-right"></i><?php echo $item['link']['title']; ?></a>
                                </div>
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