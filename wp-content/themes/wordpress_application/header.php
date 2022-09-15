<?php defined('ABSPATH') OR exit('No direct script access allowed'); global $current_term; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Bocor Bootstrap Template - Index</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <?php wp_head(); ?>
    </head>
    <body>
<?php
if ( is_front_page() ) {
    ?>
    <header id="header">
        <div class="container d-flex align-items-center justify-content-between">
            <?php
            $websiteLogo = get_field('logo', 'option');
            if ( is_front_page() ) {
                if ( !empty ( $websiteLogo )):
                    ?>
                    <div class="logo">
                        <h1><a href="<?php echo $websiteLogo['url']; ?>"><?php echo $websiteLogo['title']; ?></a></h1>
                    </div>
                <?php
                endif;
            }
            ?>
            <nav id="navbar" class="navbar">
                <ul>
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'items_wrap' => '%3$s', 'container' => '', 'walker' => new MainNavMenu)); ?>
                    <li>
                    <?php
                    $button_get_started = get_field('button_get_started', 'options');
                    if ( $button_get_started ) {
                        ?>
                        <a class="getstarted scrollto" href="<?php echo $button_get_started['url']; ?>" <?php if ( $button_get_started['target'] != '' ) echo 'target="_blank"'; ?>><?php echo $button_get_started['title']; ?></a>
                        <?php
                    }
                    ?>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <section id="hero">
        <div class="container">
            <div class="row d-flex align-items-center"">
            <div class=" col-lg-6 py-5 py-lg-0 order-2 order-lg-1" data-aos="fade-right">
                <h1><?php the_field('main_text', 'options'); ?></h1>
                <h2><?php the_field('description', 'options'); ?></h2>
                <?php
                $button_get_started = get_field('button_get_started', 'options');
                if ( $button_get_started ) {
                    ?>
                    <a class="btn-get-started scrollto" href="<?php echo $button_get_started['url']; ?>" <?php if ( $button_get_started['target'] != '' ) echo 'target="_blank"'; ?>><?php echo $button_get_started['title']; ?></a>
                    <?php
                }
                ?>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                <?php
                $image = get_field('main_image','option');
                if( !empty( $image ) ) {
                    ?>
                    <img class="img-fluid" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php
                }
                ?>
            </div>
        </div>
        </div>
    </section>
    <?php
}
else if (( ! is_404() )) {

    if (!is_front_page()) {
        $_breadcrumbs = [];

        if (get_post_type() == 'projects' && get_opt('module-portfolio')) {
            $_breadcrumbs[] = [get_the_title(get_opt('module-portfolio')), get_permalink(get_opt('module-portfolio'))];
        }

        breadcrumbs($_breadcrumbs);
    }

    get_template_part('parts/parts', 'header');
}
?>
    <main id="main">
<?php
