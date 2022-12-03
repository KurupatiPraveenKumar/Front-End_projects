<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "web_project_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
