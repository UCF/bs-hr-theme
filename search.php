<?php /*require_once get_template_directory() . '/index.php'; */?>

<?php get_header(); ?>


<!-- Hero image and title -->
<div class="hero container-fluid">

<?php if ( have_posts() ) { ?>

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

                    <?php while ( have_posts() ) {

                        the_post();

                            $id = get_the_id();
                            $pod = pods( 'forms_and_documents', $id );
                            $url = $pod->field( 'location_url' );
                            $link = get_permalink();

                            if ($url != ''): ?>
                                <a href="<?php echo $url; ?>" target="blank" class="result">
                            <?php else: ?>
                                <a href="<?php echo get_post_permalink() ?>" class="result">
                            <?php endif; ?>
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php the_excerpt(); ?></p>
                                </a>

                    <?php  } ?>

                        <div class="pagination">
                            <div class="nav-previous"><?php previous_posts_link( 'Previous Page' ); ?></div>
                            <div class="nav-next"><?php next_posts_link( 'Next Page' ); ?></div>
                        </div>

                </div>
            </div>
        </div>
    </div>

<?php } else { ?>


    <div class="container">
        <div class="headerText">

            <h1>"<em><?php the_search_query(); ?></em>"</h1><br/>

            <h2>No Results</h2>

        </div>
    </div>
</div>

    <div class="container-fluid content-container white">
        <div class="container">
            <div class="row">
                <div class="col col-lg-12 ">

                    <p class="no-results">No Results</p>

                </div>
            </div>
        </div>
    </div>


<?php } ?>

<?php get_footer(); ?>

