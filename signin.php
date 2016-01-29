<?php
    session_start();
    if (isset($_SESSION['login'])) {
        if ($_SESSION['login']==2 OR $_SESSION['login']==3) {
            header('location:home');
        }
        else if ($_SESSION['login']==5) {
            header('location:admin');
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Vishnu Y S">
    <title>Sign In | Just Jobs</title>
     <link rel="shortcut icon" href="img/fav.png">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="css/heroic-features.css" rel="stylesheet">
</head>
<style type="text/css">
    .modal-backdrop{z-index:-1;}
    .modal-header{background-color:#111;border-bottom-color:#444;}
    .modal-content{background-color:#111;}
    .modal-footer{border-top-color:#444;}
    .modal-body{background-color:#111;border-bottom-color:#444;}
    body{background:url(img/bg.jpg);background-attachment:fixed;}
</style>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <img class="img-thumbnail img-rounded navbar-left" src="img/fav.png" width="50px" onclick="location.href='index'">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index"><b>Just Jobs</b></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="aboutus">About</a>
                    </li>
                    <li>
                        <a href="services">Services</a>
                    </li>
                    <li>
                        <a href="contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="jumbotron col-md-6 col-md-offset-3">
                <form class="form-horizontal" action="login" method="POST" role="form">                    
                    <div class="form-group has-feedback">
                        <label for="email" class="control-label col-md-3">Email:</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control log" id="email" name="emailog" placeholder="Email ID" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="password" class="control-label col-md-3">Password:</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control log" id="pwd" name="pwd" placeholder="Password" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success col-md-offset-4" id="loginsubmit" name="loginbtn">Login</button>
                </form>
            </div>
        </div>    
       <hr>
         <!-- Footer -->
        
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="color:white;">Copyright &copy; Just Jobs Inc. 2015 &reg;</p>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>