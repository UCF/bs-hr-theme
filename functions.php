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
 * Returns texturized title text for use in the page header.
 *
 * @author Mike Setzer
 * @since 0.0.0
 * @param mixed $obj A queried object (e.g. WP_Post, WP_Term), or null
 * @return string Header title text
 **/

function ucfwp_get_header_title( $obj ) {
	$title = '';

	// Exit early if the title has been overridden early
	$title = (string) apply_filters( 'ucfwp_get_header_title_before', $title, $obj );
	if ( !empty( $title ) ) {
		return wptexturize( $title );
	}

	if ( is_404() ) {
		// We intentionally don't add a fallback title for 404s;
		// this allows us to add a custom h1 to the default 404 template.
		$title = '';
	} elseif( is_search() ){
		$title = get_search_query();
	}
	else {
		// Checks listed below are copied directly from WP core
		// (see wp_get_document_title()).
		// NOTE: We still include support for templates that are disabled in
		// ucfwp_kill_unused_templates() in case a child theme re-enables
		// one of those templates.

		if ( is_search() ) {
			$title = sprintf( __( 'Search Results for &#8220;%s&#8221;' ), get_search_query() );
		} elseif ( is_front_page() ) {
			$title = get_bloginfo( 'name', 'display' );
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		} elseif ( is_home() || is_singular() ) {
			$title = single_post_title( '', false );
		} elseif ( is_category() || is_tag() ) {
			$title = single_term_title( '', false );
		} elseif ( is_author() && $author = get_queried_object() ) {
			$title = $author->display_name;
		} elseif ( is_year() ) {
			$title = get_the_date( _x( 'Y', 'yearly archives date format' ) );
		} elseif ( is_month() ) {
			$title = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
		} elseif ( is_day() ) {
			$title = get_the_date();
		}
	}

	return wptexturize( $title );
}

/**
 * Returns texturized subtitle text for use in the page header.
 *
 * @author Mike Setzer
 * @since 0.0.0
 * @param mixed $obj A queried object (e.g. WP_Post, WP_Term), or null
 * @return string Header subtitle text
 **/

function ucfwp_get_header_subtitle( $obj ) {
	if ( is_search() ) {
		$subtitle = "Search Results";  // you can set your own subtitle here
	} else {
		$subtitle = '';

		$subtitle = (string) apply_filters( 'ucfwp_get_header_subtitle_before', $subtitle, $obj );
		if ( !empty( $subtitle ) ) {
			return wptexturize( $subtitle );
		}

		$subtitle = do_shortcode( get_field( 'page_header_subtitle', $obj ) );

		$subtitle = (string) apply_filters( 'ucfwp_get_header_subtitle_after', $subtitle, $obj );
	}

	return wptexturize( $subtitle );
}
