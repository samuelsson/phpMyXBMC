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

	$percent = "29";
	
?>


<div id="sidebar-left">
	<div class="sidebar-content">

		<div id="progressbar-frame">
			<div id="progressbar-bg">
				<div id="progress" style="width:<?php echo $percent; ?>%">
				</div>
				<div id="progresspointer"><?php echo $percent; ?>%</div>
			</div>
		</div>
		
		<div id="progressbar-text-left">
			<span>Movie Progress:</span>
		</div>
		<div id="progressbar-text-right">
			<?php echo $movieWatched . '&nbsp;&nbsp;/&nbsp;&nbsp;' . $movieTotal; ?>
		</div>
	</div>
</div>