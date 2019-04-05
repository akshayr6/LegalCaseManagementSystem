<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require("config.php");
require("check_login.php");
$id = $_SESSION['username'];
$columns = ['name','email_id','lawyer','query'];
$sql = "SELECT * FROM VISITOR WHERE lawyer='$id'";
$value = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($value);
do{
	echo "<p>";
	for($i = 0 ; $i < 4 ; $i++){
		echo $columns[$i].': '.$row[$columns[$i]].'<br>';
	}
	echo "</p>";
}while($row = mysqli_fetch_assoc($value));
?>
<html>
<head>
<title>Enquiries</title>
</head>
<body>
	<a href="main.php">Go back</a>
</body>
</html>