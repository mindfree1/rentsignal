<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
</head>
<body style="background-color:#79D9FF;">
<!--Login via user or Admin-->
<div>
<div><img src="childcare-logo-design-template.jpg" width="300px" height="124px" 
style="position:absolute;top:120px;margin-left:470px;"/></div>
	<form method="POST" action="index.php?login" id="" style="padding-left:290px;padding-top:40px;margin-left:220px;margin-top:250px;background-color:#3B8EAC;width:600px;height:200px;">
		<p>Username:<input type="text" name="username" style="margin-left:20px;"/></p></br>
		<p>Password:<input type="password" name="password" style="margin-left:20px;"/></p></br>
		<input type="submit" name="submit" value="Login" style="margin-left:110px;width:90px;"/>
	</form>
</div>

<?php


if(isset($_GET['login']))
{
	$link = mysqli_connect("localhost","root","","padstowchildcare") or die("Error " . mysqli_error($link));
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//search database based on form entered username and password
	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($link, $query) or die("Error in executing the query");
	 
	//execute the query.
	//$result = mysqli_query($link, $query) or die("Error in executing the query");
			
	//If user exists then check whether they are a user or admin role and redirect them to the right part of the site.
	$numrows = mysqli_num_rows($result);
	if($numrows != 0)
	{
		$row = mysqli_fetch_row($result);
		if($row[3] == 'user')
		{
			//general user, redirecting to the correct page
			redirect('user.php');
		}
		else if($row[3] == 'admin')
		{
			//Admin level user, redirecting to the admin console
			redirect('admin.php');
		}
	}
	else
	{
		echo '<div id="errorLogin" style="position:absolute;z-index:100000;left:500px;top:250px;color:#ffffff;"><p>Username and/or Password is incorrect, please try again</p></div>';
	}
}

function redirect($url)
{
	header('Location: '.$url);
	exit();
}
?>

<!--
	<div style="text-align:center;">
	<input type="button" onClick="window.history.back()" value="Back">
	<input type="button" onClick="window.print()" value="Print This Page">
	</div>
-->
</body>
</html>