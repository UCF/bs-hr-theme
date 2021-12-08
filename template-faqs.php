<?php
/**
 * Template Name: FAQs
 */
?>
<?php get_header(); the_post(); ?>

<!-- Hero image and title -->
    <div class="hero container-fluid" style="background:url(/wp-content/uploads/sites/17/ucf_35408422_preview_cropped-scaled.jpg) no-repeat center center; background-size:cover;">
        <div class="container-fluid content-container white" style="background: #fff; padding-top: 30px; padding-bottom: 30px;">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-12 ">

                    <?php

                        $faq = pods('faqs', pods_v( 'last', 'url' ));

                        echo '<h3 class="title">' . $faq->field("post_title") . '</h3>';
                        echo '<h4 class="answer" style="font-weight:normal; line-height:160%;">' . $faq->field("answer") . '</h4>';

                    ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    


<?php get_footer(); ?>
