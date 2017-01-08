<?php
	if(!isset($_REQUEST['term']))
	exit;

	include 'ihelp_db.php';

	$rs = "SELECT * FROM `personnel` WHERE `p_fname` LIKE '%ucfirst($_REQUEST['term'])%' ORDER BY `p_id` ASC LIMIT 0,10";
	$rs_run = mysql_query($rs);

	$data = array();

	while($row=mysql_fetch_assoc($rs_run, MYSQL_ASSOC))
	{
		$data[] = array{
			'label' => $row['p_fname'],
			'value' => $row['p_fname']
		}
	}

	echo json_encode($data);
	flush();
?>