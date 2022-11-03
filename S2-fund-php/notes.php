<?php

// "\" allows ignoring of next character eg. \n

//Constant is "define"
define( "DOB", 1989);
echo DOB;

//Pre-increment - Post Increment
$x = 5;
++$x;
$x++;
--$x;
$x--;

//Variable concat
$first = "\nfirst text <br>";
$second = "second text";
$third = $first;

//These two are the same thing
$third .= $second;
//$third = $third . $second;

echo $third;


//How to fix array layout for print_r
echo '<pre>';
//print_r(array);
echo '</pre>';

//DATE Function - lower case are number date - uppercase are word date(year is full)
echo date('d  M  Y ');