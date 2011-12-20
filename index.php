<?php
	require_once('inc/functions.php');
	get_header();
?>

<h1>Testing</h1>
<div class="divider-large"></div>


<?php
		
		$imbd_id = 'tt1156398';

		$tmdb = new TMDb(TMDB_API);
		$json_movie_result = $tmdb->getImages($imbd_id,TMDb::JSON);
		$movies = json_decode($json_movie_result);
		
		$poster_url = null;
		
		foreach ($movies[0]->posters as $movie) {
			if ($movie->image->size == 'mid') {
		 		$poster_url = $movie->image->url;
		 		break;
		 	}
		}

?>

<pre> <?php print_r($poster_url); ?> </pre>

<?php
	get_footer();
?>