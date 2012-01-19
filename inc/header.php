<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet/less" href="styles/main.less" type="text/css" />
	
	<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
	<script src="js/less-1.1.5.min.js" type="text/javascript"></script>
	<script src="js/scripts.js" type="text/javascript"></script>

	<title>phpMyXBMC</title>
</head>
<body>

<div id="wrapper">

	<header>
		<div id="logo">
		</div>

		<?php get_navigation(); ?>

	</header>

	<div id="container">

		<?php get_sidebarleft(); ?>
		<?php get_sidebarright(); ?>

		<div id="content">
