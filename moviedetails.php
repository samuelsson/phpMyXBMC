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

		$result = $STH->fetchAll();

		foreach($result as $row) {
			// Gets the title of the movie and displays as H1
			echo "<h1>" . $row['c00'] . '</h1><h5>' . $row['c03'] . '</h5>';
		}
	}
?>

<div class="divider-large"></div>

<div id="movie-plot">

	<div class="divider-medium"></div>
	<?php
		foreach($result as $row) {
			// Gets the plot of the movie
			echo $row['c01'];
		}
	?>
	<div class="divider-medium"></div>
	
</div>

<?php
	get_footer();
?>