<?php get_header(); ?>
<!-- Display Post Title -->

<div id="main-content">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <!-- Display Post Header -->
                <header class="entry-header">
                    <?php
                    if ( 'post' === get_post_type() ) : ?>

                    <?php if ( has_post_thumbnail() ) : ?>

                            <?php the_post_thumbnail(); ?>

                    <?php endif; ?>

                    <h2 class="page-title hidden"><?php the_title(); ?></h2>
                    <?php
                    endif; ?>
                </header>

                <!-- Display Post Content -->
                <div class="entry-content">
                    <?php

                        the_content();
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'luxi' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div>

                <!-- Display Post Footer -->
                <footer class="entry-footer">
                  <?php echo luxi_display_meta_bottom() ?>
                </footer>

        </article>

    <?php comments_template(); ?>

    <?php luxi_print_post_nav(); ?>

    <?php endwhile; else: ?>

        <?php print_not_found(); ?>

      <?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
