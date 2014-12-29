<?php
session_start();
$host="localhost"; 
$username="root"; 
$password="pass"; 
$db_name="shoppingcart";  

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("shoppingcart")or die("cannot select DB");

	if(isset($_SESSION["loggedinstatus"]))
	{
		//$cartdata = array();
		$sql = 'SELECT * FROM cart WHERE userid=' .$_SESSION["userid"];
		$result= mysql_query($sql);
		$itemcount = mysql_num_rows($result);	

		$totalprice = 0;

		if($itemcount != 0)
		{
			while($row = mysql_fetch_array($result))
    		{
    			$cartdata['items'] = $itemcount + $row['quantity'] - 1;
    			$totalprice += $row['price'];
    		}

			$cartdata['price'] = $totalprice;
			return $cartdata;
		}
		else
		{
			$cartdata['items'] = 0;
			$cartdata['price'] = 0;
		}
	}

?>
