<?php


//enqueue needed styles and scripts
function lmhcustom_scripts_styles(){
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap-min.css');
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri().'/assets/css/bootstrap-theme.min.css');
    wp_enqueue_style('core',get_stylesheet_uri(), array('bootstrap', 'bootstrap-theme'));


    wp_enqueue_script('jquery-3-1-1','https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery-3-1-1'));
    wp_enqueue_script('modernizr', get_template_directory_uri().'js/vendor/modernizr-2.6.2.min.js', array('jquery-3-1-1'));
    wp_enqueue_script('main',get_template_directory_uri().'/assets/js/main.js', array('jquery-3-1-1'));
    wp_enqueue_script('plugins',get_template_directory_uri().'/assets/js/plugins.js', array('jquery-3-1-1'));
}
add_action('wp_enqueue_scripts','lmhcustom_scripts_styles');

function register_menus(){
    register_nav_menus( array(
        'root' => 'Root Menu'
    ));
}
add_action('init', 'register_menus');

function lmhcustom_setup(){
    add_image_size('root-logo-image', 150, 150);
    add_theme_support('custom-logo', array(
        'size' => 'root-logo-image'
    ));
}
add_action('after_setup_theme', 'lmhcustom_setup');

?>

