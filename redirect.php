<?php
    session_start();
    if(isset($_SESSION['login'])){
        if($_SESSION['login']==2 OR $_SESSION['login']==3 ){
            header('location:home');
        }
        elseif ($_SESSION['login']==5) {
            header('location:admin');
        }
    }
    else {
        header('location:signin');
    }
?>