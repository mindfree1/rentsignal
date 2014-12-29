<?php
		$host="localhost"; 
		$username="root"; 
		$password="pass"; 
		$db_name="shoppingcart"; 
		$tbl_name="users"; 

		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("shoppingcart")or die("cannot select DB");

		//$sql="SELECT * FROM products";
		//$result=mysql_query($sql);

		$cartID = $_POST['cartid'];

		$sql="DELETE FROM cart WHERE cartid=$cartID";
		$result=mysql_query($sql);
		header("location:showcart.php");
?>