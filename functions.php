<?php

function customscripts() {

    wp_enqueue_style( 'normalize.css', get_stylesheet_directory_uri() .'/assets/scss/normalize.css' );
	wp_enqueue_style( 'customstyle.css', get_stylesheet_directory_uri() .'/assets/scss/main.css' );
	wp_enqueue_script( 'script.js', get_stylesheet_directory_uri() .'/assets/js/script.js', array('jquery'), false, true );

    wp_enqueue_script('ajax-search', get_stylesheet_directory_uri() . '/assets/js/ajax-search.js', array('jquery'), '1.0.0', true);
    wp_localize_script('ajax-search', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
    	
}
add_action( 'wp_enqueue_scripts', 'customscripts' );

add_filter( 'the_content', 'content_trimmer' );

function content_trimmer( $content ) {
    
    if ( ! is_single() ) {

        $content = wp_trim_words( $content, 40 );
        
        $content .= ' <br><a href="' . get_permalink() . '">Read More</a>';
    }

    return $content;
}

function ajax_search_filter() {
    $args = array(
        'post_type' => 'post',
        's' => $_POST['search']
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post(); ?>
                <article class="blog-single-post">
                    <div class="blog-single-post-left">
                        <?php 
                            if (has_post_thumbnail()) {
                                    the_post_thumbnail();
                            } else {
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                                if ($logo) {
                                    echo '<img src="' . esc_url($logo[0]) . '" >';
                                }
                            }
                        ?> 
                    </div>
                    <div class="blog-single-post-right">
                        <h2>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="blog-single-post-content-wrap">
                            <p>
                                <?php the_content(); ?>
                            </p>                    
                        </div>
                    </div>
                </article>
            <?php
        }
    } else {
        echo 'No posts found';
    }
    wp_reset_postdata();
    die();
}
add_action('wp_ajax_ajax_search_filter', 'ajax_search_filter');
add_action('wp_ajax_nopriv_ajax_search_filter', 'ajax_search_filter');