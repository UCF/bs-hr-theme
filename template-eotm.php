<?php
/**
 * Template Name: Employee of The Month
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

<div class="container-fluid content-container">
    <div class="container">
        <div class="row">
            <div class="col col-sm-8">

                <div class="currentmonth">
                    <?php
                        $the_query = new WP_Query(array(
                            'category_name' => 'employee-of-the-month',
                            'post_status' => 'publish',
                            'posts_per_page' => '1',
                        ));
                    ?>

                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            
                            <div class="photo"><img src="<?php the_post_thumbnail_url(); ?>" /></div>
                            <div class="title"><?php the_title(); ?></div>
                            <div class="date"><?php the_date(); ?></div>
                            <div class="content"><?php the_excerpt(); ?></div>
                            <div class="link"><a href="<?php the_permalink();?>">Read More</a></div>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                    <?php endif; ?>
                </div>

            </div>
            <div class="col col-sm-4">
                
                <div class="eotmarchive">
                    <?php
                        $the_query = new WP_Query(array(
                            'category_name' => 'employee-of-the-month',
                            'post_status' => 'publish',
                            'posts_per_page' => '13',
                        ));
                    ?>

                    <?php if ($the_query->have_posts()) : ?>

                        <h3>Previous Winners</h3>
                        
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            
                            <a href="<?php the_permalink(); ?>"><div class="title"><?php the_title(); ?></div>
                            <div class="date"><?php the_date(); ?></div></a>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>

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


    <?php endwhile; else : ?>
    
        <div class="container-fluid content-container white">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-12 ">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>


<?php get_footer(); ?>
