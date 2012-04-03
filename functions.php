<?php

define('SAVEQUERIES',	true);

// You can limit db calls by caching the nav for everybody but note that you 
// will lose the ability to highlight the current page for the user using a css
// class.
define('CACHE_NAV',		false);

require('variables.php');


add_action('init',	'enquedScripts');	// Load JS for page
add_action('init',	'registerMenus'); 	// Registers menus for theme


add_theme_support('menus');



/**
 * Display Comments
 * This is the defauly call back for comments.php => wp_list_comments()
 * 
 * @param	object 	$comment Contains the comment variables
 * @param	array 	$args Arguments passed from wp_list_comments()
 * @param	int 	$depth How deep the comment is
 * @return	string 	HTML is echo'd out
 */
function displayComments($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment;
	$id					= $comment->comment_ID;
	$avatar				= get_avatar($comment->comment_author_email);


	// Comment Markup

	echo '<li><article id="comment-'.$id.'" '; comment_class(); echo '>';


		// Header, which is used to vcard the commentor
		
		echo '<header class="vcard">';
			echo '<h3 class="fn">'.get_comment_author_link().'</h3>';
			echo get_avatar($comment->comment_author_email, $args['avatar_size'], null, get_author_name());
		echo '</header>';


		// Main body of text for the comment
		
		echo '<div class="comment-entry">';
			comment_text(); // apply_filters() used as text is unformatted
		echo '</div>';


		// Footer has the small-print stuff and reply
		
		echo '<footer>';
			echo '<p class="comment-meta">'.__('Posted').' <a href="'.esc_url(get_comment_link($id)).'">'.get_comment_date().' @ '.get_comment_time().'</a></p>';
			echo '<p class="comment-reply">'.get_comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))).'</p>';
		echo '</footer>';


	echo '</article>';

}



/**
 * Enqued Scripts
 * Sets up scripts to be included on the site
 * 
 * @return null
 */
function enquedScripts() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', false, false, true);
		wp_enqueue_script('jquery');
	}
}



/**
 * Register Menus
 * Register menus for use on the site
 * 
 * @return null
 */
function registerMenus() {
	$menus = array(
		'header-menu' => __( 'Header Menu' ),
	);
	register_nav_menus($menus);
}



/**
 * Page Number
 * Displays the page number
 * 
 * @param string $seperator The seperator character used
 * @param bool $echo Do we wish to echo or not
 * @return string (echo/return depeding on argument 2)
 */
function pageNumber($seperator=' - ', $echo=true) {
	
	if (get_query_var('paged')) {
		$page = $seperator.__('Page ').get_query_var('paged');

		if ($echo) {
			echo $page;
		} else {
			return $page;
		}

	}
}