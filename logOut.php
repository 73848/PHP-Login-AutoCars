<?php 
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['pw']);
    session_destroy();
    header('location: logIn.php');
    return;
?>