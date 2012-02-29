<?php
	
	$siteTitle		= get_bloginfo('site-title');
	$description 	= get_bloginfo('description');
	$root			= get_bloginfo('template_url');
	$titleSeperator	= ' - ';

?><!doctype html>
<!--[if lt IE 7]>	<html class="no-js ie lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="en" dir="ltr">	<![endif]-->
<!--[if IE 7]>		<html class="no-js ie lt-ie10 lt-ie9 lt-ie8" lang="en" dir="ltr">			<![endif]-->
<!--[if IE 8]>		<html class="no-js ie lt-ie10 lt-ie9" lang="en" dir="ltr">					<![endif]-->
<!--[if IE 9]>		<html class="no-js ie lt-ie10" lang="en" dir="ltr">							<![endif]-->
<!--[if gt IE 9]>
	<!-->			<html class="no-js" lang="en" dir="ltr">								<!--<![endif]-->
<head>

	<link rel="dns-prefetch" href="//ajax.googleapis.com" />
	
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php 

		// Build the title of the page

		if (is_home()) {

			// Home page
			echo $siteTitle;
			echo $titleSeperator;
			echo $description;

		} elseif (is_single()) {

			// Post or page
			the_title();
			echo $titleSeperator;
			echo $siteTitle;

		}
	
	?></title>
	<meta name="description" content="<?php

		// Decide what sort of description should be pulled
		
		if (is_home()) {

			// Home page
			bloginfo('description');

		} elseif (is_single()) {

			// Post or page
			global $post;
			echo substr($post->post_content, 0, 255).'...';

		}

	?>" />
	<link rel="author" type="text/plain" href="<?php echo $root; ?>/humans.txt" />

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!--[if ! lte IE 6]><!-->
		<link rel="stylesheet" media="screen, projection" href="<?php echo $root; ?>/style/css/main.css" />
		<link rel="stylesheet" media="print" href="<?php echo $root; ?>/style/css/basic.css" />
	<!--<![endif]-->

	<!--[if lte IE 6]>
		<link rel="stylesheet" href="style/css/basic.css" />
	<![endif]-->

	<script>
		// to called console.log in ~script/lib/function.js
		var jsDebugging = true; 
	</script>

</head>
<body <?php body_class(); ?>>


	<header role="banner" id="site-header">
		<hgroup>
			<h1><?php bloginfo('site-title'); ?></h1>
			<h2><?php bloginfo('description'); ?></h2>
		</hgroup>
		<nav role="navigation">
		</nav>
	</header>