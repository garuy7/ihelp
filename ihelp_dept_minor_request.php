<?php
	include 'ihelp_functions.php';
	include 'ihelp_db.php';

  error_reporting (E_ALL ^ E_NOTICE);

  if(loggedin())
  {
    $id = $_SESSION['user_id'];

    $query = "SELECT `id`, `user_id`, `user_fname`, `user_lname` FROM `users` WHERE `user_id` = '$id'";
    $query_run = mysql_query($query);
    $rows = mysql_fetch_array($query_run);
    $user_fname=$rows['user_fname'];
    $user_lname=$rows['user_lname'];
    $user_id = $rows['user_id'];

    $query1 = "SELECT `jo_trans_no_gen` FROM `trans_no_gennerate` ORDER BY `jo_trans_no_gen` DESC";
    $query_run1 = mysql_query($query1);
    $rows1 = mysql_fetch_array($query_run1);
    $trans_no = $rows1['jo_trans_no_gen'] + 1;

    $query_dept = "SELECT * FROM `department`";
    $query_run_dept = mysql_query($query_dept);

  }

  if(isset($_POST['btnSubmit']))
    {
      $trans_no = $_POST['trans_no'];
      $date_request = date('Y-m-d');
      $user_id = $_POST['user_id'];
      $user_building = $_POST['user_building'];
      $quantity = $_POST['quantity'];
      $item = $_POST['item'];
      $purpose = $_POST['purpose'];
      $problem_type = $_POST['problem_type'];

      $jo_query = "INSERT INTO `job_request` (`jo_trans_no`, `jo_date_request`, `jo_user_id`, `jo_building`, `jo_problem_type`, `jo_quantity`, `jo_description`, `jo_purpose`, `jo_status`) VALUES ('$trans_no', '$date_request', '$user_id', '$user_building', '$problem_type', '$quantity', '$item', '$purpose', '2')";
      $jo_query_run = mysql_query($jo_query);
      echo "<script>alert ('Successfully sent'); </script>";

      $transno_query = "SELECT `jo_trans_no_gen` FROM `trans_no_gennerate` WHERE `jo_trans_no_gen` = '$trans_no'";
      $transno_query_run = mysql_query($transno_query);
      if(mysql_num_rows($transno_query_run) == 1)
      {
        echo "<script>alert ('Error'); </script>";
      }
      else
      {
        $query2 = "INSERT INTO `trans_no_gennerate` (`jo_trans_no_gen`) VALUES ('$trans_no')";
        $query_run2 = mysql_query($query2);

        $query1 = "SELECT `jo_trans_no_gen` FROM `trans_no_gennerate` ORDER BY `jo_trans_no_gen` DESC";
        $query_run1 = mysql_query($query1);
        $rows1 = mysql_fetch_array($query_run1);
        $trans_no = $rows1['jo_trans_no_gen'] + 1;

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
					<h3 class="page-header"><i class="fa fa fa-bars"></i> minor request</h3>
				</div>
			</div>
              	<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Minor Request Form
                          </header>
                          <div class="panel-body">
                              <form method="POST" class="form-horizontal" onsubmit="return validateRequest()" name="vform">

                                  <div class="row">
                                      <label class="col-sm-2 control-label" >Transaction No.</label>
                                      <div class="col-sm-2">
                                          <input class="form-control" name="trans_no" type="text" value="<?php echo $trans_no; ?>" readonly="readonly">
                                      </div>
                                      <label class="col-lg-4 control-label" >Date:</label>
                                      <div class="col-lg-4">
                                          <p class="form-control-static"><?php echo date('F d, Y'); ?></p>
                                      </div>
                                  </div>
                                  <br />
                                  <div class="row">
                                    <label class="col-sm-2 control-label" >User ID</label>
                                      <div class="col-sm-2">
                                          <input class="form-control" name="user_id" type="text" value="<?php echo $user_id; ?>" readonly="readonly">
                                      </div>
                                    <label class="col-lg-4 control-label">Building</label>
                                      <div class="col-lg-4">
                                          <select  class="form-control m-bot15" name="building">
                                            <option value="0">Please Select</option>
                                            <option value="OB">Old Building</option>
                                            <option value="NB">New Building</option>
                                            <option value="Annex">Annex Building</option>
                                            <option value="NSA">NSA Building</option>
                                          </select>
                                          <div id="building_error" style="color:red;"></div>
                                      </div>

                                  </div>
                                  <div class="row">
                                  <label class="col-lg-2 control-label">Problem Type</label>
                                      <div class="col-lg-3">
                                          <select  class="form-control m-bot15" name="problem_type">
                                            <option value="0">Please Select</option>
                                            <option value="Wiring">Wiring</option>
                                            <option value="Plumbing">Plumbing</option>
                                            <option value="Aircon">Aircon</option>
                                          </select>
                                          <div id="problem_type_error" style="color:red;"></div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <label class="col-sm-2 control-label">Quantity</label>
                                      <div class="col-sm-2">
                                          <input class="form-control" name="quantity" type="text" placeholder="Type here" >
                                          <div id="quantity_error" style="color:red;"></div>
                                          <div id="quan_error" style="color:red;"></div>
                                      </div>
                                  </div>
                                  <br />
                                  <div class="row">
                                      <label class="col-sm-2 control-label">IWCD</label>
                                      <div class="col-sm-7">
                                          <input class="form-control" name="item" type="text" placeholder="Item With Complete Description">
                                          <div id="item_error" style="color:red;"></div>
                                      </div>
                                  </div>
                                  <br />
                                  <div class="row">
                                    <label class="col-sm-2 control-label">Purpose</label>
                                      <div class="col-sm-7">
                                          <textarea class="form-control" name="purpose" cols="1000" rows="3" placeholder="Type here"></textarea>
                                          <div id="purpose_error" style="color:red;"></div>
                                      </div>
                                  </div>
                                  <br />
                                  <div class="row pull-right">
                                    <div class="col-sm-4">
                                      <button class="btn btn-default" type="reset">Reset</button>
                                    </div>
                                    <div class="col-sm-4">
                                      <button class="btn btn-success" type="submit" name="btnSubmit">Submit</button>
                                    </div>
                                  </div>

                              </form>
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
  <script src="js/ihelp_minor_req_validation.js"></script>
</html>
