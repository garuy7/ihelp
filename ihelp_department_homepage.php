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
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Home</h3>
				</div>
			</div>
              	<!-- page start-->
              	Page content goes here
              	<!-- page end-->
          	</section>

			<!---Chatbox content here--->

    <div class="chat_box">
  	<div class="chat_head" onclick="getUsers()"> Chat Box</div>
  	<div class="chat_body">
  	<div class="user" id="1" onclick="getMessages()"> Freedom Genesis</div>
  	</div>
    </div>

    <div class="msg_box" style="right:290px">
    	<div class="msg_head">
			&nbsp;
        <div class="recipient">
			Hello
        </div>
    	<div class="close">x</div>
    	</div>
    	<div class="msg_wrap">
    		<div class="msg_body">
				<div class="msg_push"></div>
    		</div>
    </div>
    	<div class="msg_footer">
    	<form name="messageForm">
    	<textarea class="msg_input" rows="4" name="msg"></textarea>
    	</form>
    	</div>
    </div>
	<!---chatbox ends -->
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
	<script src="js/ihelp_custom_scripts.js"></script>
  </body>
</html>
