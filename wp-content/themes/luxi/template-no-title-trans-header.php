<?php
/**
 * Template Name: No Title Page Transparent Header
 */

get_header('trans'); ?>
<div id="main-content" class="fullwidth">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    		<?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail();
               }
        ?>

        	<?php the_content(); ?>

          <?php if (get_comments_number()==0) {
                  comment_form();
              } else {
                  comments_template();
              } ?>

            <?php wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'luxi' ),
                'after'  => '</div>',
            ) );

endwhile; endif; ?>

</div>

<?php get_footer(); ?>
