<?php
	require('inc/functions.php');
	get_header();
?>

<h1>All movies from <?php echo $_GET['year']; ?></h1>

<?php
	
	$statement = '
		SELECT *
		FROM movie
		WHERE c07 = :year
		ORDER BY c00 ASC
	';
	
	$data = array(
		'year' => $_GET['year']
	);

	$STH = db_handle(DB_NAME_VIDEO, $statement, $data);
	$result = $STH->fetchAll();

	foreach($result as $row) {
	    echo $row['c00'] . '<br />';
	}

?>


<?php
	get_footer();
?>