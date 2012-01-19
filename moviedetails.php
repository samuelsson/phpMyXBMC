<?php
	// If no id is specified in the url bar -> redirect to movieall.php
	if ($_GET['id'] == null) {
		header("Location: movieall.php");
		exit;
	}

	else {

		// Normal load of header and functions
		require_once('inc/functions.php');
		get_header();

		// The database connection and query of movie info
		$DBH = db_handle(DB_NAME_VIDEO);

		$sql = '
			SELECT * 
			FROM movie 
			WHERE idFile = :id 
			ORDER BY c00 ASC
		';

		$STH = $DBH->prepare($sql);
		$STH->execute( array(
			'id' => $_GET['id']
		));

		$result = $STH->fetchAll(PDO::FETCH_ASSOC);

		// Save all the important information in variables for use later in the HTML code
		foreach($result as $row) {
			$movieTitle = $row['c00'];
			$movieOutline = $row['c03'];
			$moviePlot = $row['c01'];
			$movieImdb = $row['c09'];
		}
	}
?>

<h1><?php echo $movieTitle; ?></h1>
<h5><?php echo $movieOutline; ?></h5>

<div class="divider-large"></div>

<div id="moviedetails-poster">
	<img src="img/movieposters/<?php echo $movieImdb; ?>.jpg">
</div>

<div id="moviedetails-plot">

	<div class="divider-medium"></div>
	<?php echo $moviePlot; ?>
	<div class="divider-medium"></div>
	
</div>

<?php
	get_footer();
?>