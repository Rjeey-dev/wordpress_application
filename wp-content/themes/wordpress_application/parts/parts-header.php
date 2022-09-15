<?php
defined('ABSPATH') OR exit('No direct script access allowed');
$page_id = get_the_ID();
$_breadcrumbs = [];
if ( get_opt('page-portfolio') != 0 ) {
    $pagePortfolio = get_opt('page-portfolio');
    $_breadcrumbs []= [get_the_title($pagePortfolio), get_permalink($pagePortfolio)];
}
$_breadcrumbs[] = [get_the_title($page_id), get_permalink($page_id)];

breadcrumbs($_breadcrumbs);
?>
<?php