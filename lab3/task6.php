<?php
$array = array("ABID", "MAHMUD", "ADI", "NISHAT", "ANJUM", "NISHI");

$searchElement = "NISHI";
$found = false;

for ($i = 0; $i < count($array); $i++) 
    {
        if ($array[$i] === $searchElement) 
        {
            $found = true; 
            break;
        }
    }

if ($found) 
    {
        echo "$searchElement was found in the array.";
    } 
    else 
    {
        echo "$searchElement was not found in the array.";
    }
?>