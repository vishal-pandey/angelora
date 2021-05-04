<?php
/**
 * Default Hooks
 * @package WooFeed
 * @subpackage WooFeed_Helper_Functions
 * @version 1.0.0
 * @since WooFeed 3.3.0
 * @author KD <mhamudul.hk@gmail.com>
 * @copyright WebAppick
 */

if ( ! defined( 'ABSPATH' ) ) {
	die(); // Silence...
}
/** @define "WOO_FEED_FREE_ADMIN_PATH" "./../admin/" */ // phpcs:ignore

// Admin Page Form Actions.

// The Editor.
add_filter( 'woo_feed_parsed_rules', 'woo_feed_filter_parsed_rules', 10, 2 );

// Mics.
add_action( 'admin_post_wf_export_feed', 'woo_feed_export_config', 10 );
add_action( 'admin_post_wpf_import', 'woo_feed_import_config' );

// Product Loop Start.
add_action( 'woo_feed_before_product_loop', 'woo_feed_apply_hooks_before_product_loop', 10, 2 );

// In The Loop
add_filter( 'woo_feed_product_type_separator', 'woo_feed_product_taxonomy_term_separator', 10, 2 );
add_filter( 'woo_feed_tags_separator', 'woo_feed_product_taxonomy_term_separator', 10, 2 );
add_filter( 'woo_feed_get_availability_attribute', 'woo_feed_get_availability_attribute_filter', 10, 3 );

// Discounted price filter
add_filter( 'woo_feed_filter_product_sale_price', 'woo_feed_get_dynamic_discounted_product_price', 9, 4 );
add_filter( 'woo_feed_filter_product_sale_price_with_tax', 'woo_feed_get_dynamic_discounted_product_price', 9, 4 );

// Product Loop End.
add_action( 'woo_feed_after_product_loop', 'woo_feed_remove_hooks_before_product_loop', 10, 2 );

// Exclude Feed files from caching.
add_filter( 'rocket_cdn_reject_files', 'woo_feed_exclude_feed_from_wp_rocket_cache', 10, 3 );//WP Rocket Cache
add_action( 'litespeed_init', 'woo_feed_exclude_feed_from_litespeed_cache', 10, 0);//LiteSpeed Cache
add_action("admin_init", 'woo_feed_exclude_feed_from_wp_fastest_cache', 10, 0);//WP Fastest Cache
add_action("admin_init", 'woo_feed_exclude_feed_from_wp_super_cache', 10, 0);//WP Super Cache
add_action("admin_init", 'woo_feed_exclude_feed_from_breeze_cache', 10, 0);//BREEZE Cache
add_action("admin_init", 'woo_feed_exclude_feed_from_wp_optimize_cache', 10, 0);//WP Optimize Cache
add_action("admin_init", 'woo_feed_exclude_feed_from_cache_enabler_cache', 10, 0);//Cache Enabler Cache
add_action("admin_init", 'woo_feed_exclude_feed_from_swift_performance_cache', 10, 0);//Cache Enabler Cache
add_action("admin_init", 'woo_feed_exclude_feed_from_speed_booster_cache', 10, 0);//Cache Enabler Cache
add_action("admin_init", 'woo_feed_exclude_feed_from_comet_cache', 10, 0);//Cache Enabler Cache
add_action("admin_init", 'woo_feed_exclude_feed_from_hyper_cache', 10, 0);//Cache Enabler Cache

// End of file hooks.php.
