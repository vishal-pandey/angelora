<?php
get_header(); ?>
<h2 class="page-title hidden"><?php the_title(); ?></h2>
<div id="main-content" class="left-content">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    		<?php
          if ( has_post_thumbnail() ) {
              the_post_thumbnail();
             }
        ?>

        	<?php the_content(); ?>

          <?php if (get_comments_number()==0 && comments_open()) {
                  comment_form();
              } else if (comments_open()) {
                  comments_template();
              } ?>

            <?php wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'luxi' ),
                'after'  => '</div>',
            ) );

endwhile; endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
