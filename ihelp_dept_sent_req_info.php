<?php
  include 'ihelp_functions.php';
  include 'ihelp_db.php';

  if(loggedin())
  {
    $id = $_SESSION['user_id'];

    $query = "SELECT `id`, `user_fname`, `user_lname` FROM `users` WHERE `user_id` = '$id'";
    $query_run = mysql_query($query);
    $rows = mysql_fetch_array($query_run);
    $user_fname=$rows['user_fname'];
    $user_lname=$rows['user_lname'];
  }

  if(isset($_GET['jo_trans_no']) || isset($_GET['user_id']) || isset($_GET['jo_status']))
  {
    $user_id=$_GET['user_id'];
    $jo_trans_no=$_GET['jo_trans_no'];
    $jo_status=$_GET['jo_status'];

    if($jo_status == 2)
    {
        $query = "SELECT job_request.jo_trans_no, job_request.jo_date_request, job_request.jo_building, job_request.jo_problem_type, job_request.jo_quantity, job_request.jo_description, job_request.jo_user_id, job_request.jo_purpose, job_request.jo_date_actioned, job_request.jo_noted_by, users.user_id, users.user_fname, users.user_lname FROM job_request INNER JOIN users ON job_request.jo_user_id = users.user_id WHERE jo_trans_no = '$jo_trans_no'";
        $query_run = mysql_query($query);
        $row = mysql_fetch_array($query_run);
    }
    else
    {
    $query = "SELECT job_request.jo_trans_no, job_request.jo_date_request, job_request.jo_building, job_request.jo_problem_type, job_request.jo_quantity, job_request.jo_description, job_request.jo_user_id, job_request.jo_purpose, job_request.jo_date_actioned, job_request.jo_noted_by, users.user_id, users.user_fname, users.user_lname, personnel.p_id, personnel.p_fname, personnel.p_lname FROM job_request INNER JOIN users ON job_request.jo_user_id = users.user_id INNER JOIN personnel ON personnel.p_id=job_request.jo_noted_by WHERE jo_trans_no = '$jo_trans_no'";
    $query_run = mysql_query($query);
    $row = mysql_fetch_array($query_run);
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
                        <h3 class="page-header"><i class="fa fa fa-bars"></i> Request Info</h3>
                    </div>
                </div>
                <?php
                    if($jo_status == 1)
                    {
                ?>
                        <label>Request No: </label>
                        <label><?php echo $row['jo_trans_no']; ?></label>
                        <input type="hidden" name="lbl_transno" value="<?php echo $row['jo_trans_no']; ?>">
                        <br/>
                        <label>Problem type: </label>
                        <label><?php echo $row['jo_problem_type']; ?></label>
                        <br/>
                        <label>Building: </label>
                        <label><?php echo $row['jo_building']; ?></label>
                        <br/>
                        <label>Quantity: </label>
                        <label><?php echo $row['jo_quantity']; ?></label>
                        <br/>
                        <label>Item w/ complete description: </label>
                        <label><?php echo $row['jo_description']; ?></label>
                        <br/>
                        <label>Date Requested: </label>
                        <label><?php echo $row['jo_date_request']; ?></label>
                        <br/>
                        <label>Requested By: </label>
                        <label><?php echo $row['user_fname']; ?> <?php echo $row['user_lname']; ?></label>
                        <br/>
                        <label>Purpose: </label>
                        <label><?php echo $row['jo_purpose']; ?></label>
                        <br/>
                        <label>Approved By: </label>
                        <label><?php echo $row['p_fname']; ?> <?php echo $row['p_lname']; ?></label>
                        <br/>
                        <label>Date Approved: </label>
                        <label><?php echo $row['jo_date_actioned']; ?></label>
                <?php
                    }
                    else if($jo_status == 2)
                    {
                ?>
                    <form method="POST">
                        <label>Request No: </label>
                        <label><?php echo $row['jo_trans_no']; ?></label>
                        <input type="hidden" name="lbl_transno" value="<?php echo $row['jo_trans_no']; ?>">
                        <br/>
                        <label>Problem type: </label>
                        <label><?php echo $row['jo_problem_type']; ?></label>
                        <br/>
                        <label>Building: </label>
                        <label><?php echo $row['jo_building']; ?></label>
                        <br/>
                        <label>Quantity: </label>
                        <label><?php echo $row['jo_quantity']; ?></label>
                        <br/>
                        <label>Item w/ complete description: </label>
                        <label><?php echo $row['jo_description']; ?></label>
                        <br/>
                        <label>Date Requested: </label>
                        <label><?php echo $row['jo_date_request']; ?></label>
                        <br/>
                        <label>Requested By: </label>
                        <label><?php echo $row['user_fname']; ?> <?php echo $row['user_lname']; ?></label>
                        <br/>
                        <label>Purpose: </label>
                        <label><?php echo $row['jo_purpose']; ?></label>
                        <div>
                            <button class="btn btn-warning" name="btnEdit" type="submit">Edit</button>
                        </div>
                    </form>
                <?php
                    }
                    else
                    {
                ?>
                        <label>Request No: </label>
                        <label><?php echo $row['jo_trans_no']; ?></label>
                        <input type="hidden" name="lbl_transno" value="<?php echo $row['jo_trans_no']; ?>">
                        <br/>
                        <label>Problem type: </label>
                        <label><?php echo $row['jo_problem_type']; ?></label>
                        <br/>
                        <label>Building: </label>
                        <label><?php echo $row['jo_building']; ?></label>
                        <br/>
                        <label>Quantity: </label>
                        <label><?php echo $row['jo_quantity']; ?></label>
                        <br/>
                        <label>Item w/ complete description: </label>
                        <label><?php echo $row['jo_description']; ?></label>
                        <br/>
                        <label>Date Requested: </label>
                        <label><?php echo $row['jo_date_request']; ?></label>
                        <br/>
                        <label>Requested By: </label>
                        <label><?php echo $row['user_fname']; ?> <?php echo $row['user_lname']; ?></label>
                        <br/>
                        <label>Purpose: </label>
                        <label><?php echo $row['jo_purpose']; ?></label>
                        <br/>
                        <label>Approved By: </label>
                        <label><?php echo $row['p_fname']; ?> <?php echo $row['p_lname']; ?></label>
                        <br/>
                        <label>Date Approved: </label>
                        <label><?php echo $row['jo_date_actioned']; ?></label>
                <?php
                    }
                ?>
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
</html>
