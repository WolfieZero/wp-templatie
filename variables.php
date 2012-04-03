<?php

global $themeArgs;

$themeArgs = array(
	
	'comments' => array(
		'avatar_size'		=> 60,
		'style'				=> 'ul',
		'type'				=> 'all',
		'callback'			=> 'displayComments',
	),

	'commentForm' => array(
		
	),

	'pagination' => array(
		'type'				=> 'list',
		'prev_text'			=> __('&#171; Previous'),
		'next_text'			=> __('Next &#187;'),
	),

	'navigation' => array(
		'container'			=> false,
		'container_class'	=> false,
		'echo'				=> false,
	),

	'link_pages' => array(
		'before'			=> '<ul>',
		'after'				=> '</ul>',
	),

	'list_categories' => array(
		'style'				=> 'list',
		'orderby'			=> 'name',
	),

);