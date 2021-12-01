<?php
/**
 * Template Name: A-Z Index
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
		<ul class="formsNav">
			<li><a href="#!" class="alpha active">Alphabetical</a></li>
			<li><a href="#!" class="cat">Category</a></li>
			<li style="display:none;"><a href="#!" class="key">Keyword</a></li>
			<li style="display:none;"><a href="#!" class="cont">Content</a></li>
		</ul>
	</div>
</div>

<!-- Container -->
<div class="container-fluid azcontentbox alpha white active">
	<div class="container">
		<div class="row nav">
			<div class="left col-12">
				<ul class="alphaLinks">
					<li><a href="#alphaA" class="alphaAll active">ALL</a></li>
					<li><a href="#alphaA" class="alphaA ">A</a></li>
					<li><a href="#alphaB" class="alphaB">B</a></li>
					<li><a href="#alphaC" class="alphaC">C</a></li>
					<li><a href="#alphaD" class="alphaD">D</a></li>
					<li><a href="#alphaE" class="alphaE">E</a></li>
					<li><a href="#alphaF" class="alphaF">F</a></li>
					<li><a href="#alphaG" class="alphaG">G</a></li>
					<li><a href="#alphaH" class="alphaH">H</a></li>
					<li><a href="#alphaI" class="alphaI">I</a></li>
					<li><a href="#alphaJ" class="alphaJ">J</a></li>
					<li><a href="#alphaK" class="alphaK">K</a></li>
					<li><a href="#alphaL" class="alphaL">L</a></li>
					<li><a href="#alphaM" class="alphaM">M</a></li>
					<li><a href="#alphaN" class="alphaN">N</a></li>
					<li><a href="#alphaO" class="alphaO">O</a></li>
					<li><a href="#alphaP" class="alphaP">P</a></li>
					<li><a href="#alphaQ" class="alphaQ">Q</a></li>
					<li><a href="#alphaR" class="alphaR">R</a></li>
					<li><a href="#alphaS" class="alphaS">S</a></li>
					<li><a href="#alphaT" class="alphaT">T</a></li>
					<li><a href="#alphaU" class="alphaU">U</a></li>
					<li><a href="#alphaV" class="alphaV">V</a></li>
					<li><a href="#alphaW" class="alphaW">W</a></li>
					<li><a href="#alphaX" class="alphaX">X</a></li>
					<li><a href="#alphaY" class="alphaY">Y</a></li>
					<li><a href="#alphaZ" class="alphaZ">Z</a></li>
				</ul>
			</div>
		</div>
		<div class="row content">
			<div class="left col-12 alphafilelist alphaA active" id="alphaA">
				<h3 class="title">A</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "a" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaB active" id="alphaB">
				<h3 class="title">B</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "b" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaC active" id="alphaC">
				<h3 class="title">C</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "c" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaD active" id="alphaD">
				<h3 class="title">D</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "d" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaE active" id="alphaE">
				<h3 class="title">E</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "e" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaF active" id="alphaF">
				<h3 class="title">F</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "f" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaG active" id="alphaG">
				<h3 class="title">G</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "g" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaH active" id="alphaH">
				<h3 class="title">H</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "h" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaI active" id="alphaI">
				<h3 class="title">I</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ($documentName[0] == "i") {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaJ active" id="alphaJ">
				<h3 class="title">J</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "e" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaK active" id="alphaK">
				<h3 class="title">K</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "k" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaL active" id="alphaL">
				<h3 class="title">L</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "l" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaM active" id="alphaM">
				<h3 class="title">M</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "m" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaN active" id="alphaN">
				<h3 class="title">N</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "n" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaO active" id="alphaO">
				<h3 class="title">O</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "o" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaP active" id="alphaP">
				<h3 class="title">P</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "p" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaQ active" id="alphaQ">
				<h3 class="title">Q</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "q" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaR active" id="alphaR">
				<h3 class="title">R</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "r" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaS active" id="alphaS">
				<h3 class="title">S</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "s" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaT active" id="alphaT">
				<h3 class="title">T</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "t" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaU active" id="alphaU">
				<h3 class="title">U</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "u" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaV active" id="alphaV">
				<h3 class="title">V</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "v" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaW active" id="alphaW">
				<h3 class="title">W</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "w" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaX active" id="alphaX">
				<h3 class="title">X</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "x" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaY active" id="alphaY">
				<h3 class="title">Y</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "y" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
			<div class="left col-12 alphafilelist alphaZ active" id="alphaZ">
				<h3 class="title">Z</h3>

				<?php

				$params = array(
					limit => 9999,
				);

				//search in articles pod
				$pods = pods( 'forms_and_documents', $params );

				//loop through results
				if ( 0 < $pods->total() ) {

					echo '<ul class="dlList">';

					while ( $pods->fetch() ) {

						$documentName = $pods->display('name');

							if ($pods->display('file_upload')) {
								$fileurl = $pods->display('file_upload');
							} else {
								$fileurl = $pods->display('location_url');
							};


						if ( strcasecmp( $documentName[0], "z" ) == 0 ) {
							echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';
						}
					}

					echo '</ul>';
				}
				?>

			</div>
		</div>
	</div>
</div>

<!-- Container -->
<div class="container-fluid azcontentbox cat white">
	<div class="container">
		<div class="row nav">
			<div class="left azdropdown col-12">
				  <select class="custom-select fileselect" id="fileselect">
					<option selected>Choose a category to filter by.</option>
					<!--option value="additional-forms-and-documents">Additional Forms and Documents</option>
					<option value="additional-insurance-information">Additional Insurance Information</option>
					<option value="additional-new-employee-forms">Additional New Employee Forms</option>
					<option value="benefits">Benefits</option>
					<option value="cell-phone-policies">Cell Phone Policies</option>
					<option value="child-labor-laws">Child Labor Laws</option>
					<option value="classification-and-compensation">Classification and Compensation</option>
					<option value="collective-bargaining-unit-classes">Collective Bargaining Unit Classes</option>
					<option value="compensation">Compensation</option>
					<option value="compliance">Compliance</option>
					<option value="current-employees">Current Employees</option>
					<option value="education">Education</option>
					<option value="employee-sign-in-paperwork">Employee Sign In Paperwork</option>
					<option value="equal-opportunity-affirmative-action">Equal Opportunity & Affirmative Action</option>
					<option value="general-compliance-information">General Compliance Information</option>
					<option value="general-leave-and-attendance-information">General Leave and Attendance Information</option>
					<option value="general-new-employee-information">General New Employee Information</option>
					<option value="general-pay-statement-and-check-information">General Pay Statement and Check Information</option>
					<option value="general-payroll-services-information">General Payroll Services Information</option>
					<option value="impacts-to-your-benefits">Impacts to Your Benefits</option>
					<option value="insurance">Insurance</option>
					<option value="leave-and-attendance">Leave and Attendance</option>
					<option value="leave-and-attendance-information">Leave and Attendance Information</option>
					<option value="leave-and-attendance-responsibilities">Leave and Attendance Responsibilities</option>
					<option value="liaisons-and-managers">Liaisons and Managers</option>
					<option value="liaisons-and-supervisors">Liaisons and Supervisors</option>
					<option value="manager-resources">Manager Resources</option>
					<option value="new-employee-information">New Employee Information</option>
					<option value="new-employee-resources">New Employee Resources</option>
					<option value="new-employees">New Employees</option>
					<option value="other-forms-and-documents">Other Forms and Documents</option>
					<option value="pay-days">Pay Days</option>
					<option value="pay-statements-and-checks">Pay Statements and Checks</option>
					<option value="payroll">Payroll</option>
					<option value="payroll-resources">Payroll Resources</option>
					<option value="policies-and-compliance">Policies and Compliance</option>
					<option value="potential-benefits-changes">Potential Benefits Changes</option>
					<option value="retired-employees">Retired Employees</option>
					<option value="retirement-and-retirees">Retirement and Retirees</option>
					<option value="retirement-enrollment-forms">Retirement Enrollment Forms</option>
					<option value="sick-pool">Sick Pool</option>
					<option value="sign-in-forms">Sign-in Forms</option>
					<option value="support-and-services">Support and Services</option>
					<option value="talent-acquisition">Talent Acquisition</option>
					<option value="time-off">Time Off</option>
					<option value="tuition-waiver-program">Tuition Waiver Program</option>
					<option value="veterans-rights">Veterans' Rights</option>
					<option value="w-2-information">W-2 Information</option-->
					<option value="benefits">Benefits</option>
					<option value="classification-and-compensation">Classification and Compensation</option>
					<option value="current-employees">Current Employees</option>
					<option value="employee-recognition">Employee Recognition</option>
					<option value="hiring-and-onboarding">Hiring and Onboarding</option>
					<option value="leave-and-attendance">Leave and Attendance</option>
					<option value="liaisons-and-supervisors">Liaisons and Supervisors</option>
					<option value="new-employee-resources">New Employee Resources</option>
					<option value="new-employees">New Employees</option>
					<option value="other-forms-and-documents">Other Forms and Documents</option>
					<option value="payroll">Payroll</option>
					<option value="policies-and-compliance">Policies and Compliance</option>
					<option value="retirement-and-retirees">Retirement and Retirees</option>
				  </select>
			</div>
		</div>
		<div class="row content">



		<?php

		$category = 'Benefits';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $category))))), '-'));

		$params = array(
			limit => 9999,
			where => "category.meta_value = '$category'",
		);

		$pods = pods( 'forms_and_documents', $params );

		if ( 0 < $pods->total() ) {


			echo '<div class="left col-12 catName ' . $slug . '">';
			echo '<h3 class="title">' . $category . '</h3>';
			echo '<ul class="dlList">';

			while ( $pods->fetch() ) {

				$documentName = $pods->display('name');
					if ($pods->display('file_upload')) {
						$fileurl = $pods->display('file_upload');
					} else {
						$fileurl = $pods->display('location_url');
					};

					echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';

			}

			echo '</ul>';
			echo '</div>';
		}

		?>

		<?php

		$category = 'Classification and Compensation';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $category))))), '-'));

		$params = array(
			limit => 9999,
			where => "category.meta_value = '$category'",
		);

		$pods = pods( 'forms_and_documents', $params );

		if ( 0 < $pods->total() ) {


			echo '<div class="left col-12 catName ' . $slug . '">';
			echo '<h3 class="title">' . $category . '</h3>';
			echo '<ul class="dlList">';

			while ( $pods->fetch() ) {

				$documentName = $pods->display('name');
					if ($pods->display('file_upload')) {
						$fileurl = $pods->display('file_upload');
					} else {
						$fileurl = $pods->display('location_url');
					};

					echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';

			}

			echo '</ul>';
			echo '</div>';
		}

		?>

		<?php

		$category = 'Current Employees';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $category))))), '-'));

		$params = array(
			limit => 9999,
			where => "category.meta_value = '$category'",
		);

		$pods = pods( 'forms_and_documents', $params );

		if ( 0 < $pods->total() ) {


			echo '<div class="left col-12 catName ' . $slug . '">';
			echo '<h3 class="title">' . $category . '</h3>';
			echo '<ul class="dlList">';

			while ( $pods->fetch() ) {

				$documentName = $pods->display('name');
					if ($pods->display('file_upload')) {
						$fileurl = $pods->display('file_upload');
					} else {
						$fileurl = $pods->display('location_url');
					};

					echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';

			}

			echo '</ul>';
			echo '</div>';
		}

		?>

		<?php

		$category = 'Employee Recognition';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $category))))), '-'));

		$params = array(
			limit => 9999,
			where => "category.meta_value = '$category'",
		);

		$pods = pods( 'forms_and_documents', $params );

		if ( 0 < $pods->total() ) {


			echo '<div class="left col-12 catName ' . $slug . '">';
			echo '<h3 class="title">' . $category . '</h3>';
			echo '<ul class="dlList">';

			while ( $pods->fetch() ) {

				$documentName = $pods->display('name');
					if ($pods->display('file_upload')) {
						$fileurl = $pods->display('file_upload');
					} else {
						$fileurl = $pods->display('location_url');
					};

					echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';

			}

			echo '</ul>';
			echo '</div>';
		}

		?>

		<?php

		$category = 'Hiring and Onboarding';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $category))))), '-'));

		$params = array(
			limit => 9999,
			where => "category.meta_value = '$category'",
		);

		$pods = pods( 'forms_and_documents', $params );

		if ( 0 < $pods->total() ) {


			echo '<div class="left col-12 catName ' . $slug . '">';
			echo '<h3 class="title">' . $category . '</h3>';
			echo '<ul class="dlList">';

			while ( $pods->fetch() ) {

				$documentName = $pods->display('name');
					if ($pods->display('file_upload')) {
						$fileurl = $pods->display('file_upload');
					} else {
						$fileurl = $pods->display('location_url');
					};

					echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';

			}

			echo '</ul>';
			echo '</div>';
		}

		?>

		<?php

		$category = 'Leave and Attendance';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $category))))), '-'));

		$params = array(
			limit => 9999,
			where => "category.meta_value = '$category'",
		);

		$pods = pods( 'forms_and_documents', $params );

		if ( 0 < $pods->total() ) {


			echo '<div class="left col-12 catName ' . $slug . '">';
			echo '<h3 class="title">' . $category . '</h3>';
			echo '<ul class="dlList">';

			while ( $pods->fetch() ) {

				$documentName = $pods->display('name');
					if ($pods->display('file_upload')) {
						$fileurl = $pods->display('file_upload');
					} else {
						$fileurl = $pods->display('location_url');
					};

					echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';

			}

			echo '</ul>';
			echo '</div>';
		}

		?>

		<?php

		$category = 'Liaisons and Supervisors';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $category))))), '-'));

		$params = array(
			limit => 9999,
			where => "category.meta_value = '$category'",
		);

		$pods = pods( 'forms_and_documents', $params );

		if ( 0 < $pods->total() ) {


			echo '<div class="left col-12 catName ' . $slug . '">';
			echo '<h3 class="title">' . $category . '</h3>';
			echo '<ul class="dlList">';

			while ( $pods->fetch() ) {

				$documentName = $pods->display('name');
					if ($pods->display('file_upload')) {
						$fileurl = $pods->display('file_upload');
					} else {
						$fileurl = $pods->display('location_url');
					};

					echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';

			}

			echo '</ul>';
			echo '</div>';
		}

		?>

		<?php

		$category = 'New Employee Resources';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $category))))), '-'));

		$params = array(
			limit => 9999,
			where => "category.meta_value = '$category'",
		);

		$pods = pods( 'forms_and_documents', $params );

		if ( 0 < $pods->total() ) {


			echo '<div class="left col-12 catName ' . $slug . '">';
			echo '<h3 class="title">' . $category . '</h3>';
			echo '<ul class="dlList">';

			while ( $pods->fetch() ) {

				$documentName = $pods->display('name');
					if ($pods->display('file_upload')) {
						$fileurl = $pods->display('file_upload');
					} else {
						$fileurl = $pods->display('location_url');
					};

					echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';

			}

			echo '</ul>';
			echo '</div>';
		}

		?>

		<?php

		$category = 'New Employees';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $category))))), '-'));

		$params = array(
			limit => 9999,
			where => "category.meta_value = '$category'",
		);

		$pods = pods( 'forms_and_documents', $params );

		if ( 0 < $pods->total() ) {


			echo '<div class="left col-12 catName ' . $slug . '">';
			echo '<h3 class="title">' . $category . '</h3>';
			echo '<ul class="dlList">';

			while ( $pods->fetch() ) {

				$documentName = $pods->display('name');
					if ($pods->display('file_upload')) {
						$fileurl = $pods->display('file_upload');
					} else {
						$fileurl = $pods->display('location_url');
					};

					echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';

			}

			echo '</ul>';
			echo '</div>';
		}

		?>

		<?php

		$category = 'Other Forms and Documents';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $category))))), '-'));

		$params = array(
			limit => 9999,
			where => "category.meta_value = '$category'",
		);

		$pods = pods( 'forms_and_documents', $params );

		if ( 0 < $pods->total() ) {


			echo '<div class="left col-12 catName ' . $slug . '">';
			echo '<h3 class="title">' . $category . '</h3>';
			echo '<ul class="dlList">';

			while ( $pods->fetch() ) {

				$documentName = $pods->display('name');
					if ($pods->display('file_upload')) {
						$fileurl = $pods->display('file_upload');
					} else {
						$fileurl = $pods->display('location_url');
					};

					echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';

			}

			echo '</ul>';
			echo '</div>';
		}

		?>

		<?php

		$category = 'Payroll';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $category))))), '-'));

		$params = array(
			limit => 9999,
			where => "category.meta_value = '$category'",
		);

		$pods = pods( 'forms_and_documents', $params );

		if ( 0 < $pods->total() ) {


			echo '<div class="left col-12 catName ' . $slug . '">';
			echo '<h3 class="title">' . $category . '</h3>';
			echo '<ul class="dlList">';

			while ( $pods->fetch() ) {

				$documentName = $pods->display('name');
					if ($pods->display('file_upload')) {
						$fileurl = $pods->display('file_upload');
					} else {
						$fileurl = $pods->display('location_url');
					};

					echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';

			}

			echo '</ul>';
			echo '</div>';
		}

		?>

		<?php

		$category = 'Policies and Compliance';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $category))))), '-'));

		$params = array(
			limit => 9999,
			where => "category.meta_value = '$category'",
		);

		$pods = pods( 'forms_and_documents', $params );

		if ( 0 < $pods->total() ) {


			echo '<div class="left col-12 catName ' . $slug . '">';
			echo '<h3 class="title">' . $category . '</h3>';
			echo '<ul class="dlList">';

			while ( $pods->fetch() ) {

				$documentName = $pods->display('name');
					if ($pods->display('file_upload')) {
						$fileurl = $pods->display('file_upload');
					} else {
						$fileurl = $pods->display('location_url');
					};

					echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';

			}

			echo '</ul>';
			echo '</div>';
		}

		?>

		<?php

		$category = 'Retirement and Retirees';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $category))))), '-'));

		$params = array(
			limit => 9999,
			where => "category.meta_value = '$category'",
		);

		$pods = pods( 'forms_and_documents', $params );

		if ( 0 < $pods->total() ) {


			echo '<div class="left col-12 catName ' . $slug . '">';
			echo '<h3 class="title">' . $category . '</h3>';
			echo '<ul class="dlList">';

			while ( $pods->fetch() ) {

				$documentName = $pods->display('name');
					if ($pods->display('file_upload')) {
						$fileurl = $pods->display('file_upload');
					} else {
						$fileurl = $pods->display('location_url');
					};

					echo '<li><a href="' . $fileurl . '" target="_blank">' . $documentName . '</a></li>';

			}

			echo '</ul>';
			echo '</div>';
		}

		?>




		</div>
	</div>
</div>



<?php get_footer(); ?>
