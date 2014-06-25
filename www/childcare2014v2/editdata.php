<?php

$link = mysqli_connect("localhost","root","","padstowchildcare") or die("Error " . mysqli_error($link));

$firstname = mysqli_real_escape_string($link, $_POST["firstname"]);
$lastname = mysqli_real_escape_string($link, $_POST["lastname"]);
$id = mysqli_real_escape_string($link, $_POST["childid"]);

$query = "UPDATE child SET firstname='$firstname', lastname='$lastname' WHERE childid='$id'";

if (!mysqli_query($link,$query)) {
	die('Error: ' . mysqli_error($link));
}
mysqli_close($link);
header("location:admin.php");
?>