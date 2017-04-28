<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">

	  <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Open+Sans:300,400,600,700,800" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:200,300,400,600,700,900" rel="stylesheet">

	  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">
	  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/flex.css">
	  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
	  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/carousel.css">

	  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	  <script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js" type="text/javascript"></script>

	  <?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div class="banner">
	        <a href="#">
	            <img src="<?php echo get_template_directory_uri(); ?>/img/miejsce_na_banner.jpg" alt="Miejsce na banner" />
	        </a>
	    </div>
	    <header class="container px-0">
	        <div class="top_bar">
	            <div class="logo">
	                <?php the_custom_logo(); ?><a href="#">
	                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo">
	                </a>
	            </div>
	            <div class="navigation">
	                <nav>
	                    <ul>
							<?php
								wp_nav_menu(array(
									'menu' => 'Header Menu'
								));
							?>
	                    </ul>
	                </nav>
	                <div class="social">
	                    <ul>
	                        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="Facebook"></a></li>
	                        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/instagram.png" alt="Instagram"></a></li>
	                        <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="Twitter"></a></li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </header>
