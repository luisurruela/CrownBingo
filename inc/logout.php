<?php session_start();

if (isset($_POST) && isset($_POST['logout'])) {
    
    if(isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        header("Location: ../index.php");
    }

} else {
    header("Location: ../index.php");
}