<?php
ob_start();
session_start();
if(isset($_SESSION['login'])!=true){
    header('location:login.php');
}
else{
    session_destroy();
    unset($_SESSION['login']);
    unset($_SESSION['username']);
    header('location:../index.php');
}
?>