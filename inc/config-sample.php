<?php

/*	
 *	CONFIG FILE
 *
 *	This is where you store all your configuration files.
 *	Connections to the database for example.
 *
 *	Edit this file with your settings.
 *	Keep this file secure becuase passwords are kept in plain text!
 *	Preferably you should edit your .htaccess or keep this file outside the root folder.
 *
 *	RENAME THIS FILE TO config.php WHEN DONE EDITING, SAVE IN THE SAME LOCATION ( /inc ).
 */

/* ==|== Database ===============================================================================
	Edit these four lines with the credentials to your database.
   ============================================================================================== */

	// The server IP to your database:
	define('DB_HOST', '');
	
	//	The name of the database:
	define('DB_NAME', '');
	
	// The username of the user who should access the database:
	define('DB_USER', '');
	
	// The password for the user:
	define('DB_PASS', '');


/* ==|== Misc ===================================================================================
	Misc stuff
   ============================================================================================== */
	
	//The Movie Database API
	define('TMDB_API', '');

	//The TV Database API
	define('TTVDB_API', '');
		
	// Choose your language
	include('../language/eng.php');

?>