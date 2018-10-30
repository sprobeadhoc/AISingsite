<?php
require_once('wp_bootstrap_navwalker.php');

function register_header_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_header_menu' );

function AISing_enqueue_style() {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '', 'all');
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'AISing_enqueue_style' );

function CustomStyle_enqueue()
{
    wp_enqueue_style('customstyle', get_template_directory_uri(). '/css/style.css', array(), '','all');
}
add_action( 'wp_enqueue_scripts', 'CustomStyle_enqueue' );



function bootstrap_nav()
{
    wp_nav_menu( array(
        'theme_location'    => 'header-menu',
        'depth'             => 2,
        'container'         => 'false',
        'menu_class'        => 'nav navbar-nav',
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new wp_bootstrap_navwalker())
    ); 
}


?>