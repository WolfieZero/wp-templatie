<?php 
/**
 * The 404 Page
 *
 * @package		WordPress
 * @subpackage	WP-Templatie
 * @since		1.0
 */

get_header(); 
?>

	<div role="main" id="main">	

		<section id="fourohfour">
			<h1><?php _e('Page Not Found'); ?></h1>
			<p><?php 
				_e('It appears we have a horse in our butter milk and the <em>page was not found</em>. Do not worry though, Alice, somebody knows...');
			?></p>
		</section>

	</div>

<?php get_footer(); ?>