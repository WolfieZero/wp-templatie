<?php

$siteTitle		= get_bloginfo('site-title');
$description 	= get_bloginfo('description');
$root			= get_bloginfo('template_url');
$titleSeperator	= ' - ';

?><!doctype html>
<!--[if lt IE 7]>	<html class="no-js ie lt-ie10 lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>>	<![endif]-->
<!--[if IE 7]>		<html class="no-js ie lt-ie10 lt-ie9 lt-ie8" <?php language_attributes(); ?>>			<![endif]-->
<!--[if IE 8]>		<html class="no-js ie lt-ie10 lt-ie9" <?php language_attributes(); ?>>					<![endif]-->
<!--[if IE 9]>		<html class="no-js ie lt-ie10" <?php language_attributes(); ?>>							<![endif]-->
<!--[if gt IE 9]>
	<!-->			<html class="no-js" lang="en" dir="ltr">												<!--<![endif]-->
<head>

	<link rel="dns-prefetch" href="//ajax.googleapis.com" />
	
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php 

		// Build the title of the page

		if (is_home() || is_front_page()) {

			// Home page
			echo $siteTitle;

		} elseif (is_single() || is_page()) {

			// Post or page
			single_post_title();
			echo $titleSeperator;
			echo $siteTitle;

		} elseif (is_search()) {

			// Search results page
			echo 'Results for '.wp_specialchars($s);
			pageNumber();
			echo $titleSeperator;
			echo $siteTitle;

		} elseif (is_404()) {

			// 404 Page
			echo 'Page not found';
			echo $titleSeperator;
			echo $siteTitle;

		} else {

			// Everything else
			echo $siteTitle;
			wp_title(trim($titleSeperator)); 
			pageNumber();

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

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>


	<header role="banner" id="site-header">
		<hgroup>
			<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('site-title'); ?></a></h1>
			<h2><?php bloginfo('description'); ?></h2>
		</hgroup>
		<nav role="navigation">
			<?php
				global $themeArgs;
	
				$argsMenu = array_merge($themeArgs['navigation'], array(
					'menu'				=> 'Site Nav',
					'theme_location'	=> 'header',
				));

				$menu = wp_nav_menu($argsMenu);

				if (CACHE_NAV) {
					// if we are caching then we want to remove relative class names to save
					// confusion or errors when styling content
					$menu = str_replace(' current_page_item', '', $menu);
					$menu = str_replace(' current_page_ancestor', '', $menu);
					$menu = str_replace(' current_page_parent', '', $menu);
					echo $menu;
				} else {
					echo $menu;
				}
			?>
		</nav>
	</header>