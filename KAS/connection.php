<?php

/**
 * @file
 * Connect to mysql
 */

//Create connection credentials
$db_host = 'localhost';
$db_name = 'kastrivi_kastriviquiz';
$db_user = 'kastrivi_kastrivi';
$db_pass = 'rootadmin@2019';

//Create mysqli object
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);

//Error handler
if($mysqli->connect_error){
	printf("Connect failed: %s\n",$mysqli->connect_error);
	exit;
}


?>