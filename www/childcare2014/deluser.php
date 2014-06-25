<?php     
	
	$link = mysqli_connect("localhost", "root", "", "padstowchildcare") or die("Error " . mysqli_error($link));
	$id = mysqli_real_escape_string($link, $_GET['id']);
	$query = "DELETE FROM child WHERE childid='$id'";
	if (!mysqli_query($link,$query)) {
		die('Error: ' . mysqli_error($link));
	}
	mysqli_close($link);
	header("location:admin.php");
?>