<?php get_header(); ?>

<!-- Display Archive Title -->
<h2 class="page-title hidden">
    <?php $post = $posts[0]; ?>
    <?php  if (is_category()) { ?>
    <?php single_cat_title(); ?>
    <?php  } elseif( is_tag() ) { ?>
    <?php single_tag_title(); ?>
    <?php } elseif (is_day()) { ?>
    <?php echo esc_html__( 'Archive for ', 'luxi' ); ?><?php the_time('F jS, Y'); ?>
    <?php } elseif (is_month()) { ?>
    <?php echo esc_html__( 'Archive for ', 'luxi' ); ?><?php the_time('F, Y'); ?>
    <?php } elseif (is_year()) { ?>
    <?php echo esc_html__( 'Archive for ', 'luxi' ); ?><?php the_time('Y'); ?>
    <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <?php echo esc_html__( 'Archives', 'luxi' ); ?></h1>
    <?php } ?>
</h2>

<div id="main-content">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">

                    <!-- Display Post Image -->
                    <?php
                    if ( has_post_thumbnail() ) {
                        echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
                        the_post_thumbnail('large');
                        echo '</a>';
                    }
                    ?>

                    <!-- Display Title -->
                    <?php
                        if ( is_single() ) {
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        } else {
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        }

                    if ( 'post' === get_post_type() ) : ?>


                </header>

            <!-- Display Post Content -->
            <div class="entry-content">
                <?php
                    the_excerpt();
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'luxi' ),
                        'after'  => '</div>',
                    ) );
                ?>
            </div>

            <!-- Display Post Meta -->
            <div class="entry-meta">
                <?php echo luxi_display_meta_bottom() ?>
            </div>

            <?php
            endif; ?>

            <!-- Display Post Footer -->
            <footer class="entry-footer">
            </footer>

        </article>

    <?php comments_template(); ?>

    <?php endwhile; else: ?>

        <?php luxi_print_not_found(); ?>

      <?php endif; ?>

<?php luxi_numeric_pages_nav(); ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
