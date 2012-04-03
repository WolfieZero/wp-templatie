<?php 
/**
 * The archive template file.
 *
 * @package		WordPress
 * @subpackage	WP-Templatie
 * @since		1.0
 */

get_header(); 
the_post(); 
?>

	<div role="main" id="main">	

		<section id="posts">
			<?php 

				echo '<h1 class="page-title">';

				if (is_day()) {
					$time = get_the_time(get_option('date_format'));
					printf(__('Daily Archives: %s'), $time);

				} elseif (is_month()) {
					$time = get_the_time('F Y');
					printf(__('Monthly Archives: %s'), $time);

				} elseif (is_year()) {
					$time = get_the_time('Y');
					printf(__('Yearly Archives: %s'), $time);
				
				} elseif ((isset($_GET['paged']) && !empty($_GET['paged']))) {
					_e('Blog Archives');
				}

				echo '</h1>';

				rewind_posts();

				get_template_part('inc', 'post-loop'); 
			?>
		</section>

	</div>

<?php get_footer(); ?>