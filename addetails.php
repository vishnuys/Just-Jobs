<?php session_start(); if(!isset($_SESSION['login'])) header('location:signin');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Details | Just Jobs</title>
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">
</head>
<style type="text/css">
    .modal-backdrop{z-index: -1;}
    body{background: url(img/bg.jpg) top right no-repeat; background-attachment:fixed;}
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
        <div class="row">
            <div class="jumbotron">
            <?php if($_SESSION['login']==2):?>
                <form action="" method="POST" class="form-horizontal" role="form">
                    <legend>Add Job details</legend>
                
                    <div class="form-group has-feedback">
                        <label for="name" class="control-label col-md-3">Title:</label>
                        <div class="col-md-6">    
                            <input type="text" class="form-control log" name="title" maxlength="30" placeholder="Job title" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="sdesc" class="control-label col-md-3">Short Description:</label>
                        <div class="col-md-6">    
                            <input type="text" class="form-control log" maxlength="70" name="sdesc" placeholder="Description within 10-15 words" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="ldesc" class="control-label col-md-3">Detailed Description:</label>
                        <div class="col-md-6">
                            <textarea class="form-control log" rows="4" maxlength="300" name="ldesc" placeholder="Description within 50 words" required></textarea>    
                            <!--input type="text" class="form-control" id="" placeholder="Description within 50 words" required-->
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group has-feedback ">
                        <label for="mob" class="control-label col-md-3">Contact Number:</label>
                        <div class="col-md-6">    
                            <input type="text" pattern="^[7-9][0-9]{9}$" class="form-control log" name="num" placeholder="Contact Number" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary col-md-4 col-md-offset-4" name="submit" id="add"><b>Submit</b></button>
                    </div>
                </form>
            <?php elseif($_SESSION['login']==3):?>
                <form action="" method="POST" class="form-horizontal" role="form">
                    <legend>Add candidate details</legend>
                
                    <div class="form-group has-feedback">
                        <label for="name" class="control-label col-md-3">Title:</label>
                        <div class="col-md-6">    
                            <input type="text" class="form-control log" name="title" maxlength="30" placeholder="Title of position required" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="sdesc" class="control-label col-md-3">Short Description:</label>
                        <div class="col-md-6">    
                            <input type="text" class="form-control log" maxlength="70" name="sdesc" placeholder="Description within 10-15 words" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="ldesc" class="control-label col-md-3">Detailed Description:</label>
                        <div class="col-md-6">
                            <textarea class="form-control log" rows="4" maxlength="300" name="ldesc" placeholder="Description within 50 words" required></textarea>    
                            <!--input type="text" class="form-control" id="" placeholder="Description within 50 words" required-->
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group has-feedback ">
                        <label for="mob" class="control-label col-md-3">Contact Number:</label>
                        <div class="col-md-6">    
                            <input type="text" pattern="^[7-9][0-9]{9}$" class="form-control log" name="num" placeholder="Contact Number" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary col-md-4 col-md-offset-4" name="submit" id="add"><b>Submit</b></button>
                    </div>
                </form>
            <?php endif; ?>
            </div>
        </div>
        <hr>
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
    <script type="text/javascript">
        $(function () {
            $('#add').click(function() {
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
        });
    </script>
</body>

</html>
<?php
    require 'ct.php';
    if (isset($_POST['submit'])) 
    {
        $title=$_POST['title'];
        $sdesc=$_POST['sdesc'];
        $ldesc=$_POST['ldesc'];
        $num=$_POST['num'];
        $uid=$_SESSION['uid'];
        if ($_SESSION['login']==2) 
            $sql=mysql_query("INSERT INTO jobs(title,`desc`,details,mob,poster) VALUES('$title','$sdesc','$ldesc',$num,$uid)") or die(mysql_error());
        elseif ($_SESSION['login']==3) 
            $sql=mysql_query("INSERT INTO hire(title,`desc`,details,mob,poster) VALUES('$title','$sdesc','$ldesc',$num,$uid)") or die(mysql_error());
        if ($sql) {
            echo "<script>location.href='home?add=true';</script>";
        }
    }
?>