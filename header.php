<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, minimumscale=1.0, maximumscale=1.0" />
        <title>Landon Hemsley | Digital Elegance Delivered</title>
        <meta name="description" content="Landon Hemsley online resume and personal blog">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	    
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">

        <?php wp_head(); ?>
    </head>
    <body>
        <div class="wrapper">
	    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <nav class="nav">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-2 text-center">
                    <?php the_custom_logo(); ?>
                    <button class="lmhcustom-nav-toggle btn btn-xs" data-toggle="collapse" data-target="#nav-collapse">
                        <span class="">Show Menu</span>
                    </button>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-10">
                    <h1 class="site-name text-center"><?php bloginfo('name'); ?></h1>
                    <?php 
                        wp_nav_menu( array( 
                            'theme_location' => 'root',
                            'menu_class' => '',
                            'container' => 'div',
                            'container_class' => 'lmhcustom-root-menu-container collapse',
                            'container_id' => 'nav-collapse'
                        )); 
                    ?>
                </div>
            </div>
        </nav>
        <div class="header">
            <h1>Header</h1>
        </div>
