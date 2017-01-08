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
                            <!-- <span class="username"><?php echo $user_fname; ?> <?php echo $user_lname?></span> -->
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="#"><i class="icon_profile"></i> My Profile</a>
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
                    <li>
                      <a href="javascript:;" class="">
                            <i class="icon_document_alt"></i>
                            <span>Scheduling</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
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
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Scheduling</h3>
				</div>
			</div>
              	<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Schedule Form
                          </header>
                          <div class="panel-body">
                              <form method="POST" class="form-horizontal" onsubmit="return validateSchedule()" name="vform">
                                  <!-- start of well -->
                                  <div class="well">
                                    <div class="row">
                                      <label class="col-sm-2 control-label" >
                                        Schedule ID:
                                      </label>
                                      <div class="col-sm-2">
                                        <input class="form-control" name="schedule_id" type="text" placeholder="Schedule ID" autofocus>
                                        <div id="sched_id_error" style="color: red;"></div>
                                      </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <label class="col-sm-2 control-label" >Transaction No.</label>
                                        <div class="col-sm-2">
                                            <input class="form-control" name="trans_no" type="text" value="<?php echo $trans_no; ?>" readonly="readonly">
                                            <div id="trans_no_error" style="color: red;"></div>
                                        </div>
                                        <label class="col-lg-2 control-label" >Date:</label>
                                        <div class="col-lg-4">
                                            <input class="form-control" name="date_scheduled" type="date">
                                            <div id="date_sched_error" style="color: red;"></div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                      <label class="col-sm-2 control-label" >Personnel ID</label>
                                        <div class="col-sm-2">
                                            <input class="form-control" name="personnel_id" type="text" value="">
                                            <div id="personl_id_error" style="color: red;"></div>
                                        </div>
                                           
                                    </div>
                                    <br />
                                    <div class="row">
                                        <label class="col-sm-2 control-label">Scheduled by:</label>
                                        <div class="col-sm-2">
                                            <input class="form-control" name="scheduled_by" type="text" placeholder="Type here">
                                            <div id="sched_by_error" style="color: red;"></div>
                                        </div> 
                                    </div>
                                    <br />
                                    <div class="row">
                                      <div class="pull-right">
                                        <div class="col-sm-4">
                                          <button class="btn btn-default" type="reset">Reset</button>
                                        </div>
                                        <div class="col-sm-4">
                                          <button class="btn btn-success" type="submit" name="btnSubmit">Schedule</button>
                                        </div>
                                    </div>
                                      </div>
                                      
                                  </div><!-- end of well -->
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
    <script type="text/javascript">
      var schedule_id = document.forms["vform"]["schedule_id"];
      var trans_no = document.forms["vform"]["trans_no"];
      var date_scheduled = document.forms["vform"]["date_scheduled"];
      var personnel_id = document.forms["vform"]["personnel_id"];
      var scheduled_by = document.forms["vform"]["scheduled_by"];

      var sched_id_error = document.getElementById("sched_id_error");
      var trans_no_error = document.getElementById("trans_no_error");
      var date_sched_error = document.getElementById("date_sched_error");
      var personl_id_error = document.getElementById("personl_id_error");
      var sched_by_error = document.getElementById("sched_by_error");

      schedule_id.addEventListener("blur", schedIdVerify, true);
      trans_no.addEventListener("blur", transNoVerify, true);
      date_scheduled.addEventListener("blur", dateSchedVerify, true);
      personnel_id.addEventListener("blur", personlIdVerify, true);
      scheduled_by.addEventListener("blur", schedByVerify, true);

      function validateSchedule()
      {
          if(schedule_id.value == "")
          {
              schedule_id.style.border="1px solid red";
              sched_id_error.textContent="Please enter Schedule ID. ";
              schedule_id.focus();
              return false;
          }

          if(trans_no.value == "")
          {
              trans_no.style.border="1px solid red";
              trans_no_error.textContent="Please enter Transaction No. ";
              trans_no.focus();
              return false;
          }

          if(date_scheduled.value == "")
          {
              date_scheduled.style.border="1px solid red";
              date_sched_error.textContent="Please set a date. ";
              date_scheduled.focus();
              return false;
          }

          if(personnel_id.value == "")
          {
              personnel_id.border="1px solid red";
              personl_id_error.textContent="Please enter a Personnel ID. ";
              personnel_id.focus();
              return false;
          }

          if(scheduled_by.value == "")
          {
              scheduled_by.border="1px solid red";
              sched_by_error.textContent="Please enter a Scheduled by. ";
              scheduled_by.focus();
              return false;
          }
      }

      function schedIdVerify()
      {
          if(schedule_id.value != "")
          {
              schedule_id.style.border="1px solid #ffffff"
              sched_id_error.innerHTML = "";
              return true;
          }
      }

      function transNoVerify()
      {
          if(trans_no.value != "")
          {
              trans_no.style.border="1px solid #ffffff"
              trans_no_error.innerHTML = "";
              return true;
          }
      }

      function dateSchedVerify()
      {
          if(date_scheduled.value != "")
          {
              date_scheduled.style.border="1px solid #ffffff"
              date_sched_error.innerHTML = "";
              return true;
          }
      }

      function personlIdVerify()
      {
          if(personnel_id.value != "")
          {
              personnel_id.style.border="1px solid #ffffff"
              personl_id_error.innerHTML = "";
              return true;
          }
      }

      function schedByVerify()
      {
          if(scheduled_by.value != "")
          {
              scheduled_by.style.border="1px solid #ffffff"
              sched_by_error.innerHTML = "";
              return true;
          }
      }
    </script>
  </body>
</html>
