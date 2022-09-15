<?php
defined('ABSPATH') OR exit('No direct script access allowed');
?>
<section <?php if ( get_sub_field('block_id') ) { echo 'id="'.trim(esc_attr(get_sub_field('block_id'))).'"'; } ?> class="contact section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2><?php the_sub_field('title'); ?></h2>
            <p><?php the_sub_field('description'); ?></p>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="info-box" data-aos="fade-up">
                            <i class="bx bx-map"></i>
                            <?php
                            $address = get_sub_field('address');
                            if ( $address ) {
                                foreach ( $address as $item ) {
                                    ?>
                                    <h3><?php echo $item['title']; ?></h3>
                                    <p><?php echo $item['address']; ?></p>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box mt-4" data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-envelope"></i>
                            <?php
                            $email = get_sub_field('email');
                            if ( $email ) {
                                foreach ( $email as $item ) {
                                    ?>
                                    <h3><?php echo $item['title']; ?></h3>
                                    <a class="email" href="<?php prepare_email_link ($item['email']); ?>"><?php echo $item['email']; ?></a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box mt-4" data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-phone-call"></i>
                            <?php
                            $number = get_sub_field('number');
                            if ( $number ) {
                                foreach ( $number as $item ) {
                                    ?>
                                    <h3><?php echo $item['title']; ?></h3>
                                    <a class="number" href="<?php echo prepare_phone_link( $item['number'] ) ?>"><?php echo $item['number']; ?></a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <form method="post" role="form" class="php-email-form w-100 form js-send-form" id="cfpage-form" data-aos="fade-up">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="cf-name" class="form-control" id="cf-name" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="cf-email" id="cf-email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="cf-phone" id="phone" placeholder="Phone" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="cf-message" id="cf-message" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn js-submit-form-button" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php