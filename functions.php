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

?>