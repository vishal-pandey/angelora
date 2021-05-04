<?php if ( have_comments() ) : ?>
<div class="comments-section">

<?php if ( have_comments() ) : ?>
	<h4 id="comments"><?php comments_number(esc_html__( 'No Responses', 'luxi'), esc_html__('One Response', 'luxi'), esc_html__('% Responses', 'luxi'));?> to &#8220;<?php the_title(); ?>&#8221;</h4>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<ol class="commentlist">
	<?php wp_list_comments('avatar_size=100'); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->


	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php echo esc_html__( 'Comments are closed.', 'luxi' ); ?></p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p><?php echo esc_html__( 'You must be ', 'luxi' ); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php echo esc_html__( 'logged in', 'luxi' ); ?></a><?php echo esc_html__( ' to post a comment.', 'luxi' ); ?></p>
	<?php else :

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(

		'author' => '<div class="third"><p class="comment-form-author"> ' . '<input id="author" placeholder="' . esc_html__( 'Name', 'luxi' ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' /></p></div>',
		'email' => '<div class="third"><p class="comment-form-email">' . '<input id="email" name="email" placeholder="' . esc_html__( 'Email', 'luxi' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' /></p></div>',
		'url' => '<div class="third"><p class="comment-form-url">' . '<input id="url" name="url" placeholder = "' . esc_html__( 'Website', 'luxi' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"  /></p></div>',

  	);

	$comments_args = array(

  'comment_field' => '<p class="comment-form-comment"><br /><textarea id="comment" name="comment" rows="6" placeholder="' . esc_html_x( 'Comment', 'noun', 'luxi' ) . '" ></textarea></p>',

  'fields' => apply_filters( 'comment_form_default_fields', $fields ),

	);

		comment_form($comments_args);

	?>

	<?php endif; // If registration required and not logged in ?>

<?php endif;  ?>

</div>

<?php endif;  ?>
