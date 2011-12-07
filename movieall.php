<?php
	require('inc/functions.php');
	get_header();
?>

<h1>All movies</h1>

<?php
	
	// The statement that should be queried.
	$statement = '
		SELECT *
		FROM movie
		ORDER BY c00 ASC
	';
	
	// The array containing the prepareds included in the database query above.
	$data = null;

	// The function that makes it all happen. Takes database name, $statement and $data, runs it in the database and returns a result.
	$STH = db_handle(DB_NAME_VIDEO, $statement, $data);
	
	// Fetches data and saves in the variable result.
	$result = $STH->fetchAll();

	// Loops all the data in the array
	foreach($result as $row) {
	    echo $row['c00'] . '<br />';
	}

?>


<?php
	get_footer();
?>