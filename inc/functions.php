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

	//	Footer
	function get_footer() {
		include('footer.php');
	}

/* ==|== Database ===============================================================================
	All database related.
   ============================================================================================== */
	
	// The function for the database connection and quering/execute. 
	// Defaults to video database if nothing else is specified.
	function db_handle($database = DB_NAME_VIDEO) {
		try {
			$DBH = new PDO("mysql:host=".DB_HOST.";dbname=$database", DB_USER, DB_PASS);
			$DBH->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, 1);
			$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			return $DBH;
		}
		catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}



/* ==|== Get Hash ===============================================================================
	Gets the hash code (CRC) from the file path. Thanks to tamplan @ XBMC Forum.
   ============================================================================================== */

function get_hash($file_path)
  {
    $chars = strtolower($file_path);
    $crc = 0xffffffff;

    for ($ptr = 0; $ptr < strlen($chars); $ptr++)
    {
      $chr = ord($chars[$ptr]);
      $crc ^= $chr << 24;

      for ((int) $i = 0; $i < 8; $i++)
      {
        if ($crc & 0x80000000)
        {
          $crc = ($crc << 1) ^ 0x04C11DB7;
        }
        else
        {
          $crc <<= 1;
        }
      }
    }

    // Is system 64 bits ?
    if (strpos(php_uname('m'), '_64') !== false)
    {

			//Formatting the output in a 8 character hex
			if ($crc>=0)
			{
				$hash = sprintf("%16s",sprintf("%x",sprintf("%u",$crc)));
			}
			else
			{
				$source = sprintf('%b', $crc);

				$hash = "";
				while ($source <> "")
				{
					$digit = substr($source, -4);
					$hash = dechex(bindec($digit)) . $hash;
					$source = substr($source, 0, -4);
				}
			}
			$hash = substr($hash, 8);
    }
    else
    {
			//Formatting the output in a 8 character hex
			if ($crc>=0)
			{
				$hash = sprintf("%08s",sprintf("%x",sprintf("%u",$crc)));
			}
			else
			{
				$source = sprintf('%b', $crc);

				$hash = "";
				while ($source <> "")
				{
					$digit = substr($source, -4);
					$hash = dechex(bindec($digit)) . $hash;
					$source = substr($source, 0, -4);
				}
			}
    }

    return $hash;
  }


?>