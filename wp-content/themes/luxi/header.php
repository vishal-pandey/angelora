<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!-- Start of Header -->
  <header class="site-header starter">

    <div class="header-row top">
      <div class="header-block left">

          <?php
          if ( get_theme_mod( 'top_text' ) ) :
                echo esc_attr( get_theme_mod( 'top_text' ) );;
            else:
            endif;
          ?>

      </div>

      <div class="header-block right">

        <div class="search-box">
            <span><div class="search-button"><i class="fa fa-search"></i></div></span>
        </div>

        <?php if ( class_exists( 'WooCommerce' ) ) { ?>
        <div class="cart-box">
            <span><?php echo esc_html__( 'Cart', 'luxi'); ?></span>
            <span class="cart-counter">
              <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_html__( 'View your shopping cart', 'luxi' ); ?>">
                <?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'luxi' ), WC()->cart->get_cart_contents_count() ); ?>
              </a>
            </span>
        </div>
        <?php } ?>
        <div class="header-menu-right">
          <?php
          if ( has_nav_menu( 'secondary-menu' ) ) {
               wp_nav_menu( array( 'theme_location' => 'secondary-menu' ) );
          } ?>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="header-row bottom">

        <div class="header-block">
            <?php
          if ( get_theme_mod( 'large_logo' ) ) :
                ?>
                <a href ="<?php echo esc_url(home_url('/')); ?>">
                  <?php
                echo '<img src="' . esc_url( get_theme_mod( 'large_logo' ) ) . '">';
                ?></a><?php
            else:?>
            <a href ="<?php echo esc_url(home_url('/')); ?>">
              <h1 class="site-title">
                <?php echo get_bloginfo('name'); ?>
              </h1>
            </a>
            <?php
            endif;
            ?>
        </div>

        <div class="header-block">

          <div class="header-menu-left">
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
          </div>

        </div>
      </div>

    </div>

  </header>

  <!-- Start of Sticky Header -->
  <header class="site-header hidden">

    <div class="header-row top">
      <div class="header-block left">
        <a href ="<?php echo esc_url(home_url('/')); ?>">
        <div class="site-logo">
          <?php luxi_display_logo();?>
        </div>
      </a>
        <div class="header-menu-left">
          <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
        </div>
      </div>

      <div class="header-block right">

        <div class="search-box">
            <span><div class="search-button"><i class="fa fa-search"></i></div></span>
        </div>

        <?php if ( class_exists( 'WooCommerce' ) ) { ?>
        <div class="cart-box">
            <span><?php echo esc_html__( 'Cart', 'luxi'); ?></span>
            <span class="cart-counter">
              <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_html__( 'View your shopping cart', 'luxi' ); ?>">
                <?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'luxi' ), WC()->cart->get_cart_contents_count() ); ?>
              </a>
            </span>
        </div>
        <?php } ?>
        <div class="header-menu-right">
          <?php
          if ( has_nav_menu( 'secondary-menu' ) ) {
               wp_nav_menu( array( 'theme_location' => 'secondary-menu' ) );
          } ?>

        </div>
      </div>
    </div>

  </header>

  <div class="site-logo-mob">
    <span class="img-center"></span>
    <?php luxi_display_logo();?>
  </div>

  <div class="menu-box-mob">
      <div class="menu-icon"></div>
  </div>

  <!-- Start of Slide Out Cart -->
  <?php if ( class_exists( 'WooCommerce' ) ) { ?>
    <div class="cart-sidebar-dark-overlay hidden"></div>
      <div class="cart-sidebar hidden">

          <div class="cart-sidebar-inner">
              <h3><?php esc_html_e( 'Shopping Cart', 'luxi' ); ?></h3>
                  <?php woocommerce_mini_cart(); ?>
          </div>
          <div class="closeicon small hidden"></div>
      </div>
  <?php } ?>

  <!-- Start of Main Container -->
  <div class="container">

    <!-- Start of Preloader -->
    <div class="preloader"></div>

        <!-- Start of Mobile Menu -->
        <div class="mobile-menu menu-overlay hidden">
        <div class="scroller">
          <div class="closeicon small">
          </div>
          <h2><?php echo esc_html__( 'Menu', 'luxi'); ?></h2>
          <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
        </div>
        </div>

        <!-- Start of Mini Cart -->
        <?php if ( class_exists( 'WooCommerce' ) ) { ?>
        <div class="mini-cart-container hidden">
            <?php woocommerce_mini_cart(); ?>
        </div>
        <?php } ?>

        <!-- Start of Search Overlay -->
        <div class="search-menu search-overlay hidden">
          <div class="search-overlay-inner">
            <?php get_search_form(); ?>
            <div class="closeicon"></div>
          </div>
        </div>
