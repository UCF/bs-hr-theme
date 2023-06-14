
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

        <?php //if ($anchor == "faqs") { /* just grab faqs panel if it exists -- it is hidden in the main template file */ ?>

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
											<span class="left">Email:</span> <span class="right"><a href="mailto:<?php echo $contactemail; ?>"><?php echo $contactemail; ?></a></span>
										<?php }; ?>

										<?php if ($contactphone) { ?>
											<span class="left">Phone:</span> <span class="right"><a href="tel:<?php echo $contactphone; ?>"><?php echo $contactphone; ?></a></span>
										<?php }; ?>

										<?php if ($contactfax) { ?>
											<span class="left">Fax:</span> <span class="right"><a href="fax:<?php echo $contactphone; ?>"><?php echo $contactfax; ?></a></span>
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


    <?php endwhile; else : endif; ?>




				<footer class="container-fluid black">
					<div class="container">
						<div class="row">
							<div class="col col-4">

							<?php if( have_rows('left_section', '20') ): ?>

								<?php while( have_rows('left_section', '20') ): the_row(); ?>
									<h5 class="title"><?php the_sub_field('title');?></h5>
									<?php the_sub_field('content'); ?>
								<?php endwhile; ?>

							<?php endif; ?>

							</div>
							<div class="col col-4">

							<?php if( have_rows('middle_section', '20') ): ?>

								<?php while( have_rows('middle_section', '20') ): the_row(); ?>
									<h5 class="title"><?php the_sub_field('title');?></h5>
									<?php the_sub_field('content'); ?>
								<?php endwhile; ?>

							<?php endif; ?>

							</div>
							<div class="col col-4">

							<?php if( have_rows('right_section', '20') ): ?>

								<?php while( have_rows('right_section', '20') ): the_row(); ?>
									<h5 class="title"><?php the_sub_field('title');?></h5>
									<?php the_sub_field('content'); ?>
								<?php endwhile; ?>

							<?php endif; ?>

							</div>
						</div>
					</div>
				</footer>

			</div>
		</main>




		<?php /* echo ucfwp_get_footer_markup(); */ ?>
		<?php wp_footer(); ?>

		<script>
			$(document).ready(function() {
				$('.learnTabs .tabs > a').click(function() {
					$('.learnTabs .tabs > a').removeClass('active');
					$(this).addClass('active');
				});
				$('.learnTabs .tabs > a.learnOpp').click(function() {
					$('.learnTabs .tabsContent > div').removeClass('active');
					$('.learnTabs .tabsContent > div.learnOpp').addClass('active');
				});
				$('.learnTabs .tabs > a.leadDev').click(function() {
					$('.learnTabs .tabsContent > div').removeClass('active');
					$('.learnTabs .tabsContent > div.leadDev').addClass('active');
				});
				$('.learnTabs .tabs > a.orgDev').click(function() {
					$('.learnTabs .tabsContent > div').removeClass('active');
					$('.learnTabs .tabsContent > div.orgDev').addClass('active');
				});






				$("#fileselect").change(function() {
					var e = document.getElementById("fileselect");
					var filevalue = e.options[e.selectedIndex].value;

				 	$('.azcontentbox .catName').removeClass('active');

				  	if(filevalue == "additional-insurance-information"){
					  	$(".azcontentbox .additional-insurance-information").addClass("active");
				  	}
					if(filevalue == "additional-new-employee-forms"){
					  $(".azcontentbox .additional-new-employee-forms").addClass("active");
					}
					if(filevalue == "cell-phone-policies"){
					  $(".azcontentbox .cell-phone-policies").addClass("active");
					}
					if(filevalue == "child-labor-laws"){
					  $(".azcontentbox .child-labor-laws").addClass("active");
					}
					if(filevalue == "collective-bargaining-unit-classes"){
					  $(".azcontentbox .collective-bargaining-unit-classes").addClass("active");
					}
					if(filevalue == "compensation"){
					  $(".azcontentbox .compensation").addClass("active");
					}
					if(filevalue == "compliance"){
					  $(".azcontentbox .compliance").addClass("active");
					}
					if(filevalue == "current-employees"){
					  $(".azcontentbox .current-employees").addClass("active");
					}
					if(filevalue == "education"){
					  $(".azcontentbox .education").addClass("active");
					}
					if(filevalue == "employee-relations"){
					  $(".azcontentbox .employee-relations").addClass("active");
					}
					if(filevalue == "employee-sign-in-paperwork"){
					  $(".azcontentbox .employee-sign-in-paperwork").addClass("active");
					}
					if(filevalue == "equal-opportunity--affirmative-action"){
					  $(".azcontentbox .equal-opportunity--affirmative-action").addClass("active");
					}
					if(filevalue == "general-compliance-information"){
					  $(".azcontentbox .general-compliance-information").addClass("active");
					}
					if(filevalue == "general-leave-and-attendance-information"){
					  $(".azcontentbox .general-leave-and-attendance-information").addClass("active");
					}
					if(filevalue == "general-new-employee-information"){
					  $(".azcontentbox .general-new-employee-information").addClass("active");
					}
					if(filevalue == "general-pay-statement-and-check-information"){
					  $(".azcontentbox .general-pay-statement-and-check-information").addClass("active");
					}
					if(filevalue == "general-payroll-services-information"){
					  $(".azcontentbox .general-payroll-services-information").addClass("active");
					}
					if(filevalue == "impacts-to-your-benefits"){
					  $(".azcontentbox .impacts-to-your-benefits").addClass("active");
					}
					if(filevalue == "insurance"){
					  $(".azcontentbox .insurance").addClass("active");
					}
					if(filevalue == "leave-administration"){
					  $(".azcontentbox .leave-administration").addClass("active");
					}
					if(filevalue == "leave-and-attendance-information"){
					  $(".azcontentbox .leave-and-attendance-information").addClass("active");
					}
					if(filevalue == "leave-and-attendance-responsibilities"){
					  $(".azcontentbox .leave-and-attendance-responsibilities").addClass("active");
					}
					if(filevalue == "liaisons-and-managers"){
					  $(".azcontentbox .liaisons-and-managers").addClass("active");
					}
					if(filevalue == "manager-resources"){
					  $(".azcontentbox .manager-resources").addClass("active");
					}
					if(filevalue == "new-employee-information"){
					  $(".azcontentbox .new-employee-information").addClass("active");
					}
					if(filevalue == "new-employees"){
					  $(".azcontentbox .new-employees").addClass("active");
					}
					if(filevalue == "pay-days"){
					  $(".azcontentbox .pay-days").addClass("active");
					}
					if(filevalue == "pay-statements-and-checks"){
					  $(".azcontentbox .pay-statements-and-checks").addClass("active");
					}
					if(filevalue == "payroll-resources"){
					  $(".azcontentbox .payroll-resources").addClass("active");
					}
					if(filevalue == "payroll-services"){
					  $(".azcontentbox .payroll-services").addClass("active");
					}
					if(filevalue == "potential-benefits-changes"){
					  $(".azcontentbox .potential-benefits-changes").addClass("active");
					}
					if(filevalue == "retired-employees"){
					  $(".azcontentbox .retired-employees").addClass("active");
					}
					if(filevalue == "retirement-enrollment-forms"){
					  $(".azcontentbox .retirement-enrollment-forms").addClass("active");
					}
					if(filevalue == "sick-pool"){
					  $(".azcontentbox .sick-pool").addClass("active");
					}
					if(filevalue == "signin-forms"){
					  $(".azcontentbox .signin-forms").addClass("active");
					}
					if(filevalue == "support-and-services"){
					  $(".azcontentbox .support-and-services").addClass("active");
					}
					if(filevalue == "talent-acquisition"){
					  $(".azcontentbox .talent-acquisition").addClass("active");
					}
					if(filevalue == "time-off"){
					  $(".azcontentbox .time-off").addClass("active");
					}
					if(filevalue == "tuition-waiver-program"){
					  $(".azcontentbox .tuition-waiver-program").addClass("active");
					}
					if(filevalue == "veterans-rights"){
					  $(".azcontentbox .veterans-rights").addClass("active");
					}
					if(filevalue == "w2-information"){
					  $(".azcontentbox .w2-information").addClass("active");
					}
					if(filevalue == "additional-forms-and-documents"){
					  $(".azcontentbox .additional-forms-and-documents").addClass("active");
					}
				});


				<?php if( have_rows('category_data') ): ?>

					$("#fileselecthelp").change(function() {
					var e = document.getElementById("fileselecthelp");
					var filevalue = e.options[e.selectedIndex].value;

				 	$('.helpContent .helpContentBlock').removeClass('active');

				<?php while( have_rows('category_data') ): the_row();

					// Get sub field values.
					$question = get_sub_field('reference_question');
					$value = $input = preg_replace("/[^a-zA-Z]+/", "", $question);
					?>

					if(filevalue == "<?php echo $value; ?>"){
					  	$(".helpContent .helpContentBlock.<?php echo $value; ?>").addClass("active");
				  	}

				<?php endwhile; ?>

							});
				});

				<?php endif; ?>
		</script>

		<script>
				$(document).ready(function() {

					// Forms and Documents Category Nav jQuery
					$('.formsNav a').click(function() {
						$('.formsNav a').removeClass('active');
						$(this).addClass('active');
					});

					$('.formsNav a.alpha').click(function() {
						$('.container-fluid.azcontentbox').removeClass('active');
						$('.container-fluid.azcontentbox.alpha').addClass('active');
					});

					$('.formsNav a.cat').click(function() {
						$('.container-fluid.azcontentbox').removeClass('active');
						$('.container-fluid.azcontentbox.cat').addClass('active');
					});

					// Forms and Documents Alphabetical list jQuery
					$('.alphaLinks > li > a').click(function() {
						$('.alphaLinks > li > a').removeClass('active');
						$(this).addClass('active');
					});

					$('.alphaLinks li a.alphaAll').click(function() {
						$('.azcontentbox .row.content > .alphafilelist').addClass('active');
					});
					$('.alphaLinks li a.alphaA').click(function() {
						$('.azcontentbox .row.content > .alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > .alphaA').addClass('active');
					});
					$('.alphaLinks li a.alphaB').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaB').addClass('active');
					});
					$('.alphaLinks li a.alphaC').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaC').addClass('active');
					});
					$('.alphaLinks li a.alphaD').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaD').addClass('active');
					});
					$('.alphaLinks li a.alphaE').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaE').addClass('active');
					});
					$('.alphaLinks li a.alphaF').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaF').addClass('active');
					});
					$('.alphaLinks li a.alphaG').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaG').addClass('active');
					});
					$('.alphaLinks li a.alphaH').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaH').addClass('active');
					});
					$('.alphaLinks li a.alphaI').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaI').addClass('active');
					});
					$('.alphaLinks li a.alphaJ').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaJ').addClass('active');
					});
					$('.alphaLinks li a.alphaK').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaK').addClass('active');
					});
					$('.alphaLinks li a.alphaL').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaL').addClass('active');
					});
					$('.alphaLinks li a.alphaM').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaM').addClass('active');
					});
					$('.alphaLinks li a.alphaN').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaN').addClass('active');
					});
					$('.alphaLinks li a.alphaO').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaO').addClass('active');
					});
					$('.alphaLinks li a.alphaP').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaP').addClass('active');
					});
					$('.alphaLinks li a.alphaQ').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaQ').addClass('active');
					});
					$('.alphaLinks li a.alphaR').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaR').addClass('active');
					});
					$('.alphaLinks li a.alphaS').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaS').addClass('active');
					});
					$('.alphaLinks li a.alphaT').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaT').addClass('active');
					});
					$('.alphaLinks li a.alphaU').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaU').addClass('active');
					});
					$('.alphaLinks li a.alphaV').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaV').addClass('active');
					});
					$('.alphaLinks li a.alphaW').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaW').addClass('active');
					});
					$('.alphaLinks li a.alphaX').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaX').addClass('active');
					});
					$('.alphaLinks li a.alphaY').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaY').addClass('active');
					});
					$('.alphaLinks li a.alphaZ').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaZ').addClass('active');
					});
					$('.alphaLinks li a.alphaNum').click(function() {
						$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
						$('.azcontentbox .row.content > div.alphaNum').addClass('active');
					});


					$('select#fileselect').change(function(){
						var value = $(this).val();
						$('.azcontentbox.cat .row.content .catName').removeClass('active');
						$('.azcontentbox.cat .row.content .catName.' + value + '').addClass('active');
					});

				});

				// Forms and Documents Category nav toggles jQuery

				/*
				$('.formsNav li a').click(function() {
					$('.formsNav li a').removeClass('active');
					$(this).addClass('active');
				});
				$('.formsNav li a.alpha').click(function() {
					$('.container-fluid.azcontentbox').removeClass('active');
					$('.container-fluid.azcontentbox.alpha').addClass('active');
				});
				$('.formsNav li a.cat').click(function() {
					$('.container-fluid.azcontentbox').removeClass('active');
					$('.container-fluid.azcontentbox.cat').addClass('active');
				});


				$('.formsNav li a.key').click(function() {
					$('.container-fluid.azcontentbox').removeClass('active');
					$('.container-fluid.azcontentbox.key').addClass('active');
				});

				$('.formsNav li a.cont').click(function() {
					$('.container-fluid.azcontentbox').removeClass('active');
					$('.container-fluid.azcontentbox.cont').addClass('active');
				});

				// Forms and Documents jQuery
				$('.alphaLinks > li > a').click(function() {
					$('.alphaLinks > li > a').removeClass('active');
					$(this).addClass('active');
				});
				$('.alphaLinks li a.alphaAll').click(function() {
					$('.azcontentbox .row.content > .alphafilelist').addClass('active');
				});
				$('.alphaLinks li a.alphaA').click(function() {
					$('.azcontentbox .row.content > .alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > .alphaA').addClass('active');
				});
				$('.alphaLinks li a.alphaB').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaB').addClass('active');
				});
				$('.alphaLinks li a.alphaC').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaC').addClass('active');
				});
				$('.alphaLinks li a.alphaD').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaD').addClass('active');
				});
				$('.alphaLinks li a.alphaE').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaE').addClass('active');
				});
				$('.alphaLinks li a.alphaF').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaF').addClass('active');
				});
				$('.alphaLinks li a.alphaG').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaG').addClass('active');
				});
				$('.alphaLinks li a.alphaH').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaH').addClass('active');
				});
				$('.alphaLinks li a.alphaI').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaI').addClass('active');
				});
				$('.alphaLinks li a.alphaJ').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaJ').addClass('active');
				});
				$('.alphaLinks li a.alphaK').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaK').addClass('active');
				});
				$('.alphaLinks li a.alphaL').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaL').addClass('active');
				});
				$('.alphaLinks li a.alphaM').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaM').addClass('active');
				});
				$('.alphaLinks li a.alphaN').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaN').addClass('active');
				});
				$('.alphaLinks li a.alphaO').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaO').addClass('active');
				});
				$('.alphaLinks li a.alphaP').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaP').addClass('active');
				});
				$('.alphaLinks li a.alphaQ').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaQ').addClass('active');
				});
				$('.alphaLinks li a.alphaR').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaR').addClass('active');
				});
				$('.alphaLinks li a.alphaS').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaS').addClass('active');
				});
				$('.alphaLinks li a.alphaT').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaT').addClass('active');
				});
				$('.alphaLinks li a.alphaU').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaU').addClass('active');
				});
				$('.alphaLinks li a.alphaV').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaV').addClass('active');
				});
				$('.alphaLinks li a.alphaW').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaW').addClass('active');
				});
				$('.alphaLinks li a.alphaX').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaX').addClass('active');
				});
				$('.alphaLinks li a.alphaY').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaY').addClass('active');
				});
				$('.alphaLinks li a.alphaZ').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaZ').addClass('active');
				});
				$('.alphaLinks li a.alphaNum').click(function() {
					$('.azcontentbox .row.content > div.alphafilelist').removeClass('active');
					$('.azcontentbox .row.content > div.alphaNum').addClass('active');
				});*/

		</script>

	</body>

</html>
