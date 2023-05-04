<?php
/**
 * Template Name: A-Z Index
 * Template Post Type: page, post
 */
?>
<?php get_header(); the_post(); ?>


<!-- Anchor navigation below hero -->
<div class="subnav container-fluid">
	<div class="container">
		<ul class="formsNav">
			<li><a href="#!" class="alpha active">Alphabetical</a></li>
			<li><a href="#!" class="cat">Category</a></li>
		</ul>
	</div>
</div>

<!-- A-Z Index Alphabetical List Container -->
<div class="container-fluid azcontentbox alpha white active">
	<div class="container">
		<div class="row nav">
			<div class="left col-12">
				<ul class="alphaLinks">
					<?php
					// Add 'ALL' list item
					echo '<li><a href="#alphaAll" class="alphaAll active">ALL</a></li>';

					// Add alphabetic list items
					for ($i = 65; $i <= 90; $i++) {
						$letter = chr($i);
						echo "<li><a href=\"#alpha{$letter}\" class=\"alpha{$letter}\">{$letter}</a></li>";
					}

					// Add '#' list item for numbers
					echo '<li><a href="#alphaNum" class="alphaNum">#</a></li>';
					?>
				</ul>
			</div>
		</div>
		<div class="row content">

			<?php
			/**
			 * Create all Pods sections in A-Z index
			 * Fetch all documents under each letter/number
			 * Replaces iterative calls for sections
			 *
			 * @since 1.1.1
			 * @author Mike Setzer
			 **/
			$params = array(
				'limit' => 999,
			);

			//Fetch all forms_and_documents pods items and store in $documents array
			$pods = pods('forms_and_documents', $params);

			$documents = array();

			while ($pods->fetch()) {
				// Store document name for display, and sort first letter of document name for easy fetching later
				$documentName = $pods->display('name');
				$firstChar = strtolower($documentName[0]);

				if ($pods->display('file_upload')) {
					$fileurl = $pods->display('file_upload');
				} else {
					$fileurl = $pods->display('location_url');
				}

				//If the first character is a number, store in 'num' array
				if (ctype_digit($firstChar)) {
					$documents['num'][] = array(
						'name' => $documentName,
						'url' => $fileurl
					);
				//If the first character is a letter, store in letter array
				} else {
					$documents[$firstChar][] = array(
						'name' => $documentName,
						'url' => $fileurl
					);
				}
			}

			//Create a div for each letter/number and populate with documents
			for ($i = 65; $i <= 90; $i++) {
				$char = chr($i);
				$charLower = strtolower($char);

				echo '<div class="left col-12 alphafilelist alpha' . $char . ' active" id="alpha' . $char . '">';
				echo '<h3 class="title">' . $char . '</h3>';

				if (!empty($documents[$charLower])) {
					echo '<ul class="dlList">';

					foreach ($documents[$charLower] as $doc) {
						echo '<li><a href="' . $doc['url'] . '" target="_blank">' . $doc['name'] . '</a></li>';
					}

					echo '</ul>';
				}

				echo '</div>';
			}

			// Generate div for numbers
			echo '<div class="left col-12 alphafilelist alphaNum active" id="alphaNum">';
			echo '<h3 class="title">' . '#' . '</h3>';

			if (!empty($documents['num'])) {
				echo '<ul class="dlList">';

				foreach ($documents['num'] as $docNum) {
					echo '<li><a href="' . $docNum['url'] . '" target="_blank">' . $docNum['name'] . '</a></li>';
				}

				echo '</ul>';
			}

			echo '</div>';
			?>
		</div>
	</div>
</div>

<!-- A-Z Index Category Container -->
<div class="container-fluid azcontentbox cat white">
	<div class="container">
		<div class="row nav">
			<div class="left azdropdown col-12">
				  <select class="custom-select fileselect" id="fileselect">
					<option selected>Choose a category to filter by.</option>
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
			$categories = array(
				'Benefits',
				'Classification and Compensation',
				'Current Employees',
				'Employee Recognition',
				'Hiring and Onboarding',
				'Leave and Attendance',
				'Liaisons and Supervisors',
				'New Employee Resources',
				'New Employees',
				'Other Forms and Documents',
				'Payroll',
				'Policies and Compliance',
				'Retirement and Retirees',
			);

			$params = array(
				'limit' => 999,
			);

			$pods = pods('forms_and_documents', $params);

			$documentsByCategory = array();

			while ($pods->fetch()) {
				$documentName = $pods->display('name');
				$category = $pods->display('category');
				$fileurl = $pods->display('file_upload') ? $pods->display('file_upload') : $pods->display('location_url');

				$documentsByCategory[$category][] = array(
					'name' => $documentName,
					'url' => $fileurl,
				);
			}

			foreach ($categories as $category) {
				$slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $category))))), '-'));

				if (!empty($documentsByCategory[$category])) {
					echo '<div class="left col-12 catName ' . $slug . '">';
					echo '<h3 class="title">' . $category . '</h3>';
					echo '<ul class="dlList">';

					foreach ($documentsByCategory[$category] as $doc) {
						echo '<li><a href="' . $doc['url'] . '" target="_blank">' . $doc['name'] . '</a></li>';
					}

					echo '</ul>';
					echo '</div>';
				}
			}
			?>
		</div>
	</div>
</div>



<?php get_footer(); ?>
