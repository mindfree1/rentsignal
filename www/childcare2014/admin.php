<html>
<head>
<link rel="stylesheet" type="text/css" href="childstyle.css">
</head>
<body>
<?php
	$link = mysqli_connect("localhost","root","","padstowchildcare") or die("Error " . mysqli_error($link));
	
	//return all children from the database
	$query = "SELECT * FROM child";

	//execute the query.
	$result = mysqli_query($link, $query) or die("Error in executing the query");
	
	//display information:
	$numrows = mysqli_num_rows($result);
	if($numrows != 0)
	{
			echo "<table border='1' align='center' style='margin-left:490px;margin-top:150px;'>";
			echo "<tr>";
			echo "<td>Child ID</td>";
			echo "<td>Firstname</td>";
			echo "<td>Middle name</td>";
			echo "<td>Lastname</td>";
			echo "<td>Date of Birth</td>";
			echo "<td>Gender</td>";
			echo "</tr>";
		while($row = mysqli_fetch_row($result))
		{
			echo "<tr>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			echo "<td>$row[4]</td>";
			if($row[5] == 'm')
			{
				echo "<td>Male</td>";
			}
			else
			{
				echo "<td>Female</td>";
			}
			echo "<td><a href='edituser.php?id=$row[0]' name='editbtn'>Edit</a></td>";
			echo "<td><a href='deluser.php?id=$row[0]' name='deletebtn'>Delete</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "<table border='1' align='center' style='margin-left:400px;width:500px;text-align:center;'>";
		echo "<tr>";
		echo "<td>";
		echo "Couldn't find any children registered in the database";
		echo "</td>";
		echo "<table>";
	}
	mysqli_free_result($result);
?>	

<form method="post" action="adduser.php">
	<input type='hidden' name='id' value='$row[0]'/>
	<input type="submit" name="adduser" value="Add User" style="display:block;width:80px;height:20px;background:#4E9CAF;text-align:center;border-radius:5px;color:#ffffff;margin-left:908px;margin-top:10px;"/>
	<a href="search.php" style="display:block;width:80px;height:20px;background:#4E9CAF;text-align:center;border-radius:5px;color:#ffffff;margin-left:908px;margin-top:10px;">Seach</a>
</form>
<?php
	
?>
</body>
</html>