<?php
/*
Plugin Name: Social Sharing Plugin
Description: Adds social media sharing buttons to posts.
Version: 1.0
Author: Aleksei
*/

function social_sharing_enqueue_styles() {
    wp_enqueue_style('social-sharing-style.css', plugin_dir_url(__FILE__) . 'style.css');
}

add_action('wp_enqueue_scripts', 'social_sharing_enqueue_styles');

function social_sharing_buttons($content) {
    
    $html = "<div class='social-sharing-wrapper'>";
    $html .= "<a class='social-sharing-wrapper-btn social-sharing-facebook' href='https://www.facebook.com/sharer/sharer.php?u=" . get_permalink() . "'><img src='" . plugin_dir_url(__FILE__) . "img/facebook-app-symbol.png'>Share on Facebook</a>";
    $html .= "<a class='social-sharing-wrapper-btn social-sharing-twitter' href='https://twitter.com/intent/tweet?url=" . get_permalink() . "'><img src='" . plugin_dir_url(__FILE__) . "img/twitter.png'>Share on Twitter</a>";
    $html .= "<a class='social-sharing-wrapper-btn social-sharing-linkedin' href='https://www.linkedin.com/shareArticle?mini=true&url=" . get_permalink() . "'><img src='" . plugin_dir_url(__FILE__) . "img/linkedin.png'>Share on LinkedIn</a>";
    $html .= "</div>";

    return $content . $html;
}

add_filter('the_content', 'social_sharing_buttons');
?>