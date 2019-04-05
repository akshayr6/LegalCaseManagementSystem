<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$login = $_POST['login_type'];
$username = $_POST['username'];
$password = $_POST['password'];
require("config.php");
if($login == 'admin'){
$sql = "SELECT username,password FROM ADMIN WHERE username = '$username'";
$value = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($value);
if (!mysqli_num_rows($value)){
	$_SESSION['a']=1;
	header('Location:index.php');
}
else {
	if($username != $row['username']){
		$_SESSION['a']=1;
		header('Location:index.php');
	}
	elseif($password != $row['password']){
		$_SESSION['a']=1;
		header('Location:index.php');
	}
	else{
		$_SESSION['logged_in'] = 1;
		$_SESSION['username'] = $username;
		header('Location:admin.php');
	}
}
}
elseif ($login == "lawyer"){
	$sql = "SELECT id,password FROM LAWYER WHERE id = '$username'";
	$value = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($value);
	if (!mysqli_num_rows($value)){
		$_SESSION['a']=1;
		header('Location:index.php');
	}
	else {
		if($username != $row['id']){
			$_SESSION['a']=1;
		header('Location:index.php');
		}
		elseif($password != $row['password']){
			$_SESSION['a']=1;
		header('Location:index.php');
		}
		else{
			$_SESSION['logged_in'] = 2;
			$_SESSION['username'] = $username;
			header('Location:main.php');
		}
	}
}
elseif($login=='client'){
	$sql = "SELECT id,password,lawyer_id FROM CLIENT WHERE id = '$username'";
	$value = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($value);
	if (!mysqli_num_rows($value)){
		$_SESSION['a']=1;
	}
	else {
		if($username != $row['id']){
			$_SESSION['a']=1;
		header('Location:index.php');
		}
		elseif($password != $row['password']){
			$_SESSION['a']=1;
		header('Location:index.php');
		}
		else{
			$_SESSION['logged_in'] = 3;
			$_SESSION['username'] = $username;
			$_SESSION['lawyer'] = $row['lawyer_id'];
			header('Location:client.php');
		}
	}

}
elseif($login=='judge'){
	$sql = "SELECT id,password FROM JUDGE WHERE id = '$username'";
	$value = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($value);
	if (!mysqli_num_rows($value)){
		$_SESSION['a']=1;
	}
	else {
		if($username != $row['id']){
			$_SESSION['a']=1;
		header('Location:index.php');
		}
		elseif($password != $row['password']){
			$_SESSION['a']=1;
		header('Location:index.php');
		}
		else{
			$_SESSION['logged_in'] = 4;
			$_SESSION['username'] = $username;
			header('Location:judge.php');
		}
	}

}
?>