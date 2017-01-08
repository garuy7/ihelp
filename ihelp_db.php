<?php

	$db_host = 'localhost';
	$db_user = 'root';
	$db_password = '';

	$db_name = 'ihelp_db_system';

	$con = mysql_connect($db_host, $db_user, $db_password);
	$db_con = mysql_select_db($db_name);
?>
