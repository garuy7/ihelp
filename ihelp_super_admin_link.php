<?php

	error_reporting(E_ALL ^ E_DEPRECATED);

	include 'ihelp_db.php';
	include 'ihelp_functions.php';

	if(loggedin())
	{
		header("location: ihelp_redirect_page.php");
		exit;
	}

	$error_name = '';

	if(isset($_POST["btnLogin"]))
	{
		$admin_code = $_POST["admin_code"];

		$query = "SELECT `id`, `user_id`, `user_password`, `user_type` FROM `users` WHERE `user_password` = '$admin_code'";
		$query_run = mysql_query($query);

		if(mysql_num_rows($query_run) != 1)
		{
			$error_name = "Invalid admin code.";
		}
		else
		{
			$rows = mysql_fetch_array($query_run);
			$id = $rows["user_id"];
			$user_type = $rows["user_type"];

			if($user_type != 1)
			{
				$error_name = "Invalid admin code.";
			}
			else
			{
				$_SESSION["user_id"] = $id;
				header("location: ihelp_redirect_page.php");
				exit;
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head><title>iHelp</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="img/favicon.png">
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- bootstrap theme -->
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<!--external css-->
		<!-- font icon -->
		<link href="css/elegant-icons-style.css" rel="stylesheet" />
		<link href="css/font-awesome.css" rel="stylesheet" />
		<!-- Custom styles -->
		<link href="css/style.css" rel="stylesheet">
		<link href="css/style-responsive.css" rel="stylesheet" />
		<lnk rel="stylesheet" href="css/ihelp_super_admin_link.css">
		<style>
			.error_value, .error{
				color: red;
			}
		</style>
	</head>
	<body class="login-img3-body">
		<div class="container">
			<form method="POST" class="login-form" action="ihelp_super_admin_link.php" onSubmit="return validateInput()" name="vform">
				<div class="login-wrap">
					<p class="login-img"><i class="icon_lock_alt"></i></p>
						<div class="input-group">
							<span class="input-group-addon"><i class="icon_key_alt"></i></span>
							<input type="password" class="form-control" name="admin_code" placeholder="Admin Code" value='<?php if(isset($_POST['admin_code'])){ echo $admin_code; } ?>'/>
						</div>
						<span class="error"><?php echo $error_name; ?></span>
						<div id="admin_code_error" class="error_value"></div>
						<br />
						<button class="btn btn-primary btn-lg btn-block" type="submit" name="btnLogin">Login</button>
				</div>
			</form>
		</div>

	</body>
	<script src="js/ihelp_admin_code_validation.js"></script>

</html>
