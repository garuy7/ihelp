<?php
	include 'ihelp_functions.php';
	include 'ihelp_db.php';

	if(loggedin())
	{
		$id = $_SESSION['id'];

		$query = "SELECT `id`, `user_id`, `user_type`, `user_status` FROM `users` WHERE `id` = '$id'";
		$query_run = mysql_query($query);
		$rows = mysql_fetch_array($query_run);
		$user_type = $rows["user_type"];
		$user_status = $rows["user_status"];
		$user_id = $rows["user_id"];

		if($user_type == 1)
		{
			header("location: ihelp_super_admin_homepage.php");
			exit;
		}
		else if($user_type == 2)
		{
			if($user_status == 2)
			{
				header("location: ihelp_complete_registration.php?user_id=".$user_id."");
				exit;
			}
			else
			{
				header("location: ihelp_admin_homepage.php");
				exit;
			}
		}
		else if($user_type == 3)
		{
			if($user_status == 2)
			{
				header("location: ihelp_complete_registration.php?user_id=".$user_id."");
				exit;
			}
			else
			{
				header("location: ihelp_department_homepage.php");
			}
		}
	}
	else
	{
		echo "<script language='javascript'>window.location=['ihelp_login.php']</script>";
	}
?>