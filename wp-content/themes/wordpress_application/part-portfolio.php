<?php defined('ABSPATH') OR exit('No direct script access allowed');
$post_id = get_the_ID();
?>
<div class="col-lg-4 col-md-6 portfolio-item <?php $key = get_field('key'); echo $key ?>">
    <div class="portfolio-wrap">
        <?php
        $attr = 'img-fluid';
        $size = ['516','387'];
        $image = get_the_post_thumbnail($post_id,$size,$attr);
        if ( $image ) {
            echo $image;
        }
        ?>
        <div class="portfolio-links">
            <a href="<?php echo get_permalink(); ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title=""><i class="bi bi-plus"></i></a>
            <a href="<?php echo get_permalink(); ?>" title=""><i class="bi bi-link"></i></a>
        </div>
        <div class="portfolio-info">
            <h4><?php $portfolioInfoOne = get_field('portfolio_info_one'); echo $portfolioInfoOne ?></h4>
            <p><?php $portfolioInfoTwo = get_field('portfolio_info_two'); echo $portfolioInfoTwo ?></p>
        </div>
    </div>
</div>
<?php
