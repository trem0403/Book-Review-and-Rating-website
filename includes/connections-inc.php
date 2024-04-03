<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "login_sample_db";

$con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if(!$con)
{
    die("Failed to connect:" . mysqli_connect_error());
}
