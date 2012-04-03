<?php 
/**
 * The main template file.
 *
 * @package		WordPress
 * @subpackage	WP-Templatie
 * @since		1.0
 */

get_header(); 
?>

	<div role="main" id="main">	

		<section id="posts">
			<?php get_template_part('inc', 'post-loop'); ?>
		</section>

	</div>

<?php get_footer(); ?>