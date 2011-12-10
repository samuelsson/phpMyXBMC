<?php
	if ($_GET['id'] == null) {
		header("Location: index.php");
		exit;
	}
	else {
?>

<?php
	require_once('inc/functions.php');
	get_header();
?>

<?php
		$DBH = db_handle(DB_NAME_VIDEO);

		$STH = $DBH->prepare('
			SELECT * 
			FROM movie 
			WHERE idFile = :id 
			ORDER BY c00 ASC
		');

		$STH->execute( array(
			'id' => $_GET['id']
		));

		$result = $STH->fetchAll();

		foreach($result as $row) {
			// Gets the title of the movie and displays as H1
			echo "<h1>" . $row['c00'] . '</h1>';
		}
	}
?>

<div class="divider-large"></div>

<div id="movie-plot">

	<div class="divider-medium"></div>
	<?php
		foreach($result as $row) {
			// Gets the title of the movie and displays as H1
			echo $row['c01'];
		}
	?>
	<div class="divider-medium"></div>
	
</div>

<?php
	get_footer();
?>