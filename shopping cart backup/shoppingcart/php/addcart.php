<?php
session_start();
	define('PATH_TO_WEBROOT', '/');
	include (PATH_TO_WEBROOT.'dbconnect.php');

	if(isset($_SESSION["loggedinstatus"]))
	{	
		$userid = $_SESSION['userid'];
		$productid = $_POST['prodid'];
		$productname = $_POST['productname'];
		$productdescription = $_POST['productdescription'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$shiptype = $_POST['shippingtype'];
		$paymenttype = $_POST['paymenttype'];
		$sql = "INSERT INTO cart (userid, prodid, prodname, proddescription, price, quantity, shippingtype, paymenttype) 
		VALUES ('$userid', '$productid', '$productname', '$productdescription', '$price', '$quantity', '$shiptype', '$paymenttype')";

		$result=mysql_query($sql);
		$totalitems = 0;

		while($row = mysql_fetch_array($result))
    	{
    		$totalitems += $quantity;
    	}

    	$sql2 = "UPDATE users SET items =2 WHERE userid=$userid";
    	$result2=mysql_query($sql2);


		if($sql)
		{
			header("location:../index.php");
		}
		else
		{
			echo "Item not added successfully";
		}
	}
	else
	{
		echo "You must be signed in to add items to your cart";
		//header(location:)
	}