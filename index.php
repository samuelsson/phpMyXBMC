<?php
	require('functions.php');
	get_header();
?>


<h1>Alla filmer</h1>

<?php

$dbh = new PDO('mysql:host=localhost;dbname=xbmc_video', DB_USER, DB_PASS);
$dbh->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, 1);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


$stmt = $dbh->prepare('SELECT * FROM movie WHERE c07 = :year');
$stmt->execute( array(
					'year' => "2004"
				) );

$result = $stmt->fetchAll();
foreach($result as $row)
{
    echo $row['c00'] . '<br />';
}

?>


<?php
	get_footer();
?>