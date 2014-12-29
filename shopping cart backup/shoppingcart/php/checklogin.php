<?php

define('PATH_TO_WEBROOT', '/');
include (PATH_TO_WEBROOT.'dbconnect.php');

if(isset($_POST['user']) && isset($_POST['password']))
{
	$myusername=$_POST['user']; 
	$mypassword=$_POST['password']; 
}


$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM users WHERE username="."'".$myusername."'"." and password= "."'".$mypassword."'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);	

if ($count > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
	// Start the session
	session_start();
	$_SESSION["username"] = $row["username"];
	$_SESSION["userid"] = $row["userid"];
	$_SESSION["firstname"] = $row["firstname"];
	$_SESSION["lastname"] = $row["lastname"];
	$_SESSION["birthday"] = $row["birthdate"];
	$_SESSION["age"] = $row["age"];
	$_SESSION["itemsbought"] = $row["items"];
	$_SESSION["loggedinstatus"] = "logged in";

	if($row['group'] == 'user')
	{
		//header("location:userprofile.php");
		header("location:../index.php");
	}
	else if($row['group'] == 'admin')
	{
		//header("location:admin.php");
		header("location:admin.php");
	}
  }
}
else 
{
	echo "Wrong Username or Password";
}

?>