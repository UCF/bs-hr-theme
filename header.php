<!DOCTYPE html>
<html lang="en-us">
	<head>
		<?php wp_head(); ?>
		<link href="<?php echo esc_url( get_stylesheet_directory_uri() . '/src/css/hr_custom.css' ); ?>" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
		<script>
			$(document).ready(function(){
				$('.slider').bxSlider();
			});
		 </script>
		 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-yJpxAFV0Ip/w63YkZfDWDTU6re/Oc3ZiVqMa97pi8uPt92y0wzeK3UFM2yQRhEom" crossorigin="anonymous">


	</head>
	<body ontouchstart <?php body_class(); ?>>
		<a class="skip-navigation bg-complementary text-inverse box-shadow-soft" href="#content">Skip to main content</a>
		<div id="ucfhb"></div>

		<?php do_action( 'after_body_open' ); ?>

		<?php if ( $ucfwp_header_markup = ucfwp_get_header_markup() ) : ?>
		<header class="site-header">
			<?php echo $ucfwp_header_markup; ?>
		</header>
		<?php endif; ?>

		<main class="site-main">
			<?php echo ucfwp_get_subnav_markup(); ?>
			<div class="site-content" id="content" tabindex="-1">
