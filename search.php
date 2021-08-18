<?php /*require_once get_template_directory() . '/index.php'; */?>

<?php get_header(); the_post(); ?>


<!-- Hero image and title -->
<div class="hero container-fluid" style="background:url(<?php the_field('header_image', 20);?>) no-repeat center center; background-size:cover;">

<?php

if ( have_posts() ) { ?>

<div class="container">
		<div class="headerText">

			<h1>"<em><?php the_search_query(); ?></em>"</h1><br/>
            
            <h2>Search Results</h2>

		</div>
	</div>
</div>

<div class="container-fluid content-container white">
    <div class="container">
        <div class="row">
            <div class="col col-lg-12 ">
  
                <?php 

                    while ( have_posts() ) {

                        the_post(); ?>

                        <a href="<?php the_permalink(); ?>" class="result">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                        </a>
                    
                    <?php  }
                } ?>

                <div class="pagination">
                    <div class="nav-previous"><?php previous_posts_link( 'Previous Page' ); ?></div>
                    <div class="nav-next"><?php next_posts_link( 'Next Page' ); ?></div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

