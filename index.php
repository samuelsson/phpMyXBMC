<?php
	require('functions.php');
	get_header();
?>

<h1>All movies from <?php echo $_GET['year']; ?></h1>

<?php
	
	// The statement that should bed queried 
	$statement = '
		SELECT *
		FROM movie
		WHERE c07 = :year
		ORDER BY c00 ASC
	';
	
	// The array containing the words included in the database query above
	$data = array(
		'year' => $_GET['year']
	);

	// The function that makes it all happen. Takes $statement and $data, runs it in the database and returns a result.
	$STH = db_handle($data, $statement);
	
	// Fetches data and saves in the variable result.
	$result = $STH->fetchAll();

	// Loops all the 
	foreach($result as $row) {
	    echo $row['c00'] . '<br />';
	}

?>


<?php
	get_footer();
?>