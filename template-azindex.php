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
			<li style="display:none;"><a href="#!" class="key">Keyword</a></li>
			<li style="display:none;"><a href="#!" class="cont">Content</a></li>
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

			//search in articles pod
			$pods = pods('forms_and_documents', $params);

			$documents = array();

			while ($pods->fetch()) {
				$documentName = $pods->display('name');
				$firstChar = strtolower($documentName[0]);

				if ($pods->display('file_upload')) {
					$fileurl = $pods->display('file_upload');
				} else {
					$fileurl = $pods->display('location_url');
				}

				$documents[$firstChar][] = array(
					'name' => $documentName,
					'url' => $fileurl
				);
			}

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
			$char = '#';

			echo '<div class="left col-12 alphafilelist alpha' . $char . '" id="alpha' . $char . '">';
			echo '<h3 class="title">' . '#' . '</h3>';

			$numDocs = array_filter($documents, function ($key) {
				return ctype_digit($key);
			}, ARRAY_FILTER_USE_KEY);

			if (!empty($numDocs)) {
				echo '<ul class="dlList">';

				foreach ($numDocs as $numberDocs) {
					foreach ($numberDocs as $doc) {
						echo '<li><a href="' . $doc['url'] . '" target="_blank">' . $doc['name'] . '</a></li>';
					}
				}

				echo '</ul>';
			}

			echo '</div>';
			?>
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
			limit => 999,
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
			limit => 999,
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
			limit => 999,
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
			limit => 999,
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
			limit => 999,
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
			limit => 999,
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
			limit => 999,
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
			limit => 999,
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
			limit => 999,
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
			limit => 999,
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
			limit => 999,
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
			limit => 999,
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
			limit => 999,
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
