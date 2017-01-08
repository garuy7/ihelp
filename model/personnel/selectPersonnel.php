<?php
	include 'ihelp_db.php';
	include 'ihelp_functions.php';


	$query = "SELECT * FROM `personnel` WHERE `p_position`='carpenter' AND `p_status`='1'";
	$query_run = mysql_query($query);
	$rows=mysql_fetch_array($query_run);
	$p_fname=$rows['p_fname'];
	$p_lname=$rows['p_lname'];

	if(isset($_POST['btnPer']))
	{
		$query = "SELECT * FROM `personnel` WHERE `p_position`='carpenter' AND `p_status`='1'";
		$query_run = mysql_query($query);
		$rows=mysql_fetch_array($query_run);
		$p_fname=$rows['p_fname'];
		$p_lname=$rows['p_lname'];

	}

	if(isset($_POST['btnSubmit']))
	{
		$perlist="";
		$boolean=true;
		$per=1;

		while($boolean)
		{
			if((isset($_POST['per_'.$per])) && ($_POST['per_'.$per] != ""))
			{
				$perlist .= $_POST['per_'.$per];
				$perlist .= ", ";
			}
			else
			{
				$boolean = false;
			}
			$per++;
		}
			echo $perlist;

	}
?>
