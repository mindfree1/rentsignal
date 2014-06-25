<?php

function CompareNumbers($a, $b) //function with two arguments
{ 

	if ($a > $b)
		{
			echo "a is bigger than b " . "<br/>";
		}
}
CompareNumbers(10,12);//Calling the function
DisplayNumbers();//Calling the function
function DisplayNumbers() //function with no arguments
{
	$a = 12;
	$b = 10;
	if ($a > $b)
	{
		echo"a is bigger than b" . "<br/>";
	}
	else
	{
		echo "b is bigger than a" . "<br/>";
	}

}
	?>