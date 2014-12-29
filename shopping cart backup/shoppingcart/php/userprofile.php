<?php 
	define('PATH_TO_WEBROOT', '/');
	include (PATH_TO_WEBROOT.'cartitems.php');
	include (PATH_TO_WEBROOT.'dbconnect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../js/core.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Profile</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="main" style="background-color:#388E8E;">
		<div class="column" style="margin-top:28px;">
			<img src="../images/logo.jpg" alt="" />
		</div>
		<div class="right sign" style="margin-top:28px;">
			<span style="vertical-align:middle;">user:</span><form action="logout.php" method="POST"><?php echo 'Hello  ' . $_SESSION['firstname']. "  " . $_SESSION['lastname']; ?><input type="submit" value="Logout" class="sign_out" /></form>
		</div>
			<div class="clear"></div>
				<div id="content">
					<p>User Profile:</p>
					<div id="date"></div>
					<div id="time"></div>
					<?php 
						date_default_timezone_set('Australia/Sydney');
						$date = date('d/m/Y');

						echo "Date: " .$date. " </br>";
						echo "Time: " . "<div id='thetime'></div></br>";
 						echo "Firstname: ". $_SESSION['firstname']. "</br>";
						echo "Lastname:  ". $_SESSION['lastname']. "</br>";
						echo "Birthday:  ". $_SESSION['birthday']. "</br>";
						echo "Age:  ".      $_SESSION['age']. "</br>";
						echo "Number of items Purchased:  ". $cartdata['items']."</br>";
					?>
				</div>
			<div id="shop_chek" class="column">
			<ul>
			<li><a href="../index.php">Home</a></li></ul>
			<ul><li><a href="../php/showcart.php">checkout</a></li>
			</ul>
			</div>
		<div class="clear"></div>
		<div id="menu1">
		</div>
		<div id="header">
		<a href="#"><img src="../images/more.jpg" alt="" class="more" /></a>
		</div>
		<div class="clear"></div>
		<div id="con_c">
			<div class="clear"></div>
		</div>
	<div class="clear"></div>
	<img src="../images/line_bottom.jpg" alt="" class="l_b"  />
		<div id="b_menu">
			<p class="men"><a href="../index.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">About Store</a></p>
			<div class="men1"></div>
		</div>
	</div>
</body></html>