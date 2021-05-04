<?php
// Luxi Template Tags

// Display Post Meta Information Top
if ( ! function_exists( 'luxi_display_meta_top' ) ) :
function luxi_display_meta_top() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'luxi' ),
		'<span><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span>'
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'luxi' ),
		'<span class="author vcard">by <a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
	);

	echo '<span class="posted-on"> ' . $posted_on . '</span>'; // WPCS: XSS OK.
}

endif;

// Display Post Meta Information Bottom
if ( ! function_exists( 'luxi_display_meta_bottom' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function luxi_display_meta_bottom() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'luxi' ),
		'<span><i class="fa fa-calendar"></i><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span>'
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'luxi' ),
		'<span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	$postcats = get_the_category();
	$total = count($postcats);
	$counter=0;
	if ($postcats) {

		echo '<i class="fa fa-folder-open"></i>';
		foreach($postcats as $cat) {
			$counter++;

			echo '<a href="' . get_category_link($cat->term_id) . '">' . $cat->name . '</a>';
			if ($counter < $total){echo ", ";}
		}
	}

	$posttags = get_the_tags();
	$total = count($posttags);
	$counter=0;
	if ($posttags) {

		echo '<i class="fa fa-tags"></i>';
		foreach($posttags as $tag) {
			$counter++;

			echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
			if ($counter < $total){echo ", ";}
		}
}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<i class="fa fa-comment"></i><span class="comments-link">';
		comments_popup_link( esc_html__( '0 Comments', 'luxi' ), esc_html__( '1 Comment', 'luxi' ), esc_html__( '% Comments', 'luxi' ) );
		echo '</span>';
	}
}

endif;


// Display Logo
if ( ! function_exists( 'luxi_display_logo' ) ) :
function luxi_display_logo(){
		// check to see if the logo exists and add it to the page
        if ( get_theme_mod( 'luxi_logo' ) ) : ?>
            <a href ="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_theme_mod( 'luxi_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
            </a>
        <?php // add a fallback if the logo doesn't exist
        else : ?>
            <a href ="<?php echo esc_url(home_url('/')); ?>">
                <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
            </a>

        <?php endif;
}
endif;

// Display Search Icon/Text Box
if ( ! function_exists( 'luxi_display_search_icon' ) ) :
function luxi_display_search_icon(){
		echo '<div class="search-icon"></div>';
}
endif;

// Display Cart Icon/Text Box
if ( ! function_exists( 'luxi_display_cart_icon' ) ) :
function luxi_display_cart_icon(){
		echo '<div class="cart-icon"></div>';
}
endif;


// Display Post Navigation
if ( ! function_exists( 'luxi_print_post_nav' ) ) :
function luxi_print_post_nav(){

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="post-navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'luxi' ); ?></h2>
		<div class="nav-links clearfix">
			<?php

				$prevPost = get_previous_post();
				if ($prevPost){
					$prevThumbnail = get_the_post_thumbnail( $prevPost->ID, array( 100, 100) );
				}

				$nextPost = get_next_post();
				if ($nextPost){
					$nextThumbnail = get_the_post_thumbnail( $nextPost->ID, array( 100, 100) );
				}
				?>

				<div class ="post-nav-left">
					<?php
					if ($prevPost){
						previous_post_link( '<div class="prev">'.$prevThumbnail.'<div class="prev-post-header">'.esc_html__( 'Previous ', 'luxi' ).'</div>%link</div>', '%title' );
					}
					?>
				</div>

				<div class ="post-nav-middle"></div>

				<div class ="post-nav-right">
					<?php
					if ($nextPost){
						next_post_link( '<div class="next">'.$nextThumbnail.'<div class="next-post-header">'.esc_html__( 'Next ', 'luxi' ).'</div>%link</div>', '%title' );
					}
					?>
				</div>

		</div>
	</nav>
	<?php
}
endif;

// Display Tags
if ( ! function_exists( 'luxi_print_tags' ) ) :
function luxi_print_tags(){
		the_tags( esc_html__( 'Tags: ', 'luxi' ), ' ', '<br /><br />' );
}
endif;

// Display Cats
if ( ! function_exists( 'luxi_print_cats' ) ) :
function luxi_print_cats(){

		$categories = get_the_category();
		$separator = ' ';
		$output = '';
		if ( ! empty( $categories ) ) {

			echo esc_html__( 'Categories: ', 'luxi' );
		    foreach( $categories as $category ) {
		        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
		    }
		    echo trim( $output, $separator );
		}
}
endif;

// Display No Post Found Message
if ( ! function_exists( 'luxi_print_not_found' ) ) :
function luxi_print_not_found(){
?>
        <h3 class="center"> <?php echo esc_html__( 'No posts found. Try another search ? ', 'luxi' ); ?></h3>
        <?php get_search_form(); ?>
<?php
}
endif;

// Display Pages navigation
if ( ! function_exists( 'luxi_numeric_pages_nav' ) ) :
function luxi_numeric_pages_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="page-navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}
endif;
?>
