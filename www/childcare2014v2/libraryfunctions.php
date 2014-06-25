<?php
	//Defining the function
	function ValidateNumeric($a)//function with one argument
	{
		if (is_numeric($a)) //for defining number or length of characters, php built in function
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	 	   
	
    //Defining the function
	function ValidateField($a)//function with one argument
	{
		if ($a=="")
		{
			return false;
		}
		else
		{
			return true;
		}
	}	       
    
	function ValidateLength($a,$len)
	{
		if (strlen($a)>$len) //for defining number or length of characters, php built in function
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	function ValidateDropdownBox($cmb)
	{
		if (strpos($cmb, 'select') !== false)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function ValidateRadioButtons($childgender)
	{
		if(isset($childgender))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
?>