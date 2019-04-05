<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$conn = mysqli_connect($dbhost,$dbuser,$dbpassword);
mysqli_select_db($conn,'majestic');
?>