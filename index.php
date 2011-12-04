<?php
	require('functions.php');
	get_header();
?>


<?php

$year = "1999";

$dbh = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME_VIDEO, DB_USER, DB_PASS);
$dbh->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, 1);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$stmt = $dbh->prepare('SELECT * FROM movie WHERE c07 = :year ORDER BY c00 ASC');
$stmt->execute( array(
					'year' => "$year"
				) );

$result = $stmt->fetchAll();
?>

<h1>All movies from <?php echo $year; ?></h1>

<?php
foreach($result as $row)
{
    echo $row['c00'] . '<br />';
}

?>


<?php
	get_footer();
?>