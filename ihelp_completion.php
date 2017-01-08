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

      <form method="POST" action="ihelp_completion.php" class="login-form">        
        <div class="login-wrap">
            <p>You have successfully completed your registration.</p>
            <p>Please log out to verify changes.</p>
            <p>Thank You!</p>
            <a href="ihelp_logout.php"><button class="btn btn-danger btn-lg col-md-12" type="button">Logout</button></a>
        </div>
      </form>
  </body>
</html>