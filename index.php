<?php get_header(); ?>

<main>
    <section class="blog-wrapper">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="blog-single-post">
                <h2>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="blog-single-post-content-wrap">
                    <p>
                        <?php the_content(); ?>
                    </p>                    
                </div>
            </article>
        <?php endwhile; else : ?>
            <p>
                <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
            </p>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>