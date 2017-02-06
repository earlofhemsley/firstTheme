<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, minimumscale=1.0, maximumscale=1.0" />
        <title>Landon Hemsley | Digital Elegance Delivered</title>
        <meta name="description" content="Landon Hemsley online resume and personal blog">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	    
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">

		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<!--
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/styles.css">
		-->
		<script src="js/vendor/modernizr-2.6.2.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="assets/js/main.js" type="text/javascript"></script>
        <script src="assets/js/plugins.js"></script>
    </head>
    <body>
        <div class="wrapper">
	    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <nav class="navbar">
            <div class="container">
                <div class="navbar-header">
                    <!-- The site image and toggle button for mobile devices-->
                    <button class="navbar-toggle collapsed btn btn-xs" data-toggle="collapse" data-target="navbar-collapse">
                        <span class="">Show Menu</span>
                    </button>
                    <a href="<?php echo home_url(); ?>" alt="<?php echo bloginfo('name'); ?>">
                        <?php the_custom_logo(); ?>
                    </a>
                    <span><?php echo bloginfo('name'); ?></span>
                </div>
                <div class="navbar-content" id="navbar-collapse">
                    <?php wp_nav_menu(); ?>
                </div>
            </div>
        </nav>
        <div class="header">
            <h1>Header</h1>
        </div>
