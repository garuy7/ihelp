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
                            <span class="username"><!-- <?php echo $user_fname; ?> <?php echo $user_lname?> --></span>
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
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Home</h3>
				</div>
			</div>
              	<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Job Request Info
                          </header>
                          <div class="panel-body">
                              <div class="well">
                                                              <form method="POST" class="form-horizontal" onsubmit="return validateRequest()" name="vform">

                                  <div class="row">
                                      <label class="col-sm-2 control-label" >Transaction No.</label>
                                      <div class="col-sm-2">
                                          <label class="col-sm-2 control-label" ></label>
                                      </div>
                                      <label class="col-lg-2 control-label" >Date Request:</label>
                                      <div class="col-lg-4">
                                          <label class="col-sm-2 control-label"></label>
                                      </div>
                                  </div>
                                  <br />
                                  <div class="row">
                                    <label class="col-sm-2 control-label" >Department:</label>
                                      <label class="col-sm-2 control-label"></label>
                                  </div>
                                  <br />
                                  <div class="row">
                                    <label class="col-sm-2 control-label" >User ID:</label>
                                      <div class="col-sm-2">
                                          <label class="col-sm-2 control-label"></label>
                                      </div>    
                                  </div>
                                  <br />
                                  <div class="row">
                                    <label class="col-lg-2 control-label">Quantity:</label>
                                    <div class="col-sm-2">
                                      <label class="col-sm-2 control-label"></label>    
                                    </div>
                                  </div>
                                  <br />
                                  <div class="row">
                                      <label class="col-sm-2 control-label">IWCD:</label>
                                      <div class="col-sm-7">
                                          <label class="col-sm-2 control-label"></label>
                                      </div>
                                  </div>
                                  <br />
                                  <div class="row">
                                    <label class="col-sm-2 control-label">Purpose:</label>
                                      <div class="col-sm-7">
                                          <label class="col-sm-2 control-label"></label>
                                      </div>
                                  </div>
                                  <br />
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="pull-right">
                                        <div class="col-sm-4">
                                      <button class="btn btn-default" type="reset">Reset</button>
                                    </div>
                                    <div class="col-sm-4">
                                      <button class="btn btn-success" type="submit" name="btnSubmit">Submit</button>
                                    </div>
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
  </body>
</html>
