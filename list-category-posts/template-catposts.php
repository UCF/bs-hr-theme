
<?php
/*
Plugin Name: List Category Posts - Template "Custom"
*/

/* This is the string which will gather all the information.*/
$lcp_display_output = '';

// Show category link:
$lcp_display_output .= $this->get_category_link('strong');

// Show category description:
$lcp_display_output .= $this->get_category_description();

// Show the conditional title:
$lcp_display_output .= $this->get_conditional_title();

//Add 'starting' tag. Here, I'm using an unordered list (ul) as an example:
$lcp_display_output .= $this->open_outer_tag('ul', 'lcp_catlist');

/* Posts Loop
 *
 * The code here will be executed for every post in the category.  As
 * you can see, the different options are being called from functions
 * on the $this variable which is a CatListDisplayer.
 *
 * CatListDisplayer has a function for each field we want to show.  So
 * you'll see get_excerpt, get_thumbnail, etc.  You can now pass an
 * html tag as a parameter. This tag will sorround the info you want
 * to display. You can also assign a specific CSS class to each field.
*/
global $post;
while ( have_posts() ):
  the_post();

  // Check if protected post should be displayed
  if (!$this->check_show_protected($post)) continue;

  //Start a List Item for each post:
  $lcp_display_output .= $this->open_inner_tag($post, 'li');

  //Post Thumbnail
  $lcp_display_output .= $this->get_thumbnail($post);
  
  //Show the title and link to the post:
  $lcp_display_output .= $this->get_post_title($post);

  //Show comments:
  $lcp_display_output .= $this->get_comments($post);

  //Show date:
  $lcp_display_output .= $this->get_date($post);

  //Show date modified:
  $lcp_display_output .= $this->get_modified_date($post);

  //Show author
  $lcp_display_output .= $this->get_author($post);

  // Show post ID
  $lcp_display_output .= $this->get_display_id($post);

  //Custom fields:
  $lcp_display_output .= $this->get_custom_fields($post);

  

  /**
   * Post content - Example of how to use tag and class parameters:
   * This will produce:<p class="lcp_content">The content</p>
   */
  $lcp_display_output .= $this->get_content($post, 'p', 'lcp_content');

  /**
   * Post content - Example of how to use tag and class parameters:
   * This will produce:<div class="lcp_excerpt">The content</div>
   */
  $lcp_display_output .= $this->get_excerpt($post, 'div', 'lcp_excerpt');

  // Get Posts "More" link:
  $lcp_display_output .= $this->get_posts_morelink($post);

  //Close li tag
  $lcp_display_output .= $this->close_inner_tag();
endwhile;

// Show no posts text if there are no posts
$lcp_display_output .= $this->get_no_posts_text();

// Close the wrapper I opened at the beginning:
$lcp_display_output .= $this->close_outer_tag();

// If there's a "more link", show it:
$lcp_display_output .= $this->get_morelink();

// Get category posts count
$lcp_display_output .= $this->get_category_count();

//Pagination
$lcp_display_output .= $this->get_pagination();

$this->lcp_output = $lcp_display_output;
