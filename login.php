<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login | Just Jobs</title>
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
        <hr>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="color:white;">Copyright &copy; Just Jobs Inc. 2015 &reg;</p>
                </div>
            </div>
        </footer>
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
    
</body>

</html>
<?php
    session_start();
    require "ct.php";
    if (isset($_POST['signupbtn'])) 
    {
        $email=$_POST['email'];
        $pd=$_POST['pd'];
        $pd2=$_POST['pd2'];
        $type=$_POST['type'];
        if (is_null($email) or is_null($pd) or is_null($pd2) or is_null($type)) {
            echo"Null value detected.";
        }
        else{
            $sql=mysql_query("INSERT INTO user(uname,pwd,utype) VALUES ('$email','$pd',$type)");
            if ($sql) {
                $_SESSION['login']=$type;
                $_SESSION['uname']=$email;
                $sql2=mysql_query("SELECT uno FROM user WHERE uname='$email'");
                $res=mysql_fetch_array($sql2);
                $_SESSION['uid']=$res[0];
                echo "<script type='text/javascript'>alert('Account created.');";
                echo "window.location.href='home';</script>";
            }
            else{
                $sql=mysql_query("SELECT * FROM user WHERE uname='$email'") or die(mysql_error());
                if (mysql_num_rows($sql)) {
                    echo "<script type='text/javascript'>alert('Username already exists. Please try logging in or sign up with different username.');";
                    echo "window.location.href='index';</script>";
                }
                else{    
                    echo "<script type='text/javascript'>alert('Account was not created. Please try again.');";
                    echo "window.location.href='index';</script>";
                }
            }
        }
    }
    else if (isset($_POST['loginbtn'])) 
    {
        $emailog=$_POST['emailog'];
        $pwd=$_POST['pwd'];
        $sql=mysql_query("SELECT * FROM user WHERE uname='$emailog' AND pwd='$pwd'") or die(mysql_error());
        if (mysql_num_rows($sql)) 
        {
            $res=  mysql_fetch_array($sql);
            $_SESSION['login']=$res['utype'];
            $_SESSION['uid']=$res['uno'];
            $_SESSION['uname']=$res['uname'];
            if(isset($_SESSION['redir']))
                header('location:'.$_SESSION['redir']);
            else{
                if($_SESSION['login']==2 OR $_SESSION['login']==3)
                    header ('location:home');
                elseif($_SESSION['login']==5)
                    header ('location:admin');
            }                
        }
        else
        {
            echo "<script type='text/javascript'>location.href='index?login=fail'</script>";
        }
    }
?>