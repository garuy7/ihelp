<?php
session_start();
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "ihelp_db_system";

       // Create connection
       $uname=$_SESSION['user_id'];
       $receiver=$_POST['receiver'];


       $conn = new mysqli($servername, $username, $password, $dbname);

       // Check connection

       if ($conn->connect_error) {

           die("Connection failed: " . $conn->connect_error);

       }

       $sql = "SELECT * from messagelogs WHERE (username='{$uname}' AND receiver='{$receiver}') OR (username='{$receiver}' AND receiver='{$uname}')";
       $result=$conn->query($sql);


       while($extract = $result->fetch_assoc() )
	   {
		   if($extract['username']==$uname)
			   $class='msg_a';
		   else
			   $class='msg_b';

		   echo "<div class=\"$class\">$extract[message]</div>";
	   }

	   $result->free();
       $conn->close();
?>
