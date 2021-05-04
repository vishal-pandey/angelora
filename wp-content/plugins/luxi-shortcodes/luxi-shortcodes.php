<?php
/**
* Plugin Name: Luxi Shortcodes
* Plugin URI: http://elusivethemes.com/
* Description: A collection of shortcodes required for the theme.
* Version: 1.0
* Author: Elusivethemes
* Author URI: www.elusivethemes.com
* License:
*/


/* Visual Composer Elements*/


// Product Grid
function productgrid_func( $atts ) {
	 ob_start();
   extract( shortcode_atts( array(
	  'luxi_extra_class' => '',
   ), $atts ) );
?>
	 <div class="ajax-posts row">
	         <?php
	             $postsPerPage = 6;
							 $cat = '';
	             $args = array(
	                     'post_type' => 'product',
	                     'posts_per_page' => $postsPerPage,
	                     'product_cat' => $cat
	             );

	             $loop = new WP_Query($args);
							 $totalpages = $loop->max_num_pages;
							 $cat_id = $cat;

							 ?>
							 <div class="et-product-cats">
				 					<a class="cat-trigger active" href=""><?php echo 'All'; ?></a>
				 				<?php $wcatTerms = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'ASC',  'parent' =>0));
				 								foreach($wcatTerms as $wcatTerm) :
				 								?>
				 										<a class="cat-trigger" href="<?php echo get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ); ?>"><?php echo $wcatTerm->name; ?></a>
				 								<?php endforeach; ?>
				 			</div>
				 			<div class="et-product-filter-button">
				 					<span>Filter</span>
				 			</div>
				 			<div class="product-grid-cover hidden">
				 				<div class="product-grid-preloader">
				 				</div>
				 			</div>
							<div class="et-product-grid-wrapper">
							 <ul class="products" data-totalpages="<?php echo $totalpages; ?>">
							<?php
	             while ($loop->have_posts()) : $loop->the_post();
	         		?>
						 	<?php
							$output ='';
							$output .= wc_get_template_part( 'content', 'product' );
	             endwhile;
							?>
						</ul>
						<?php if ($totalpages > 1){?>
	 				 	<div class="et-load-more" data-category="<?php echo $cat;?>" data-pager="1">
	 				 		<span>Load More</span>
	 			 		</div>
	 				<?php } ?>

					</div>
	     </div>
<?php
		echo $output;
  	$myvariable = ob_get_clean();
		return $myvariable;
}
add_shortcode( 'productgrid', 'productgrid_func' );
add_action( 'vc_before_init', 'productgrid_integrateWithVC' );

function productgrid_integrateWithVC() {
   vc_map( array(
      "name" => __("Product Grid", 'luxi'),
      "base" => "productgrid",
      "class" => "",
	  "icon" => get_template_directory_uri() . "/assets/luxi-icon.png",
      "category" => __('Luxi', 'luxi'),
      "params" => array(
					 array(
			            "type" => "textfield",
			            "holder" => "div",
			            "class" => "",
			            "heading" => __("Extra Class", 'luxi'),
			            "param_name" => "luxi_extra_class",
			            "value" => __("", 'luxi'),
			            "description" => __("Extra Class name here.", 'luxi')
			         ),
						)
   ) );
}


// Product Carousel
function productcarousel_func( $atts ) {
	 ob_start();
   extract( shortcode_atts( array(
		'luxi_cat_name' => '',
		'luxi_products_per_row' => '',
		'luxi_carousel_title' => '',
		'luxi_nav_style' => ''
   ), $atts ) );

	             $postsPerPage = 16;
							 $cat = $luxi_cat_name;
	             $args = array(
	                     'post_type' => 'product',
	                     'products_per_row' => $postsPerPage,
	                     'product_cat' => $cat
	             );

	             $loop = new WP_Query($args);
							 $totalpages = $loop->max_num_pages;
							 $cat_id = $cat;

							 ?>
							 	<div class="woocommerce woocommerce-page">
								<div class="et-carousel-title"><h5> <?php echo $luxi_carousel_title; ?> </h5></div>
							 	<ul class="products owl-carousel <?php echo $luxi_products_per_row; ?>items <?php echo $luxi_nav_style; ?>nav">
									<?php
									$output ='';
			            while ($loop->have_posts()) : $loop->the_post();
			         		?>
								 	<?php
									$output .= wc_get_template_part( 'content', 'product' );
		             	endwhile;
								 	?>
								 </ul>
							 </div><?php
		echo $output;
  	$myvariable = ob_get_clean();
		return $myvariable;
}
add_shortcode( 'productcarousel', 'productcarousel_func' );
add_action( 'vc_before_init', 'productcarousel_integrateWithVC' );

function productcarousel_integrateWithVC() {
   vc_map( array(
      "name" => __("Product Carousel", 'luxi'),
      "base" => "productcarousel",
      "class" => "",
	  	"icon" => get_template_directory_uri() . "/assets/luxi-icon.png",
      "category" => __('Luxi', 'luxi'),
      "params" => array(
						array(
									 "type" => "textfield",
									 "holder" => "div",
									 "heading" => __("Category Name", 'luxi'),
									 "admin_label" => true,
									 "param_name" => "luxi_cat_name",
									 "value" => __("", 'luxi'),
									 "description" => __("Enter the category name here. Leave blank to show all.", 'luxi')
								),
								array(
											 "type" => "textfield",
											 "holder" => "div",
											 "heading" => __("Carousel Title ", 'luxi'),
											 "admin_label" => true,
											 "param_name" => "luxi_carousel_title",
											 "value" => __("", 'luxi'),
											 "description" => __("Enter the carousel title.", 'luxi')
										),
								array(
												"type"        => "dropdown",
												"heading"     => __("Number of products", 'luxi'),
												"param_name"  => "luxi_products_per_row",
												"admin_label" => true,
												"value"       => array(
																								'1'   => '1',
																								'2'   => '2',
																								'3'   => '3',
																								'4'   => '4',
																								'5'   => '5'
																							),
												"std"         => " ",
												"description" => __("Number of products first visible.")
												),

								 array(
			                   "type"        => "dropdown",
			                   "heading"     => __("Nav Style", 'luxi'),
			                   "param_name"  => "luxi_nav_style",
			                   "admin_label" => true,
			                   "value"       => array(
			                                           'Dots'   => 'dots',
			                                           'Arrows'   => 'arrows'
			                                         ),
			                   "std"         => " ",
			                   "description" => __("Choose a naviagation style.")
			                   )
									 	)
			   ) );
}

// Blog Carousel
function blogcarousel_func( $atts ) {
	 ob_start();
   extract( shortcode_atts( array(
		'luxi_products_per_row' => '',
		'luxi_products_total' => '',
		'luxi_nav_style' => '',
		'category_name' => ''
   ), $atts ) );

	             $args = array(
	                     'post_type' => 'post',
											 'posts_per_page' => $luxi_products_total,
											 'category_name' => $category_name
	             );
	             $loop = new WP_Query($args);

							 ?>
							 	<div class="blog-carousel owl-carousel  <?php echo $luxi_products_per_row; ?>items <?php echo $luxi_nav_style; ?>nav">
									<?php
									$output ='';
			            while ($loop->have_posts()) : $loop->the_post();

									if ( has_post_thumbnail() ){
										$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->ID ), "thumbnail" );
									}
										$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		 							 	$time_string = sprintf( $time_string,
		 							 		esc_attr( get_the_date( 'c' ) ),
		 							 		esc_html( get_the_date() ),
		 							 		esc_attr( get_the_modified_date( 'c' ) ),
		 							 		esc_html( get_the_modified_date() )
		 							 	);

		 								$post_title = get_the_title();
										$post_ex = get_the_excerpt();
										$post_read_more = 'Read More';

										$output .= '<div class="blog-carousel-item">';
										$output .= '<a href="'.get_the_permalink().'"><div class="thumb-wrapper-outer">';
										$output .= '<div class="thumb-overlay"></div>';
										if ( has_post_thumbnail()){
											$output .= '<img src ="'.$feat_image[0].'" alt="">';
											}
										$output .= '</div></a>';
										$output .= '<div class="post-time">'.$time_string.'</div>';
										$output .= '<div class="post-title"><a href="'.get_the_permalink().'">'.$post_title.'</a></div>';
										$output .= '<div class="post-ex">'.$post_ex.'</div>';
										$output .= '<div class="post-read-more"><a class="read-more" href="'.get_the_permalink().'">'.$post_read_more.'</a></div>';
										$output .= '</div>';

		             	endwhile;
									wp_reset_postdata();

		echo $output;
		?>
		</div>
		<?php
  	$myvariable = ob_get_clean();
		return $myvariable;
}

add_shortcode( 'blogcarousel', 'blogcarousel_func' );
add_action( 'vc_before_init', 'blogcarousel_integrateWithVC' );

function blogcarousel_integrateWithVC() {

	$categories_array = array();
	$categories = get_categories();
	foreach( $categories as $category ){
	  $categories_array[] = $category->slug;
	}

   vc_map( array(
      "name" => __("Blog Carousel", 'luxi'),
      "base" => "blogcarousel",
      "class" => "",
	  	"icon" => get_template_directory_uri() . "/assets/luxi-icon.png",
      "category" => __('Luxi', 'luxi'),
      "params" => array(

								array(
											  'param_name'    => 'category_name',
											  'type'          => 'dropdown',
											  'value'         => $categories_array,
											  'heading'       => __('Select Category', 'luxi'),
											  'description'   => '',
											  'holder'        => 'div',
											  'class'         => ''
											),

								array(
												"type"        => "dropdown",
												"heading"     => __("Number of products in view", 'luxi'),
												"param_name"  => "luxi_products_per_row",
												"admin_label" => true,
												"value"       => array(
																								'1'   => '1',
																								'2'   => '2',
																								'3'   => '3',
																								'4'   => '4',
																								'5'   => '5'
																							),
												"description" => __("Number of products first visible.")
												),

								array(
												"type"        => "dropdown",
												"heading"     => __("Number of total products", 'luxi'),
												"param_name"  => "luxi_products_total",
												"admin_label" => true,
												"value"       => array(
																								'1'   => '1',
																								'2'   => '2',
																								'3'   => '3',
																								'4'   => '4',
																								'5'   => '5',
																								'6'   => '6',
																								'7'   => '7',
																								'8'   => '8',
																								'9'   => '9',
																								'10'   => '10',
																								'11'   => '11',
																								'12'   => '12'
																							),
												"description" => __("Number of products first visible.")
												),

								 array(
			                   "type"        => "dropdown",
			                   "heading"     => __("Nav Style", 'luxi'),
			                   "param_name"  => "luxi_nav_style",
			                   "admin_label" => true,
			                   "value"       => array(
			                                           'Dots'   => 'dots',
			                                           'Arrows'   => 'arrows'
			                                         ),
			                   "std"         => " ",
			                   "description" => __("Choose a naviagation style.")
			                   )
									 	)
			   ) );
}

// Testomonials Carousel
function testomonialcarousel_func( $atts ) {
	 ob_start();
   extract( shortcode_atts( array(
		'luxi_products_per_row' => '',
		'luxi_nav_style' => ''
   ), $atts ) );

	             $postsPerPage = 16;
	             $args = array(
	                     'post_type' => 'testimonials',
	                     'posts_per_page' => $postsPerPage
	             );

	             $loop = new WP_Query($args);
							 ?>

							 	<div class="testimonials owl-carousel <?php echo $luxi_products_per_row; ?>items <?php echo $luxi_nav_style; ?>nav">
									<?php
									$testimonials ='';
			            while ($loop->have_posts()) : $loop->the_post();
											$post_id = get_the_ID();
					            $testimonial_data = get_post_meta( $post_id, '_testimonial', true );
					            $client_name = ( empty( $testimonial_data['client_name'] ) ) ? '' : $testimonial_data['client_name'];
					            $source = ( empty( $testimonial_data['source'] ) ) ? '' : '' . $testimonial_data['source'];
					            $link = ( empty( $testimonial_data['link'] ) ) ? '' : $testimonial_data['link'];
					            $cite = ( $link ) ? '<a href="' . esc_url( $link ) . '" target="_blank">' . $source . '</a>' : $source;
											$avatar = get_the_post_thumbnail( $post_id, array( 100, 100) );

					            $testimonials .= '<div class = "testimonial">';
					            $testimonials .= '<span class="quote">&ldquo;</span>';
					            $testimonials .= '<div class="testimonial-text">' . get_the_content() . '</div>';
											$testimonials .= '<span class="thumb">' . $avatar . '</span>';
					            $testimonials .= '<p class="testimonial-client-name">' . $client_name . '</p>';
											$testimonials .= '<p class="testimonial-client-site">' . $cite . '</p>';
					            $testimonials .= '</div>';

		             	endwhile;

		echo $testimonials;
		?>
		</div>
		<?php
  	$myvariable = ob_get_clean();
		return $myvariable;
}
add_shortcode( 'testomonialcarousel', 'testomonialcarousel_func' );
add_action( 'vc_before_init', 'testomonialcarousel_integrateWithVC' );

function testomonialcarousel_integrateWithVC() {
   vc_map( array(
      "name" => __("Testomonial Carousel", 'luxi'),
      "base" => "testomonialcarousel",
      "class" => "",
	  	"icon" => get_template_directory_uri() . "/assets/luxi-icon.png",
      "category" => __('Luxi', 'luxi'),
      "params" => array(

								array(
												"type"        => "dropdown",
												"heading"     => __("Number in view", 'luxi'),
												"param_name"  => "luxi_products_per_row",
												"admin_label" => true,
												"value"       => array(
																								'1'   => '1',
																								'2'   => '2',
																								'3'   => '3',
																								'4'   => '4',
																								'5'   => '5'
																							),
												"std"         => " ",
												"description" => __("Number of testimonials first visible.")
												),

								 array(
			                   "type"        => "dropdown",
			                   "heading"     => __("Nav Style", 'luxi'),
			                   "param_name"  => "luxi_nav_style",
			                   "admin_label" => true,
			                   "value"       => array(
			                                           'Dots'   => 'dots',
			                                           'Arrows'   => 'arrows'
			                                         ),
			                   "std"         => " ",
			                   "description" => __("Choose a naviagation style.")
			                   )
									 	)
			   ) );
}

// Split Heading
function splitheading_func( $atts ) {
	 ob_start();
   extract( shortcode_atts( array(
		'luxi_split_title' => '',
		'luxi_split_sub_title' => '',
		'luxi_split_description' => '',
		'luxi_heading_style' => '',
		'css' => ''
   ), $atts ) );
	 $output ='';
	 	 $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'splitheading', $atts );
		 $output .= '<div class = "split-heading ' . $css_class . ' ' . $luxi_heading_style . '">';
		 $output .= '<div class = "left">';
		 $output .= '<h2>' . $luxi_split_title . '</h2>';
		 $output .= '<p>' . $luxi_split_sub_title . '</p>';
		 $output .= '</div>';
		 $output .= '<div class = "right">';
		 $output .= '<p>' . $luxi_split_description . '</p>';
		 $output .= '</div>';
		 $output .= '</div>';

		echo $output;
  	$myvariable = ob_get_clean();
		return $myvariable;
}
add_shortcode( 'splitheading', 'splitheading_func' );
add_action( 'vc_before_init', 'splitheading_integrateWithVC' );

function splitheading_integrateWithVC() {
   vc_map( array(
      "name" => __("Styled Heading", 'luxi'),
      "base" => "splitheading",
      "class" => "",
	  	"icon" => get_template_directory_uri() . "/assets/luxi-icon.png",
      "category" => __('Luxi', 'luxi'),
      "params" => array(

				array(
							 "type" => "textfield",
							 "holder" => "div",
							 "class" => "",
							 "heading" => __("Title", 'luxi'),
							 "param_name" => "luxi_split_title",
							 "value" => __("", 'luxi'),
							 "description" => __("Enter the heading title.", 'luxi')
						 ),
				 array(
 							 "type" => "textfield",
 							 "holder" => "div",
 							 "class" => "",
 							 "heading" => __("Sub Title", 'luxi'),
 							 "param_name" => "luxi_split_sub_title",
 							 "value" => __("", 'luxi'),
 							 "description" => __("Enter the sub heading text.", 'luxi')
						 ),
				 array(
				 			 "type" => "textfield",
				 			 "holder" => "div",
				 			 "class" => "",
				 			 "heading" => __("Description", 'luxi'),
				 			 "param_name" => "luxi_split_description",
				 			 "value" => __("", 'luxi'),
				 			 "description" => __("Enter the description text.", 'luxi')
						 ),
				 array(
 		             'type' => 'css_editor',
 		             'heading' => __( 'Css', 'luxi' ),
 		             'param_name' => 'css',
 		             'group' => __( 'Design options', 'luxi' ),
							),
				 array(
								 "type"        => "dropdown",
								 "heading"     => __("Heading Style", 'luxi'),
								 "param_name"  => "luxi_heading_style",
								 "admin_label" => true,
								 "value"       => array(
																				 'Simple'   => 'simple',
																				 'Split'   => 'split',
																				 'Dotted'   => 'dotted',
																			 ),
								 "std"         => " ",
								 "description" => __("Choose a heading style.")
								 )
						)

			  ) );
			}

// Feature Box
function featurebox_func( $atts ) {
	 ob_start();
   extract( shortcode_atts( array(
		'luxi_featurebox_title' => '',
		'luxi_featurebox_description' => '',
		'luxi_featurebox_link' => '',
		'luxi_featurebox_image' => '',
		'css' => ''
   ), $atts ));

	 	 $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'featurebox', $atts );
 	 	 $img = wp_get_attachment_image_src( $luxi_featurebox_image );
		 $output ='';
		 $output ='';
		 $output .= '<a href = "' . $luxi_featurebox_link . ' ">';
		 $output .= '<div class="feature-box-wrapper">';
		 $output .= '<div class = "feature-box Style3 ' . $css_class . ' ">';
		 if (!empty($img)) {
		 		$output .= '<img src= "' . $img[0] . '">';
				}
		 $output .= '</div>';
		 $output .= '<div class="feature-box-text Style3">';
		 $output .= '<h1>' . $luxi_featurebox_title . '</h1>';
		 $output .= '<p>' . $luxi_featurebox_description . '</p>';
		 $output .= '</div>';
		 $output .= '</div>';
		 $output .= '</a>';

		echo $output;
  	$myvariable = ob_get_clean();
		return $myvariable;
}
add_shortcode( 'featurebox', 'featurebox_func' );
add_action( 'vc_before_init', 'featurebox_integrateWithVC' );

function featurebox_integrateWithVC() {
   vc_map( array(
      "name" => __("Feature Box", 'luxi'),
      "base" => "featurebox",
      "class" => "",
	  	"icon" => get_template_directory_uri() . "/assets/luxi-icon.png",
      "category" => __('Luxi', 'luxi'),
      "params" => array(

				array(
							 "type" => "textfield",
							 "holder" => "div",
							 "class" => "",
							 "heading" => __("Title", 'luxi'),
							 "param_name" => "luxi_featurebox_title",
							 "value" => __("", 'luxi'),
							 "description" => __("Enter the heading title.", 'luxi')
						 ),
				 array(
				 			 "type" => "textfield",
				 			 "holder" => "div",
				 			 "class" => "",
				 			 "heading" => __("Description", 'luxi'),
				 			 "param_name" => "luxi_featurebox_description",
				 			 "value" => __("", 'luxi'),
				 			 "description" => __("Enter the description text.", 'luxi')
						 ),

				 array(
				 			 "type" => "textfield",
				 			 "holder" => "div",
				 			 "class" => "",
				 			 "heading" => __("Link", 'luxi'),
				 			 "param_name" => "luxi_featurebox_link",
				 			 "value" => __("", 'luxi'),
				 			 "description" => __("Enter the url for the link ( include http:// ).", 'luxi')
						 ),



				 array(
              "type" => "attach_image",
              "class" => "",
              "heading" => __("Box Image / Icon", 'luxi'),
              "param_name" => "luxi_featurebox_image",
              "description" => __("The image displayed in the box", 'luxi')
          	),
			array(
	             'type' => 'css_editor',
	             'heading' => __( 'Css', 'luxi' ),
	             'param_name' => 'css',
	             'group' => __( 'Design options', 'luxi' ),
	         		)
						)
			  ) );
			}

// Call to Action Box
function calltoaction_func( $atts ) {
	 ob_start();
   extract( shortcode_atts( array(
		'luxi_calltoaction_title' => '',
		'luxi_calltoaction_description' => '',
		'luxi_calltoaction_link' => '',
		'luxi_calltoaction_button' => '',
		'css' => ''
   ), $atts ));

$output ='';
	 	 $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'featurebox', $atts );
		 $output .= '<div class = "calltoaction-box ' . $css_class . ' ">';
		 $output .= '<div class = "left">';
		 $output .= '<h1>' . $luxi_calltoaction_title . '</h1>';
		 $output .= '<p>' . $luxi_calltoaction_description . '</p>';
		 $output .= '</div>';
		 $output .= '<div class = "right">';
		 $output .= '<a href = "' . $luxi_calltoaction_link . ' ">';
		 $output .= $luxi_calltoaction_button;
		 $output .= '</a>';
		 $output .= '</div>';
		 $output .= '</div>';
		 $output .= '</a>';

		echo $output;
  	$myvariable = ob_get_clean();
		return $myvariable;
}
add_shortcode( 'calltoaction', 'calltoaction_func' );
add_action( 'vc_before_init', 'calltoaction_integrateWithVC' );

function calltoaction_integrateWithVC() {
   vc_map( array(
      "name" => __("Call to Action", 'luxi'),
      "base" => "calltoaction",
      "class" => "",
	  	"icon" => get_template_directory_uri() . "/assets/luxi-icon.png",
      "category" => __('Luxi', 'luxi'),
      "params" => array(

				array(
							 "type" => "textfield",
							 "holder" => "div",
							 "class" => "",
							 "heading" => __("Title", 'luxi'),
							 "param_name" => "luxi_calltoaction_title",
							 "value" => __("", 'luxi'),
							 "description" => __("Enter the box title.", 'luxi')
						 ),
				 array(
				 			 "type" => "textfield",
				 			 "holder" => "div",
				 			 "class" => "",
				 			 "heading" => __("Description", 'luxi'),
				 			 "param_name" => "luxi_calltoaction_description",
				 			 "value" => __("", 'luxi'),
				 			 "description" => __("Enter the box description.", 'luxi')
						 ),

				 array(
				 			 "type" => "textfield",
				 			 "holder" => "div",
				 			 "class" => "",
				 			 "heading" => __("Button Text", 'luxi'),
				 			 "param_name" => "luxi_calltoaction_button",
				 			 "value" => __("", 'luxi'),
				 			 "description" => __("Enter the button text", 'luxi')
						 ),

				 array(
				 			 "type" => "textfield",
				 			 "holder" => "div",
				 			 "class" => "",
				 			 "heading" => __("Link", 'luxi'),
				 			 "param_name" => "luxi_calltoaction_link",
				 			 "value" => __("", 'luxi'),
				 			 "description" => __("Enter the url for the button ( include http:// ).", 'luxi')
						 ),
			array(
	             'type' => 'css_editor',
	             'heading' => __( 'Css', 'luxi' ),
	             'param_name' => 'css',
	             'group' => __( 'Design options', 'luxi' ),
	         		)
					)
			  ) );
			}

			// Testomonials Custom Post
			add_action( 'init', 'luxi_testimonials_post_type' );
			function luxi_testimonials_post_type() {
					$labels = array(
							'name' => esc_html__( 'Testimonials', 'luxi' ),
							'singular_name' => esc_html__( 'Testimonial', 'luxi' ),
							'add_new' => esc_html__( 'Add New', 'luxi' ),
							'add_new_item' => esc_html__( 'Add New Testimonial', 'luxi' ),
							'edit_item' => esc_html__( 'Edit Testimonial', 'luxi' ),
							'new_item' => esc_html__( 'New Testimonial', 'luxi' ),
							'view_item' => esc_html__( 'View Testimonial', 'luxi' ),
							'search_items' => esc_html__( 'Search Testimonials', 'luxi' ),
							'not_found' =>  esc_html__( 'No Testimonials found', 'luxi' ),
							'not_found_in_trash' => esc_html__( 'No Testimonials in the trash', 'luxi' ),
							'parent_item_colon' => '',
					);

					register_post_type( 'testimonials', array(
							'labels' => $labels,
							'public' => true,
							'publicly_queryable' => true,
							'show_ui' => true,
							'exclude_from_search' => true,
							'query_var' => true,
							'rewrite' => true,
							'capability_type' => 'post',
							'has_archive' => true,
							'hierarchical' => false,
							'menu_position' => 10,
							'supports' => array( 'editor', 'thumbnail' ),
							'register_meta_box_cb' => 'luxi_testimonials_meta_boxes', // Callback function for custom metaboxes
					) );
			}

			// Testomials Setup
			function luxi_testimonials_meta_boxes() {
				add_meta_box( 'luxi_testimonials_form', 'Testimonial Details', 'luxi_testimonials_form', 'testimonials', 'normal', 'high' );
			}

			function luxi_testimonials_form() {
					$post_id = get_the_ID();
					$testimonial_data = get_post_meta( $post_id, '_testimonial', true );
					$client_name = ( empty( $testimonial_data['client_name'] ) ) ? '' : $testimonial_data['client_name'];
					$source = ( empty( $testimonial_data['source'] ) ) ? '' : $testimonial_data['source'];
					$link = ( empty( $testimonial_data['link'] ) ) ? '' : $testimonial_data['link'];
					wp_nonce_field( 'testimonials', 'testimonials' );
					?>
					<p>
							<label><?php echo esc_html__('Clients Name (optional)', 'luxi' ); ?></label><br />
							<input type="text" value="<?php echo $client_name; ?>" name="testimonial[client_name]" size="40" />
					</p>
					<p>
							<label><?php echo esc_html__('Business Name (optional)', 'luxi' ); ?></label><br />
							<input type="text" value="<?php echo $source; ?>" name="testimonial[source]" size="40" />
					</p>
					<p>
							<label><?php echo esc_html__('Link (optional)', 'luxi' ); ?></label><br />
							<input type="text" value="<?php echo $link; ?>" name="testimonial[link]" size="40" />
					</p>
					<?php
			}

			add_action( 'save_post', 'luxi_testimonials_save_post' );
			function luxi_testimonials_save_post( $post_id ) {
					if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
							return;

					if ( ! empty( $_POST['testimonials'] ) && ! wp_verify_nonce( $_POST['testimonials'], 'testimonials' ) )
							return;

					if ( ! empty( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
							if ( ! current_user_can( 'edit_page', $post_id ) )
									return;
					} else {
							if ( ! current_user_can( 'edit_post', $post_id ) )
									return;
					}

					if ( ! wp_is_post_revision( $post_id ) && 'testimonials' == get_post_type( $post_id ) ) {
							remove_action( 'save_post', 'luxi_testimonials_save_post' );

							wp_update_post( array(
									'ID' => $post_id,
									'post_title' => esc_html__( 'Testimonial - ', 'luxi' ) . $post_id
							) );

							add_action( 'save_post', 'luxi_testimonials_save_post' );
					}

					if ( ! empty( $_POST['testimonial'] ) ) {
							$testimonial_data['client_name'] = ( empty( $_POST['testimonial']['client_name'] ) ) ? '' : sanitize_text_field( $_POST['testimonial']['client_name'] );
							$testimonial_data['source'] = ( empty( $_POST['testimonial']['source'] ) ) ? '' : sanitize_text_field( $_POST['testimonial']['source'] );
							$testimonial_data['link'] = ( empty( $_POST['testimonial']['link'] ) ) ? '' : esc_url( $_POST['testimonial']['link'] );

							update_post_meta( $post_id, '_testimonial', $testimonial_data );
					} else {
							delete_post_meta( $post_id, '_testimonial' );
					}
			}
?>
