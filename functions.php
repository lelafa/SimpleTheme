<?php
//add_theme_support( 'custom-logo' );


function customscripts() {

	wp_enqueue_style( 'customstyle.css', get_stylesheet_directory_uri() .'/assets/scss/main.css' );
	wp_enqueue_script( 'script.js', get_stylesheet_directory_uri() .'/assets/js/script.js', array('jquery'), false, true );
	
}
add_action( 'wp_enqueue_scripts', 'customscripts' );

add_filter( 'the_content', 'my_content_filter' );

function my_content_filter( $content ) {
    // Limit content to 10 words
    $content = wp_trim_words( $content, 10 );
    // Add "Read More" link
    $content .= ' <a href="' . get_permalink() . '">Read More</a>';
    return $content;
}