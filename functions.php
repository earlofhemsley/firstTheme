<?php

if(!isset($content_width)) $content_width = 1200;

function lmhcustom_setup(){
    //add_image_size('root-logo-image', 150, 150);
    
	// Add theme support for Post Formats
	add_theme_support( 'post-formats', array( 'status', 'gallery', 'image', 'aside' ) );

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Add theme support for document Title tag
	add_theme_support( 'title-tag' );

    add_theme_support('custom-logo', array(
        'width'=> 150,
        'height' => 150,
    ));
}
add_action('after_setup_theme', 'lmhcustom_setup');

//enqueue needed styles and scripts
function lmhcustom_scripts_styles(){
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri().'/assets/css/bootstrap-theme.min.css');
    wp_enqueue_style('core',get_stylesheet_uri(), array('bootstrap', 'bootstrap-theme'));


    wp_enqueue_script('jquery-3-1-1','https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js',null,null,true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery-3-1-1'), null, true);
    wp_enqueue_script('modernizr', get_template_directory_uri().'js/vendor/modernizr-2.6.2.min.js', array('jquery-3-1-1'), null, true);
    wp_enqueue_script('main',get_template_directory_uri().'/assets/js/main.js', array('jquery-3-1-1'), null, true);
    wp_enqueue_script('plugins',get_template_directory_uri().'/assets/js/plugins.js', array('jquery-3-1-1'), null, true);
}
add_action('wp_enqueue_scripts','lmhcustom_scripts_styles');

function register_menus(){
    register_nav_menus( array(
        'root' => 'Root Menu'
    ));
}
add_action('init', 'register_menus');


?>

