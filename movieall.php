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
		
		echo '<a href="movieall.php?movie=0">#</a>';
		foreach($alphabet as $letter) {
			echo '<a href="movieall.php?movie=' . $letter . '">' . strtoupper($letter) . '</a>';
		}
	?>

</div>
<div class="divider-large"></div>

<?php

	if ($_GET['movie'] != null) {

		// This creates an sql query with the whole alphabet
		if ($_GET['movie'] == '0') {
			$alphabet = range('a', 'z'); 
			$sql = "SELECT * FROM movie WHERE LEFT(c00,1) != 'a' ";
			for($i = 1, $size = sizeof($alphabet); $i < $size; ++$i) {
				$sql .= "AND LEFT(c00,1) != '" . $alphabet[$i] .  "' ";
			}
			$sql .= "ORDER BY c00";
		}
		
		else {
			$sql = "
				SELECT * 
				FROM movie 
				WHERE LEFT(c00,1) = :movie 
				ORDER BY c00
			";
		}
		
		
		
		// Below this comment will be changed and improved, very temporary atm
		
		
		

		$DBH = db_handle(DB_NAME_VIDEO);
		$STH = $DBH->prepare($sql);
		$STH->execute( array(
			'movie' => $_GET['movie']
		));
		
		$result = $STH->fetchAll();
		
		if ($result == null) {
			echo "You don't have any movies with the letter " . strtoupper($_GET['movie']) . " :(";
		}
		
		else {				
			foreach($result as $row) {
			
				// Creating this every time the loop runs is reeeeeeeally bad :) will change, temporary solution atm
				$tmdb = new TMDb(TMDB_API);
				$imbd_id = $row['c09'];
				$movies_result = $tmdb->getMovie($imbd_id,TMDb::IMDB,TMDb::JSON);
				$movies = json_decode($movies_result);
				
				foreach ($movies as $movie) {

					$poster_url = 'img/movie/defaultposter.jpg';

					foreach($movie->posters as $poster) {
						if ($poster->image->size == 'cover') {
						$poster_url = $poster->image->url;
						break;
						}
					}
				}

				echo '
					<div class="coverframe">
						
						<a href="moviedetails.php?id=' . $row['idFile'] . '">
							<div class="coverframe-picture">
								<img src="' . $poster_url . '" />
							</div>
						</a>
						
						<div class="coverframe-text">
							<a href="moviedetails.php?id=' . $row['idFile'] . '">' . $row['c00'] . '</a>
						</div>

					</div>
				';
			}
		}
		
		
		
		// Above this comment will be changed and improved, very temporary atm
		
		
		
	}

?>


<?php
	get_footer();
?>