<?php
//Support Featured Images
add_theme_support( 'post-thumbnails' );

//upgrade any HTML output to HTML5
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

//delete the <title> tag from the header, then add this function
add_theme_support( 'title-tag' );

//customizer features
add_theme_support( 'custom-background' );

//Custom Header
$args = array(
	'width' => 1000,
	'height' => 600,
	'flex-width' => true,
	'flex-height' => true,
 );
add_theme_support( 'custom-header', $args );

//Custom Logo
$args = array(
	'width' => 200,
	'height' => 200,
	'flex-width' => true,
	'flex-height' => true,
);
add_theme_support( 'custom-logo', $args );

//make editor-style.css
add_editor_style();


/**
 * change the default length of the_excerpt()
 * Search results will show fewer words in the excerpts
 * 
 * @return int the number of words displayed in the excerpt
 */
function dodo_excerpt_length(){
	//example of adding conditional logic
	if( is_search() ):
		return 10;
	else:
		return 75;
	endif;
}
add_filter( 'excerpt_length', 'dodo_excerpt_length' );

/**
 * change the [...]
 */
function dodo_dotdotdot(){
	return '&hellip; <a href="' . get_permalink() . '">Keep Reading</a>';
}
add_filter( 'excerpt_more', 'dodo_dotdotdot' );

/**
 * Set up 2 menu locations 
 * @since  0.1  added the function
 */
add_action( 'init', 'dodo_menu_locations' );
function dodo_menu_locations(){
	register_nav_menus( array(
		'main_menu' 	=> 'Main Menu',
		'social_icons' 	=> 'Social Media Icons'
	) );
}

/**
 * enqueue all stylesheets or JavaScript
 */
add_action( 'wp_enqueue_scripts', 'dodo_scripts' );
function dodo_scripts(){
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css' );
}

/**
 * Helper function to display archive or single pagination (next/prev buttons)
 */
function dodo_pagination(){
	if( is_singular() ):
		//single post pagination
		previous_post_link( '%link', '&larr; Previous: %title' );
		next_post_link( '%link', 'Next: %title &rarr;' );
	else:
		//archive pagination
		if( wp_is_mobile() ):
			previous_posts_link( '&larr; Previous Page' );
			next_posts_link( 'Next Page &rarr;' );
		else:
			//numbered pagination
			the_posts_pagination(array(
				'mid_size' => 2,
				'next_text' => 'Next Page &rarr;',
			));
		endif;
	endif;
}





//no close php