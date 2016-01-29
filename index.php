<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Just Jobs - Dream Jobs Realized</title>
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">    
    <link href="css/bootstrap-glyphicons.css" rel="stylesheet">
    <!-- Custom CSS -->
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

    <!-- Navigation -->
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
                        <?php if (isset($_SESSION['login'])):?>
                            <a href="logout">Logout</a>    
                        <?php else:?>
                            <a href="contact">Contact</a>
                        <?php endif;?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Content -->
    <div class="container">
        <div class="alert alert-success hidden" id="pds">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h5>Logged out successfully</h5>
        </div>
        <div class="alert alert-danger hidden" id="in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h5>Invalid Credentials.</h5>
            <p>Please try agin. If you dont have an account, <a data-toggle="modal" data-controls-modal="#signup" data-backdrop="static" data-keyboard="false" href='#signup'>Click here to register.</a></p>
        </div>
        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>A Warm Welcome to Just Jobs!</h1>
            <p>Looking for a dream job? Or are you looking for a suitable candidate for your organization? Look no more. Just Jobs is the to-go place for everything related to jobs. One stop solution for all employers, freshers or experienced job seekers.</p>
            <p>
                <a class="btn btn-primary btn-large" data-toggle="modal" data-controls-modal="#signup" data-backdrop="static" data-keyboard="false" href='#signup'>Sign up now!</a>
            </p>
            <p>Already have an account? Login here.</p>
            <p>
                <?php if(isset($_SESSION['login'])): ?>
                <a class="btn btn-primary btn-large" href="redirect">Login!</a>
                <?php else: ?>
                <a class="btn btn-primary btn-large" data-toggle="modal" data-controls-modal="#login" data-backdrop="static" data-keyboard="false" href='#login'>Login!</a>
                <?php endif;?>
            </p>
        </header>
        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h4>Latest Updates</h4>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
        <?php
            require 'ct.php';
            $sql= mysql_query("SELECT * FROM hire ORDER BY hid desc LIMIT 2") or die(mysql_error());
            $sql2= mysql_query("SELECT * FROM jobs ORDER BY jid desc LIMIT 2") or die(mysql_error());
            if(mysql_num_rows($sql) AND mysql_num_rows($sql2)){
                while ($res=mysql_fetch_array($sql) AND $res2=mysql_fetch_array($sql2)) {
                    echo "<div class='text-center'><div class='col-md-3 col-sm-6 hero-feature'>
                            <div class='thumbnail'>
                                <img src='img/job.jpg'>
                                <div class='caption'>
                                    <h4>".$res['title']."</h4>
                                    <p>".$res['desc']."</p>
                                    <p>
                                        <a href='details?hid=".$res['hid']."' class='btn btn-default'>More Info</a>
                                    </p>
                                </div>
                            </div>
                        </div>";
                    echo "<div class='col-md-3 col-sm-6 hero-feature'>
                            <div class='thumbnail'>
                                <img src='img/hire.jpg'>
                                <div class='caption'>
                                    <h4>".$res2['title']."</h4>
                                    <p>".$res2['desc']."</p>
                                    <p>
                                        <a href='details?jid=".$res2['jid']."' class='btn btn-default'>More Info</a>
                                    </p>
                                </div>
                            </div>
                        </div></div>";
                }
            }
        ?>
        </div>   

        <!-- Footer -->
        <hr>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="color:white;">Copyright &copy; Just Jobs Inc. 2015 &reg;</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- Sign up Modal -->
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModal-label">Sign Up Now</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="login" method="POST" role="form">                    
                        <div class="form-group has-feedback">
                            <label for="email" class="control-label col-md-3">Email:</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control val" id="email" name="email" placeholder="Email ID" required>
                                <span class="glyphicon form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="password" class="control-label col-md-3">Password:</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control val" id="pd" name="pd" placeholder="Password" required>
                                <span class="glyphicon form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="repassword" class="control-label col-md-3">Retype Password:</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control val" id="pd2" name="pd2" onblur="checkpd()" placeholder="Retype Password" required>
                                <span class="glyphicon form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="radio" class="control-label col-md-3">Account type:</label>
                            <div class="btn-group col-md-6" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <input type="radio" name="type" value="2">To Hire
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="type" value="3">To get Job
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success col-md-offset-4" name="signupbtn" id="signupsubmit">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModal-label2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModal-label2">Login</h4>
                </div>
                <div class="modal-body">
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
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="matchpd" tabindex="-1" role="dialog" aria-labelledby="myModal-label3" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Passwords don't match.</h4>
                </div>
                <div class="modal-body">
                    <p>Please re-enter the passwords.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#loginsubmit').click(function() {
                var formvalid = true;
                $('.log').each(function() {
                    var formGroup = $(this).parents('.form-group');
                    var glyphicon = formGroup.find('.glyphicon');
                    if (this.checkValidity()) {
                        formGroup.addClass('has-success').removeClass('has-error');
                        glyphicon.addClass('glyphicon-ok').removeClass('glyphicon-remove');
                    } else {
                        formvalid=false;
                        formGroup.addClass('has-error').removeClass('has-success');
                        glyphicon.addClass('glyphicon-remove').removeClass('glyphicon-ok');
                    }
                });
                if (formvalid) {
                    $('#login').modal('hide');
                }
                else {
                    $('#login').modal('show');
                }
            });
            $('#signupsubmit').click(function() {
                var formvalidity = true;
                var count = 0;
                $('.val').each(function() { 
                    var formGroup = $(this).parents('.form-group');
                    var glyphicon = formGroup.find('.glyphicon');
                    if (this.checkValidity()) {
                        formGroup.addClass('has-success').removeClass('has-error');
                        glyphicon.addClass('glyphicon-ok').removeClass('glyphicon-remove');
                    }
                    else {
                        formvalidity=false;
                        formGroup.addClass('has-error').removeClass('has-success');
                        glyphicon.addClass('glyphicon-remove').removeClass('glyphicon-ok');
                    }
                });
                if (formvalidity) {
                    $('#signup').modal('hide');
                }
            });
        });
        function checkpd(){
            var pd=document.getElementById('pd');
            var pd2=document.getElementById('pd2');
            var formGroup = $('#pd2').parents('.form-group');
            var glyphicon = formGroup.find('.glyphicon');
            if (pd.value!=pd2.value) {
                formGroup.addClass('has-error').removeClass('has-success');
                glyphicon.addClass('glyphicon-remove').removeClass('glyphicon-ok');
                $('#matchpd').modal('show');
            }
            else {
                formGroup.addClass('has-success').removeClass('has-error');
                glyphicon.addClass('glyphicon-ok').removeClass('glyphicon-remove');
            }
        }
    </script>
    <?php if(isset($_GET['logout']) AND $_GET['logout']=='true'): ?>
        <script type="text/javascript">
        $('#pds').removeClass('hidden');
        </script>
    <?php endif;?>

    <?php if(isset($_GET['login']) AND $_GET['login']=='fail'): ?>
        <script type="text/javascript">
        $('#in').removeClass('hidden');
        </script>
    <?php endif;?>
</body>
</html>
