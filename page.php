<?php get_header(); the_post(); ?>



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