<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<body style="background-color:#79D9FF;">
<div style="margin-top:200px;margin-left:550px;">
<form method="POST" action="search.php?go" id="searchform">
	<p style="margin-left:-25px;">Can Search by either Firstname or Lastname<p>
	<input type="text" name="name"/>
	<input type="submit" name="submit" value="Search" class="btnRound"/>
</form>
</div>
<?php 
	if(isset($_POST['submit']))
	{
		if(isset($_GET['go']))
		{
			$link = mysqli_connect("localhost","root","","padstowchildcare") or die("Error " . mysqli_error($link));
			$searchquery = $_POST['name'];
			//search database based on form entered query
			$query = "SELECT * FROM child WHERE firstname LIKE '%" .$searchquery. "%' OR lastname LIKE '%" .$searchquery. "%'";
			
			//execute the query.
			$result = mysqli_query($link, $query) or die("Error in executing the query");
			
			//display information:
			$numrows = mysqli_num_rows($result);
			
			if($numrows != 0)
			{
					echo "<table border='1' align='center' style='margin-left:340px'>";
					echo "<tr>";
					echo "<td>Firstname</td>";
					echo "<td>Middle name</td>";
					echo "<td>Lastname</td>";
					echo "<td>Date of Birth</td>";
					echo "<td>Gender</td>";
					echo "<td>Allergies</td>";
					echo "<td>Allergy Description</td>";
					echo "<td>Medicine</td>";
					echo "<td>Dosage</td>";
					echo "</tr>";
				while($row = mysqli_fetch_row($result))
				{
					$query2 = "SELECT * FROM medicalhistory WHERE childid=$row[0]";
						$result2 = mysqli_query($link, $query2) or die("Error in executing the query");
						$numrows2 = mysqli_num_rows($result2);
						$row2 = mysqli_fetch_row($result2);
					echo "<tr>";
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
					echo "<td>$row2[5]</td>";
					echo "<td>$row2[6]</td>";
					echo "<td>$row2[3]</td>";
					echo "<td>$row2[4]</td>";
					echo "</tr>";
					
				}
				echo "</table>";
			}
			else
			{
				echo "<table border='1' align='center' style='margin-left:400px;width:500px;text-align:center;'>";
				echo "<tr>";
				echo "<td>";
				echo "Sorry but this child doesn't seem to be registered here";
				echo "</td>";
				echo "<table>";
			}
			mysqli_free_result($result);
		}	
		else
		{
			echo "<p>Please enter your search</p>";
		}
	}
?>
</body>
</html>