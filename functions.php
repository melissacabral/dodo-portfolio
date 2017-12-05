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


//Change the behavior of the_excerpt()
//example of how to apply filters
function dodo_excerpt_length(){
	//example of adding conditional logic
	if( is_search() ):
		return 10;
	else:
		return 75;
	endif;
}
add_filter( 'excerpt_length', 'dodo_excerpt_length' );

//change the [...]
function dodo_dotdotdot(){
	return '&hellip; <a href="' . get_permalink() . '">Keep Reading</a>';
}
add_filter( 'excerpt_more', 'dodo_dotdotdot' );




//no close php