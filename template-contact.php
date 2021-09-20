<?php
/**
 * Template Name: Contact
 * Template Post Type: page, post
 */
?>
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

<!-- Anchor navigation below hero -->
<div class="subnav container-fluid">
	<div class="container">

        <!-- Loops through panel names. Converts to URL friendly anchor links for the Sub Nav -->
            <?php if( have_rows('panel') ): ?>

                <nav class="anchornav navbar navbar-toggleable-lg">
                
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#anchorNav" aria-controls="anchorNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-text"><i class="fa fa-bars" aria-hidden="true"></i> Skip to Section</span>
                    <span class="navbar-toggler-icon" aria-hidden="true"></span>
                </button>

                    <div class="collapse navbar-collapse" id="anchorNav">
                        <div class="navbar-nav">
                    
                    <?php while( have_rows('panel') ) : the_row(); 
                        $name = get_sub_field('panel_name');
                        $anchor = preg_replace('/\W+/', '-', strtolower(trim($name)));
                    ?>

                            <a class="nav-item nav-link" href="#<?php echo $anchor; ?>"><?php echo $name; ?></a>

                    <?php endwhile; ?>

                            <a class="nav-item nav-link azright" href="/a-to-z-index/">A-Z Index</a>
                        </div>
                    </div>
                </nav>

            <?php else : endif; ?>

	</div>
</div>

<!-- Container -->
<div class="container-fluid welcome white">
	<div class="container">
		<div class="row">
			<div class="left col-6">
				<h3 class="title"><?php the_field('intro_title'); ?></h3>
				<?php the_field('intro_content'); ?>


				<?php if( have_rows('lead_information') ): ?>

					<div class="featuredPerson">

					<?php while( have_rows('lead_information') ): the_row(); 

						// Get sub field values.
						$photo = get_sub_field('photo');
						$name = get_sub_field('name');
						$title = get_sub_field('title');

						?>
						
						<div class="left col-5">
							<img src="<?php echo $photo; ?>" />
						</div>
						<div class="right col-7">
							<h4><?php echo $name; ?></h4>
							<h6><?php echo $title; ?></h6>
						</div>

					<?php endwhile; ?>

				</div>

				<?php endif; ?>


					
			</div>
			<div class="right col-5 push-1">
				<div class="sideContact">

				<?php if( have_rows('intro_right_column') ): ?>
					<?php while( have_rows('intro_right_column') ): the_row(); 

						// Get sub field values.
						$title = get_sub_field('title');
						$content = get_sub_field('content');

						?>
						
						<h3><?php echo $title; ?></h3>
					
						<?php echo $content; ?>

						<?php endwhile; ?>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Container -->
<div class="container-fluid welcome white">
	<div class="container">
		<div class="row">
			<div class="col-12">
			

		
			<h3 class="title center" style="text-align:center">ORGANIZATIONAL CHART</h3>
			<p style="text-align:center">Click on a department to learn more.</p>

			<div class="orgchartcontainer">

			

			<?php
				// Target org chart pod
				$mypod = pods( 'org_chart' );
				$mypod->find( $params );

				// Limit 99, should max be 3-4, but 99 to be safe
				$params = array(
					'limit' => 99, 
				);

				// Execute Find
				$mypod = pods( 'org_chart', $params );

				// This grabs the top most parent with no parent assigned
				while ( $mypod->fetch() ) {

					$name = $mypod->display('name');
					$parent = $mypod->display('dept_parent');
					$parslug = $mypod->display('dept_parent.post_name');
					$id = $mypod->display('ID');
					$title = $mypod->display('post_name');
					
					if ($parslug == '') {
						echo '<div class="top">';
						echo '<a href="#orgchartinfoblocks" class="orgchartaction ' . $title . '"><h4>' . $name . '</h4></a>';
					}

				}

				// Reset run new find
				$mypod = pods( 'org_chart', $params );

				// Grabs posts with the parent assigned to top parent
				while ( $mypod->fetch() ) {

					$name = $mypod->display('name');
					$parent = $mypod->display('dept_parent');
					$parslug = $mypod->display('dept_parent.post_name');
					$id = $mypod->display('ID');
					$title = $mypod->display('post_name');
					
					if ($parslug == 'office-of-the-associate-vice-president-and-chro') {
						echo '<a href="#orgchartinfoblocks" class="third orgchartaction ' . $title . '"><h5>' . $name . '</h5></a>';
					}

				}

				echo '</div>';
				echo '<div class="middle">';

				// Reset run new find
				$mypod = pods( 'org_chart', $params );

				// Grabs posts with the parent HR accounting operations
				while ( $mypod->fetch() ) {


					$name = $mypod->display('name');
					$parent = $mypod->display('dept_parent');
					$parslug = $mypod->display('dept_parent.post_name');
					$id = $mypod->display('ID');
					$title = $mypod->display('post_name');
					
					if ($parslug == 'hr-accounting-operations') {
						echo '<a href="#orgchartinfoblocks" class="third orgchartaction ' . $title . '"><h6>' . $name . '</h6></a>';
					}

				}

				echo '</div>';
				echo '<div class="last first">';

				// Reset run new find
				$mypod = pods( 'org_chart', $params );

				// Grabs posts with the parent Assistant Vice President
				while ( $mypod->fetch() ) {

					$name = $mypod->display('name');
					$parent = $mypod->display('dept_parent');
					$parslug = $mypod->display('dept_parent.post_name');
					$id = $mypod->display('ID');
					$title = $mypod->display('post_name');
					
					if ($parslug == 'assistant-vice-president') {
						echo '<p><a href="#orgchartinfoblocks" class="orgchartaction ' . $title . '">' . $name . '</a></p>';
					}

				}

				echo '</div>';
				echo '<div class="last second">';

				// Reset run new find
				$mypod = pods( 'org_chart', $params );

				// Grabs posts with the parent Dual Reporting HR Offices
				while ( $mypod->fetch() ) {


					$name = $mypod->display('name');
					$parent = $mypod->display('dept_parent');
					$parslug = $mypod->display('dept_parent.post_name');
					$id = $mypod->display('ID');
					$title = $mypod->display('post_name');
					
					if ($parslug == 'dual-reporting-hr-offices') {
						echo '<p><a href="#orgchartinfoblocks" class="orgchartaction ' . $title . '">' . $name . '</a></p>';
					}

				}

				echo '</div>';
				echo '<div class="last third">';

				// Reset run new find
				$mypod = pods( 'org_chart', $params );

				// Grabs posts with the parent Senior Director, Workforce Administration & Technology
				while ( $mypod->fetch() ) {


					$name = $mypod->display('name');
					$parent = $mypod->display('dept_parent');
					$parslug = $mypod->display('dept_parent.post_name');
					$id = $mypod->display('ID');
					$title = $mypod->display('post_name');
					
					if ($parslug == 'senior-director-workforce-administration-technology') {
						echo '<p><a href="#orgchartinfoblocks" class="orgchartaction ' . $title . '">' . $name . '</a></p>';
					}

				}
				
				echo '</div>';
				echo '<div id="orgchartinfoblocks">';
				
				// Reset run new find one last time to grab titles and descriptions!
				$mypod = pods( 'org_chart', $params );

				// Grabs all the posties
				while ( $mypod->fetch() ) {

					
					$name = $mypod->display('name');
					$title = $mypod->display('post_name');
					$id = $mypod->display('ID');
					$description = $mypod->display('description');
					$pod = 'team_member';
					$limit = '300';
					$template = 'Team Members';
					$where = 'department.post_name=';
					$relpage = $mypod->display('related_page_link_url');

					$podsc = "[pods name=\"" . $pod . "\" limit=\"" . $limit . "\" template=\"" . $template . "\" where=\"" . $where . "'" . $title . "'\"]";

					echo '<div class="orgchartinfoblock ' . $title . '">';
					echo '<h3 class="title">' . $name . '</h3>';
					echo $description;

					if ($relpage): 
						echo '<a href="';
						echo $relpage;
						echo '" class="button black" style="color:gold; margin-bottom:30px;" rel="noopener noreferrer"><img src="/wp-content/themes/UCF-WordPress-Theme-Human-Resources/img/icon_link.png" class="icon">Learn More</a>';
					endif;

					echo '<h5>Team Members</h5>';
					echo do_shortcode($podsc);


					echo '</div>';

				}
				
				echo '</div>';
				echo '<script>'.PHP_EOL;
				echo '$(document).ready(function() {'.PHP_EOL;
				
				// I lied, one more for the script loop
				$mypod = pods( 'org_chart', $params );

				// blah blah blah
				while ( $mypod->fetch() ) {

					$title = $mypod->display('post_name');
					
					echo '$("a.orgchartaction.' . $title . '").click(function() {'.PHP_EOL;
					echo '$(".orgchartinfoblock").removeClass("active")'.PHP_EOL;
					echo '$(".orgchartinfoblock.' . $title . '").addClass("active")'.PHP_EOL;
					echo '});';

				}
				
				echo '});'.PHP_EOL;
				echo '</script>';
			?>

			</div><!-- end org chart -->
			
			</div>
		</div>
	</div>
</div>

<!-- Container -->
<div class="container-fluid help gold">
	<div class="container">
		<div class="row">
			<div class="left col-12">

				<h3 class="title center"><?php the_field('categories_title'); ?></h3>
				<p class="center"><?php the_field('categories_description'); ?></p>
				
				<?php if( have_rows('category_data') ): ?>

					<select class="custom-select fileselecthelp" id="fileselecthelp">
						<option selected>I'm interested in...</option>


					<?php while( have_rows('category_data') ): the_row(); 

						// Get sub field values.
						$question = get_sub_field('reference_question');
						$value = $input = preg_replace("/[^a-zA-Z]+/", "", $question);
						?>
						
						<option value="<?php echo $value; ?>"><?php echo $question; ?></option>

					<?php endwhile; ?>

					</select>

				<?php endif; ?>

			</div>
		</div>
	</div>
	<div class="imgOverlay"></div>
</div>

<div class="container-fluid helpContent gray">
	<div class="container">
		<div class="row">

			<?php if( have_rows('category_data') ): ?>
				<?php while( have_rows('category_data') ): the_row(); 

					// Get sub field values.
					$question = get_sub_field('reference_question');
					$value = $input = preg_replace("/[^a-zA-Z]+/", "", $question);
					$title = get_sub_field('title');
					$content = get_sub_field('content');
					$rightside = get_sub_field('right_side_additional_content');
					?>
					

					<div class="left col-12 helpContentBlock <?php echo $value; ?>">
						
						<?php if( $rightside || have_rows('right_side_links') ): ?>
							<div class="left short">
						<?php else: ?>
							<div class="full">
						<?php endif; ?>
					
								<h3 class="title"><?php echo $title; ?></h3>
								<?php echo $content; ?>

							</div>


							
							<?php if( $rightside || have_rows('right_side_links') ): ?>
								<div class="right shorter">
							<?php endif; ?>
							
							<?php if( have_rows('right_side_links') ) : ?>

								<?php while( have_rows('right_side_links') ): the_row(); 

									// Get sub field values.
									$icon = get_sub_field('icon');
									$linktitle = get_sub_field('link_title');
									$linksubtitle = get_sub_field('link_subtitle');
									$buttoncolor = get_sub_field('button_color');
									$linkurl = get_sub_field('link_url'); 
									?>

									<a href="<?php echo $linkurl; ?>" class="iconbutton <?php echo $buttoncolor; ?>">
										<span class="left"><img src="<?php echo $icon; ?>" class="icon"></span>
										<span class="right">
											<div class="toptitle"><?php echo $linktitle; ?></div>
											<div class="subtitle"><?php echo $linksubtitle; ?></div>
										</span>
									</a>

								<?php endwhile; ?>

								<?php endif; ?>

								
									<?php echo $rightside; ?>


								<?php if( $rightside || have_rows('right_side_links') ): ?>
									</div>
								<?php endif; ?>

					</div>

				<?php endwhile; ?>
			<?php endif; ?>


			
		</div>
	</div>
	<div class="imgOverlay"></div>
</div>

<?php get_footer(); ?>
