<?php

$number1 = 10;
$number2 = 20;
$number3 = 15;

function findLargest($number1, $number2, $number3) 
	{
    	if ($number1 >= $number2 && $number1 >= $number3) 
    	{
        	return $number1; 
    	} 
    	elseif ($number2 >= $number1 && $number2 >= $number3) 
    	{
        	return $number2;
    	} 
    	else 
    	{
        return $number3;
    	}
	}

$largest = findLargest($number1, $number2, $number3);
echo "$number1, $number2, and $number3 <br> The largest number is: $largest";
?>