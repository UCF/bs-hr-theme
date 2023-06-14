<?php /*require_once get_template_directory() . '/index.php'; */?>

<?php get_header(); ?>


<div class="hero container-fluid">
	<?php if ( have_posts() ) { ?>
	<div class="header-content">
		<div class="header-content-flexfix">
			<div class="header-content-inner align-self-start pt-4 pt-sm-0 align-self-sm-center">
				<div class="container">
					<div class="d-inline-block bg-primary-t-1">
						<h1 class="header-title">"<?php the_search_query(); ?>"</h1><br/>
					</div>
					<div class="clearfix"></div>
					<div class="d-inline-block bg-inverse">
						<span class="header-subtitle">Search Results</span>
					</div>
				</div>
			</div>
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
						?>

						<a href="<?php echo (!empty($url)) ? $url : get_post_permalink(); ?>" <?php echo (!empty($url)) ? 'target="_blank"' : ''; ?> class="result">
							<h3><?php the_title(); ?></h3>
							<p><?php the_excerpt(); ?></p>
						</a>

					<?php } ?>

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
