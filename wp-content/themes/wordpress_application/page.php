<?php
defined('ABSPATH') OR exit('No direct script access allowed');
get_header();
the_post();
$page_id =  get_the_ID();

if ( have_rows('page_builder') ) {
    while ( have_rows('page_builder') ) {
        the_row();

        get_template_part('modules/'.get_row_layout());
    }
}

get_footer();
