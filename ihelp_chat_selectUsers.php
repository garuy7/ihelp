<?php
session_start();

       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "ihelp_db_system";
       $user=$_SESSION['user_id'];
       // Create connection

       $conn = new mysqli($servername, $username, $password, $dbname);

       // Check connection

       if ($conn->connect_error) {

           die("Connection failed: " . $conn->connect_error);

       }

       $sql = "SELECT * from users WHERE user_id!='{$user}' AND user_status!='2'";
       $result=$conn->query($sql);


       while($extract = $result->fetch_assoc() )
	   {
		 echo "<div class=\"user\" id=\"$extract[user_id]\"onclick=\"getMessages()\"> $extract[user_fname] $extract[user_lname]</div>";
	   }

	   $result->free();
       $conn->close();
?>
