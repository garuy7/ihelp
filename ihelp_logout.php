<?php
	session_start();

	include 'ihelp_db.php';
	include 'ihelp_functions.php';

	if(loggedin())
	{
		$id = $_SESSION['user_id'];

		$query = "SELECT `id`, `user_type` FROM `users` WHERE `user_id` = '$id'";
		$query_run = mysql_query($query);
		$query_fetch = mysql_fetch_array($query_run);
		$user_type = $query_fetch['user_type'];

		if($user_type == 1)
		{
			session_destroy();
			header("location: ihelp_super_admin_link.php");
		}
		else if($user_type == 2 || $user_type == 3)
		{
			session_destroy();
			header("location: ihelp_login.php");
		}
	}

?>
