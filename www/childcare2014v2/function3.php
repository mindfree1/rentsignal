<?php

function ValidateField($a)//function with two arguments
{
	if ($a == " ")
	{
		return false;
	}
	else
	{
		return true;
	}
}
$value = "";
if (ValidateField($value) == false)
{
	echo "Please supply the value";
}
?>