<?php 
	/* 
		Template Name: Single Post
	*/

	get_header(); 
	the_post();

	$category		= get_the_category($post->ID);			
	$postTitle		= get_the_title();
	$permalink		= get_permalink();
	$commentsOpen	= comments_open();
	$commentsCount	= $post->comment_count;

?>

	<div role="main" id="main">	

		<article class="hentry">

			<header>
				<h1 class="post-title">
					<a href="<?php echo $permalink; ?>" rel="bookmark">
						<?php echo $postTitle; ?>
					</a>
				</h1>
			</header>
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<footer>
				<ul>
					<li class="vcard author">
						<span class="fn"><?php the_author_posts_link(); ?></span>
					</li>
					<li><?php

						if ($commentsOpen) {
							echo '<a href="'.$link.'#comments">';
							
							if ($commentsCount > 1)
								echo $commentsCount.' Comments';
							elseif ($commentsCount == 1)
								echo $commentsCount.' Comment';
							else
								echo 'No Comments';
						
							echo '</a> |';
								
							echo ' <a href="'.$link.'#add-comment">Add Comment</a> | ';
						}
							
						echo $typeName.' posted <data name="pubDate" value="'.get_the_time('Y-m-d').'">'.get_the_time('d-m-Y').'</data>'; 

					?></li>
				</ul>
			</footer>

			<?php
				if ($commentsOpen) 
					comments_template();
			?>

		</article>

	</div>

<?php get_footer(); ?>