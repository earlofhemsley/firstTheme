<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width" />
        <!-- TODO: DYNAMIC TITLING -->
        <title>Landon Hemsley | Digital Elegance Delivered</title>
        <meta name="description" content="Landon Hemsley online resume and personal blog">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	    
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">

        <?php wp_head(); ?>
    </head>
    <body>
    <div class="" id="wrapper"  <?php if(is_front_page()){echo "style='display:none;'";} ?>>
	    <!--[if lt IE 7]>
            <p class="text-center text-warning">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
            <!-- <?php echo get_option('page_for_posts'); ?> --> 
            <?php if(is_front_page())
                {
                    get_template_part("template-parts/header/home", "header");
                } 
                else
                {
                    get_template_part("template-parts/header/site", "header");
                }

            ?>
