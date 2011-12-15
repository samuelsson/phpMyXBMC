<?php
	require_once('inc/functions.php');
	get_header();
?>

<h1>Testing</h1>
<div class="divider-large"></div>

	
<?php
	$sel_char = "z";

	$sql = "
		SELECT idFile, c00, c09 
		FROM movieview 
		WHERE LEFT(c00,1) = :char 
		ORDER BY c00
	";


	// The database connection
	$DBH = db_handle();
	$STH = $DBH->prepare($sql);
	$STH->execute( array(
		'char' => $sel_char
	));

	// Fetches the array of each movie and saves in another array.
	// An array named $result containing an array for each movie.
	$result = $STH->fetchAll(PDO::FETCH_ASSOC);
	
	// The API to TMDb
	$tmdb = new TMDb(TMDB_API);

	// Loops through the array and prints out information for every movie
	for($i = 0, $size = sizeof($result); $i < $size; ++$i) {
		
		$imbd_id = $result[$i]['c09'];

		$json_movie_result = $tmdb->getImages($imbd_id,TMDb::JSON);
		$movies = json_decode($json_movie_result);
		
		$poster_url = null;
		
		foreach ($movies[0]->posters as $movie) {
			if ($movie->image->size == 'cover') {
		 		$poster_url = $movie->image->url;
		 		break;
		 	}
		}

		$result[$i]["posterUrl"] = $poster_url;
		
	}
?>

<pre> <?php print_r($movies); ?> </pre>


<?php
	get_footer();
?>