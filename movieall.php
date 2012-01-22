<?php
	require_once('inc/functions.php');
	get_header();
?>

<div class="movieall-charchooser">

	<?php
		// This prints out links to all the movies beginning with the first letter of the alphabet
		$alphabet = range('a', 'z');

		echo '<a href="movieall.php?char=0">#</a>';
		foreach($alphabet as $letter) {
			echo '<a href="movieall.php?char=' . $letter . '">' . strtoupper($letter) . '</a>';
		}
	?>

	<div class="clear"></div>

</div>

 
<?php

	// Checks if there is a char set in the url bar, otherwise -> else
	if (isset($_GET['char'])) {
		
		$sel_char = $_GET['char'];

		// This creates an sql query with the whole alphabet, loops "b-z" and adds "a" before the loop
		if ($sel_char == '0') {
			$alphabet = range('a', 'z');

			$sql = "
				SELECT idFile, c00, strPath, playCount 
				FROM movieview 
				WHERE LEFT(c00,1) != 'a' 
			";

			for($i = 1, $size = sizeof($alphabet); $i < $size; ++$i) {
				$sql .= "AND LEFT(c00,1) != '" . $alphabet[$i] .  "' ";
			}

			$sql .= "ORDER BY c00";
		}

		else {
			$sql = "
				SELECT idFile, c00, strPath, playCount 
				FROM movieview 
				WHERE LEFT(c00,1) = :char 
				ORDER BY c00 ASC
			";
		}

		// The database connection
		$DBH = db_handle();
		$STH = $DBH->prepare($sql);
		$STH->execute( array('char' => $sel_char) );

		// Fetches the array of each movie and saves in another array.
		// An array named $result containing an array for each movie.
		$result = $STH->fetchAll(PDO::FETCH_ASSOC);

		// Loops through the array and prints out information for every movie
		for($i = 0, $size = sizeof($result); $i < $size; ++$i) {
			
			$movieID = $result[$i]["idFile"];
			$movieHash = get_hash($result[$i]["strPath"]);
			$movieName = $result[$i]['c00'];
			$moviePlayed = $result[$i]['playCount'];
			
			echo '
				<div class="coverframe">
					
					<a href="moviedetails.php?id=' . $movieID . '">
						<div class="coverframe-picture" style="background:url(img/Thumbnails/Video/' . substr($movieHash, 0, 1) . '/' . $movieHash . '.tbn) no-repeat center center; background-size:122px auto;">
							<img src="img/Thumbnails/Video/' . substr($movieHash, 0, 1) . '/' . $movieHash . '.tbn" />
						</div>
					</a>
					
					<div class="coverframe-text">
						<a href="moviedetails.php?id=' . $movieID . '">' . $movieName . '</a>
					</div>

				</div>
			';

		}
	}

	else {
	}

	get_footer();
?>