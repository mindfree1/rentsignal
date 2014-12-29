<!DOCTYPE HTML>
<html>

	<head>
		<?php 
	define('PATH_TO_WEBROOT', '/');
	include (PATH_TO_WEBROOT.'dbconnect.php');
?>
	</head>
	<body>
<a href="../index.php">Back</a>
	<?php

		$sql="SELECT * FROM products";
		$result=mysql_query($sql);

		$count=mysql_num_rows($result);

		?>

		<?php
		//echo "<form action ='POST'";
		echo "<table>";
        echo "<tr>";
        echo "<td>Product ID</td>";
        echo "<td>Product Name</td>";
        echo "<td>Product Descrription</td>";
        echo "<td>Product Quantity</td>";
        echo "<td>Product Price</td>";
        echo "<td>Product Color</td>";
        echo "</tr>";
          
        if($count > 0)
        {
        	//$i = 0;
	        while ($row = mysql_fetch_array($result)) {
	           echo "<tr>";
	           echo "<td>". $row["prodid"]."</td>";
	           echo "<td>".$row["prodname"]."</td>";
	           echo "<td>".$row["proddescription"]."</td>";
	           echo "<td>".$row["prodquantity"]."</td>";
	           echo "<td>".$row["prodprice"]."</td>";
	           echo "<td>".$row["prodcolour"]."</td>";
	           //echo "<td><form action='editproduct.php?'" .$row['prodid'] ." method='POST'><input type='submit' name='editbtn' value='EDIT' class='editbtn'/></form></td>";
	           echo "</tr>";
	            //$i = ($i==0) ? 1:0;
	        }
	            
	         echo "</table>";
	    }
        ?>
</body>
</html>

