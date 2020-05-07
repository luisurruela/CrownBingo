<?php 

$servername = "localhost";
$username = "crowncit_bingo";
$password = "Crown.2020?";
$db_name = "crowncit_bingo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}