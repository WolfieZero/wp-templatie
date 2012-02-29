<?php if (have_posts()) : ?>

	<?php 
		global $query_string, $paged; 
		
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
			$link			= get_permalink();
			$commentCount	= $post->comment_count;
		?>

		<article class="hentry">
			<header>
				<h1 class="post-title"><a href="<?php echo $link; ?>" rel="bookmark"><?php echo $title; ?></a></h1>
			</header>
			<p><?php echo preg_replace('/{(?:\.|(\\\")|[^\""\n])*} /', '', $excerpt); ?> <a href="<?php echo $link; ?>">more &#187;</a></p>
			<footer>
				<ul>
					<li class="vcard author">
						<span class="fn"><?php the_author_posts_link(); ?></span>
					</li>
					<li><?php
						if (comments_open()) {
							echo '<a href="'.$link.'#comments">';
							
							if ($commentCount > 1) 
								echo $commentCount.' Comments';
							elseif ($commentCount == 1) 
								echo $commentCount.' Comment';
							else 
								echo 'No Comments';
						
							echo '</a> |';
								
							echo ' <a href="'.$link.'#add-comment">Add Comment</a> | ';
						}
							
						echo $typeName.' posted <data name="pubDate" value="'.get_the_time('Y-m-d').'">'.get_the_time('d-m-Y').'</data>'; 
					?></li>
				</ul>
			</footer>
		</article>
	
	<?php endwhile; ?>	
	
	<?php if($wp_query->max_num_pages > 1) : ?>
		<div class="pagination">
			<?php 
				global $wp_query, $wp_rewrite;
				
				if ($wp_query->query_vars['paged'] > 1)
					$current = $wp_query->query_vars['paged'];
				else
					$current = 1;
			
				$argsPagination = array(
					'base'		=> @add_query_arg('page','%#%'),
					'format'	=> '',
					'total'		=> $wp_query->max_num_pages,
					'current'	=> $current,
					'show_all'	=> false,
					'type'		=> 'list',
					'prev_text'	=> __('&#171; Previous'),
					'next_text'	=> __('Next &#187;'),
				);
							
				if ($wp_rewrite->using_permalinks())
					$argsPagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))).'page/%#%/', 'paged');
				
				if (!empty($wp_query->query_vars['s']))
					$argsPagination['add_args'] = array('s' => get_query_var('s'));
					
				echo paginate_links($argsPagination);
			?>
		</div>
	<?php endif; ?>

<?php else : ?>
	<p>There are no posts</p>
<?php endif; ?>