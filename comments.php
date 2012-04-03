<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to displayComments() which is
 * located in the functions.php file.
 *
 * @package		WordPress
 * @subpackage	WP-Templatie
 * @since		1.0
 */

global $themeArgs;
?>

<section id="comments">

	<h2><?php _e('Comments'); ?></h2>

	<?php
		/**
		 * Restrict access if password is required
		 */
		if (post_password_required()) {

			echo '<p class="no-password">';
				_e('This post is password protected. Enter the password to view any comments.');
			echo '</p>';

			echo '</section>';	// echo this out due to `return` statement

			return; // kills the rest of comments.php from loading without effecting the page

		}
	?>

	<?php if ( have_comments() ) : ?>
		<ul>
			<?php wp_list_comments($themeArgs['comments']); ?>
		</ul>
	<?php endif; ?>

	<?php comment_form($themeArgs['commentForm']); ?>

</section>