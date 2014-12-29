<?php session_start();
	define('PATH_TO_WEBROOT', '/');
	include (PATH_TO_WEBROOT.'dbconnect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../js/core.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Cart</title>
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
					<a href="../index.php">Back</a>
	<?php

		if(isset($_SESSION["userid"]))
		{
			$getID = $_SESSION["userid"];
		}

		$sql="SELECT * FROM cart WHERE userid=" . $getID;
		$result=mysql_query($sql);

		$count=mysql_num_rows($result);

		//echo "<form action ='POST'";
		echo "<table>";
        echo "<tr>";
        echo "<td>Product ID</td>";
        echo "<td>Product Name</td>";
        echo "<td>Product Description</td>";
        echo "<td>Product Quantity</td>";
        echo "<td>Product Price</td>";
        echo "</tr>";

        if($count > 0)
        {
        	//$i = 0;
        	$totalcost = 0;
	        while ($row = mysql_fetch_array($result)) {
	           echo "<tr>";
	           echo "<td>". $row["prodid"]."</td>";
	           echo "<td>".$row["prodname"]."</td>";
	           echo "<td>".$row["proddescription"]."</td>";
	           echo "<td>".$row["quantity"]."</td>";
	           echo "<td>".$row["price"]."</td>";
			   //echo "<td>".$row["discount"]."</td>";

			   $totalcost += $row["price"];
			   $shippingtype = $row["shippingtype"];
			   $paymenttype = $row["paymenttype"];
			   //echo "<td>".$totalcost."</td>";
			   echo "<td><form action='removecartitem.php' method='POST'><input type='submit' name='removeitem' value='Remove Item' class='removebtn'/>";
			   echo "<input type='hidden' value='". $row['cartid'] ."' name='cartid'>";
			   echo "</form></td>";
	           echo "</tr>";
	        }
	     	 echo "<tr><td style='padding-top:10px;color:#ffffff;'>Shipping Type: ".$shippingtype."</td></tr>";
			 echo "<tr><td style='color:#ffffff;width:130px;'>Payment Type: ".$paymenttype."</td></tr>";
	     	 echo "<tr><td style='padding-bottom:10px;color:#ffffff;'>Total Cost: $".$totalcost."</td></tr>";
	         echo "</table>";
	    }
        ?>
		</div>
		<div class="clear"></div>
		<div id="buycartitems">
			<form action='buyitems.php' method='POST'><input type='submit' name='buyitems' value='Buy' class='buybtn'/></form>
		</div>
	<div class="clear"></div>
	<img src="../images/line_bottom.jpg" alt="" class="l_b"  />
		<div id="b_menu">
			<p class="men"><a href="../index.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">About Store</a></p>
			<div class="men1"></div>
		</div>
	</div>
</body></html>

