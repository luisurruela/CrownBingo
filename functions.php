<?php 
session_start();
require_once('config/parameters.php');
require_once('inc/functions.php');

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
}