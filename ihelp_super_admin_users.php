<?php
  include 'ihelp_functions.php';
  include 'ihelp_db.php';
  require './assets/phpMailer/PHPMailerAutoLoad.php';

$error_name = "";

function send_email($email,$subject,$message)
{
    /* SEND EMAIL THROUGH GMAIL SMTP USING PHPMailer*/

    /* INITIALIZE PHPMailer*/
    $mail=new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug=0;
    $mail->Debugoutput='html';
    $mail->Host="smtp.gmail.com";
    $mail->Port=587;
    $mail->SMTPSecure='tls';
    $mail->SMTPAuth=true;

    /* SET Mail Authentication*/
    $mail->Username='aominedaiki9k@gmail.com';
    $mail->Password="09224773759";
    $mail->setFrom('aominedaiki9k@gmail.com','Aomine Daiki');

    /* SET MAIL */
    $mail->AddAddress($email);
    $mail->IsHTML(true);
    $mail->Subject=$subject;
    $mail->Body=$message;

    if(!$mail->send())
    {
    echo " Email not sent,System encountered an error:".$mail->ErrorInfo;
    }
    else
    {

    }
};

function send_message($number,$message)
{
    $result=itexmo($number,$message,"EVAND773759_WUET2");
    if ($result == ""){
    echo "iTexMo: No response from server!!!
    Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.
    Please CONTACT US for help. ";
    }else if ($result == 0){

    }
    else{
    echo "Error Num ". $result . " was encountered!";
    }
}

function itexmo($number,$message,$apicode)
{
    $url = 'https://www.itexmo.com/php_api/api.php';
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
    $param = array(
        'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($itexmo),
        ),);
    $context  = stream_context_create($param);
    return file_get_contents($url, false, $context);
}

    if(loggedin())
    {
        $id = $_SESSION['user_id'];

        $query = "SELECT `id`, `user_id`, `user_fname`, `user_lname` FROM `users` WHERE `user_id` = '$id'";
        $query_run = mysql_query($query);
        $rows = mysql_fetch_array($query_run);
        $id = $rows['user_id'];
        $user_fname = $rows['user_fname'];
        $user_lname = $rows['user_lname'];
    }

    if(isset($_POST['btnAdd']) && isset($_POST['user_email']) && isset($_POST['user_mobile_no']))
        {
            $user_id = $_POST['user_id'];
            $user_email = $_POST['user_email'];
            $user_mobile_no = $_POST['user_mobile_no'];
            $user_type = $_POST['user_type'];

            $query = "SELECT `id`, `user_id` FROM `users` WHERE `user_id` = '$user_id'";
            $query_run = mysql_query($query);

            if(mysql_num_rows($query_run) == 1)
            {
                echo "<script>alert('User ID already exist.')</script>";
            }
            else
            {
                $user_about = "State a brief description of yourself by editing your profile.";
                $user_saying = "You can also add some sayings here.";

                $query1 = "INSERT INTO `users` (`id`, `user_id`, `user_email`, `user_mobile_no`, `user_type`, `user_password`, `user_about`, `user_saying`, `user_status`) VALUES ('', '$user_id', '$user_email', '$user_mobile_no', '$user_type', '12345', '$user_about', '$user_saying', '2')";
                //email notification
                $query_run1 = mysql_query($query1);

                $email = $_POST['user_email'];
                $mobile_no = $_POST['user_mobile_no'];
                $subject = "Login Account";
                $message = "Your User ID is " .$user_id. " and Password is 12345.";
                send_email($email,$subject,$message);
                send_message($mobile_no,$message);

                //end email notification

                //end email notification
                echo "<script>alert('New user added.')</script>";
            }
        }
?>
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="img/favicon.png">

      <title>Users</title>

      <!-- Bootstrap CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- bootstrap theme -->
      <link href="css/bootstrap-theme.css" rel="stylesheet">
      <!--external css-->
      <!-- font icon -->
      <link href="css/elegant-icons-style.css" rel="stylesheet" />
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles -->
      <link href="css/style.css" rel="stylesheet">
      <link href="css/style-responsive.css" rel="stylesheet" />
    </head>
    <body>
    <!-- container section start -->
    <section id="container" class="">
        <!--header start-->
        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="ihelp_super_admin_homepage.php" class="logo">i <span class="lite">Help</span></a>
            <!--logo end-->

            <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username"><?php echo $user_fname; ?> <?php echo $user_lname; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="ihelp_super_admin_profile.php"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_chat_alt"></i> Chats</a>
                            </li>
                            <li>
                                <a href="ihelp_logout.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <div id="sidebar"  class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li class="">
                        <a class="" href="ihelp_super_admin_homepage.php">
                            <i class="icon_house_alt"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="ihelp_super_admin_users.php">
                            <i class="icon_profile"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_document_alt"></i>
                            <span>Requests</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="ihelp_super_admin_pending_requests.php">Pending</a></li>
                            <li><a class="" href="ihelp_super_admin_approved_requests.php">Approved</a></li>
                            <li><a class="" href="ihelp_super_admin_declined_requests.php">Declined</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_document_alt"></i>
                            <span>Personnel</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="ihelp_super_admin_add_personnel.php">Add Personnel</a></li>
                            <li><a class="" href="">Personnel Info</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa fa-bars"></i> Users</h3>
                    </div>
                </div>
                <section class="panel">
                        <header class="panel-heading tab-bg-primary ">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#administrator">Administrator</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#deptStaff">Department Staff</a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="administrator" class="tab-pane active">
                                    <br />
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <section class="panel">
                                                    <header class="panel-heading">
                                                        <form method="POST" class="navbar-form ">
                                                            <input class="form-control" placeholder="Search user ID" type="text" name="search" />
                                                            <button class="btn btn-success" type="submit" name="btnSearch">Search</button>
                                                            <button class="btn btn-primary" type="submit" name="btnRefresh">Refresh</button>
                                                        <label class="pull-right">Administrator</label>
                                                        </form>
                                                    </header>
                                                    <?php
                                                    if(isset($_POST['btnSearch']))
                                                    {
                                                        $search = $_POST['search'];
                                                    ?>
                                                    <?php
                                                        $query = "SELECT * FROM `users` WHERE `user_id` = '$search' AND `user_type` = '2'";
                                                        $query_run = mysql_query($query);

                                                        if(mysql_num_rows($query_run) > 0)
                                                        {
                                                    ?>
                                                    <table class="table table-striped table-advance table-hover">
                                                        <tbody>
                                                            <theader>
                                                                <th>#</th>
                                                                <th><i class="icon_id-2"></i> User ID</th>
                                                                <th><i class="icon_profile"></i> Full Name</th>
                                                                <th><i class="icon_calendar"></i> Birthdate</th>
                                                                <th><i class="icon_mail_alt"></i> Email</th>
                                                                <th><i class="icon_pin_alt"></i> Address</th>
                                                                <th><i class="icon_mobile"></i> Mobile</th>
                                                                <th><i class="icon_cogs"></i> Department</th>
                                                            </theader>
                                                            <?php
                                                                $count=1;
                                                                    while($rows=mysql_fetch_array($query_run))
                                                                    {
                                                            ?>
                                                                        <tr>
                                                                            <td><?php echo $count; ?></td>
                                                                            <td><?php echo $rows['user_id']; ?></td>
                                                                            <td><?php echo $rows['user_fname']; ?> &nbsp
                                                                                        <?php echo $rows['user_lname']; ?></td>
                                                                            <td><?php echo $rows['user_birthdate']; ?></td>
                                                                            <td><?php echo $rows['user_email']; ?></td>
                                                                            <td><?php echo $rows['user_address']; ?></td>
                                                                            <td><?php echo $rows['user_mobile_no']; ?></td>
                                                                            <td><?php echo $rows['user_department']; ?></td>
                                                                        </tr>
                                                            <?php
                                                                $count++;
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    echo "<br />";
                                                                    echo "No results found.";
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                    }
                                                    else if(isset($_POST['btnRefresh']))
                                                    {
                                                    ?>
                                                        <?php
                                                        $query = "SELECT * FROM `users` WHERE `user_type` = '2'";
                                                        $query_run = mysql_query($query);

                                                        if(mysql_num_rows($query_run) > 0)
                                                        {
                                                    ?>
                                                    <table class="table table-striped table-advance table-hover">
                                                        <tbody>
                                                            <theader>
                                                                <th>#</th>
                                                                <th><i class="icon_id-2"></i> User ID</th>
                                                                <th><i class="icon_profile"></i> Full Name</th>
                                                                <th><i class="icon_calendar"></i> Birthdate</th>
                                                                <th><i class="icon_mail_alt"></i> Email</th>
                                                                <th><i class="icon_pin_alt"></i> Address</th>
                                                                <th><i class="icon_mobile"></i> Mobile</th>
                                                                <th><i class="icon_cogs"></i> Department</th>
                                                            </theader>
                                                            <?php
                                                                $count=1;
                                                                    while($rows=mysql_fetch_array($query_run))
                                                                    {
                                                            ?>
                                                                        <tr>
                                                                            <td><?php echo $count; ?></td>
                                                                            <td><?php echo $rows['user_id']; ?></td>
                                                                            <td><?php echo $rows['user_fname']; ?> &nbsp
                                                                                        <?php echo $rows['user_lname']; ?></td>
                                                                            <td><?php echo $rows['user_birthdate']; ?></td>
                                                                            <td><?php echo $rows['user_email']; ?></td>
                                                                            <td><?php echo $rows['user_address']; ?></td>
                                                                            <td><?php echo $rows['user_mobile_no']; ?></td>
                                                                            <td><?php echo $rows['user_department']; ?></td>
                                                                        </tr>
                                                            <?php
                                                                $count++;
                                                                    }
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <?php
                                                        $query = "SELECT * FROM `users` WHERE `user_type` = '2'";
                                                        $query_run = mysql_query($query);

                                                        if(mysql_num_rows($query_run) > 0)
                                                        {
                                                    ?>
                                                    <table class="table table-striped table-advance table-hover">
                                                        <tbody>
                                                            <theader>
                                                                <th>#</th>
                                                                <th><i class="icon_id-2"></i> User ID</th>
                                                                <th><i class="icon_profile"></i> Full Name</th>
                                                                <th><i class="icon_calendar"></i> Birthdate</th>
                                                                <th><i class="icon_mail_alt"></i> Email</th>
                                                                <th><i class="icon_pin_alt"></i> Address</th>
                                                                <th><i class="icon_mobile"></i> Mobile</th>
                                                                <th><i class="icon_cogs"></i> Department</th>
                                                            </theader>
                                                            <?php
                                                                $count=1;
                                                                    while($rows=mysql_fetch_array($query_run))
                                                                    {
                                                            ?>
                                                                        <tr>
                                                                            <td><?php echo $count; ?></td>
                                                                            <td><?php echo $rows['user_id']; ?></td>
                                                                            <td><?php echo $rows['user_fname']; ?> &nbsp
                                                                                        <?php echo $rows['user_lname']; ?></td>
                                                                            <td><?php echo $rows['user_birthdate']; ?></td>
                                                                            <td><?php echo $rows['user_email']; ?></td>
                                                                            <td><?php echo $rows['user_address']; ?></td>
                                                                            <td><?php echo $rows['user_mobile_no']; ?></td>
                                                                            <td><?php echo $rows['user_department']; ?></td>
                                                                        </tr>
                                                            <?php
                                                                $count++;
                                                                    }
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                    }
                                                    ?>
                                                </section>
                                            </div>
                                        </div>
                                </div>
                                <div id="deptStaff" class="tab-pane">
                                    <br />
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <section class="panel">
                                                    <header class="panel-heading">
                                                        <form method="POST" action="ihelp_super_admin_users.php" class="navbar-form ">
                                                            <input class="form-control" placeholder="Search user ID" type="text" name="search" >
                                                            <button class="btn btn-success" type="submit" name="btnSearch">Search</button>
                                                            <button class="btn btn-primary" type="submit" name="btnRefresh">Refresh</button>
                                                        <label class="pull-right">Department Staff</label>
                                                        </form>
                                                    </header>
                                                    <?php
                                                    if(isset($_POST['btnSearch']))
                                                    {
                                                        $search = $_POST['search'];
                                                    ?>
                                                    <?php
                                                        $query = "SELECT * FROM `users` WHERE `user_id` = '$search' AND `user_type` = '3'";
                                                        $query_run = mysql_query($query);

                                                        if(mysql_num_rows($query_run) > 0)
                                                        {
                                                    ?>
                                                    <table class="table table-striped table-advance table-hover">
                                                        <tbody>
                                                            <theader>
                                                                <th>#</th>
                                                                <th><i class="icon_id-2"></i> User ID</th>
                                                                <th><i class="icon_profile"></i> Full Name</th>
                                                                <th><i class="icon_calendar"></i> Birthdate</th>
                                                                <th><i class="icon_mail_alt"></i> Email</th>
                                                                <th><i class="icon_pin_alt"></i> Address</th>
                                                                <th><i class="icon_mobile"></i> Mobile</th>
                                                                <th><i class="icon_cogs"></i> Department</th>
                                                            </theader>
                                                            <?php
                                                                $count=1;
                                                                    while($rows=mysql_fetch_array($query_run))
                                                                    {
                                                            ?>
                                                                        <tr>
                                                                            <td><?php echo $count; ?></td>
                                                                            <td><?php echo $rows['user_id']; ?></td>
                                                                            <td><?php echo $rows['user_fname']; ?> &nbsp
                                                                                        <?php echo $rows['user_lname']; ?></td>
                                                                            <td><?php echo $rows['user_birthdate']; ?></td>
                                                                            <td><?php echo $rows['user_email']; ?></td>
                                                                            <td><?php echo $rows['user_address']; ?></td>
                                                                            <td><?php echo $rows['user_mobile_no']; ?></td>
                                                                            <td><?php echo $rows['user_department']; ?></td>
                                                                        </tr>
                                                            <?php
                                                                $count++;
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    echo "<br />";
                                                                    echo "No results found.";
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                    }
                                                    else if(isset($_POST['btnRefresh']))
                                                    {
                                                    ?>
                                                        <?php
                                                        $query = "SELECT * FROM `users` WHERE `user_type` = '3'";
                                                        $query_run = mysql_query($query);

                                                        if(mysql_num_rows($query_run) > 0)
                                                        {
                                                    ?>
                                                    <table class="table table-striped table-advance table-hover">
                                                        <tbody>
                                                            <theader>
                                                                <th>#</th>
                                                                <th><i class="icon_id-2"></i> User ID</th>
                                                                <th><i class="icon_profile"></i> Full Name</th>
                                                                <th><i class="icon_calendar"></i> Birthdate</th>
                                                                <th><i class="icon_mail_alt"></i> Email</th>
                                                                <th><i class="icon_pin_alt"></i> Address</th>
                                                                <th><i class="icon_mobile"></i> Mobile</th>
                                                                <th><i class="icon_cogs"></i> Department</th>
                                                            </theader>
                                                            <?php
                                                                $count=1;
                                                                    while($rows=mysql_fetch_array($query_run))
                                                                    {
                                                            ?>
                                                                        <tr>
                                                                            <td><?php echo $count; ?></td>
                                                                            <td><?php echo $rows['user_id']; ?></td>
                                                                            <td><?php echo $rows['user_fname']; ?> &nbsp
                                                                                        <?php echo $rows['user_lname']; ?></td>
                                                                            <td><?php echo $rows['user_birthdate']; ?></td>
                                                                            <td><?php echo $rows['user_email']; ?></td>
                                                                            <td><?php echo $rows['user_address']; ?></td>
                                                                            <td><?php echo $rows['user_mobile_no']; ?></td>
                                                                            <td><?php echo $rows['user_department']; ?></td>
                                                                        </tr>
                                                            <?php
                                                                $count++;
                                                                    }
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <?php
                                                        $query = "SELECT * FROM `users` WHERE `user_type` = '3'";
                                                        $query_run = mysql_query($query);

                                                        if(mysql_num_rows($query_run) > 0)
                                                        {
                                                    ?>
                                                    <table class="table table-striped table-advance table-hover">
                                                        <tbody>
                                                            <theader>
                                                                <th>#</th>
                                                                <th><i class="icon_id-2"></i> User ID</th>
                                                                <th><i class="icon_profile"></i> Full Name</th>
                                                                <th><i class="icon_calendar"></i> Birthdate</th>
                                                                <th><i class="icon_mail_alt"></i> Email</th>
                                                                <th><i class="icon_pin_alt"></i> Address</th>
                                                                <th><i class="icon_mobile"></i> Mobile</th>
                                                                <th><i class="icon_cogs"></i> Department</th>
                                                            </theader>
                                                            <?php
                                                                $count=1;
                                                                    while($rows=mysql_fetch_array($query_run))
                                                                    {
                                                            ?>
                                                                        <tr>
                                                                            <td><?php echo $count; ?></td>
                                                                            <td><?php echo $rows['user_id']; ?></td>
                                                                            <td><?php echo $rows['user_fname']; ?> &nbsp
                                                                                        <?php echo $rows['user_lname']; ?></td>
                                                                            <td><?php echo $rows['user_birthdate']; ?></td>
                                                                            <td><?php echo $rows['user_email']; ?></td>
                                                                            <td><?php echo $rows['user_address']; ?></td>
                                                                            <td><?php echo $rows['user_mobile_no']; ?></td>
                                                                            <td><?php echo $rows['user_department']; ?></td>
                                                                        </tr>
                                                            <?php
                                                                $count++;
                                                                    }
                                                                }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                    }
                                                    ?>
                                                </section>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <a class="btn btn-info" data-toggle="modal" href="#myModal">+ Add New User</a>
                        </div>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Add User</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="ihelp_super_admin_users.php" class="form-group" onsubmit="return validateAddNewUser()" name="vform">
                                        <div class="col-lg-12">
                                            <div class="col-lg-12">
                                                <label>User ID</label>
                                                <input type="text" class="form-control" name="user_id" placeholder="Type here" value='<?php if(isset($_POST['user_id'])){ echo $user_id; }?>'>
                                            </div>
                                            <div id="id_error" style="color:red;"></div>
                                            <br />
                                            <div class="col-lg-12">
                                                <label>E-mail</label>
                                                <input type="text" class="form-control" name="user_email" placeholder="ihelp@example.com" value='<?php if(isset($_POST['user_email'])){ echo $user_email; }?>'>
                                            </div>
                                            <div id="email_error" style="color:red;"></div>
                                            <br />
                                            <div class="col-lg-12">
                                                <label>Mobile No.</label>
                                                <input type="text" class="form-control" name="user_mobile_no" placeholder="Type here" value='<?php if(isset($_POST['user_mobile_no'])){ echo $user_mobile_no; }?>'>
                                            </div>
                                            <div id="mobile_error" style="color:red;"></div>
                                            <div id="mob_no_error" style="color:red;"></div>
                                            <br />
                                            <div class="col-lg-12">
                                                <label>User Type</label>
                                                    <select class="form-control m-bot15" name="user_type">
                                                        <option value="0">Please Select</option>
                                                        <option value="1">Super Admin</option>
                                                        <option value="2">Admin Staff</option>
                                                        <option value="3">Department Staff</option>
                                                    </select>
                                                </div>
                                                <div id="type_error" style="color:red;"></div>
                                            </div>
                                            <div>
                                                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                <button class="btn btn-success" type="submit" name="btnAdd">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
        </section>
        <!--main content end-->
    </section>
    <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>
  </body>
  <script src="js/ihelp_adduser_validation.js"></script>
</html>
