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

function lmhcustom_customizer_setup($wp_customize){
    /*
        Have a "front page" section that allows for up to five pages to be set
        The page title appears on the home page menu at the bottom
        The page excerpt and content appears in the lower sections of the home page
        The standard loop appears at the bottom 
        Settings: front page parts 1-5
        Controls: front page parts 1-5
        Sections: Front page customization 
     */ 
    
    $wp_customize->add_section('home_page_sections', array(
        'title'         =>      "Front page customization",
        'description'   =>      "Set the pages you want to appear on the home page. Leave blank for no page to be assigned",
        'priority'      =>      30,
    ));
    
    for($i = 1; $i<=5; $i++){
        $wp_customize->add_setting('front_page_'.$i);
        $wp_customize->add_control('front_page_'.$i, array(
            'manager'       =>      $wp_customize,
            'type'          =>      'dropdown-pages',
            'description'   =>      "Section $i:", 
            'id'            =>      'front_page_'.$i,
            'section'       =>      'home_page_sections',
            'priority'      =>      $i,
        ));
        $wp_customize->add_setting('front_page_widget_enable_'.$i);
        $wp_customize->add_control('front_page_widget_enable_'.$i, array(
            'label'         =>      "Enable Section $i widget area",
            'description'   =>      "If enabled, a widget area will appear within Section $i",
            'section'       =>      'home_page_sections',
            'priority'      =>      $i,
            'type'          =>      'checkbox',
        ));
        //TODO: Checkbox to enable widget areas, by section...
    }

    //social media settings that puts links / images in specific places in the theme

    //TODO: figure out how to dynamically add a new home page section beyond these five.
}
add_action('customize_register','lmhcustom_customizer_setup');

function lmhcustom_widget_setup(){
    for($i = 1; $i <= 5; $i++){
        if(get_theme_mod('front_page_widget_enable_'.$i)){
            register_sidebar( array( 
                'name' => 'Front Page Widget Area for Section '.$i,
                'id' => 'front-page-widget-'.$i,
                'description' => 'This widget area corresponds with front page section '.$i,
                'before_widget' => '<div>',
                'after_widget' => '</div>',
            ));
        }
    }
}
add_action('widgets_init', 'lmhcustom_widget_setup');

function get_home_section_query(){
    for($i = 1; $i<=5; $i++){
        $ids[] = get_theme_mod("front_page_$i");
    }
    $query = new WP_Query(array(
        'post_type' => 'page',
        'post__in' => $ids,
        'orderby' => 'post__in',
    ));
    return $query;
}


//enqueue needed styles and scripts
function lmhcustom_scripts_styles(){
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri().'/assets/css/bootstrap-theme.min.css');
    wp_enqueue_style('core',get_stylesheet_uri(), array('bootstrap', 'bootstrap-theme'));


    wp_enqueue_script('jquery-3-1-1','https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js',null,null,true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery-3-1-1'), null, true);
    wp_enqueue_script('modernizr', get_template_directory_uri().'/assets/js/vendor/modernizr-2.6.2.min.js', array('jquery-3-1-1'), null, true);
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

