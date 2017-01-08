<?php
  include 'ihelp_functions.php';
  include 'ihelp_db.php';

  if(loggedin())
  {
    $id = $_SESSION['id'];

    $query = "SELECT `id`, `user_fname`, `user_lname` FROM `users` WHERE `id` = '$id'";
    $query_run = mysql_query($query);
    $rows = mysql_fetch_array($query_run);
    $user_fname=$rows['user_fname'];
    $user_lname=$rows['user_lname'];
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
                            <span class="username"><?php echo $user_fname; ?> <?php echo $user_lname?></span>
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
                        <h3 class="page-header"><i class="fa fa fa-bars"></i> pending requests</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Pending
                            </header>
                            <?php
                                $query = "SELECT job_request.jo_trans_no, job_request.jo_building, job_request.jo_user_id, job_request.jo_problem_type, job_request.jo_quantity, job_request.jo_status, job_request.jo_date_request, users.user_id, users.user_fname, users.user_lname, users.user_department, job_request.jo_noted_by FROM job_request INNER JOIN users ON job_request.jo_user_id = users.user_id WHERE job_request.jo_status = '3' ORDER BY job_request.jo_date_request DESC";
                                $query_run = mysql_query($query);
                            ?>
                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                    <tr>
                                        <th><i class="icon_profile"></i> Request no.</th>
                                        <th><i class="icon_calendar"></i> Problem Type</th>
                                        <th><i class="icon_calendar"></i> Building</th>
                                        <th><i class="icon_mail_alt"></i> Quantity</th>
                                        <th><i class="icon_pin_alt"></i> Requested by</th>
                                        <th><i class="icon_mobile"></i> Date Requested</th>
                                        <th><i class="icon_cogs"></i> Department</th>
                                        <th><i class="icon_cogs"></i> Status</th>
                                        <th><i class="icon_cogs"></i> Action</th>
                                    </tr>
                                    <?php
                                        $count=1;
                                            while ($rows=mysql_fetch_array($query_run)) 
                                            {
                                    ?>
                                                <tr>
                                                    <td>
                                                        <a href='ihelp_super_admin_dec_req_info.php?jo_trans_no=<?php echo $rows['jo_trans_no']?>&user_id=<?php echo $rows['user_id']?>&jo_noted_by=<?php echo $rows['jo_noted_by']?>'>
                                                        <?php echo $rows['jo_trans_no']?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $rows['jo_problem_type']?></td>
                                                    <td><?php echo $rows['jo_building']?></td>
                                                    <td><?php echo $rows['jo_quantity']?></td>
                                                    <td><?php echo $rows['user_fname']?> 
                                                        <?php echo $rows['user_lname']?>
                                                    </td>
                                                    <td><?php echo $rows['jo_date_request']?></td>
                                                    <td><?php echo $rows['user_department']?></td>
                                                    <td>
                                                        <?php 
                                                            if($rows['jo_status'] == 2) 
                                                            {
                                                                echo "Pending";
                                                            }
                                                            else if($rows['jo_status'] == 1) 
                                                            {
                                                                echo "Approved";
                                                            }
                                                            else
                                                            {
                                                                echo "Declined";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn btn-primary" href='ihelp_super_admin_dec_req_info.php?jo_trans_no=<?php echo $rows['jo_trans_no']?>&user_id=<?php echo $rows['user_id']?>&jo_noted_by=<?php echo $rows['jo_noted_by']?>'><i class="icon_plus_alt2"></i> view</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                    <?php
                                                $count++;
                                            }
                                    ?>
                                </tbody>
                            </table>
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
  </body>
</html>
