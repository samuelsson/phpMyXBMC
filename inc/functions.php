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
		include('header.php');
	}
	
	// Sidebar Left
	function get_sidebarleft() {
		include('sidebar-left.php');
	}
	
	// Sidebar Right
	function get_sidebarright() {
		include('sidebar-right.php');
	}

	//	Navigation
	function get_navigation() {
		include('navigation.php');
	}

	//	Footer
	function get_footer() {
		include('footer.php');
	}

/* ==|== Database ===============================================================================
	All database related.
   ============================================================================================== */
	
	// The function for the database connection and quering/execute.
	function db_handle($database, $statement, $array) {
		try {
			$DBH = new PDO("mysql:host=".DB_HOST.";dbname=$database", DB_USER, DB_PASS);
			$DBH->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, 1);
			$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$STH = $DBH->prepare($statement);
			$STH->execute($array);
		}

		catch(PDOException $e) {  
		    $STH = null;
		    // This creates an error log file (if not exists) and prints the error message in it. 
		    // Pretty unsecure ;)
		    file_put_contents('../log/PDOErrors.log', $e->getMessage(), FILE_APPEND); 
		}  

		return $STH;
	}

?>