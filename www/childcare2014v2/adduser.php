<html>
<head>
<link rel="stylesheet" type="text/css" href="childstyle.css">
</head>
<body style="background-color:#79D9FF;">
	<?php
		$link = mysqli_connect("localhost","root","","padstowchildcare") or die("Error " . mysqli_error($link));
		$id = $_POST['id'];
		//return all children from the database
		$query = "SELECT MAX(childid) FROM child";
		//execute the query.
		$result = mysqli_query($link, $query) or die("Error in executing the query");
		$row = mysqli_fetch_array($result);
		$row[0]++;
	?>
	<table border='1' align='center' style='margin-left:20px;margin-top:40px;'>
	<tr>
		<form method='post' action='adduserdata.php' name='adduserdata'>
			<td>Child ID</td>
			<td>Firstname</td>
			<td>Middle name</td>
			<td>Lastname</td>
			<td>Date of Birth</td>
	</tr>
	<tr>
		<input type='hidden' name='id' value='<?php echo $row[0]?>'/>
		<td><input type='text' name='childid' value='<?php echo $row[0] ?>' disabled/></td>
		<td><input type='text' name='firstname' value='' /></td>
		<td><input type='text' name='middlename' value='' /></td>
		<td><input type='text' name='lastname' value='' /></td>
		<td>
		Year
		<select name="year">
			<option value="2014">2014</option>
			<option value="2013">2013</option>
			<option value="2012">2012</option>
			<option value="2011">2011</option>
			<option value="2010">2010</option>
			<option value="2009">2009</option>
			<option value="2008">2008</option>
			<option value="2007">2007</option>
			<option value="2006">2006</option>
			<option value="2005">2005</option>
		</select>
		Month
		<select name="month">
			<option value="12">December</option>
			<option value="11">November</option>
			<option value="10">October</option>
			<option value="09">September</option>
			<option value="08">August</option>
			<option value="07">July</option>
			<option value="06">June</option>
			<option value="05">May</option>
			<option value="04">April</option>
			<option value="03">March</option>
			<option value="02">Feb</option>
			<option value="01">Jan</option>
		</select>
		Day
		<select name="day">
			<option value="31">31</option>
			<option value="30">30</option>
			<option value="29">29</option>
			<option value="28">28</option>
			<option value="27">27</option>
			<option value="26">26</option>
			<option value="25">25</option>
			<option value="24">24</option>
			<option value="23">23</option>
			<option value="22">22</option>
			<option value="21">21</option>
			<option value="20">20</option>
			<option value="19">19</option>
			<option value="18">18</option>
			<option value="17">17</option>
			<option value="16">16</option>
			<option value="15">15</option>
			<option value="14">14</option>
			<option value="13">13</option>
			<option value="12">12</option>
			<option value="11">11</option>
			<option value="10">10</option>
			<option value="09">9</option>
			<option value="08">8</option>
			<option value="07">7</option>
			<option value="06">6</option>
			<option value="05">5</option>
			<option value="04">4</option>
			<option value="03">3</option>
			<option value="02">2</option>
			<option value="01">1</option>
		</select>
		</td>
		<td style="width:1px;">Gender<select name="gender"><option value="m">Male</option><option value="f">Female</option></select></td>
		<td style="width:1px;">Guardian ID<select name="guardianid"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
		</select></td></br></br>
	</tr>
	<tr>
		<td>Allergies</td>
		<td>Allergy Description</td>
		<td>Allergy Code</td>
		<td>Medicine Description</td>
		<td>Dosage Amount</td>
	</tr>
	<tr>
		<td><input type='text' name='allergy' value='' /></td>
		<td><textarea name="allergyDesc" cols="35" rows="3" wrap="default" id="allergyDesc"></textarea></td>
		<td><input type='text' name='allergyCode' value='' /></td>
		<td><input type='text' name='medicineDesc' value='' /></td>
		<td><input type='text' name='dosageAmount' value='' /></td>
	</tr>
	<input type="submit" name="adduserdata" value="Add User" class="btnRound" style="margin-top:158px;margin-left:1180px;position:absolute;height:40px;"/>
	</form>
</table>
</body>
<html>