<?php
	include 'ihelp_db.php';
	include 'ihelp_functions.php';

	error_reporting(E_ALL);
	error_reporting(E_DEPRECATED);

	if(loggedin())
	{
		header("location: ihelp_redirect_page.php");
		exit;
	}

	$error_name="";

	if(isset($_POST["btnLogin"]))
	{
		$user_id=$_POST["user_id"];
		$user_password=$_POST["user_password"];

		$query="SELECT `id`, `user_id`, `user_password`, `user_type` FROM users WHERE `user_id` = '$user_id'";
		$query_run=mysql_query($query);
		
		$query1="SELECT `id`, `user_id`, `user_password`, `user_type` FROM users WHERE `user_id` = '$user_id' AND `user_password` = '$user_password'";
		$query_run1=mysql_query($query1);

		if(mysql_num_rows($query_run) != 1)
		{
			$error_name = "User ID does not exist.";
		}

		else if(mysql_num_rows($query_run1) != 1)
		{
			$error_name = "Invalid Password.";
		}
		else
		{
			$rows = mysql_fetch_array($query_run);
			$id = $rows["id"];
			$_SESSION["id"] = $id;
			header("location: ihelp_redirect_page.php");
			exit;
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
			<form method="POST" class="login-form" action="ihelp_login.php" onSubmit="return validateLogin()" name="vform">        
				<div class="login-wrap">
					<p class="login-img"><i class="icon_lock_alt"></i></p>
						<div class="input-group">
              				<span class="input-group-addon"><i class="icon_profile"></i></span>
              				<input type="text" class="form-control" name="user_id" placeholder="User ID" value='<?php if(isset($_POST["user_id"])){ echo $user_id; } ?>'autofocus>
           				</div>
           				<div id="user_id_error" class="error_value"></div>	
						<div class="input-group">
							<span class="input-group-addon"><i class="icon_key_alt"></i></span>
							<input type="password" class="form-control" name="user_password" placeholder="Password">
						</div>
						<span class="error"><?php echo $error_name; ?></span>
						<div id="user_password_error" class="error_value"></div>
						<button class="btn btn-primary btn-lg btn-block" type="submit" name="btnLogin">Login</button>
				</div>
			</form>
		</div>
	</body>
	<script src="js/ihelp_login_validation.js"></script>
</html>
