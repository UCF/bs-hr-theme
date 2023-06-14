<?php

// Theme foundation
include_once 'includes/config.php';
include_once 'includes/meta.php';

// Add other includes to this file as needed.

function wpse_298888_posts_where( $where, $query ) {
	global $wpdb;

	$starts_with = esc_sql( $query->get( 'starts_with' ) );

	if ( $starts_with ) {
		$where .= " AND $wpdb->posts.post_title LIKE '$starts_with%'";
	}

	return $where;
}
add_filter( 'posts_where', 'wpse_298888_posts_where', 10, 2 );


/**
 * Allow Pods Templates to use shortcodes
 */
add_filter( 'pods_shortcode', function( $tags )  {
	$tags[ 'shortcodes' ] = true;

	return $tags;

});

add_filter( 'get_the_author_description', 'do_shortcode' );

add_image_size( 'square-sixhundred', 600, 600, true);


/**

 * Disable the UCF WP Theme's template redirect overrides so that we can

 * define our own in this theme.

 *

 * @since 1.0.0

 * @author Jo Dickson

 */

function today_reenable_templates() {

	remove_action( 'template_redirect', 'ucfwp_kill_unused_templates' );

}

add_action( 'after_setup_theme', 'today_reenable_templates' );

/*
 * Layout function for the UCF RSS Plugin
 * Called via this shortcode: [rss-feed url="https://jobs.ucf.edu/cw/en-us/rss" limit="3" layout="hr"]
 * On the Prospective Employees page
*/

if ( !function_exists( 'ucf_rss_display_hr_before' ) ) {

	function ucf_rss_display_hr_before( $content, $items, $args ) {
		ob_start();
		?>
		<div class="ucf-rss-feed ucf-rss-feed-hr">
		<?php
		return ob_get_clean();
	}

	add_filter( 'ucf_rss_display_hr_before', 'ucf_rss_display_hr_before', 10, 3 );

}

if ( !function_exists( 'ucf_rss_display_hr_title' ) ) {

	function ucf_rss_display_hr_title( $content, $items, $args ) {
		$formatted_title = '';

		if ( $args['list_title'] ) {
			$formatted_title = '<h2 class="ucf-rss-title">' . $args['list_title'] . '</h2>';
		}

		return $formatted_title;
	}

	add_filter( 'ucf_rss_display_hr_title', 'ucf_rss_display_hr_title', 10, 3 );

}

//Adds HR Layout to UCF RSS Feed Plugin
if ( !function_exists( 'ucf_rss_display_hr' ) ) {

	function ucf_rss_display_hr( $content, $items, $args ) {
		if ( ! is_array( $items ) && $items !== false ) { $items = array( $items ); }
		ob_start();
		?>
		<?php if ( $items ): ?>
			<ul class="ucf-rss-items">
				<?php foreach ( $items as $item ): ?>
					<li class="ucf-rss-item">
						<a class="ucf-rss-item-link" href="<?php echo UCF_RSS_Common::get_simplepie_url( $item ); ?>"
						   title="<?php echo $item->get_date( 'j F Y | g:i a' ); ?>">
							<?php echo UCF_RSS_Common::get_simplepie_title( $item ); ?>
							<p class="desc"><?php echo UCF_RSS_Common::get_simplepie_description( $item ); ?></p>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php else: ?>
			<div class="ucf-rss-feed-error">No results found.</div>
		<?php endif; ?>
		<?php
		return ob_get_clean();
	}

	add_filter( 'ucf_rss_display_hr', 'ucf_rss_display_hr', 10, 3 );

}

if ( !function_exists( 'ucf_rss_display_hr_after' ) ) {

	function ucf_rss_display_hr_after( $content, $items, $args ) {
		ob_start();
		?>
		</div>
		<?php
		return ob_get_clean();
	}

	add_filter( 'ucf_rss_display_hr_after', 'ucf_rss_display_hr_after', 10, 3 );

}

/*
 * Extend Search to Custom Fields
*/
function cf_search_join( $join ) {
	global $wpdb;

	if ( is_search() ) {
		$join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
	}

	return $join;
}
add_filter('posts_join', 'cf_search_join' );

function cf_search_where( $where ) {
	global $pagenow, $wpdb;

	if ( is_search() ) {
		$where = preg_replace(
			"/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
			"(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
	}

	return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

function cf_search_distinct( $where ) {
	global $wpdb;

	if ( is_search() ) {
		return "DISTINCT";
	}

	return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

/**
 * Returns search results page header
 *
 * @author Mike Setzer
 * @since 0.0.0
 * @param mixed $obj A queried object (e.g. WP_Post, WP_Term), or null
 * @return string Header title text
 **/

/*add_filter('ucfwp_get_header_title_before', 'my_custom_search_title', 10, 2);

function my_custom_search_title($title, $obj) {
	if (is_search()) {
		$title = '';
	}

	return $title;
}*/

/**
 * Returns search result page subtitle
 *
 * @author Mike Setzer
 * @since 0.0.0
 * @param mixed $obj A queried object (e.g. WP_Post, WP_Term), or null
 * @return string Header subtitle text
 **/

/*add_filter('ucfwp_get_header_subtitle_before', 'my_custom_search_subtitle', 10, 2);

function my_custom_search_subtitle($subtitle, $obj) {
	if (is_search()) {
		$subtitle = '';
	}

	return $subtitle;
}*/

/**
 * Prevents UCFWP header from rendering on search pages
 *
 * @author Mike Setzer
 * @since 0.0.0
 * @param string $markup Current header markup
 * @param mixed $obj A queried object (e.g. WP_Post, WP_Term), or null
 * @return string Modified header markup
 */
/*add_filter('ucfwp_get_header_markup_before', 'my_custom_header_markup', 10, 2);

function my_custom_header_markup($markup, $obj) {
	if (is_search()) {
		return ''; // No header markup on search pages
	}

	return $markup; // Return original markup for non-search pages
}*/

/**
 * Remove UCFWP header on search pages
 *
 * @author Mike Setzer
 * @since 0.0.0
 */
function my_custom_remove_header() {
	if (is_search()) {
		// Replace 'ucfwp_header_before' with the actual action your theme uses to display the header
		remove_all_actions('ucfwp_header_before');
	}
}
add_action('template_redirect', 'my_custom_remove_header');
