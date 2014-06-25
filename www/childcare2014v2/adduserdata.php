<?php
	if ($_POST['firstname']  == false)
    {
        echo "Please supply child first name";
		exit();
    }
	
	/*if (ValidateLength($childfirstname, 20) == false)
    {
        echo "The child first name cannot contain more than 20 characters";
		exit();
	}*/
	
	if ($_POST['middlename'] == false)
    {
        echo "Please supply child second name";
		exit();
    } 
	 
	/*if (ValidateLength($childmiddlename, 20) == false)
    {
        echo "The child second name cannot contain more than 20 characters";
		exit();
    }*/
	
	if ($_POST['lastname'] == false)
    {
        echo "Please supply child family name";
		exit();
    } 
	 
	/*if (ValidateLength($childfamilyname, 20) == false)
    {
        echo "The child family name cannot contain more than 20 characters";
		exit();
    }*/
	 
    /*if(ValidateRadioButtons($childgender) == false)
	{
		echo "Please select a gender";
		exit();
	}*/
	
	if($_POST['year'] == false)
	{
		echo "Please select a year";
		exit();
	}
	
	if($_POST['month'] == false)
	{
		echo "Please select a month";
		exit();
	}
	
	if($_POST['day'] == false)
	{
		echo "Please select a day";
		exit();
	}
    else
    {
		$link = mysqli_connect("localhost","root","","padstowchildcare") or die("Error " . mysqli_error($link));
		$childid = mysqli_real_escape_string($link, $_POST["id"]);
		$firstname = mysqli_real_escape_string($link,$_POST["firstname"]);
		$middlename = mysqli_real_escape_string($link,$_POST["middlename"]);
		$lastname = mysqli_real_escape_string($link,$_POST["lastname"]);
		$gender = mysqli_real_escape_string($link,$_POST["gender"]);
		$guradianid = mysqli_real_escape_string($link,$_POST["guardianid"]);
		$dob = mysqli_real_escape_string($link,$_POST["year"]) . "-" . mysqli_real_escape_string($link,$_POST["month"]) . "-" . mysqli_real_escape_string($link,$_POST["day"]);
		
		$medicalID = mysqli_real_escape_string($link,$_POST["id"]);
		$medicineDesc = mysqli_real_escape_string($link,$_POST["medicineDesc"]);
		$dosageAmnt = mysqli_real_escape_string($link,$_POST["dosageAmount"]);
		$allergy = mysqli_real_escape_string($link,$_POST["allergy"]);
		$allergyDesc = mysqli_real_escape_string($link,$_POST["allergyDesc"]);
		$allergyCode = mysqli_real_escape_string($link,$_POST["allergyCode"]);
		$lastaddedChild = $childid;
		//echo $childid. " " .$childid . " " .$medicalID. " ". $medicineDesc . " " . $dosageAmnt . " " . $allergy . " " .$allergyDesc . " " . $allergyCode;
		
$query = "insert into child values ('$childid', '$firstname', '$middlename', '$lastname', '$dob', '$gender', '$guradianid')";
		
$query2 = "insert into medicalhistory values ('$childid', '$lastaddedChild', '$medicalID', '$medicineDesc', '$dosageAmnt', 
'$allergy', '$allergyDesc', '$allergyCode')";
		
		if (!mysqli_query($link,$query)) {
			die('Error: ' . mysqli_error($link));
		}
		
		if (!mysqli_query($link,$query2)) {
			die('Error: ' . mysqli_error($link));
		}
		
		if (mysqli_affected_rows($link) > 0)
		{
			header("location:admin.php");
		}
	}
?>