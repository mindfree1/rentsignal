<html>
<head>
</head>
<body>
<table border='1' align='center' style='margin-left:500px;margin-bottom:20px;'>
	<tr>
		<td align='center'>
			Edit Child Data to update within the database
		</td>
	</tr>
</table>
	<!--display information:-->
	<table border='1' align='center' style='margin-left:350px;'>
	<?php
		$link = mysqli_connect("localhost","root","","padstowchildcare") or die("Error " . mysqli_error($link));
		$id = $_GET['id'];
		//return all children from the database
		$query = "SELECT * FROM child WHERE childid='$id'";

		//execute the query.
		$result = mysqli_query($link, $query) or die("Error in executing the query");
		$row = mysqli_fetch_array($result);
	?>
		<tr>
			<form method='post' action='editdata.php' name='editdata'>
				<td>Child ID</td>
				<td>Firstname</td>
				<td>Middle name</td>
				<td>Lastname</td>
				<td>Date of Birth</td>
		</tr>
		
		<?php			
			echo "<tr>";
			echo "<td><input type='text' name='showid' value='$row[0]' disabled/></td>";
			echo "<td><input type='text' name='firstname' value='$row[1]'/></td>";
			echo "<td><input type='text' name='middlename' value='$row[2]'/></td>";
			echo "<td><input type='text' name='lastname' value='$row[3]'/></td>";
			echo "<td><input type='text' name='dob' value='$row[4]'/></td>";
			echo "<input type='hidden' name='childid' value='$row[0]'/>";
			echo "<td><input type='submit' name='editdata' value='Save' class='btnRound'></td>";
			echo "</tr>";
			echo "</table>";
			mysqli_free_result($result);
		?>
		</form>
</body>
</html>