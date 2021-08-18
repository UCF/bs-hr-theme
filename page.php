<?php get_header(); the_post(); ?>


<!-- Hero image and title -->
<?php if ( get_field('header_image') ) { ?>
    <div class="hero container-fluid" style="background:url(<?php the_field('header_image');?>) no-repeat center center; background-size:cover;">
<?php } else { ?>
    <div class="hero container-fluid" style="background:url(<?php the_field('header_image', 20);?>) no-repeat center center; background-size:cover;">
<?php } ?>

<div class="container">
		<div class="headerText">

			<h1>

                <?php if ( get_field( 'page_title' ) ): ?>
                    <?php the_field('page_title'); ?>
                <?php else: ?>
                    <?php echo $post->post_title; ?>
                <?php endif; ?>
            
            </h1><br/>
            
            <h2>
                
                <?php if( get_field('page_subtitle') ): ?>
                    <?php the_field('page_subtitle'); ?>
                <?php else: 
                    $parent_title = get_the_title($post->post_parent);?>
                        <?php echo $parent_title; ?>
                <?php endif; ?>
            
            </h2>

		</div>
	</div>
</div>

<div class="container-fluid content-container white">
    <div class="container">
        <div class="row">
            <div class="col col-lg-12 ">
   
                <?php

                if ( have_posts() ) {



                    // Load posts loop.

                    while ( have_posts() ) {

                        the_post();
                        
                        the_title();
                        the_content();

                    }

                } else {


                }

                ?>

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>