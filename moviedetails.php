<?php
	require('inc/functions.php');
	get_header();
?>

<?php

	$statement = '
		SELECT *
		FROM movie
		WHERE idFile = :id
		ORDER BY c00 ASC
	';

	$data = array(
		'id' => $_GET['id']
	);

	$STH = db_handle(DB_NAME_VIDEO, $statement, $data);
	$result = $STH->fetchAll();

	foreach($result as $row) {
		// Gets the title of the movie and displays as H1
		echo "<h1>" . $row['c00'] . '</h1>';
	}

?>


<?php
	get_footer();
?>