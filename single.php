<?php 
/**
 * The Template for displaying all single posts.
 *
 * @package		WordPress
 * @subpackage	WP-Templatie
 * @since		1.0
 */

global $themeArgs;

get_header(); 
the_post();

$category		= get_the_category($post->ID);			
$postTitle		= get_the_title();
$permalink		= get_permalink();
$commentsOpen	= comments_open();	// used twice
$commentsCount	= $post->comment_count;
?>

	<div role="main" id="main">	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header>
				<h1 class="post-title">
					<a href="<?php echo $permalink; ?>" rel="bookmark"><?php echo $postTitle; ?></a>
				</h1>
			</header>
			
			<div class="entry-content">

<?php the_content(); ?>

<?php 
	wp_link_pages(
		array_merge(
			$themeArgs['link_pages'], 
			array(
				// Edit theme-default values
			)
		)
	); 
?>

			</div>

			<footer>
				<ul class="post-meta"><?php

					// Display author vcard

					if (!is_author()) {
						// if we are on author.php then we display the vcard at the top of th apge
						echo '<li class="vcard author">';
							echo '<span class="fn">'.the_author_posts_link().'</span>';
						echo '</li>';
					}
					

					// Display when posted

					echo '<li>';
						echo __('Posted').' <data name="pubDate" value="'.get_the_time('Y-m-d').'">'.get_the_time('d-m-Y').'</data>'; 
					echo '</li>';


					// Display comment info

					if (comments_open()) {
						// no need to display if comments aren't open

						echo '<li><ul>';
						echo '<li><a href="'.$permalink.'#comments">';
							
						if ($commentsCount > 1) {
							echo $commentsCount.' '.__('Comments');

						} elseif ($commentsCount == 1) {
							echo $commentsCount.' '.__('Comments');
								
						} else {
							echo 'No Comments';
						}

						echo '</a></li>';
						echo '<li><a href="'.$permalink.'#add-comment">'.__('Add Comment').'</a></li>';
						echo '</ul></li>';
					}


					// Display categories

					wp_list_categories(
						array_merge(
							$themeArgs['list_categories'], 
							array(
								// Edit theme-default values
							)
						)
					);


					// Display tags

					the_tags('<li class="tags">Tags<ul><li>','</li><li>','</li></ul></li>');


					// Display edit link for admins

					edit_post_link(__('Edit'), '<li class="admin-edit">', '</li>');

				?></ul>
			</footer>

			<?php
				if ($commentsOpen) {
					comments_template();
				}
			?>

		</article>
	</div>

<?php get_footer(); ?>