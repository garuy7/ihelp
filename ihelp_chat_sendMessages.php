<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ihelp_db_system";


$uname=$_SESSION['user_id'];
$receiver=$_POST['receiver'];
$msg=$_POST['message'];
console.log($_SESSION['username']);
console.log($_POST['receiver']);
console.log($_POST['message']);
$con = new mysqli($servername, $username, $password, $dbname);

	if ($con->connect_error) {

           die("Connection failed: " . $con->connect_error);

       }
     if (isset($_POST['message']) ) {
	 $con->query("INSERT INTO messagelogs (username , message,receiver) VALUES ('{$uname}','{$msg}','{$receiver}')");
	 $con->commit();
	 }
	 $con->close();
 ?>﻿
