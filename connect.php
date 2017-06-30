<?php
$con = mysql_connect("localhost","root","");
$connect = mysql_select_db("lights",$con);
mysql_query("set names gb2313");


if(!$connect)
{
	die('Could not connet: ' . mysql_error());
}

echo 'connect succesful';


?>