<?php
defined('ABSPATH') OR exit('No direct script access allowed');
?>
<section id="team" class="team section-bg">
  <div class="container">
    <div class="section-title">
      <h2 data-aos="fade-in"><?php the_sub_field('title'); ?></h2>
      <p data-aos="fade-in"><?php the_sub_field('main_text'); ?></p>
    </div>
    <div class="row">
        <?php
        $team = get_sub_field('team');
        if ( $team ) {
            foreach ($team as $item) {
                ?>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="member" data-aos="fade-up">
                        <div class="pic">
                            <img src="<?php echo $item['images']['url']; ?>" alt="">
                        </div>
                        <h4><?php echo $item['title']; ?></h4>
                        <span><?php echo $item['text']; ?></span>
                        <div class="social">
                        <?php
                        foreach ($item['social'] as $items) {
                            ?>
                            <a href="<?php echo $items['link']; ?>"><i class="<?php echo $items['class']; ?>"></i></a>
                            <?php
                            }
                        ?>
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