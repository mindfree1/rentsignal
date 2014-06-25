<?php
	$link = mysqli_connect("localhost","root","m1ndfree","padstowchildcare");
	
	// Check connection
	if (mysqli_connect_errno($link))
	{
		echo "Failed to connect to MySQL: ";
		exit();
	}
	
?>
