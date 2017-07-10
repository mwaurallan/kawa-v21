<?php 
//session_start();
//connect.php
$server	    = 'localhost';
$username	= 'root';
$password	= '';
$database	= 'kawa';
$con = mysql_connect($server, $username, $password)or die(mysql_error());

if(!$con)
{
 	exit('Error: could not establish database connection');
}
if(!mysql_select_db($database))
{
 	exit('Error: could not select the database');
}

