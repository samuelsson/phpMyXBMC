<?php
	require_once('inc/functions.php');
	get_header();
?>

<h1>All movies</h1>
<div class="divider-large"></div>
<div class="movieall-charchooser">

	<?php
		// This prints out links to all the movies beginning with the first letter of the alphabet
		$alphabet = range('a', 'z');

		echo '<a href="movieall.php?char=0">#</a>';
		foreach($alphabet as $letter) {
			echo '<a href="movieall.php?char=' . $letter . '">' . strtoupper($letter) . '</a>';
		}
	?>

</div>
<div class="divider-large"></div>

<?php

	// Checks if there is an char set in the url bar, otherwise do nothing
	if (isset($_GET['char'])) {
		
		$sel_char = $_GET['char'];

		// This creates an sql query with the whole alphabet, loops "b-z" and adds "a" before the loop
		if ($sel_char == '0') {
			$alphabet = range('a', 'z');

			$sql = "
				SELECT idFile, c00, c09 
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
				SELECT idFile, c00, c09 
				FROM movieview 
				WHERE LEFT(c00,1) = :char 
				ORDER BY c00
			";
		}

		// The database connection
		$DBH = db_handle();
		$STH = $DBH->prepare($sql);
		$STH->execute( array(
			'char' => $sel_char
		));

		// Fetches the array of each movie and saves in another array.
		// An array named $result containing an array for each movie.
		$result = $STH->fetchAll(PDO::FETCH_ASSOC);

		// Loops through the array and prints out information for every movie
		for($i = 0, $size = sizeof($result); $i < $size; ++$i) {
			
			
			echo '
				<div class="coverframe">
					
					<a href="moviedetails.php?id=' . $result[$i]['idFile'] . '">
						<div class="coverframe-picture">
							<img src="img/movieposters/' . $result[$i]["c09"] . '.jpg" />
						</div>
					</a>
					
					<div class="coverframe-text">
						<a href="moviedetails.php?id=' . $result[$i]['idFile'] . '">' . $result[$i]['c00'] . '</a>
					</div>

				</div>
			';

		}
	}

?>

<?php
	get_footer();
?>