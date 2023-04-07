<?php get_header(); ?>

<section class="post-container post-<?php echo get_the_ID(); ?>">
    <?php
    // Start the loop
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
                <div class="single-post-wrapper">
                        <div class="single-post-wrapper-left">
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
                        <div class="single-post-right">
                            <h2>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="single-post-content-wrap">
                                <p>
                                    <?php the_content(); ?>
                                </p>                    
                            </div>
                        </div>
                </div>
            <?php
        endwhile;
    endif;
    ?>
</section>

<?php get_footer(); ?>