<?php

/*
Theme Name: Krakatoa Lounge
Author: Kaela Lavin
Author URI: http://www.kaelalavin.com/
Description: This is my theme for the WEB170 WordPress Class
Version: 1.0
*/

//Menus
register_nav_menus(array(
    'main-menu' =>_( 'Main' ),
    ));

add_theme_support( 'post-thumbnails' );

register_sidebar(array(
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
    ));

//Title tag
function get_my_title_tag() {
    
    global $post;
    
    if ( is_front_page() ) {
        
        bloginfo('description');
        
    }
    
    elseif ( is_page() || is_single() ) {
        
        the_title();
    
    }
    
    else {
        
        bloginfo('description');
        
    }
    
    if ( $post->post_parent ) {
        
        echo ' | ';
        echo get_the_title($post->post_parent);
        
    }
    
    echo ' | ';
    bloginfo('name');
    echo ' | ';
    echo 'Seattle, Wa';
}

add_action('init', 'my_custom_init');
function my_custom_init() {
    add_post_type_support( 'page', 'excerpt' );
}
?>