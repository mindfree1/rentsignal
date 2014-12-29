<?php
	define('PATH_TO_WEBROOT', '/');
	include (PATH_TO_WEBROOT.'dbconnect.php');

	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$birthday = $_POST['birthdate'];
	$age = $_POST['age'];
	$items = '0';
	$group = 'user';

	$findat = '@';
	$finddot = '.';
	$findcom = 'com';

	if($username != '' || $password != '' || $email != '' || $firstname != '' || $lastname != '' || $birthday != '' || $age != '')
	{
		if(strpos($email, $findat) > 0 && strpos($email, $finddot) > 0 && strpos($email, $findcom) > 0)
		{

			$searchusername = "SELECT * FROM users WHERE username='$username'";
			$result = mysql_query($searchusername);
			$count = mysql_num_rows($result);
			if($count > 0)
			{
				echo 'Username taken please try another one';
			}
			else
			{
				$sql = "INSERT INTO `users` (`userid`, `username`, `password`, `group`, `email`, `items`, `firstname`, `lastname`, `birthdate`, `age`) 
				VALUES('NULL', '$username', '$password', '$group', '$email', '$items', '$firstname', '$lastname', '$birthday', '$age')";

				$result2=mysql_query($sql);

				if($sql)
				{
					//echo 'Signup Successful';
					header("location:../index.php");
				}
			}
		}
	}
?>