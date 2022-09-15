<?php
defined('ABSPATH') OR exit('No direct script access allowed');
?>
<section <?php if ( get_sub_field('block_id') ) { echo 'id="'.trim(esc_attr(get_sub_field('block_id'))).'"'; } ?> class="clients section-bg">
    <div class="container">
        <div class="row no-gutters clients-wrap clearfix wow fadeInUp">
            <?php
            $infografica = get_sub_field('clients');
                if ( $infografica ) {
                    foreach ( $infografica as $item ) {
                        ?>
                        <div class="col-lg-2 col-md-4 col-6">
                            <div class="client-logo">
                                <img src="<?php echo $item['image']; ?>" class="img-fluid" alt="" data-aos="flip-right" <?php echo $item['key']; ?>>
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
