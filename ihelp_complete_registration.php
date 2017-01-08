<?php
    include 'ihelp_db.php';
    include 'ihelp_functions.php';

    $error_name = "";

    if(isset($_GET["user_id"]))
    {
        $user_id = $_GET["user_id"];
    }

    // department selection
    $query_dept = "SELECT * FROM `department`";
    $query_run_dept = mysql_query($query_dept);

        if(isset($_POST["btnComplete"]))
        {
            $user_id = $_POST["user_id"];
            $user_fname = $_POST["user_fname"];
            $user_lname = $_POST["user_lname"];
            $user_address = $_POST["user_address"];
            $user_birthdate = $_POST["user_birthdate"];
            $user_gender = $_POST["user_gender"];
            $user_department = $_POST["user_department"];
            $user_password = $_POST["user_password"];
            //$user_con_pass = $_POST["user_con_pass"];

            $query1 = "SELECT `id`, `user_id`, `user_password` FROM `users` WHERE `user_id` = '$user_id'";
            $query_run1 = mysql_query($query1);
                if(mysql_num_rows($query_run1) == 1)
                {
                    $rows = mysql_fetch_array($query_run1);
                    $id = $rows["id"];

                        if($user_password == $rows["user_password"])
                        {
                            $error_name = "You are required to change your password.";
                        }
                        else
                        {
                            $query = "UPDATE `users` SET `user_fname`='$user_fname', `user_lname`='$user_lname', `user_address`='$user_address', `user_birthdate`='$user_birthdate', `user_gender`='$user_gender', `user_department`='$user_department', `user_password`='$user_password', `user_status` = '1' WHERE `user_id` = '$user_id'";
                            $query_run = mysql_query($query);
                            header("location: ihelp_completion.php");
                            exit;
                        }
                }
        }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">


    <title>Complete Registration</title>

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

    <style>
        .error_value, .error{
            color:red;
        }
    </style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">

      <form method="POST" class="login-form" onsubmit="return validateComReg()" name="vform">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_id-2"></i></span>
                <input type="text" class="form-control" name="user_id" readonly="readonly" value='<?php if(isset($_GET["user_id"])){ echo $user_id; } ?>' >
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="text" class="form-control" name="user_fname" placeholder="First Name" value='<?php if(isset($_POST['user_fname'])){ echo $user_fname; } ?>' autofocus>
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="text" class="form-control" name="user_lname" placeholder="Last Name" value='<?php if(isset($_POST['user_lname'])){ echo $user_lname; } ?>'>
            </div>
            <div id="fname_error" class="error_value"></div>
            <div id="lname_error" class="error_value"></div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_house"></i></span>
                <input type="text" class="form-control" name="user_address" placeholder="Address" value='<?php if(isset($_POST['user_address'])){ echo $user_address; } ?>'>
            </div>
            <div id="address_error" class="error_value"></div>
            <div class="input-group">
                <label class="badge">Birthdate</label>
                <input type="date" class="form-control" name="user_birthdate" value='<?php if(isset($_POST['user_birthdate'])){ echo $user_birthdate; } ?>'>
            </div>
            <div id="birthdate_error" class="error_value"></div>
            <label class="badge">Gender</label>
            <div class="radio">
                <label class="col_val" style="color:#797979;">
                    <input type="radio" name="user_gender" id="optionsRadios1" required="required" value="M" <?php if(isset($_POST["user_gender"]) && $_POST["user_gender"] == 'M') { echo 'checked="checked"'; }?> >
                    Male
                </label>
            </div>
            <div>
                <label class="col_val" style="color:#797979;">
                    <input type="radio" name="user_gender" id="optionsRadios2" required="required" value="F" <?php if(isset($_POST["user_gender"]) && $_POST["user_gender"] == 'F') { echo 'checked="checked"'; }?>>
                    Female
                </label>
            </div>
            <div id="gender_error" class="error_value"></div>
            <div>
                <select  class="form-control m-bot15" name="user_department">
                    <option value="0">Select Department</option>
                    <?php while($rows = mysql_fetch_array($query_run_dept)):;?>
                    <option <?php if(isset($_POST["user_department"]) == $rows[1]) { ?> selected="true" <?php }; ?> value='<?php echo $rows[1]?>' >
                        <?php echo $rows[1]?>
                    </option>
                        <?php endwhile; ?>
                </select>
            </div>
            <div id="department_error" class="error_value"></div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" name="user_password" placeholder="New Password">
            </div>
            <div id="password_error" class="error_value"></div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
            </div>
            <div id="con_pass_error" class="error_value"></div>
            <div id="pass_match_error" class="error_value"></div>
            <span class="error_name" style="color:red;"><?php echo $error_name; ?></span>
            <button class="btn btn-primary btn-lg" type="submit" name="btnComplete">Complete</button>
            <a href="ihelp_logout.php"><button class="btn btn-danger btn-lg" type="button">Logout</button></a>
        </div>
      </form>
  </body>
  <script src="js/ihelp_com_reg_validation.js"></script>
</html>
