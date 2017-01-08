<?php
    include 'ihelp_functions.php';
    include 'ihelp_db.php';

  if(loggedin())
  {
    $id = $_SESSION['user_id'];

    $query = "SELECT * FROM `users` WHERE `user_id` = '$id'";
    $query_run = mysql_query($query);
    $rows = mysql_fetch_array($query_run);
    $user_id=$rows['user_id'];
    $user_fname=$rows['user_fname'];
    $user_lname=$rows['user_lname'];
    $user_email=$rows['user_email'];
    $user_address=$rows['user_address'];
    $user_birthdate= $rows['user_birthdate'];
    $user_gender=$rows['user_gender'];
    $user_mobile_no=$rows['user_mobile_no'];
    $user_department=$rows['user_department'];
    $user_about=$rows['user_about'];
    $user_saying=$rows['user_saying'];
    $user_type=$rows['user_type'];

    if($user_type == 1 || $user_type == 2)
    {
      $user_type = "Administrator";
    }
    else
    {
        $user_type = "Department Staff";
    }

    if($user_gender == 'M')
    {
      $user_gender = "Male";
    }
    else
    {
      $user_gender = "Female";
    }

    if(isset($_POST['btnUpdate']))
    {
    $user_id=$_POST['user_id'];
    $user_fname=$_POST['user_fname'];
    $user_lname=$_POST['user_lname'];
    $user_email=$_POST['user_email'];
    $user_address=$_POST['user_address'];
    $user_birthdate= $_POST['user_birthdate'];
    $user_mobile_no=$_POST['user_mobile_no'];
    $user_about=$_POST['user_about'];
    $user_saying=$_POST['user_saying'];

    if(empty($user_about))
    {
        $user_about="State a brief description of yourself by editing your profile.";
    }

    if(empty($user_saying))
    {
        $user_saying="You can also add some sayings here.";
    }

    $query1 = "UPDATE `users` SET `user_fname`='$user_fname', `user_fname`='$user_fname', `user_lname`='$user_lname', `user_email`='$user_email', `user_address`='$user_address', `user_birthdate`='$user_birthdate', `user_mobile_no`='$user_mobile_no', `user_about`='$user_about', `user_saying`='$user_saying' WHERE `user_id`='$user_id'";
    $query_run1 = mysql_query($query1);
    echo "<script>alert('You have successfully updated your profile!');</script>";
    }

  }
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="img/favicon.png">

      <title>Homepage</title>

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
            <a href="ihelp_department_homepage.php" class="logo">i <span class="lite">Help</span></a>
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
                            <span class="username"><?php echo $user_fname; ?> <?php echo $user_lname?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="ihelp_dept_profile.php"><i class="icon_profile"></i> My Profile</a>
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
                        <a class="" href="ihelp_department_homepage.php">
                            <i class="icon_house_alt"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_document_alt"></i>
                            <span>Add Request</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="ihelp_dept_minor_request.php">Minor Request</a></li>
                            <li><a class="" href="ihelp_dept_major_request.php">Major Request</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="" href="ihelp_dept_sent_requests.php">
                            <i class="icon_house_alt"></i>
                            <span>Sent Requests</span>
                        </a>
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
                        <h3 class="page-header"><i class="fa fa fa-bars"></i> Profile</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile-widget profile-widget-info">
                            <div class="panel-body">
                                <div class="col-lg-2 col-sm-2">
                                    <h4><?php echo $user_fname; ?> <?php echo $user_lname?></h4>
                                    <div class="follow-ava">
                                        <img src="img/profile-widget-avatar.jpg" alt="">
                                    </div>
                                    <h6><?php echo $user_type; ?></h6>
                                </div>
                                <div class="col-lg-10 col-sm-10 follow-info">
                                    <p><?php echo $user_about; ?></p>
                                    <p><?php echo $user_saying; ?></p>
                                    <p><?php echo $user_email; ?></p>
                                    <p>Date Today: <?php echo date('j F, Y');?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading tab-bg-info">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a data-toggle="tab" href="#profile">
                                            <i class="icon-user"></i>
                                            Profile
                                        </a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#edit-profile">
                                            <i class="icon-envelope"></i>
                                            Edit Profile
                                        </a>
                                    </li>
                                </ul>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div id="profile" class="tab-pane active">
                                        <section class="panel">
                                            <div class="panel-body bio-graph-info">
                                                <h1>Bio Graph</h1>
                                                <div class="row">
                                                    <div class="bio-row">
                                                        <p><span>First Name :</span> <?php echo $user_fname; ?></p>
                                                    </div>
                                                    <div class="bio-row">
                                                      <p><span>Last Name :</span> <?php echo $user_lname; ?></p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p><span>Birthday :</span> <?php echo date('F j, Y', strtotime($user_birthdate)); ?></p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p><span>Address :</span> <?php echo $user_address; ?></p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p><span>Gender :</span> <?php echo $user_gender; ?></p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p><span>Mobile :</span> <?php echo $user_mobile_no; ?></p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p><span>Department :</span> <?php echo $user_department; ?></p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p><span>User ID :</span> <?php echo $user_id; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <section>
                                            <div class="row">
                                            </div>
                                        </section>
                                    </div>
                                    <div id="edit-profile" class="tab-pane">
                                        <section class="panel">
                                            <div class="panel-body bio-graph-info">
                                                <h1> Profile Info</h1>
                                                <form method="POST" class="form-horizontal" onsubmit="return validateProfile()" name="vform">
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">User ID</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="user_id" readonly="readonly" value="<?php echo $user_id; ?>" >
                                                            <div id="id_error" style="color: red;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">First Name</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="user_fname" value="<?php echo $user_fname; ?>">
                                                            <div id="fname_error" style="color: red;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Last Name</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="user_lname" value="<?php echo $user_lname; ?>">
                                                            <div id="lname_error" style="color: red;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Address</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="user_address" value="<?php echo $user_address; ?>">
                                                            <div id="address_error" style="color: red;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Birthdate</label>
                                                        <div class="col-lg-6">
                                                            <input type="date" class="form-control" name="user_birthdate" value="<?php echo $user_birthdate; ?>" >
                                                            <div id="birthdate_error" style="color: red;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Email</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
                                                            <div id="email_error" style="color: red;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Mobile</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="user_mobile_no" value="<?php echo $user_mobile_no; ?>">
                                                            <div id="mob_no_error" style="color: red;"></div>
                                                            <div id="mobile_error" style="color: red;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">About Yourself</label>
                                                        <div class="col-lg-6">
                                                            <textarea class="form-control" name="user_about" rows="4" placeholder="Tell us about yourself" value="<?php echo $user_about; ?>" ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Sayings</label>
                                                        <div class="col-lg-6">
                                                            <textarea class="form-control" name="user_saying" rows="4" value="<?php echo $user_saying; ?>" placeholder="State some motivational sayings"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                            <button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </section>
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
    <script src="js/ihelp_update_prof_validation.js"></script>>
  </body>
</html>
