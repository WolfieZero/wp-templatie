<?php 
/**
 * The category template file.
 *
 * @package		WordPress
 * @subpackage	WP-Templatie
 * @since		1.0
 */

get_header(); 
the_post();
?>

	<div role="main" id="main">	

		<section id="posts" class="category">
			<?php 

				$categorydesc = category_description();

				echo '<h1 class="page-title">';
					single_cat_title();
				echo '</h1>';

				if (!empty($categorydesc)) {
					echo '<p class="page-description">'.$categorydesc.'</p>');
				}

				rewind_posts();

				get_template_part('inc', 'post-loop');
			?>
		</section>

	</div>

<?php get_footer(); ?>