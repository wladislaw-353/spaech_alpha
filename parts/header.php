<!DOCTYPE html>
<html>
<head>
	<title><?=$myBase['meta_t']?></title>
	<?php
	if($myBase['meta_d'] != '' || $myBase['meta_d'] != NULL)
		echo "<meta name='description' content='{$myBase['meta_d']}'>";
	if($myBase['meta_k'] != '' || $myBase['meta_k'] != NULL)
		echo "<meta name='keywords' content='{$myBase['meta_k']}'>";
	?>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=ROOT?>assets/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="<?=ROOT?>assets/css/common.css"> -->
	<link rel="stylesheet" href="<?=ROOT?>assets/css/font-awesome.css">

	<!-- <link rel="stylesheet" href="<?=ROOT?>assets/css/docs.css"> -->
	<!-- <link rel="stylesheet" href="<?=ROOT?>assets/css/bootstrap-social.css"> -->
	<link rel="stylesheet" href="<?=ROOT?>assets/css/animate.c.min.css">
    <!-- <link rel="stylesheet" href="<?=ROOT?>assets/css/style.css"> -->

    <link rel="stylesheet" href="<?=ROOT?>assets/css/main.css">
    <link rel="stylesheet" href="<?=ROOT?>assets/css/media.css">
    <link rel="stylesheet" href="<?=ROOT?>assets/css/owl-carousel.css">
    <link rel="stylesheet" href="../assets/css/slick.css">
    <link rel="stylesheet" href="../assets/css/slick-theme.css">
    <link rel="stylesheet" href="<?=ROOT?>assets/fonts/phenomena.css">
    <link rel="stylesheet" href="<?=ROOT?>assets/css/fonts.css">
    <link rel="icon" href="<?=ROOT?>img/spaech_ico.png">

    <!-- <link rel="stylesheet" href="<?=ROOT?>assets/fonts/flaticons/flaticon.css"> -->
    <!-- <link rel="stylesheet" href="<?=ROOT?>assets/css/prettyPhoto.css"> -->
    <!-- <link rel="stylesheet" href="<?=ROOT?>assets/css/jgallery.min.css?v=1.5.0"> -->
    <!-- <link rel="stylesheet" href="<?=ROOT?>assets/css/lightbox.css"> -->
    <!-- <link rel="icon" href="<?=ROOT?>img/paw_22.png"> -->
	<!-- <script src="<?=ROOT?>assets/js/jquery1.11.3.min.js"></script> -->

	<link rel="stylesheet" href="/css/modals.css">
</head>
<body>

    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>


	<? include 'modals.php';?>