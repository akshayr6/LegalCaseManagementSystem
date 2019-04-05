<?php
require("config.php");
if(isset($_POST['update'])){
	$update = $_POST['update'];
	$input = $_POST['input'];
	$id = $_POST['id'];
	if($update == 'history'){
		$sql = "UPDATE CASE_HISTORY SET case_history = '$input' WHERE case_id = '$id'";
		$value = mysqli_query($conn,$sql);
	}
	elseif($update == 'status'){
		$sql = "UPDATE CASE_STATUS SET status = '$input' WHERE case_id = '$id'";
		$value = mysqli_query($conn,$sql);	
	}
	elseif($update == 'verdict'){
		$sql = "UPDATE CASE_VERDICT SET verdict = '$input' WHERE case_id = '$id'";
		$value = mysqli_query($conn,$sql);	
	}
	header('Location:update_case.php');
}
?>