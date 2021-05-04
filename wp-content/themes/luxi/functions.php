<?php
// Luxi Theme Functions File

// Include Files
require_once get_template_directory().'/inc/template-tags.php';
require_once get_template_directory().'/inc/theme-options.php';
require_once get_template_directory().'/inc/class-tgm-plugin-activation.php';

// Theme Setup Stage 1

if ( ! function_exists( 'luxi_setup' ) ) :

	function luxi_setup() {

		// Make theme available for translation
		load_theme_textdomain( 'luxi', get_template_directory() . '/languages' );

		// Add required theme supports
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'custom-header' );

		// Add editor style
		add_editor_style( get_stylesheet_uri() );

	}

endif;
add_action( 'after_setup_theme', 'luxi_setup' );

// Theme Setup Stage 2

	// Set Content Width
	function luxi_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'luxi_content_width', 1600 );
	}
	add_action( 'after_setup_theme', 'luxi_content_width', 0 );

	// Register Widgets
	function luxi_widgets_init() {

		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'luxi' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Default Sidebar', 'luxi' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Shop', 'luxi' ),
			'id'            => 'shop',
			'description'   => esc_html__( 'Shop Sidebar', 'luxi' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Area 1', 'luxi' ),
			'id'            => 'footer-area-1',
			'description'   => esc_html__( 'Footer Area 1', 'luxi' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Area 2', 'luxi' ),
			'id'            => 'footer-area-2',
			'description'   => esc_html__( 'Footer Area 2', 'luxi' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
				'name'          => esc_html__( 'Footer Area 3', 'luxi' ),
				'id'            => 'footer-area-3',
				'description'   => esc_html__( 'Footer Area 3', 'luxi' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );

			register_sidebar( array(
				'name'          => esc_html__( 'Footer Area 4', 'luxi' ),
				'id'            => 'footer-area-4',
				'description'   => esc_html__( 'Footer Area 4', 'luxi' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );

		register_sidebar( array(
				'name'          => esc_html__( 'Footer Area 5', 'luxi' ),
				'id'            => 'footer-area-5',
				'description'   => esc_html__( 'Footer Area 5', 'luxi' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );

			register_sidebar( array(
					'name'          => esc_html__( 'Footer Area 6', 'luxi' ),
					'id'            => 'footer-area-6',
					'description'   => esc_html__( 'Footer Area 6', 'luxi' ),
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				) );

				register_sidebar( array(
					'name'          => esc_html__( 'Footer Area 7', 'luxi' ),
					'id'            => 'footer-area-7',
					'description'   => esc_html__( 'Footer Area 7', 'luxi' ),
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				) );
	}

	add_action( 'widgets_init', 'luxi_widgets_init' );

	// Register Menus
	function luxi_register_menus() {
		  register_nav_menu( 'main-menu', esc_html__( 'Main Menu', 'luxi' ) );
			register_nav_menu( 'secondary-menu', esc_html__( 'Secondary Menu', 'luxi' ) );
		}
	add_action( 'after_setup_theme', 'luxi_register_menus' );

	// Enqueue JS & CSS
	function luxi_scripts() {

		wp_enqueue_style( 'luxi-reset', get_template_directory_uri() . '/css/reset.css' );
		wp_enqueue_style( 'luxi-master', get_template_directory_uri() . '/css/master.css' );
		wp_enqueue_style( 'luxi-ie', get_template_directory_uri() . '/css/ie.css' );
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css' );
		wp_enqueue_style( 'owl-carousel-default', get_template_directory_uri() . '/css/owl.theme.default.min.css' );
		wp_enqueue_style( 'luxi-icon-font', get_template_directory_uri() . '/css/fonts.css' );
		wp_enqueue_style( 'luxi-theme', get_template_directory_uri() . '/css/theme.css' );
		wp_enqueue_style( 'luxi-fonts', luxi_fonts_url(), array(), null );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), false );


		if ( get_theme_mod( 'select_header_layout' ) == '1') {
			wp_enqueue_style( 'luxi-header-trans', get_template_directory_uri() . '/css/layouts/header-trans.css', array(), false  );
		} else if ( get_theme_mod( 'select_header_layout' ) == '2') {
			wp_enqueue_style( 'luxi-header-classic', get_template_directory_uri() . '/css/layouts/header-classic.css', array(), false  );
		} else {
			wp_enqueue_style( 'luxi-header-classic', get_template_directory_uri() . '/css/layouts/header-classic.css', array(), false  );
		}

		if ( get_theme_mod( 'select_blog_layout' ) == 'left') {
			wp_enqueue_style( 'luxi-left-sidebar', get_template_directory_uri() . '/css/layouts/left-sidebar.css' );
		} else if ( get_theme_mod( 'select_blog_layout' ) == 'right') {
			wp_enqueue_style( 'luxi-right-sidebar', get_template_directory_uri() . '/css/layouts/right-sidebar.css' );
		} else if ( get_theme_mod( 'select_blog_layout' ) == 'none') {
			wp_enqueue_style( 'luxi-no-sidebar', get_template_directory_uri() . '/css/layouts/no-sidebar.css' );
		} else {
			wp_enqueue_style( 'luxi-right-sidebar', get_template_directory_uri() . '/css/layouts/right-sidebar.css' );
		}

		if ( get_theme_mod( 'select_shop_layout' ) == 'left') {
			wp_enqueue_style( 'luxi-shop-left-sidebar', get_template_directory_uri() . '/css/layouts/shop-left-sidebar.css' );
		} else if ( get_theme_mod( 'select_shop_layout' ) == 'right') {
			wp_enqueue_style( 'luxi-shop-right-sidebar', get_template_directory_uri() . '/css/layouts/shop-right-sidebar.css' );
		} else if ( get_theme_mod( 'select_shop_layout' ) == 'none') {
			wp_enqueue_style( 'luxi-shop-no-sidebar', get_template_directory_uri() . '/css/layouts/shop-no-sidebar.css' );
		} else {
			wp_enqueue_style( 'luxi-shop-right-sidebar', get_template_directory_uri() . '/css/layouts/shop-right-sidebar.css' );
		}

		if ( get_theme_mod( 'select_smoothscrolling' ) == 'on') {
			wp_enqueue_script( 'luxi-smooth-scrolling', get_template_directory_uri() . '/js/smoothscrolling.js', array(), '', true );
		}

		wp_enqueue_script( 'waypoint', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array('jquery'), '', true);
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '', true);
		wp_enqueue_script( 'owl-navigation', get_template_directory_uri() . '/js/owl.navigation.js', array('jquery'), '', true);
		wp_enqueue_script( 'owl-autoplay', get_template_directory_uri() . '/js/owl.autoplay.js', array('jquery'), '', true);
		wp_enqueue_script( 'owl-animate', get_template_directory_uri() . '/js/owl.animate.js', array('jquery'), '', true);
		wp_enqueue_script( 'luxi-theme-scripts', get_template_directory_uri() . '/js/theme.js', array('waypoint'), '', true );

		wp_enqueue_script( 'luxi-ajax', get_template_directory_uri() . '/js/ajax.js', array('jquery'), '', true );
		wp_localize_script( 'luxi-ajax', 'luxi_ajax_obj', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	add_action( 'wp_enqueue_scripts', 'luxi_scripts' );

	// Add CSS Styling from Theme Options
	function luxi_add_styles() {
	    wp_enqueue_style(
	        'luxi-custom-styles',
	        get_template_directory_uri() . '/css/theme.css'
	    );

			$header_top_color = get_theme_mod( 'luxi_header_top_color' );
			$footer_top_color = get_theme_mod( 'luxi_footer_top_color' );
			$footer_bottom_color = get_theme_mod( 'luxi_footer_bottom_color' );
			$move_logo_up = get_theme_mod( 'move_logo_up' );
			$move_logo_left = get_theme_mod( 'move_logo_left' );
			$extra_css = get_theme_mod( 'custom_css' );

			$custom_css = "

			.footer-row.top {
				background: {$footer_top_color}!important;
			}

			.footer-row.bottom {
				background: {$footer_bottom_color}!important;
			}

			.site-logo, .widget_elusive_logo_widget {
				position:relative;
				top: {$move_logo_up}px!important;
				left: {$move_logo_left}px!important;
			}
			";

			$custom_css .= "{$extra_css}";

			wp_add_inline_style( 'luxi-custom-styles', $custom_css );
	}
	add_action( 'wp_enqueue_scripts', 'luxi_add_styles' );

	// Add Woocommerce Support
	if ( class_exists( 'WooCommerce' ) ) {
		function luxi_woocommerce_support() {
	    	add_theme_support( 'woocommerce' );
				add_theme_support( 'wc-product-gallery-lightbox' );
				add_theme_support( 'wc-product-gallery-slider' );
		}
		add_action( 'after_setup_theme', 'luxi_woocommerce_support' );
	}

	// Change number or products per row
	add_filter('loop_shop_columns', 'loop_columns');
	if (!function_exists('loop_columns')) {
		function loop_columns() {
			return 3;
		}
	}

	add_filter( 'woocommerce_output_related_products_args', 'luxi_change_number_related_products' );

	function luxi_change_number_related_products( $args ) {

	 $args['posts_per_page'] = 3; // # of related products
	 $args['columns'] = 3; // # of columns per row
	 return $args;
	}

	// Move product meta
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	add_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_single_meta', 10 );

	//* Customize [...] in WordPress excerpts
	function luxi_read_more_custom_excerpt( $text ) {
	   if ( strpos( $text, '[&hellip;]') ) {
	      $excerpt = str_replace( '[&hellip;]', '...', $text );
	   } else {
	      $excerpt = $text . '...';
	   }
	   return $excerpt;
	}
	add_filter( 'the_excerpt', 'luxi_read_more_custom_excerpt' );

	// Add woo body class if needed
	function luxi_woo_body_class( $c ) {
  global $post;
  if( isset($post->post_content) && has_shortcode( $post->post_content, 'productgrid' ) ) {
      $c[] = 'woocommerce';
  }
  return $c;
	}
	add_filter( 'body_class', 'luxi_woo_body_class' );

	// Setup TGM Plugin Recommendations
	function luxi_register_required_plugins() {

	    $plugins = array(

			array(
        'name'          => esc_html__('Visual Composer', 'luxi' ),
        'slug'          => 'js_composer',
        'source'        => 'http://themes.eovo.uk/plugins/js_composer.zip',
        'required'          => true,
        'force_activation'      => false,
        'force_deactivation'    => false,
    	),

			array(
        'name'          => esc_html__('Revolution Slider', 'luxi' ),
        'slug'          => 'revslider',
        'source'        => 'http://themes.eovo.uk/plugins/revslider.zip',
        'required'          => false,
        'force_activation'      => false,
        'force_deactivation'    => false,
    	),

			array(
        'name'          => esc_html__('Luxi Shortcodes', 'luxi' ),
        'slug'          => 'luxi-shortcodes',
        'source'        => get_template_directory() . '/plugins/luxi-shortcodes.tar',
        'required'          => false,
        'force_activation'      => false,
        'force_deactivation'    => false,
    	),

			array(
				'name'          => esc_html__( 'Wishlist', 'luxi'),
				'slug'          => 'wish-list-for-woocommerce',
				'required'          => false,
			),

			array(
				'name'          => esc_html__( 'Quick View', 'luxi'),
				'slug'          => 'yith-woocommerce-quick-view',
				'required'          => false,
			),

			array(
        'name'          => esc_html__( 'Woocommerce', 'luxi'),
        'slug'          => 'woocommerce',
        'required'          => false,
    	),

			array(
				'name'      => esc_html__( 'One Click Demo Import', 'luxi'),
				'slug'      => 'one-click-demo-import',
				'required'  => false,
			),

			array(
				'name'      => esc_html__( 'Easy Google Fonts', 'luxi'),
				'slug'      => 'easy-google-fonts',
				'required'  => false,
			),

			array(
				'name'      => esc_html__( 'Contact Form 7', 'luxi'),
				'slug'      => 'contact-form-7',
				'required'  => false,
			),

		);

	    $theme_text_domain = 'luxi';

	    $config = array(
	        'default_path' => '',
	        'menu'         => 'tgmpa-install-plugins',
	        'has_notices'  => true,
	        'dismissable'  => true,
	        'dismiss_msg'  => '',
	        'is_automatic' => true,
	        'message'      => '',
	        'strings'      => array(
	            'page_title'                      => esc_html__( 'Install Required Plugins', 'luxi' ),
	            'menu_title'                      => esc_html__( 'Install Plugins', 'luxi' ),
	            'installing'                      => esc_html__( 'Installing Plugin: %s', 'luxi' ), // %s = plugin name.
	            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'luxi' ),
	            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'luxi'  ), // %1$s = plugin name(s).
	            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'luxi'  ), // %1$s = plugin name(s).
	            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'luxi'  ), // %1$s = plugin name(s).
	            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'luxi'  ), // %1$s = plugin name(s).
	            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'luxi'  ), // %1$s = plugin name(s).
	            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'luxi'  ), // %1$s = plugin name(s).
	            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'luxi'  ), // %1$s = plugin name(s).
	            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'luxi'  ), // %1$s = plugin name(s).
	            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'luxi'  ),
	            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'luxi'  ),
	            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'luxi' ),
	            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'luxi' ),
	            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'luxi' ), // %s = dashboard link.
	            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
	        )
	    );

	    tgmpa( $plugins, $config );
	}

	add_action( 'tgmpa_register', 'luxi_register_required_plugins' );

		// Update Header Cart Count
		add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
		function woocommerce_header_add_to_cart_fragment( $fragments ) {
		    ob_start();
		    ?>
				<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'luxi' ); ?>">
				  <?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'luxi'  ), WC()->cart->get_cart_contents_count() ); ?>
				</a>
		    <?php

		    $fragments['a.cart-contents'] = ob_get_clean();

		    return $fragments;
		}

		// Modify Woo Breadcrumb
		add_filter( 'woocommerce_breadcrumb_defaults', 'luxi_change_breadcrumb_delimiter' );
		function luxi_change_breadcrumb_delimiter( $defaults ) {
			// Change the breadcrumb delimeter
			$defaults['delimiter'] = ' <div class="crumb"> &#47; </div>';
			return $defaults;
		}

		//AJAX
		function luxi_ajax_request() {

			if ( isset($_REQUEST) ) {

				$cat = $_REQUEST['cat'];
				if ($cat == 'All'){$cat = '';}

				 $params = array(
								 'posts_per_page' => 6,
								 'post_type' => 'product',
								 'product_cat' => $cat
				 );
				 $wc_query = new WP_Query($params);
				 $totalpages = $wc_query->max_num_pages;

				 ?>
				 <?php if ($wc_query->have_posts()) : ?>
				<div class="et-product-grid-wrapper">
				 <ul class="products" data-totalpages="<?php echo esc_html($totalpages); ?>">

				 <?php while ($wc_query->have_posts()) :
												 $wc_query->the_post();  ?>

												 <?php wc_get_template_part( 'content', 'product' ); ?>

				 <?php endwhile; ?>
				 </ul>
				 <?php if ($totalpages > 1){?>
				 	<div class="et-load-more" data-category="<?php echo esc_html($cat);?>" data-pager="1">
				 		<span><?php echo esc_html__( 'Load More', 'luxi'); ?></span>
			 		</div>
				<?php } ?>

			 </div>
				 <?php wp_reset_postdata();  ?>
				 <?php else:  ?>
				 <p>
							<?php echo esc_html__( 'No Products', 'luxi'); ?>
				 </p>
				 <?php endif;

			 die();
		}}

		add_action( 'wp_ajax_luxi_ajax_request', 'luxi_ajax_request' );
		add_action( 'wp_ajax_nopriv_luxi_ajax_request', 'luxi_ajax_request' );


		function more_post_ajax(){

				$cat = $_REQUEST['cat'];
				$page = $_REQUEST['page'];
				$ppp = $_REQUEST['ppp'];
				$totalpages = $_REQUEST['total'];

				if ($cat == 'All'){$cat = '';}

		    $args = array(
		        'post_type' => 'product',
		        'posts_per_page' => $ppp,
		        'product_cat' => $cat,
		        'paged'    => $page
		    );

		    $loop = new WP_Query($args);
		    $out = '';

				?>

				<ul class="products" data-totalpages="<?php echo esc_html($totalpages); ?>">

				<?php
		    if ($loop -> have_posts()) :
					while ($loop -> have_posts()) : $loop -> the_post();
		        $out .= wc_get_template_part( 'content', 'product' );
		    	endwhile;
					?>
				</ul>

				<?php if ($totalpages != $page){?>
				 <div class="et-load-more" data-total ="<?php echo esc_html($totalpages);?>" data-category="<?php echo esc_html($cat);?>" data-pager="<?php echo esc_html($page);?>">
					 <span><?php echo esc_html__( 'Load More', 'luxi'); ?></span>
				 </div>
				<?php } ?>

			<?php
		    endif;
		    wp_reset_postdata();
		    die();
		}

		add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
		add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

		// Add Google Fonts
		function luxi_fonts_url() {
		    $font_url = '';

		    if ( 'off' !== _x( 'on', 'Google font: on or off', 'luxi' ) ) {
		        $font_url = add_query_arg( 'family', urlencode( 'Open Sans:400,600,700|Lato:100,300&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
		    }
		    return $font_url;
		}

		function luxi_font_scripts() {
		    wp_enqueue_style( 'luxi-fonts', luxi_fonts_url(), array(), '1.0.0' );
		}
		add_action( 'wp_enqueue_scripts', 'luxi_font_scripts' );

		// One Click Demo Settings
		function luxi_ocdi_import_files() {
		  return array(
		    array(
		      'import_file_name'             => esc_html__('Demo Import 1','luxi'),
		      'local_import_file'            => trailingslashit( get_template_directory() ) . 'ocdi/demo-content.xml',

		    ),
		  );
		}
		add_filter( 'pt-ocdi/import_files', 'luxi_ocdi_import_files' );

		// Assign Demo Menus to Locations, Set Homepage and Install Demo Sliders
		if ( ! function_exists( 'luxi_after_import' ) ) :
		    function luxi_after_import( $selected_import ) {

		            //Set Menu
		            $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');
		            $secondary_menu = get_term_by('name', 'Secondary Menu', 'nav_menu');
		            $mobile_menu = get_term_by('name', 'Mobile Menu', 'nav_menu');
		            set_theme_mod( 'nav_menu_locations' , array(
		                  'main-menu' => $main_menu->term_id,
		                  'secondary-menu' => $secondary_menu->term_id
		                 )
		            );

		             //Set Front page
		             $page = get_page_by_title( 'Fullscreen Slider v2');
		             if ( isset( $page->ID ) ) {
		              update_option( 'page_on_front', $page->ID );
		              update_option( 'show_on_front', 'page' );
		             }

		    }

		    add_action( 'pt-ocdi/after_import', 'luxi_after_import' );
		    endif;

		// Import Mega Menu Settings
		function megamenu_add_theme_luxi_megamenu_1497037692($themes) {
    $themes["luxi_megamenu_1497037692"] = array(
        'title' => 'Luxi MegaMenu',
        'container_background_from' => 'rgba(255, 255, 255, 0)',
        'container_background_to' => 'rgba(255, 255, 255, 0)',
        'arrow_up' => 'disabled',
        'arrow_down' => 'disabled',
        'arrow_left' => 'disabled',
        'arrow_right' => 'disabled',
        'menu_item_background_hover_from' => 'rgba(255, 255, 255, 0)',
        'menu_item_background_hover_to' => 'rgba(255, 255, 255, 0)',
        'menu_item_link_height' => '30px',
        'menu_item_link_color' => 'rgb(102, 102, 102)',
        'menu_item_link_weight' => '300',
        'menu_item_link_color_hover' => 'rgb(106, 106, 106)',
        'menu_item_link_weight_hover' => '300',
        'menu_item_highlight_current' => 'off',
        'menu_item_divider_color' => 'rgba(255, 255, 255, 0)',
        'panel_background_from' => 'rgb(34, 34, 34)',
        'panel_background_to' => 'rgb(41, 41, 41)',
        'panel_width' => '660px',
        'panel_inner_width' => '660px',
        'panel_header_color' => 'rgb(232, 232, 232)',
        'panel_header_border_color' => '#555',
        'panel_padding_left' => '16px',
        'panel_padding_right' => '16px',
        'panel_padding_top' => '20px',
        'panel_padding_bottom' => '36px',
        'panel_widget_padding_top' => '3px',
        'panel_widget_padding_bottom' => '3px',
        'panel_font_size' => '14px',
        'panel_font_color' => 'rgb(243, 243, 243)',
        'panel_font_family' => 'inherit',
        'panel_second_level_font_color' => 'rgb(232, 232, 232)',
        'panel_second_level_font_color_hover' => 'rgb(255, 255, 255)',
        'panel_second_level_text_transform' => 'none',
        'panel_second_level_font' => 'inherit',
        'panel_second_level_font_size' => '14px',
        'panel_second_level_font_weight' => '300',
        'panel_second_level_font_weight_hover' => '300',
        'panel_second_level_text_decoration' => 'none',
        'panel_second_level_text_decoration_hover' => 'none',
        'panel_second_level_border_color' => '#555',
        'panel_third_level_font_color' => 'rgb(221, 221, 221)',
        'panel_third_level_font_color_hover' => '#666',
        'panel_third_level_font' => 'inherit',
        'panel_third_level_font_size' => '14px',
        'flyout_menu_background_from' => 'rgb(34, 34, 34)',
        'flyout_menu_background_to' => 'rgb(41, 41, 41)',
        'flyout_padding_top' => '20px',
        'flyout_padding_right' => '20px',
        'flyout_padding_bottom' => '20px',
        'flyout_padding_left' => '20px',
        'flyout_link_padding_top' => '4px',
        'flyout_link_padding_bottom' => '4px',
        'flyout_link_weight' => '300',
        'flyout_link_weight_hover' => '300',
        'flyout_link_height' => '25px',
        'flyout_background_from' => 'rgba(255, 255, 255, 0)',
        'flyout_background_to' => 'rgba(255, 255, 255, 0)',
        'flyout_background_hover_from' => 'rgba(255, 255, 255, 0)',
        'flyout_background_hover_to' => 'rgba(255, 255, 255, 0)',
        'flyout_link_size' => '14px',
        'flyout_link_color' => 'rgb(172, 172, 172)',
        'flyout_link_color_hover' => 'rgb(221, 221, 221)',
        'flyout_link_family' => 'inherit',
        'responsive_breakpoint' => '0px',
        'toggle_background_from' => '#222',
        'toggle_background_to' => '#222',
        'toggle_font_color' => 'rgb(102, 102, 102)',
        'mobile_background_from' => '#222',
        'mobile_background_to' => '#222',
        'mobile_menu_item_link_font_size' => '14px',
        'mobile_menu_item_link_color' => '#ffffff',
        'mobile_menu_item_link_text_align' => 'left',
        'disable_mobile_toggle' => 'on',
        'custom_css' => '/** Push menu onto new line **/
#{$wrap} {
    clear: both;
}',
    );
    return $themes;
}
add_filter("megamenu_themes", "megamenu_add_theme_luxi_megamenu_1497037692");

?>
