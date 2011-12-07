<?php

/*
 *
 */

/* ==|== Includes ===============================================================================
	All files that should be included on the homepage, for example Header and Footer.
   ============================================================================================== */

	//	Config file
	require('config.php');

	//	Header
	function get_header() {
		include('inc/header.php');
	}
	
	// Sidebar Left
	function get_sidebarleft() {
		include('inc/sidebar-left.php');
	}
	
	// Sidebar Right
	function get_sidebarright() {
		include('inc/sidebar-right.php');
	}

	//	Navigation
	function get_navigation() {
		include('inc/navigation.php');
	}

	//	Footer
	function get_footer() {
		include('inc/footer.php');
	}

/* ==|== Database ===============================================================================
	All database related.
   ============================================================================================== */

	function db_handle($array, $statement) {
		try {
			$DBH = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME_VIDEO, DB_USER, DB_PASS);
			$DBH->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, 1);
			$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$STH = $DBH->prepare($statement);
			$STH->execute($array);
		}

		catch(PDOException $e) {  
		    $STH = null;
		    file_put_contents('log/PDOErrors.log', $e->getMessage(), FILE_APPEND); 
		}  

		return $STH;
	}

?>