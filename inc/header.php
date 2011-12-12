<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet/less" href="styles/main.less" type="text/css" />
	
	<script src="js/less-1.1.5.min.js" type="text/javascript"></script>
	<script src="js/jquery-1.7.min.js" type="text/javascript"></script>
	<script src="js/scripts.js" type="text/javascript"></script>

	<title>phpMyXBMC</title>
</head>
<body>

<div id="wrapper">

	<header>
		<div id="logo">
		</div>

		<nav>
			<ul>
				<a href="http://localhost:7777/phpmyxbmc/index.php"><li>
					<img src="img/icon/home.png" />Home
				</li></a>
				<a href="movieall.php"><li>
					<img src="img/icon/movie.png" />Movies
				</li></a>
				<a href="tvshowall.php"><li>
					<img src="img/icon/tv.png" />TV Shows
				</li></a>
				<a href="stats.php"><li>
					<img src="img/icon/stats.png" />Stats
				</li></a>
				<a href="index.php"><li>
					<img src="img/icon/config.png" />Config
				</li></a>
			</ul>
		</nav>

	</header>

	<div id="container">

		<?php get_sidebarleft(); ?>
		<?php get_sidebarright(); ?>

		<div id="content">
