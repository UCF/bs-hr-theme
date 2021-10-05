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
