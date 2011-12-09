<?php

	$DBH = db_handle(DB_NAME_VIDEO);


	// Gets the number of watched movies
	$sql = '
		SELECT COUNT(idFile)
		FROM movie INNER JOIN files
		USING (idFile)
		WHERE playCount > 0
	';

	$STH = $DBH->prepare($sql);
	$STH->execute();
	$movieWatched = $STH->fetchColumn();


	// Gets the total number of movies
	$sql = '
		SELECT COUNT(idFile) 
		FROM movie
	';

	$STH = $DBH->prepare($sql);
	$STH->execute();
	$movieTotal = $STH->fetchColumn();
	
?>


<div id="sidebar-left">
	<div class="sidebar-content">
		
		<?php echo $movieWatched . '&nbsp;&nbsp;/&nbsp;&nbsp;' . $movieTotal; ?>
		
		<div class="progressbar">
			<div class="progress" style="width:<?php echo "35"; ?>%">
			</div>
		</div>
	</div>
</div>