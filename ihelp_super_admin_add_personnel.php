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

    if(isset($_POST['btnSave']))
    {
      $p_id = $_POST['p_id'];
      $p_fname = $_POST['p_fname'];
      $p_lname = $_POST['p_lname'];
      $p_birthdate = $_POST['p_birthdate'];
      $p_address = $_POST['p_address'];
      $p_gender = $_POST['p_gender'];
      $p_mob_no = $_POST['p_mob_no'];
      $p_position = $_POST['p_position'];
      $p_build_assign = $_POST['p_build_assign'];

      $query0 = "SELECT * FROM `personnel` WHERE `p_id` = '$p_id'";
      $query_run0 = mysql_query($query0);

      if(mysql_num_rows($query_run0) == 1)
      {
        echo "<script>alert('Personnel ID already exist!');</script>";
      }
      else
      {
        $query1 = "INSERT INTO `personnel` (`p_id`, `p_fname`, `p_lname`, `p_birthdate`, `p_address`, `p_gender`, `p_mob_no`, `p_position`, `p_build_assign`, `p_status`) VALUES ('$p_id', '$p_fname', '$p_lname', '$p_birthdate', '$p_address', '$p_gender', '$p_mob_no', '$p_position', '$p_build_assign', '1')";
        $query_run1 = mysql_query($query1);

        echo "<script>alert('New Personnel Successfully added!');</script>";
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
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Personnel</h3>
				</div>
			</div>
              	<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Add Personnel Form
                          </header>
                          <div class="panel-body">
                            <div class="well">
                                <form method="POST" class="form-horizontal" onsubmit="return validatePersonl()" name="vform">
                                  <div class="row">
                                      <label class="col-sm-2 control-label" >Personnel ID</label>
                                      <div class="col-sm-2">
                                          <input class="form-control" name="p_id" type="text" placeholder="Personnel ID">
                                          <div id="p_id_error" style="color: red;"></div>
                                      </div>
                                  </div>
                                  <br />
                                  <div class="row">
                                    <label class="col-sm-2 control-label" >Firstname</label>
                                      <div class="col-sm-2">
                                          <input class="form-control" name="p_fname" type="text" placeholder="Firstname">
                                          <div id="fname_error" style="color: red;"></div>
                                      </div>
                                      <label class="col-sm-2 control-label" >Lastname</label>
                                      <div class="col-sm-2">
                                          <input class="form-control" name="p_lname" type="text" placeholder="Lastname">
                                          <div id="lname_error" style="color: red;"></div>
                                      </div>
                                  </div>
                                    <br />
                                  <div class="row">
                                      <label class="col-sm-2 control-label" >Birthdate</label>
                                      <div class="col-sm-2">
                                        <input type="date" class="form-control" name="p_birthdate">
                                        <div id="bdate_error" style="color: red;"></div>
                                      </div>
                                  </div>
                                  <br />
                                  <div class="row">
                                      <label class="col-sm-2 control-label">Address</label>
                                      <div class="col-sm-7">
                                          <input class="form-control" name="p_address" type="text" placeholder="Address">
                                          <div id="addr_error" style="color: red;"></div>
                                      </div>
                                  </div>
                                  <br />
                                  <div class="row">
                                      <label class="col-sm-2 control-label">Gender</label>
                                        <div class="col-sm-2">
                                          <label class="col-sm-2 control-label">
                                            <input name="p_gender" type="radio" value="F" required="required">Female
                                          </label>
                                          <div id="gender_error" style="color: red;"></div>
                                        </div>
                                        <div class="col-sm-2">
                                          <label class="col-sm-1 control-label">
                                            <input name="p_gender" type="radio" value="M" required="required">Male
                                          </label>
                                          <div id="gender_error" style="color: red;"></div>
                                        </div>
                                  </div>
                                  <br />
                                  <div class="row">
                                    <label class="col-sm-2 control-label">Mobile Number</label>
                                    <div class="col-sm-2">
                                      <input class="form-control" type="text" name="p_mob_no" placeholder="09#########">
                                      <div id="mob_no_error" style="color: red;"></div>
                                      <div id="m_n_error" style="color: red;"></div>
                                    </div>
                                  </div>
                                  <br />
                                  <div class="row">
                                    <label class="col-sm-2 control-label">Position</label>
                                      <div class="col-sm-4">
                                          <select class="form-control m-bot15" name="p_position">
                                            <option value="0">Please Select</option>
                                            <option value="Carpenter">Carpenter</option>
                                            <option value="Electrician">Electrician</option>
                                            <option value="Aircon Technician">Aircon Technician</option>
                                            <option value="Plumber">Plumber</option>
                                            <option value="Gardener">Gardener</option>
                                            <option value="Janitor">Janitor</option>
                                            <option value="Weelder">Welder</option>
                                            <option value="Painter">Painter</option>
                                            <option value="Masson">Masson</option>
                                          </select>
                                          <div id="position_error" style="color: red;"></div>
                                      </div>
                                  </div>
                                  <br />
                                  <div class="row">
                                    <label class="col-sm-2 control-label">Assigned</label>
                                    <div class="col-sm-4">
                                      <select  class="form-control m-bot15" name="p_build_assign">
                                        <option value="0">Please Select</option>
                                        <option value="OB">Old Building</option>
                                        <option value="NB">New Building</option>
                                        <option value="Annex">Annex Building</option>
                                        <option value="NSA">NSA Building</option>
                                      </select>
                                    <div id="assigned_error" style="color: red;"></div>
                                    </div>
                                  </div>
                                  <br />
                                  <div class="row">
                                    <div class="pull-right">
                                      <div class="col-sm-4">
                                        <button class="btn btn-default" type="reset">Reset</button>
                                      </div>
                                      <div class="col-sm-4">
                                        <button class="btn btn-success" type="submit" name="btnSave">Submit</button>
                                      </div>
                                    </div>
                                  </div>
                              </form>
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
    <script src="js/ihelp_personnel_validation.js"></script>
  </body>
</html>
