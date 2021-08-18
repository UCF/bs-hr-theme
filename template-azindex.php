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
						

						if ($documentName[0] == "A") {
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
						

						if ($documentName[0] == "B") {
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
						

						if ($documentName[0] == "C") {
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
						

						if ($documentName[0] == "D") {
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
						

						if ($documentName[0] == "E") {
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
						

						if ($documentName[0] == "F") {
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
						

						if ($documentName[0] == "G") {
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
						

						if ($documentName[0] == "H") {
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
						

						if ($documentName[0] == "J") {
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
						

						if ($documentName[0] == "J") {
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
						

						if ($documentName[0] == "K") {
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
						

						if ($documentName[0] == "L") {
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
						

						if ($documentName[0] == "M") {
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
						

						if ($documentName[0] == "N") {
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
						

						if ($documentName[0] == "O") {
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
						

						if ($documentName[0] == "P") {
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
						

						if ($documentName[0] == "Q") {
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
						

						if ($documentName[0] == "R") {
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
						

						if ($documentName[0] == "S") {
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
						

						if ($documentName[0] == "T") {
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
						

						if ($documentName[0] == "U") {
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
						

						if ($documentName[0] == "V") {
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
						

						if ($documentName[0] == "W") {
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
						

						if ($documentName[0] == "X") {
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
						

						if ($documentName[0] == "Y") {
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
						

						if ($documentName[0] == "Z") {
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
					<option value="additional-insurance-information">Additional Insurance Information</option>
					<option value="additional-new-employee-forms">Additional New Employee Forms</option>
					<option value="cell-phone-policies">Cell Phone Policies</option>
					<option value="child-labor-laws">Child Labor Laws</option>
					<option value="collective-bargaining-unit-classes">Collective Bargaining Unit Classes</option>
					<option value="compensation">Compensation</option>
					<option value="compliance">Compliance</option>
					<option value="current-employees">Current Employees</option>
					<option value="education">Education</option>
					<option value="employee-relations">Employee Relations</option>
					<option value="employee-sign-in-paperwork">Employee Sign In Paperwork</option>
					<option value="equal-opportunity--affirmative-action">Equal Opportunity & Affirmative Action</option>
					<option value="general-compliance-information">General Compliance Information</option>
					<option value="general-leave-and-attendance-information">General Leave and Attendance Information</option>
					<option value="general-new-employee-information">General New Employee Information</option>
					<option value="general-pay-statement-and-check-information">General Pay Statement and Check Information</option>
					<option value="general-payroll-services-information">General Payroll Services Information</option>
					<option value="impacts-to-your-benefits">Impacts to Your Benefits</option>
					<option value="insurance">Insurance</option>
					<option value="leave-administration">Leave Administration</option>
					<option value="leave-and-attendance-information">Leave and Attendance Information</option>
					<option value="leave-and-attendance-responsibilities">Leave and Attendance Responsibilities</option>
					<option value="liaisons-and-managers">Liaisons and Managers</option>
					<option value="manager-resources">Manager Resources</option>
					<option value="new-employee-information">New Employee Information</option>
					<option value="new-employees">New Employees</option>
					<option value="pay-days">Pay Days</option>
					<option value="pay-statements-and-checks">Pay Statements and Checks</option>
					<option value="payroll-resources">Payroll Resources</option>
					<option value="payroll-services">Payroll Services</option>
					<option value="potential-benefits-changes">Potential Benefits Changes</option>
					<option value="retired-employees">Retired Employees</option>
					<option value="retirement-enrollment-forms">Retirement Enrollment Forms</option>
					<option value="sick-pool">Sick Pool</option>
					<option value="signin-forms">Sign-in Forms</option>
					<option value="support-and-services">Support and Services</option>
					<option value="talent-acquisition">Talent Acquisition</option>
					<option value="time-off">Time Off</option>
					<option value="tuition-waiver-program">Tuition Waiver Program</option>
					<option value="veterans-rights">Veterans' Rights</option>
					<option value="w2-information">W-2 Information</option>
					<option value="additional-forms-and-documents">Additional Forms and Documents</option>
				  </select>
			</div>
		</div>
		<div class="row content">
			<div class="left col-12 catName additional-insurance-information">
				<h3 class="title">Additional Insurance Information</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName additional-new-employee-forms">
				<h3 class="title">Additional New Employee Forms</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName cell-phone-policies">
				<h3 class="title">Cell Phone Policies</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName child-labor-laws">
				<h3 class="title">Child Labor Laws</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName collective-bargaining-unit-classes">
				<h3 class="title">Collective Bargaining Unit Classes</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName compensation">
				<h3 class="title">Compensation</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName compliance">
				<h3 class="title">Compliance</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName current-employees">
				<h3 class="title">Current Employees</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName education">
				<h3 class="title">Education</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName employee-relations">
				<h3 class="title">Employee Relations</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName employee-sign-in-paperwork">
				<h3 class="title">Employee Sign In Paperwork</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName equal-opportunity--affirmative-action">
				<h3 class="title">Equal Opportunity & Affirmative Action</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName general-compliance-information">
				<h3 class="title">General Compliance Information</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName general-leave-and-attendance-information">
				<h3 class="title">General Leave and Attendance Information</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName general-new-employee-information">
				<h3 class="title">General New Employee Information</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName general-pay-statement-and-check-information">
				<h3 class="title">General Pay Statement and Check Information</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName general-payroll-services-information">
				<h3 class="title">General Payroll Services Information</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName impacts-to-your-benefits">
				<h3 class="title">Impacts to Your Benefits</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName insurance">
				<h3 class="title">Insurance</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName leave-administration">
				<h3 class="title">Leave Administration</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName leave-and-attendance-information">
				<h3 class="title">Leave and Attendance Information</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName leave-and-attendance-responsibilities">
				<h3 class="title">Leave and Attendance Responsibilities</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName liaisons-and-managers">
				<h3 class="title">Liaisons and Managers</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName manager-resources">
				<h3 class="title">Manager Resources</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName new-employee-information">
				<h3 class="title">New Employee Information</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName new-employees">
				<h3 class="title">New Employees</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName pay-days">
				<h3 class="title">Pay Days</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName pay-statements-and-checks">
				<h3 class="title">Pay Statements and Checks</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName payroll-resources">
				<h3 class="title">Payroll Resources</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName payroll-services">
				<h3 class="title">Payroll Services</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName retirement-enrollment-forms">
				<h3 class="title">Retirement Enrollment Forms</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName sick-pool">
				<h3 class="title">Sick Pool</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName signin-forms">
				<h3 class="title">Sign-in Forms</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName support-and-services">
				<h3 class="title">Support and Services</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName talent-acquisition">
				<h3 class="title">Talent Acquisition</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName time-off">
				<h3 class="title">Time Off</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName tuition-waiver-program">
				<h3 class="title">Tuition Waiver Program</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName veterans-rights">
				<h3 class="title">Veterans' Rights</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName w2-information">
				<h3 class="title">W-2 Information</h3>
				<ul class="dlList">
					
				</ul>
			</div>
			<div class="left col-12 catName additional-forms-and-documents">
				<h3 class="title">Additional Forms and Documents</h3>
				<ul class="dlList">
				</ul>
			</div>
		</div>
	</div>
</div>



<?php get_footer(); ?>
