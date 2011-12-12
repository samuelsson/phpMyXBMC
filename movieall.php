<?php
	require_once('inc/functions.php');
	get_header();
?>

<h1>All movies</h1>
<div class="divider-large"></div>
<div class="movieall-charchooser">
	<a href="movieall.php?movie=nr">#</a>	<!-- All these will be added to the database later and displayed with a loop -->
	<a href="movieall.php?movie=a">A</a>
	<a href="movieall.php?movie=b">B</a>
	<a href="movieall.php?movie=c">C</a>
	<a href="movieall.php?movie=d">D</a>
	<a href="movieall.php?movie=e">E</a>
	<a href="movieall.php?movie=f">F</a>
	<a href="movieall.php?movie=g">G</a>
	<a href="movieall.php?movie=h">H</a>
	<a href="movieall.php?movie=i">I</a>
	<a href="movieall.php?movie=j">J</a>
	<a href="movieall.php?movie=k">K</a>
	<a href="movieall.php?movie=l">L</a>
	<a href="movieall.php?movie=m">M</a>
	<a href="movieall.php?movie=n">N</a>
	<a href="movieall.php?movie=o">O</a>
	<a href="movieall.php?movie=p">P</a>
	<a href="movieall.php?movie=q">Q</a>
	<a href="movieall.php?movie=r">R</a>
	<a href="movieall.php?movie=s">S</a>
	<a href="movieall.php?movie=t">T</a>
	<a href="movieall.php?movie=u">U</a>
	<a href="movieall.php?movie=v">V</a>
	<a href="movieall.php?movie=w">W</a>
	<a href="movieall.php?movie=x">X</a>
	<a href="movieall.php?movie=y">Y</a>
	<a href="movieall.php?movie=z">Z</a>
</div>
<div class="divider-large"></div>

<?php

	if ($_GET['movie'] != null) {

		if ($_GET['movie'] == 'nr') { // All these will be added to the database later and displayed with a loop
			$sql = "
				SELECT * 
				FROM movie
				WHERE LEFT(c00,1) != 'a' 
				  AND LEFT(c00,1) != 'b' 
				  AND LEFT(c00,1) != 'c' 
				  AND LEFT(c00,1) != 'd' 
				  AND LEFT(c00,1) != 'e' 
				  AND LEFT(c00,1) != 'f' 
				  AND LEFT(c00,1) != 'g' 
				  AND LEFT(c00,1) != 'h' 
				  AND LEFT(c00,1) != 'i' 
				  AND LEFT(c00,1) != 'j' 
				  AND LEFT(c00,1) != 'k' 
				  AND LEFT(c00,1) != 'l' 
				  AND LEFT(c00,1) != 'm' 
				  AND LEFT(c00,1) != 'n' 
				  AND LEFT(c00,1) != 'o' 
				  AND LEFT(c00,1) != 'p' 
				  AND LEFT(c00,1) != 'q' 
				  AND LEFT(c00,1) != 'r' 
				  AND LEFT(c00,1) != 's' 
				  AND LEFT(c00,1) != 't' 
				  AND LEFT(c00,1) != 'u' 
				  AND LEFT(c00,1) != 'v' 
				  AND LEFT(c00,1) != 'w' 
				  AND LEFT(c00,1) != 'x' 
				  AND LEFT(c00,1) != 'y' 
				  AND LEFT(c00,1) != 'z'
				ORDER BY c00
			";
		}
		
		else {
			$sql = "
				SELECT * 
				FROM movie 
				WHERE LEFT(c00,1) = :movie 
				ORDER BY c00
			";
		}

		$DBH = db_handle(DB_NAME_VIDEO);
		$STH = $DBH->prepare($sql);
		$STH->execute( array(
			'movie' => $_GET['movie']
		));
		
		$result = $STH->fetchAll();
		
		if ($result == null) {
			echo "You don't have any movies with the letter " . strtoupper($_GET['movie']) . " :(";
		}
		
		else {				
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
	}

?>


<?php
	get_footer();
?>