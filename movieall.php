<?php
	require_once('inc/functions.php');
	get_header();
?>

<h1>All movies</h1>
<div class="divider-large"></div>
<div class="movieall-charchooser"># A B C D E F G H I J K L M N O P Q R S T U V W X Y Z</div>
<div class="divider-large"></div>

<?php

	if ($_GET['movie'] != null) {

		if ($_GET['movie'] == 'nr') {
			$sql = "
				SELECT * 
				FROM movie
				WHERE LEFT(c00,1) != 'a' AND LEFT(c00,1) != 'b' AND LEFT(c00,1) != 'c' AND LEFT(c00,1) != 'd' AND LEFT(c00,1) != 'e' AND LEFT(c00,1) != 'f' AND LEFT(c00,1) != 'g' AND LEFT(c00,1) != 'h' AND LEFT(c00,1) != 'i' AND LEFT(c00,1) != 'j' AND LEFT(c00,1) != 'k' AND LEFT(c00,1) != 'l' AND LEFT(c00,1) != 'm' AND LEFT(c00,1) != 'n' AND LEFT(c00,1) != 'o' AND LEFT(c00,1) != 'p' AND LEFT(c00,1) != 'q' AND LEFT(c00,1) != 'r' AND LEFT(c00,1) != 's' AND LEFT(c00,1) != 't' AND LEFT(c00,1) != 'u' AND LEFT(c00,1) != 'v' AND LEFT(c00,1) != 'w' AND LEFT(c00,1) != 'x' AND LEFT(c00,1) != 'y' AND LEFT(c00,1) != 'z'
				ORDER BY c00
			";
		}
		
		else {
			$sql = "
				SELECT * 
				FROM movie 
				WHERE LEFT(c00,1) = '" . $_GET['movie'] . "' 
				ORDER BY c00
			";
		}

		$DBH = db_handle(DB_NAME_VIDEO);
		
		$STH = $DBH->prepare($sql);
		$STH->execute();
		
		$result = $STH->fetchAll();
		
		foreach($result as $row) {
			echo '
				<div class="coverframe">
					<a href="moviedetails.php?id=' . $row['idFile'] . '"><div class="coverframe-picture">
					</div></a>
					<div class="coverframe-text">
						<a href="moviedetails.php?id=' . $row['idFile'] . '">' . $row['c00'] . '</a>
					</div>
				</div>
			';
		}
	}

?>


<?php
	get_footer();
?>