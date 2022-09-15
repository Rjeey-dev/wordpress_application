<?php defined('ABSPATH') OR exit('No direct script access allowed'); get_header(); ?>
    <section class="error-section clouds clouds-top">
        <div class="container">
            <div class="error-block">
                <div class="bg-gradient"></div>
                <div class="box">
                    <h1><?php the_field('404_title', 'option'); ?></h1>
                    <p><?php the_field('404_text', 'option'); ?> <a href="<?php echo get_template_directory_uri(); ?>">главной страницы</a></p>
                </div>
            </div>
        </div>
        <div class="wafe-sprite"></div>
    </section>
<?php get_footer();
