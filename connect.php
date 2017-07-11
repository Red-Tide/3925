<?php
$con = mysqli_connect("localhost", "root", "","lights");


if(!$con)
{
	die('Could not connect: ' . mysqli_error());
}

//echo 'connect successful';


?>