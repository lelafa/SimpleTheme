<?php get_header(); ?>

<section class="post-container post-<?php echo get_the_ID(); ?>">
    <?php
    // Start the loop
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
            <article class="post">
                <h1><?php the_title(); ?></h1>
                <?php the_post_thumbnail(); ?>
                <div class="post-meta">
                    <span class="post-date"><?php the_date(); ?></span>
                    <span class="post-author"><?php the_author(); ?></span>
                </div>
                <div class="post-content">
                    <p>
                    <?php the_content(); ?>
                    </p>
                </div>
            </article>
            <?php
        endwhile;
    endif;
    ?>
</section>

<?php get_footer(); ?>