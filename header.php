<html>
<head>
<title>Landon Hemsley</title>
</head>
<body>
<div id="wrapper">
<div id="header">
<h1>HEADER</h1>
</div>



<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
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
		<!-- <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script> -->
		<script src="js/plugins.js"></script>
		<script src="js/main.js"></script>
		<script type="text/javascript">
		var loadTrigger = function(screenWidth){
			$('#equi').off();
			$('a.resume').off();

			if(screenWidth >= 600){	
				$('a.resume').on('click',function(e){
					e.preventDefault();
					//load pinwheel into modal content
					$('#modal-content').html('<div style="width:25px;margin:auto;"><img src="resume/twirl.gif" style="width:100%" /></div>');
					//make modal appear
					var filename = '/resume/index.php?modal=true&co=' + $(this).attr('id');
					$('.modal').fadeIn(555, function(){
						$('#modal-content').load(filename, function(){
							resize();
							$('body').addClass('modal-open');
							$('#equi').on('click',function(){
								$('.modal').fadeOut(400);
								$('body').removeClass('modal-open');
							});
						});
						
					});
					//load content from other file
					
					//enable closure triggers - already enabled
				
				});
			}
		}
		   
		var resize = function(){
			var heights = window.innerHeight;
			//document.getElementById("banner").style.height = heights + "px";
			//document.getElementById("blog").style.height = heights + "px";
			var sections = document.getElementsByClassName("section");
			for(var i=0; i<sections.length; i++){
				sections[i].style.height = heights + "px";
				
			}
			document.getElementById("leadbox").style.top = (0.25 * heights) + "px";

			/*var modalWidth = document.getElementById("modal-content").offsetWidth;
			document.getElementById("modal-content").style.marginLeft = '-' + (0.5 * modalWidth) + "px";
			var modalHeight = document.getElementById("modal-content").offsetHeight;
			document.getElementById("modal-content").style.marginTop = '-' + (0.5 * modalHeight) + "px";
			*/
		}
	</script>
    </head>
    <body>
	<div class="modal" id="shadow"></div>
	<div class="modal" id="backdrop"><div id="modal-content"><div style="width:25px;margin:auto;"><img src="resume/twirl.gif" style="width:100%" /></div></div></div>
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	ga('create', 'UA-63446615-1', 'auto');
	ga('send', 'pageview');
	
	</script>
        <div class="body">
	    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->