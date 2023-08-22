<?php
/**
 * Template Name: Home
 * Template Post Type: page, post
 */
?>
<?php get_header(); the_post(); ?>


	<!-- Anchor navigation below hero -->
	<div class="subnav container-fluid">
		<div class="container">
			<?php
			$intronavpre = get_field('intro_nav_name');
			$socialnavpre = get_field('social_nav_name');
			$explorenavpre = get_field('explore_nav_name');
			$statsnavpre = get_field('statistics_nav_name');
			$employeenavpre = get_field('employee_nav_name');
			$newsnavpre = get_field('news_nav_name');
			$intronav = explode(' ',trim($intronavpre));
			$socialnav = explode(' ',trim($socialnavpre));
			$explorenav = explode(' ',trim($explorenavpre));
			$statsnav = explode(' ',trim($statsnavpre));
			$employeenav = explode(' ',trim($employeenavpre));
			$newsnav = explode(' ',trim($newsnavpre));

			?>



			<nav class="anchornav navbar navbar-toggleable-lg">

				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#anchorNav" aria-controls="anchorNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-text"><i class="fa fa-bars" aria-hidden="true"></i> Skip to Section</span>
					<span class="navbar-toggler-icon" aria-hidden="true"></span>
				</button>

				<div class="collapse navbar-collapse" id="anchorNav">
					<div class="navbar-nav">

						<a class="nav-item nav-link" href="#<?php echo $intronav[0]; ?>"><?php echo $intronavpre; ?></a>
						<a class="nav-item nav-link" href="#<?php echo $socialnav[0]; ?>"><?php echo $socialnavpre; ?></a>
						<a class="nav-item nav-link" href="#<?php echo $explorenav[0]; ?>"><?php echo $explorenavpre; ?></a>
						<a class="nav-item nav-link" href="#<?php echo $statsnav[0]; ?>"><?php echo $statsnavpre; ?></a>
						<a class="nav-item nav-link" href="#<?php echo $employeenav[0]; ?>"><?php echo $employeenavpre; ?></a>
						<a class="nav-item nav-link" href="#<?php echo $newsnav[0]; ?>"><?php echo $newsnavpre; ?></a>

						<a class="nav-item nav-link azright" href="/a-to-z-index/">A-Z Index</a>

					</div>
				</div>
			</nav>



			<!--ul class="anchornav">
			<li><a href="#<?php echo $intronav[0]; ?>"><?php echo $intronavpre; ?></a></li>
			<li><a href="#<?php echo $socialnav[0]; ?>"><?php echo $socialnavpre; ?></a></li>
			<li><a href="#<?php echo $explorenav[0]; ?>"><?php echo $explorenavpre; ?></a></li>
			<li><a href="#<?php echo $statsnav[0]; ?>"><?php echo $statsnavpre; ?></a></li>
			<li><a href="#<?php echo $employeenav[0]; ?>"><?php echo $employeenavpre; ?></a></li>
			<li><a href="#<?php echo $newsnav[0]; ?>"><?php echo $newsnavpre; ?></a></li>
			<li class="azright"><a href="/a-to-z-index/">A-Z Index</a></li>
		</ul-->
		</div>
	</div>

	<!-- Alert -->
<?php if( get_field('show_alert_on_homepage')) { ?>
	<div class="container-fluid alert">
		<div class="container">
			<div class="row">
				<div class="col-1 right"><?php the_field('alert_icon_code'); ?></div>
				<div class="col-9 left">
					<h3><?php the_field('alert_title'); ?></h3>
					<p><?php the_field('alert_description'); ?></p>
				</div>
				<div class="col-2 left">
					<a href="<?php the_field('alert_button_url'); ?>" class="button"<?php if (get_field('alert_external_link')) { ?> target="_blank"<?php } ?>><?php the_field('alert_button_text'); ?></a>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

	<!-- Container -->
	<div class="container-fluid welcome white" id="<?php echo $intronav[0]; ?>">
		<div class="container">
			<div class="row">
				<div class="left col-6">
					<!-- Title and content -->
					<h3 class="title"><?php the_field('intro_title');?></h3>
					<?php the_field('intro_content');?>
					<!-- End title and content -->

					<!-- Get Featured Person if exists -->
					<?php if( have_rows('lead_information') ): ?>
						<?php while( have_rows('lead_information') ): the_row();

							// Get sub field values.
							$photo = get_sub_field('photo');
							$name = get_sub_field('name');
							$title = get_sub_field('title');

							?>

							<div class="featuredPerson">
								<div class="left col-5">
									<img src="<?php echo $photo; ?>" />
								</div>
								<div class="right col-7">
									<h4><?php echo $name; ?></h4>
									<h6><?php echo $title; ?></h6>
								</div>
							</div>

						<?php endwhile; ?>
					<?php endif; ?>
					<!-- End Featured Person -->

				</div>
				<div class="right col-5 push-1">

					<!-- Side Nav -->
					<?php if( have_rows('intro_right_column') ): ?>
						<?php while( have_rows('intro_right_column') ): the_row();

							// Get sub field values.
							$title = get_sub_field('title');
							$includesearch = get_sub_field('include_search');
							$links = get_sub_field('links');

							?>

							<div class="sideNav">
								<h3><?php echo $title; ?> <img src="<?php echo esc_url( get_stylesheet_directory_uri()); ?>/img/icon_arrow_large.png" /></h3>

								<ul class="navSide">
									<?php if (!empty($includesearch)) { ?>
										<!--li class="searchBar"><input type="text" value="Search UCF HR"/><input type="submit" /></li-->
										<li class="searchBar"><?php get_search_form(); ?></li>
									<?php } else { }; ?>


									<?php if( have_rows('links') ): ?>
										<?php while( have_rows('links') ): the_row();

											// Get sub field values.
											$background = get_sub_field('background_photo');
											$icon = get_sub_field('link_icon');
											$top = get_sub_field('top_text');
											$bottom = get_sub_field('bottom_text');
											$link = get_sub_field('link_destination');
											$shortcodepre = explode(' ',trim($top));
											$shortcode = preg_replace("/(?![.=$'€%-])\p{P}/u", "", $shortcodepre);


											?>

											<li class="<?php echo $shortcode[0]; ?>">
												<a href="<?php echo $link; ?>">
													<div class="left">
														<img src="<?php echo $icon; ?>" />
													</div>
													<div class="right">
														<span class="top"><strong><?php echo $top; ?></strong></span>
														<span class="bottom"><?php echo $bottom; ?></span>
													</div>
													<div class="overlay"></div>
												</a>
											</li>
											<style type="text/css">
												li.<?php echo $shortcode[0]; ?> {
													background: url('<?php echo $background; ?>') no-repeat center center;
													background-size:cover;
												}
											</style>
										<?php endwhile; ?>
									<?php endif; ?>

								</ul>
							</div>

						<?php endwhile; ?>
					<?php endif; ?>
					<!-- End Side Nav -->




				</div>
			</div>
		</div>
	</div>

	<!-- Container -->
<?php
$backgroundphotosocial = get_field('background_photo');
?>
	<div class="container-fluid social<?php if (!empty($backgroundphotosocial)) { echo ' img'; } else { }; ?>" id="<?php echo $socialnav[0]; ?>">
		<div class="container">

			<div class="row">
				<div class="col col-lg-6">
					<h3 class="title"><?php the_field('social_title'); ?>
						<!--a href="#!"><img src="<?php echo esc_url( get_stylesheet_directory_uri()); ?>/img/icon_fb.png" class="socialicon" /></a>
					<a href="#!"><img src="<?php echo esc_url( get_stylesheet_directory_uri()); ?>/img/icon_tw.png" class="socialicon" /></a-->
					</h3>
					<?php the_field('social_content'); ?></div>
				<div class="col col-lg-6">
					<h3 class="title"><?php the_field('social_title_right'); ?></h3>
					<?php the_field('social_content_right'); ?></div>
			</div>
		</div>
		<div class="overlay" style="background:url('<?php the_field('background_photo'); ?>') no-repeat center center; background-size:cover;"></div>
	</div>

	<!-- Container -->
<?php
$backgroundphotoexplore = get_field('background_photo_explore');
?>
	<div class="container-fluid explore <?php the_field('background_color_explore'); ?><?php if (!empty($backgroundphotoexplore)) { echo ' img'; } else { }; ?>" id="<?php echo $explorenav[0]; ?>">
		<div class="container">
			<div class="row">
				<div class="left col-8">
					<h3 class="title"><?php the_field('explore_title'); ?></h3>
					<?php the_field('explore_content'); ?>
					<div class="search">
						<?php get_search_form(); ?>
						<!--input type="text" value="Search UCF Human Resources" /><input type="submit" /-->
					</div>
				</div>
				<div class="right col-4">

					<?php if( have_rows('side_links') ): ?>
						<?php while( have_rows('side_links') ): the_row();
							$title = get_sub_field('title');?>

							<h5><?php echo $title; ?></h5>

							<?php if( have_rows('links') ): ?>
								<ul class="pagelist">
									<?php while( have_rows('links') ): the_row();
										$text = get_sub_field('link_text');
										$link = get_sub_field('link_destination');
										$openw = get_sub_field('open_in_a_new_window');
										?>
										<li><a href="<?php echo $link; ?>"<?php if ($openw == '1') { echo ' target="_blank"'; } else { }; ?>><?php echo $text; ?>
											</a></li>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>


						<?php endwhile; ?>
					<?php endif; ?>

				</div>
			</div>
		</div>
		<div class="overlay imgOverlay" style="background:url('<?php the_field('background_photo_explore'); ?>') no-repeat center center; background-size:cover;"></div>
	</div>

	<!-- Container -->
<?php
$backgroundphotostats = get_field('background_photo_statistics');
?>
	<div class="container-fluid stats <?php the_field('background_color_statistics'); ?><?php if (!empty($backgroundphotostats)) { echo ' img'; } else { }; ?>" id="<?php echo $statsnav[0]; ?>">
		<div class="container">
			<div class="row">
				<div class="left col-6">
					<h3 class="title"><?php the_field('statistics_title'); ?></h3>
					<p><?php the_field('statistics_content'); ?></p>
				</div>
				<div class="right col-6">





					<?php if( have_rows('stats') ):
						$counter = '0';
						?>
						<ul class="statistics">
							<?php while( have_rows('stats') ): the_row();
								$icon = get_sub_field('icon');
								$number = get_sub_field('number');
								$title = get_sub_field('title');
								$description = get_sub_field('description');
								$prefix = get_sub_field('prefix');
								$suffix = get_sub_field('suffix');

								if ($counter == '0') {
									$order = 'first';
								}
								if ($counter == '1') {
									$order = 'second';
								}
								if ($counter == '2') {
									$order = 'third';
								}
								if ($counter == '3') {
									$order = 'fourth';
								}
								?>

								<li class="<?php echo $order; ?>">
									<img src="<?php echo $icon; ?>" class="icon" />
									<h3><?php echo $prefix; ?><span class="count-up"><?php echo $number; ?></span><?php echo $suffix; ?></h3>
									<h4><?php echo $title; ?></h4>
									<p><em><?php echo $description; ?></em></p>
								</li>

								<?php
								$counter++;
							endwhile; ?>

						</ul>

					<?php endif; ?>

				</div>
			</div>
		</div>
		<div class="overlay imgOverlay" style="background:url('<?php the_field('background_photo_statistics'); ?>') no-repeat center center; background-size:cover;"></div>
	</div>

	<!-- Container -->
<?php
$backgroundphotoemp = get_field('background_photo_employee');
?>
	<div class="container-fluid eotm <?php the_field('background_color_employee'); ?><?php if (!empty($backgroundphotoemp)) { echo ' img'; } else { }; ?>" id="<?php echo $employeenav[0]; ?>">
		<div class="container">
			<div class="row">
				<div class="left col-6">

					<?php if( have_rows('employee_information') ): ?>
					<?php while( have_rows('employee_information') ): the_row();

					// Get sub field values.
					$name = get_sub_field('name');
					$title = get_sub_field('job_title');
					$details = get_sub_field('details');
					$photo = get_sub_field('photo');
					$readmore = get_sub_field('read_more_link');

					?>

					<img src="<?php echo $photo; ?>" class="eotm" />

				</div>
				<div class="right col-6">
					<h3 class="title"><?php the_field('employee_title'); ?> <div class="sub"><?php the_field('employee_subtitle'); ?></div></h3>

					<div class="nametitle"><h3><?php echo $name; ?></h3>
						<h5><?php echo $title; ?></h5></div>
					<p><?php echo $details; ?></p>
					<?php if ($readmore !== '') { ?>
						<a href="<?php echo $readmore; ?>" class="btn readmore">Read More</a>
					<?php } ?>

					<?php endwhile; ?>
					<?php endif; ?>

				</div>
			</div>
		</div>
		<div class="overlay imgOverlay" style="background:url('<?php the_field('background_photo_employee'); ?>') no-repeat center center; background-size:cover;"></div>
	</div>

	<!-- Container -->
<?php
$backgroundphotonews = get_field('background_photo_news');
?>
	<div class="container-fluid blog <?php the_field('background_color_news'); ?><?php if (!empty($backgroundphotonews)) { echo ' img'; } else { }; ?>" id="<?php echo $newsnav[0]; ?>">
		<div class="container">
			<div class="row">
				<div class="left col-12">
					<h3 class="title"><?php the_field('news_title'); ?></h3>

					<?php

					$posts = get_posts( array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'category_name' => 'news',
							'posts_per_page' => 3,
							'meta_query' => array(
								array(
									'key'   => 'featured_post',
									'value' => '0',
								)
							)
						)
					);

					//Two column version with images on the left, fallback to single column if no image
					/*if( $posts ) { ?>

						<ul class="posts">
							<?php foreach( $posts as $post ) {
								setup_postdata( $post );
								$category = get_the_category();
								$thumbnail_id = get_post_thumbnail_id( $post->ID );
								$alt_text = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
								$has_thumbnail = has_post_thumbnail();
								?>
								<li>
									<a href="<?php the_permalink(); ?>" class="d-block w-100">
										<div class="row">
											<?php if ($has_thumbnail) : ?>
												<!-- Left Column for Images -->
												<div class="col-md-4 position-relative">
													<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr($alt_text); ?>" class="img-fluid" />
													<img src="<?php echo esc_url( get_stylesheet_directory_uri()); ?>/img/icon_arrow.png" class="img-fluid arrowbtn position-absolute" style="top: 10px; left: 10px;" />
												</div>
											<?php endif; ?>

											<!-- Right Column for Title, Category, and Excerpt -->
											<div class="<?php echo $has_thumbnail ? 'col-md-8' : 'col-md-12'; ?>">
												<div class="title"><?php the_title(); ?></div>
												<span class="categoryTitle"><?php if (!empty($category)) echo $category[0]->cat_name; ?></span>
												<span class="category"><?php echo get_the_date('M'); ?> <?php echo get_the_date('Y'); ?></span>
												<p><?php the_excerpt(); ?></p>
											</div>
										</div>
									</a>
								</li>
								<?php
								wp_reset_postdata();
							} ?>
						</ul>

					<?php };*/

					//Single column version, no image
					if( $posts ) { ?>
						<ul class="posts">
							<?php foreach( $posts as $post ) {
								setup_postdata( $post );
								$category = get_the_category();
								?>
								<li>
									<a href="<?php the_permalink(); ?>" class="d-block w-100">
										<div class="row">
											<!-- Full Width Column for Title, Category, and Excerpt -->
											<div class="col-md-12">
												<div class="title"><?php the_title(); ?></div>
												<span class="categoryTitle"><?php if (!empty($category)) echo $category[0]->cat_name; ?></span>
												<span class="category"><?php echo get_the_date('M'); ?> <?php echo get_the_date('Y'); ?></span>
												<p><?php the_excerpt(); ?></p>
											</div>
										</div>
									</a>
								</li>
								<?php
								wp_reset_postdata();
							} ?>
						</ul>
					<?php };

					?>


				</div>
				<!--div class="right col-4">
				<h3 class="title"><?php the_field('featured_news_title'); ?></h3>

				<?php

				$posts = get_posts( array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'category_name' => 'news',
						'posts_per_page' => 1,
						'meta_query' => array(
							array(
								'key'   => 'featured_post',
								'value' => '1',
							)
						)
					)
				);

				if( $posts ) { ?>

					<div class="article">

						<?php foreach( $posts as $post ) {

					$category = get_the_category();

					?>

							<img src="<?php if ( has_post_thumbnail() ) : the_post_thumbnail_url(); endif; ?>" alt="<?php the_title(); ?>" />
							<div class="inside">
								<div class="title"><?php the_title(); ?></div>
								<span class="categoryTitle"><?php echo $category[0]->cat_name; ?></span><span class="category"><?php echo get_the_date('M'); ?> <?php echo get_the_date('Y'); ?></span>
								<p><?php the_excerpt(100); ?></p>
								<a href="<?php the_permalink(); ?>" class="readmore btn">READ MORE</a>
							</div>

						<?php }; ?>

					</div>

					<?php };
				?>











			</div-->

				<a href="/news/" class="button black" style="margin-left: auto;font-size: 14px;">More News</a>
			</div>
		</div>
		<div class="overlay imgOverlay" style="background:url('<?php the_field('background_photo_news'); ?>') no-repeat center center; background-size:cover;"></div>
	</div>

<?php get_footer(); ?>
