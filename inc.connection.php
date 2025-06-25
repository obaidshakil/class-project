<?php
ob_start();
session_start();

include('inc.functions.php');

$hostname = "localhost";
$username = "root";
$password = "";
$database = "mydb1";

// create connection
$conn = mysqli_connect($hostname,$username,$password,$database);


?>