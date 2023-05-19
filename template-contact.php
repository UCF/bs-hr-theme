<?php
/**
 * Template Name: Contact
 * Template Post Type: page, post
 */
?>
<?php get_header(); the_post(); ?>


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
					$learnmore = $mypod->display('learn_more_url');

					$podsc = "[pods name=\"" . $pod . "\" limit=\"" . $limit . "\" template=\"" . $template . "\" where=\"" . $where . "'" . $title . "'\"]";

					echo '<div class="orgchartinfoblock ' . $title . '">';
					echo '<h3 class="title">' . $name . '</h3>';
					echo $description;

					

					echo '<h5>Team Members</h5>';
					echo do_shortcode($podsc);

					if ($relpage): 
						echo '<a href="';
						echo $relpage;
						echo '" class="button black" style="color:gold; margin-bottom:30px;" rel="noopener noreferrer"><img src="/wp-content/themes/UCF-WordPress-Theme-Human-Resources/img/icon_link.png" class="icon">Learn More</a>';
					endif;

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
<div class="container-fluid help gold" style="display:none;">
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

<div class="container-fluid helpContent gray" style="display:none;">
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

<!-- Get Panels if exist -->
<?php if( have_rows('panel') ): 
    while( have_rows('panel') ) : the_row(); 
            $name = get_sub_field('panel_name');
            $anchor = preg_replace('/\W+/', '-', strtolower(trim($name)));
            $main = get_sub_field('main_content');
            $background = get_sub_field('background_color'); 
            $paneltype = get_sub_field('panel_type');
            $sidecontent = get_sub_field('side_content'); 
            $nav = get_sub_field('has_nav');
            $search = get_sub_field('include_search');
            $contact = get_sub_field('has_contact');
            $alphoto = get_sub_field('translucent_photo');
            $center = get_sub_field('center_align_heading');
            $bgphoto = get_sub_field('background_photo');
            $centerclass = '';
            $bgsettings = '';
            $xpad = '';

            if ($paneltype == "full") {
                $colone = 'col-lg-12';
            }

            if ($paneltype == "sftf") {
                $colone = 'col-lg-9';
                $coltwo = 'col-lg-3';            
            }

            if ($paneltype == "sstt") {
                $colone = 'col-lg-8';
                $coltwo = 'col-lg-4';            
            }

            if ($paneltype == "ff") {
                $colone = 'col-lg-6';
                $coltwo = 'col-lg-6';   
            }

            if ($paneltype == "ffr") {
                $colone = 'col-lg-6';
                $coltwo = 'col-lg-5 push-1';   
            }

            if ($alphoto == "1") {
                $bgsettings = 'no-repeat center center; background-size:cover; opacity:0.1';
            }

            if ($alphoto == '' && $bgphoto != '') {
                $bgsettings = 'no-repeat bottom center; background-size:cover;';
                $xpad = 'style="padding-bottom:380px"';
            }

            if ($center == "1") {
                $centerclass = "center";
            }
        ?>

        <?php if ($anchor != "faqs") { /* don't show the faqs panel -- we pull this panel in the footer file */ ?>

        <!-- Container -->
        <div class="container-fluid content-container <?php echo $background; ?>" id="<?php echo $anchor; ?>">
            <div class="container" <?php echo $xpad; ?>>
                <div class="row">
                    <div class="col <?php echo $colone; ?> <?php echo $centerclass; ?>">
                        <?php echo $main; ?>
                    </div>
                    
                <?php if ($paneltype != "full") { 
                        if ($contact == "1") {
                            $contactclass = 'faqContact';
                        }
                    ?>
                
                    <div class="col <?php echo $coltwo; ?> <?php echo $contactclass; ?>">

                        <!-- if side navigation is enabled in editor -->
                        <?php if ($nav == "1") {
                            
							if( have_rows('nav_items') ): ?>
								<div class="sideNav">
                                
                                <h3>GET STARTED <img src="<?php echo esc_url( get_stylesheet_directory_uri()); ?>/img/icon_arrow_large.png"></h3>
                                
                                <ul class="navSide">                                    

                                    <?php while( have_rows('nav_items') ): the_row();
                                        $sidenavlineone = get_sub_field('line_one');
                                        $sidenavlinetwo = get_sub_field('line_two');
                                        $sidenavicon = get_sub_field('icon');
                                        $sidenavbackground = get_sub_field('background');
                                        $sidenavlink = get_sub_field('page_link');
                                        $sidenavlinkext = get_sub_field('page_link_external');
                                        $externallink = get_sub_field('external_link');
                                        $anchor = get_sub_field('anchor');
                                        ?>

                                        <!-- if search is enabled in editor -->
                                        <?php if (!empty($search)) { ?>
                                            <!--li class="searchBar"><input type="text" value="Search UCF HR"/><input type="submit" /></li--> 
								            <li class="searchBar"><?php get_search_form(); ?></li> 
                                        <?php } else { }; ?>

                                        <li style="background:url(<?php echo $sidenavbackground; ?>) no-repeat center center; background-size:cover;" class="<?php echo $sidenavlinetwo;?>">
                                            
                                            <?php if ($externallink == "1") { ?>
                                                <a href="<?php echo $sidenavlinkext; ?>" target="_blank">
                                            <?php }; ?>
                                            <?php if ($anchor == "1") { ?>
                                                <a href="<?php echo $sidenavlinkext; ?>">
                                            <?php }; ?>
                                            <?php if ($externallink == "0" && $anchor == "0") { ?>
                                                <a href="<?php echo $sidenavlink; ?>">
                                            <?php }; ?>
                                            
                                                <div class="left">
                                                    <img src="<?php echo $sidenavicon; ?>" />
                                                </div>
                                                <div class="right">
                                                    <span class="top"><?php echo $sidenavlineone; ?></span>
                                                    <span class="bottom"><?php echo $sidenavlinetwo; ?></span>
                                                </div>
                                                <div class="overlay"></div>
                                            </a>
                                        </li>

                                    <?php endwhile; ?>

                                    </ul>
                                </div>

                            <?php endif; 
                        } ?>
                        <!-- end side nav -->

                        <!-- if contact information is enabled in editor -->
                        <?php if ($contact == "1") {
                            
							if( have_rows('contact') ): ?>
								
                                <ul class="navSide">

                                <?php while( have_rows('contact') ): the_row();
                                    $contactheading = get_sub_field('contact_heading');
                                    $contactphoto = get_sub_field('contact_photo');
                                    $contactname = get_sub_field('contact_name');
                                    $contacttitle = get_sub_field('contact_title');
                                    $contactemail = get_sub_field('contact_email_address');
                                    $contactphone = get_sub_field('contact_phone_number');
                                    $contactfax = get_sub_field('contact_fax_number');
                                    ?>

									<h3 class="title center"><?php echo $contactheading; ?></h3>
									
									<?php if ($contactphoto) { ?>
											<img src="<?php echo $contactphoto; ?>" class="contactPhoto" />
									<?php }; ?>
									
									<?php if ($contactname) { ?>
										<div class="contactTitle"><?php echo $contactname; ?></div>
									<?php }; ?>

									<?php if ($contacttitle) { ?>
										<div class="contactSubTitle"><?php echo $contacttitle; ?></div>
									<?php }; ?>
									
									<?php if ($contactemail) { ?>
										<a href="mailto:<?php echo $contactemail; ?>" class="button">GET IN TOUCH <img src="<?php echo esc_url( get_stylesheet_directory_uri()); ?>/img/icon_click.png" class="contactIcon" /></a>
									<?php }; ?>
									
									<div class="contactInfo">
										<?php if ($contactemail) { ?>
											<span class="left">Email:</span> <span class="right"><?php echo $contactemail; ?></span>
										<?php }; ?>
	
										<?php if ($contactphone) { ?>
											<span class="left">Phone:</span> <span class="right"><?php echo $contactphone; ?></span>
										<?php }; ?>

										<?php if ($contactfax) { ?>
											<span class="left">Fax:</span> <span class="right"><?php echo $contactfax; ?></span>
										<?php }; ?>
                                    </div>

								<?php endwhile; ?>

								</ul>

                            <?php endif; 
                        } ?>
                        <!-- end contact information -->

                        <?php echo $sidecontent; ?>

                    </div>

                <?php } ?>

                </div>
            </div>

            <?php if ($bgphoto != "") { ?>

                <div class="bgoverlay overlay" style="background:url(<?php echo $bgphoto; ?>) <?php echo $bgsettings; ?>"></div>

            <?php } ?>

        </div>

        <?php } /* close faqs panel filter */ ?>


<?php endwhile; endif; ?>
<!-- End Get Panels -->

<?php get_footer(); ?>
