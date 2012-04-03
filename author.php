<?php 
/**
 * The author post file
 *
 * @package		WordPress
 * @subpackage	WP-Templatie
 * @since		1.0
 */

get_header(); 

// Get author details
$author = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

?>

	<div role="main" id="main">

		<section id="author" class="vcard">
			<h1 class="fn"><?php echo $author->display_name; ?></h1>
			<p><?php echo $author->description; ?></p>
			<ul>
				<li><a href="<?php echo $author->user_url; ?>" rel="external" class="url">View <?php echo $author->display_name; ?> site</a></li>
			</ul>
		</section>

		<section id="posts" class="author">
			<h1>Posts by <?php echo $author->first_name; ?></h1>
			<?php get_template_part('inc', 'post-loop'); ?>
		</section>

	</div>

<?php get_footer(); ?>