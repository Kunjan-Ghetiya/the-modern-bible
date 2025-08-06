<?php

/**
 * The main template file.
 *
 */

get_header(); ?>

<main id="main-content">
    <section class="post-section">
        <div class="container">
            <div class="row post-row">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post(); ?>
                        <div class="column">
                            <div class="post-wrapper">
                                <article>
                                    <h2><?php the_title(); ?></h2>
                                    <div class="excerpt-text-wrapper">
                                        <?php echo (get_the_excerpt()) ? get_the_excerpt() : wp_trim_words(get_the_content(), 15) ?>
                                    </div>
                                </article>
                            </div>
                        </div>
                    <?php endwhile;
                else : ?>
                    <p>No content found.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>