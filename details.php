<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Details | Just Jobs</title>
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">
</head>
<style type="text/css">
    .modal-backdrop{z-index:-1;}
    .modal-header{background-color:#111;border-bottom-color:#444;}
    .modal-content{background-color:#111;}
    .modal-footer{border-top-color:#444;}
    .modal-body{background-color:#111;border-bottom-color:#444;}
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
    <div class="container">
        <div class="row">
            <header class="jumbotron">
                <div class="table-responsive">
                <?php 
                    require 'ct.php';
                    if (isset($_GET['hid'])){
                        $hid=$_GET['hid'];
                        echo "<legend>Candidate Details</legend>";
                        $sql=mysql_query("SELECT * FROM hire WHERE hid=$hid") or die(mysql_error());
                        if (mysql_num_rows($sql)) {
                            $res=mysql_fetch_array($sql);
                            echo "<table class='table'>
                                    <tr>
                                        <td class='text-center'>Position Title</td>
                                        <td>:</td>
                                        <td>".$res['title']."</td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>Short Description</td>
                                        <td>:</td>
                                        <td>".$res['desc']."</td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>Detailed Description</td>
                                        <td>:</td>
                                        <td>".$res['details']."</td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>Contact Number</td>
                                        <td>:</td>
                                        <td>".$res['mob']."</td>
                                    </tr>
                                  </table>  ";
                                  if (isset($_SESSION['login']))
                                    echo "<a href='enroll?hid=".$hid."' class='btn btn-primary'>Hire Now!</a>";
                                  else{
                                    $_SESSION['redir']="details?hid=".$hid;
                                    echo "<a class='btn btn-primary' data-toggle='modal' data-controls-modal='#login' data-backdrop='static' data-keyboard='false' href='#login'>Hire Now!</a>";

                                  }
                        }
                    }
                    elseif (isset($_GET['jid'])){
                        $jid=$_GET['jid'];
                        echo "<legend>Job Details</legend>";
                        $sql=mysql_query("SELECT * FROM jobs WHERE jid=$jid") or die(mysql_error());
                        if (mysql_num_rows($sql)) {
                            $res=mysql_fetch_array($sql);
                            echo "<table class='table'>
                                    <tr>
                                        <td class='text-center'>Position Title</td>
                                        <td>:</td>
                                        <td>".$res['title']."</td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>Short Description</td>
                                        <td>:</td>
                                        <td>".$res['desc']."</td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>Detailed Description</td>
                                        <td>:</td>
                                        <td>".$res['details']."</td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>Contact Number</td>
                                        <td>:</td>
                                        <td>".$res['mob']."</td>
                                    </tr>
                                  </table>  ";
                                  if (isset($_SESSION['login']))
                                      echo "<a href='enroll?jid=".$jid."' class='btn btn-primary'>Apply Now!</a>";
                                  else{
                                    $a="details?jid=".$jid;
                                    $_SESSION['redir']=htmlspecialchars($a);
                                    echo "<a class='btn btn-primary' data-toggle='modal' data-controls-modal='#login' data-backdrop='static' data-keyboard='false' href='#login'>Apply Now!</a>";
                                  }
                                  
                        }   
                    }
                    
                ?>
                </div>
            </header>            
        </div>
        <hr>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="color:white;">Copyright &copy; Just Jobs Inc. 2015 &reg;</p>
                </div>
            </div>
        </footer>
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
        });
    </script>
</body>

</html>