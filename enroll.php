<?php session_start(); require 'ct.php'; if(!isset($_SESSION['login'])) header('location:signin');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Enroll | Just Jobs</title>
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
        <div class="alert alert-warning hidden" id="ac">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h5>Invalid Access</h5>
            <p>You are not authorized to to view this.</p>
        </div>
        <?php if(isset($_GET['error'])):?>
        <div class="alert alert-danger" id="er">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h5>Something went wrong</h5>
            <p>Please try again with valid procedure.</p>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="jumbotron">
            <?php if($_SESSION['login']==2):?>
                <form action="" method="POST" class="form-horizontal" role="form">
                    <legend>Hire Candidate</legend>
                
                    <div class="form-group has-feedback">
                        <label for="name" class="control-label col-md-3">Job Title:</label>
                        <div class="col-md-6">    
                            <select class="form-control" name="id">
                            <?php
                                $uid=$_SESSION['uid'];
                                $sql=mysql_query("SELECT * FROM jobs WHERE poster=$uid");
                                if (mysql_num_rows($sql)) 
                                {
                                    while ($res=mysql_fetch_array($sql)) 
                                    {
                                        echo "<option value='".$res['jid']."'>".$res['title']."</option>";
                                    }
                                }
                            ?>
                            </select>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary col-md-4 col-md-offset-4" name="submit" id="add"><b>Submit</b></button>
                    </div>
                </form>
            <?php elseif($_SESSION['login']==3):?>
                <form action="" method="POST" class="form-horizontal" role="form">
                    <legend>Apply to Job</legend>
                
                    <div class="form-group has-feedback">
                        <label for="name" class="control-label col-md-3">Post Title:</label>
                        <div class="col-md-6">    
                            <select class="form-control" name="id">
                            <?php
                                $uid=$_SESSION['uid'];
                                $sql=mysql_query("SELECT * FROM hire WHERE poster=$uid");
                                if (mysql_num_rows($sql)) 
                                {
                                    while ($res=mysql_fetch_array($sql)) 
                                    {
                                        echo "<option value='".$res['jid']."'>".$res['title']."</option>";
                                    }
                                }
                            ?>
                            </select>
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
    
    <?php if (isset($_GET['hid']) && $_SESSION['login']==3): ?>
        <script type="text/javascript">
            $("#ac").removeClass('hidden');
        </script>
    <?php endif;?>

    <?php if (isset($_GET['jid']) && $_SESSION['login']==2): ?>
        <script type="text/javascript">
            $("#ac").removeClass('hidden');
        </script>
    <?php endif;?>

</body>

</html>
<?php
    if (isset($_POST['submit'])) 
    {
        $id=$_POST['id'];
        if (isset($_GET['hid'])) 
            $hid=$_GET['hid'];
        elseif (isset($_GET['jid']))
            $jid=$_GET['jid'];
        
        if ($_SESSION['login']==2) 
            $sql=@mysql_query("INSERT INTO enroll VALUES ($id,$hid)");
        elseif ($_SESSION['login']==3) 
            $sql=@mysql_query("INSERT INTO enroll VALUES ($jid,$id)");
        if ($sql) {
            echo "<script>location.href='home?reg=true';</script>";
        }
        else
            echo "<script>location.href='enroll?error=true';</script>";
    }
?>