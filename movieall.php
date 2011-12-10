<?php
	require_once('inc/functions.php');
	get_header();
?>

<h1>All movies</h1>
<div class="divider-large"></div>

<?php

	$DBH = db_handle(DB_NAME_VIDEO);
	
	$STH = $DBH->prepare('
		SELECT * 
		FROM movie
		ORDER BY c00
	');
	
	$STH->execute();
	
	$result = $STH->fetchAll();
	
	foreach($result as $row) {
		echo '<a href="moviedetails.php?id=' . $row['idFile'] . '">' . $row['c00'] . '</a><br />';
	}
	
	$DBH = null;

?>


<?php
	get_footer();
?>