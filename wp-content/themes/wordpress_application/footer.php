<?php defined('ABSPATH') OR exit('No direct script access allowed'); ?>
</main>
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row  justify-content-center">
                <div class="col-lg-6">
                    <h3><?php the_field('main_title', 'options'); ?></h3>
                    <p><?php the_field('description_footer', 'options'); ?></p>
                </div>
            </div>
            <div class="row footer-newsletter justify-content-center">
                <div class="col-lg-6">
                    <form action="" method="post">
                        <input type="email" name="email" placeholder="Enter your Email"><input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
            <div class="social-links">
                <?php
                $infografica = get_field('social_links','option');
                if ( $infografica ) {
                    foreach ($infografica as $item) {
                        ?>
                        <a href="<?php echo $item['link']; ?>" class="<?php echo $item['сlass']; ?>"><i class="<?php echo $item['icon_class']; ?>"></i></a>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</body>
</html>
