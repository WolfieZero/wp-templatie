<?php if (have_posts()) : ?>

	<?php 
		global $query_string, $paged, $themeArgs; 
		
		if (is_home()) {
			query_posts('paged='.$paged); 
		}
	?>

	<?php while (have_posts()) : the_post() ?>
			
		<?php 
			// Grab `get_`s and variables to assign locally
			$category		= get_the_category($post->ID);			
			$title			= get_the_title();
			$excerpt		= get_the_excerpt();
			$permalink		= get_permalink();
			$commentsCount	= $post->comment_count;
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header>
				<h2 class="post-title"><a href="<?php echo $permalink; ?>" rel="bookmark"><?php echo $title; ?></a></h2>
			</header>

			<p><?php echo preg_replace('/{(?:\.|(\\\")|[^\""\n])*} /', '', $excerpt); ?> <a href="<?php echo $permalink; ?>">more &#187;</a></p>

			<footer>
				<ul><?php

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
						echo '<li><a href="'.$permalink.'#respond">'.__('Add Comment').'</a></li>';
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

		</article>
	
	<?php endwhile; ?>	
	
	<?php if($wp_query->max_num_pages > 1) : ?>
		<nav class="pagination">
			<?php 
				global $wp_query, $wp_rewrite, $themeArgs;
				
				if ($wp_query->query_vars['paged'] > 1) {
					$current = $wp_query->query_vars['paged'];
				} else {
					$current = 1;
				}

				$argsPagination = array_merge($themeArgs['pagination'], array(
					'base'		=> @add_query_arg('page','%#%'),
					'format'	=> '',
					'total'		=> $wp_query->max_num_pages,
					'current'	=> $current,
					'show_all'	=> false
				));
							
				if ($wp_rewrite->using_permalinks()) {
					$argsPagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))).'page/%#%/', 'paged');
				}
				
				if (!empty($wp_query->query_vars['s'])) {
					$argsPagination['add_args'] = array('s' => get_query_var('s'));
				}
					
				echo paginate_links($argsPagination);
			?>
		</nav>
	<?php endif; ?>

<?php else : ?>
	<p>There are no posts</p>
<?php endif; ?>