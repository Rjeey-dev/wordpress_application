<?php
defined('ABSPATH') OR exit('No direct script access allowed');
?>
<section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2><?php the_sub_field('title'); ?></h2>
            <p><?php the_sub_field('description'); ?></p>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <?php
                    $contact = get_sub_field('contact');
                    if ( $contact ) {
                        foreach ($contact as $item) {
                            ?>
                            <div class="col-md-<?php echo $item['class']; ?>">
                                <div class="info-box <?php echo $item['div_class']; ?>" data-aos="fade-up">
                                    <i class="<?php echo $item['icon_class']; ?>"></i>
                                    <h3><?php echo $item['title']; ?></h3>
                                    <p><?php echo $item['description']; ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
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