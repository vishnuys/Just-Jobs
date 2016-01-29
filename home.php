<?php session_start(); if(!isset($_SESSION['login'])) header('location:signin');?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home | Just Jobs</title>
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
    .footer{margin-bottom:10px}
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
                        <?php if($_SESSION['login']==3): ?>
                        <a href="addetails">Add candidate profile</a>
                        <?php elseif($_SESSION['login']==2): ?>
                        <a href="addetails">Add job requirement</a>
                        <?php endif;?>
                    </li>
                    <li>
                        <?php if($_SESSION['login']==3): ?>
                        <a href="delentry">Delete candidate profile</a>
                        <?php elseif($_SESSION['login']==2): ?>
                        <a href="delentry">Delete job requirement</a>
                        <?php endif;?>

                    </li>
                    <li>
                        <a href="logout">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container">
         <div class="row text-center">
         <?php if(isset($_GET['add']) and $_GET['add']=='true'):?>
            <div class='alert alert-success' id='added'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <h5><?php if($_SESSION['login']==2) echo "Job"; elseif($_SESSION['login']==3) echo "Profile";?> added successfully.</h5>
            </div>
        <?php elseif(isset($_GET['del']) and $_GET['del']=='true'):?>
            <div class='alert alert-success' id='added'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <h5><?php if($_SESSION['login']==2) echo "Job"; elseif($_SESSION['login']==3) echo "Profile";?> deleted successfully.</h5>
            </div>
        <?php elseif(isset($_GET['reg']) and $_GET['reg']=='true'):?>
            <div class='alert alert-success' id='added'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <h5>Successfully Enrolled</h5>
            </div>
        <?php endif;?>
         <form class="form-horizontal" action="home" method="POST" role="form">
             <div class="form-group">
                 <label class="control-label col-md-3" for="">Search:</label>
                 <div class="col-md-9">
                     <input type="text" class="form-control" name="search" placeholder="<?php if($_SESSION['login']==2) echo "Search for Candidates"; else echo "Search for Jobs"; ?>" required>
                </div>
                 <div class="col-md-12">&nbsp;</div>
                <div class="col-md-6 col-md-offset-3 text-center">
                    <button type="submit" class="btn btn-primary col-md-4 col-md-offset-2" name="jobbtn">Submit</button>
                    <a class="btn btn-primary col-md-4 col-md-offset-1" href="home?all=1">View all</a>                        
                </div>
             </div>            
             
         </form>
         <?php
            require 'ct.php';
            if(isset($_POST['jobbtn'])){
                $key=$_POST['search'];
                if($_SESSION['login']==2)
                    $sql= mysql_query("SELECT * FROM hire WHERE title like '%$key%' OR `desc` LIKE '%key%' OR details LIKE '$key'") or die(mysql_error());
                elseif ($_SESSION['login']==3)
                    $sql= mysql_query("SELECT * FROM jobs WHERE title like '%$key%' OR `desc` LIKE '%key%' OR details LIKE '$key'") or die(mysql_error());
                if(mysql_num_rows($sql)){
                    while ($res=mysql_fetch_array($sql)) {
                        if($_SESSION['login']==2)
                            echo "<div class='col-md-3 col-sm-6 hero-feature'>
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
                        elseif ($_SESSION['login']==3)
                            echo "<div class='col-md-3 col-sm-6 hero-feature'>
                                    <div class='thumbnail'>
                                        <img src='img/hire.jpg'>
                                        <div class='caption'>
                                            <h4>".$res['title']."</h4>
                                            <p>".$res['desc']."</p>
                                            <p>
                                                <a href='details?jid=".$res['jid']."' class='btn btn-default'>More Info</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>";
                    }
                }                
                else {
                    echo "<div class='container'><div class='alert alert-success' id='nores'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <h5>No results found</h5>
                            <p>Try again with differnt keywords.</p>
                        </div></div>";
                }
            }
            elseif (isset($_GET['all']) AND $_GET['all']==1) {
                    if($_SESSION['login']==2)
                    $sql= mysql_query("SELECT * FROM hire") or die(mysql_error());
                elseif ($_SESSION['login']==3)
                    $sql= mysql_query("SELECT * FROM jobs") or die(mysql_error());
                if(mysql_num_rows($sql)){
                    while ($res=mysql_fetch_array($sql)) {
                        if($_SESSION['login']==2)
                            echo "<div class='col-md-3 col-sm-6 hero-feature'>
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
                        elseif ($_SESSION['login']==3)
                            echo "<div class='col-md-3 col-sm-6 hero-feature'>
                                    <div class='thumbnail'>
                                        <img src='img/hire.jpg'>
                                        <div class='caption'>
                                            <h4>".$res['title']."</h4>
                                            <p>".$res['desc']."</p>
                                            <p>
                                                <a href='details?jid=".$res['jid']."' class='btn btn-default'>More Info</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>";
                    }
                }
            }
        ?>
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
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
