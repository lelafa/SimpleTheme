<?php get_header(); ?>

<main>
    <section class="blog-wrapper">
        <div id="loader" style="display: none;"></div>
        <div class="blog-wrapper-search-wrap" id="search-results">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
            <?php endwhile; else : ?>
                <p>
                    <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>