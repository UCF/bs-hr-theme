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

/**
 *
 * Function to create the layout calls for UCF RSS plugin
 *
 */

if ( !class_exists( 'UCF_RSS_Common' ) ) {

	class UCF_RSS_Common {
		public static function display_feed( $items, $layout='hr', $args=array() ) {
			ob_start();

			// Before
			$layout_before = ucf_rss_display_hr_before( '', $items, $args );
			if ( has_filter( 'ucf_rss_display_' . $layout . '_before' ) ) {
				$layout_before = apply_filters( 'ucf_rss_display_' . $layout . '_before', $layout_before, $items, $args );
			}
			echo $layout_before;

			// Title
			$layout_title = ucf_rss_display_hr_title( '', $items, $args );
			if ( has_filter( 'ucf_rss_display_' . $layout . '_title' ) ) {
				$layout_title = apply_filters( 'ucf_rss_display_' . $layout . '_title', $layout_title, $items, $args );
			}
			echo $layout_title;

			// Main content/loop
			$layout_content = ucf_rss_display_hr( '', $items, $args );
			if ( has_filter( 'ucf_rss_display_' . $layout ) ) {
				$layout_content = apply_filters( 'ucf_rss_display_' . $layout, $layout_content, $items, $args );
			}
			echo $layout_content;

			// After
			$layout_after = ucf_rss_display_hr_after( '', $items, $args );
			if ( has_filter( 'ucf_rss_display_' . $layout . '_after' ) ) {
				$layout_after = apply_filters( 'ucf_rss_display_' . $layout . '_after', $layout_after, $items, $args );
			}
			echo $layout_after;

			return ob_get_clean();
		}

		/**
		 * Returns the cache expiration for RSS feeds.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @return int | expiration, in seconds
		 **/
		public static function get_cache_expiration() {
			return UCF_RSS_Config::get_option_or_hr( 'cache_expiration' ) * HOUR_IN_SECONDS;
		}

		/**
		 * Tries to return a thumbnail within a SimplePie item, or the fallback
		 * image if available.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $item obj | SimplePie item obj
		 * @return mixed | img URL string, or false on failure
		 **/
		public static function get_simplepie_thumbnail_or_fallback( $item ) {
			$thumbnail = null;

			// Try to get a thumbnail from the SimplePie obj's enclosure
			if ( $enclosures = $item->get_enclosures() ) {
				foreach ( $enclosures as $enclosure ) {
					$media = $enclosure->get_thumbnail() ?: $enclosure->get_link();
					// Avoid Gravatars
					if ( $media && ( strpos( $media, 'gravatar' ) === false ) ) {
						$thumbnail = $media;
						break;
					}
				}
			}
			// If that fails, fetch the fallback
			if ( !$thumbnail ) {
				$attachment_id = UCF_RSS_Config::get_option_or_hr( 'fallback_image' );
				if ( $attachment_id ) {
					$thumbnail = wp_get_attachment_url( $attachment_id );
				}
			}

			return $thumbnail;
		}

		/**
		 * Returns a sanitized SimplePie item URL.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $item obj | SimplePie item obj
		 * @return string | item URL string
		 **/
		public static function get_simplepie_url( $item ) {
			return esc_url( $item->get_permalink() );
		}

		/**
		 * Returns a sanitized SimplePie item title. Applies texturization.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $item obj | SimplePie item obj
		 * @return string | item title string
		 **/
		public static function get_simplepie_title( $item ) {
			return wptexturize( sanitize_text_field( $item->get_title() ) );
		}

		/**
		 * Returns a sanitized SimplePie item description. Applies
		 * texturization and a word limit of 55.
		 *
		 * @author Jo Dickson
		 * @since 1.0.0
		 * @param $item obj | SimplePie item obj
		 * @return string | item description string
		 **/
		public static function get_simplepie_description( $item ) {
			$desc = preg_replace( '/<a [^>]+>(Continue Reading|Read more).*?<\/a>/i', '', trim( $item->get_description() ) );
			return wp_trim_words( wptexturize( strip_shortcodes( strip_tags( $desc, '<p><a><br>' ) ) ), 55, '&hellip;' );
		}
	}

}

if ( ! function_exists( 'ucf_rss_enqueue_assets' ) ) {
	function ucf_rss_enqueue_assets() {
		$plugin_data   = get_plugin_data( UCF_RSS__PLUGIN_FILE, false, false );
		$version       = $plugin_data['Version'];

		// CSS
		$include_css = UCF_RSS_Config::get_option_or_hr( 'include_css' );
		$css_deps    = apply_filters( 'ucf_rss_style_deps', array() );

		if ( $include_css ) {
			wp_enqueue_style( 'ucf_rss_css', plugins_url( 'static/css/ucf-rss.min.css', UCF_RSS__PLUGIN_FILE ), $css_deps, $version, 'screen' );
		}
	}

	add_action( 'wp_enqueue_scripts', 'ucf_rss_enqueue_assets' );
}

/**
 *
 * Layout function for the UCF RSS Plugin on the Prospective Employees Page
 *
 * Called via this shortcode: [rss-feed url="https://jobs.ucf.edu/cw/en-us/rss" limit="3" layout="hr"]
 *
 **/

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
